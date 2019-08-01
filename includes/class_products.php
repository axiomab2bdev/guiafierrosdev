<?php
/**
* Class Products
* Products that are offered for users to sign up under
*/
class Products extends TableGateway {
    /**
    * Registry
    * @var object
    */
    var $PMDR;
    /**
    * Database
    * @var object
    */
    var $db;

    /**
    * Products Constructor
    * @param object $PMDR Registry
    * @return void
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_PRODUCTS;
    }

    function insert($data) {
        $data['type_id'] = $this->PMDR->get('TableGateway', T_MEMBERSHIPS)->insert($data);
        return parent::insert($data);
    }

    function update($data, $id) {
        parent::update($data,$id);
        $this->PMDR->get('TableGateway', T_MEMBERSHIPS)->update($data,$data['type_id']);
        if($data['update_current']) {
            $this->syncProduct($id);
        }
    }

    function syncProduct($id) {
        if($product = $this->db->GetRow("SELECT p.type, p.type_id, p.suspend_overdue_days, p.taxed, p.upgrades, GROUP_CONCAT(pp.id) AS pricing_ids FROM ".T_PRODUCTS_PRICING." pp, ".T_PRODUCTS." p WHERE pp.product_id=p.id AND p.id=? GROUP BY p.id",array($id))) {
            $this->db->Execute("UPDATE ".T_ORDERS." o SET o.suspend_overdue_days=?, o.taxed=?, o.upgrades=? WHERE pricing_id IN (".$product['pricing_ids'].")",array($product['suspend_overdue_days'],$product['taxed'],$product['upgrades']));
            $columns = $this->db->MetaColumnNames(T_MEMBERSHIPS);
            $query = "UPDATE ".T_LISTINGS." l, ".T_ORDERS." o, ".T_MEMBERSHIPS." m SET";
            foreach($columns as $column) {
                if($column == 'id' or $column == 'name') continue;
                $query .= ' l.'.$column.'=m.'.$column.',';
            }
            $query = rtrim($query,',')." WHERE o.type_id=l.id AND o.type=? AND m.id=? AND o.pricing_id IN(".$product['pricing_ids'].")";
            $this->db->Execute($query,array($product['type'],$product['type_id']));
        }
    }

    function syncPricing($data, $id) {
        if($this->PMDR->get('Dates')->isZero($data['next_date'])) {
            $data['next_date'] = date('Y-m-d');
        }

        if($data['price'] == 0.00) {
            $this->db->Execute("UPDATE ".T_INVOICES." i, ".T_ORDERS." o SET i.status='canceled' WHERE o.id=i.order_id AND o.pricing_id=? AND i.status='unpaid'",array($id));
        }

        // We can't add a LIMIT clause here because MySQL does not allow LIMIT on multi-table updates
        $this->db->Execute("
        UPDATE ".T_ORDERS." o INNER JOIN ".T_PRODUCTS_PRICING." pp ON o.pricing_id=pp.id INNER JOIN ".T_PRODUCTS." p ON pp.product_id=p.id SET
        o.next_invoice_date=IF(pp.price=0.00,'0000-00-00',IF(o.next_invoice_date='0000-00-00','$next_date',o.next_invoice_date)),
        o.next_due_date=IF(pp.period_count=0,'0000-00-00',IF(o.next_due_date='0000-00-00','$next_date',IF(pp.price=0.00,'$next_date',o.next_due_date))),
        o.amount_recurring=pp.price,
        o.period=pp.period,
        o.period_count=pp.period_count,
        o.renewable=pp.renewable
        WHERE pp.id=? AND o.subscription_id=''",array($id));
    }

    function syncProducts() {
        $products = $this->db->GetCol("SELECT id FROM ".T_PRODUCTS);
        foreach($products as $id) {
            $this->syncProduct($id);
        }
    }

    /**
    * Get product by pricing ID
    * @param int $pricing_id Pricing ID
    * @param int $user_id User ID
    * @return array Product details
    */
    function getByPricingID($pricing_id, $user_id = null) {
        // Get the product details from the database
        $product = $this->db->GetRow("SELECT m.*, pg.name AS product_group_name, p.active, p.name AS product_name, p.group_id, p.taxed, p.upgrades, p.type, p.type_id, p.suspend_overdue_days, pp.activate, pp.id as pricing_id, pp.period, pp.period_count, pp.price, pp.setup_price, pp.prorate, pp.prorate_day, pp.prorate_day_next_month, pp.user_limit, pp.renewable FROM ".T_PRODUCTS_GROUPS." pg INNER JOIN ".T_PRODUCTS." p ON pg.id=p.group_id INNER JOIN ".T_PRODUCTS_PRICING." pp ON p.id=pp.product_id INNER JOIN ".T_MEMBERSHIPS." m ON p.type_id=m.id  WHERE pp.id=?",array($pricing_id));

        // If the product is not found return false
        if(!$product) return false;

        // Set default values
        $product['next_due_date'] = '0000-00-00';
        $product['next_invoice_date'] = '0000-00-00';
        $product['future_due_date'] = '0000-00-00';
        $product['tax'] = 0.00;
        $product['tax_rate'] = 0.00;
        $product['tax2'] = 0.00;
        $product['tax_rate2'] = 0.00;
        $product['subtotal'] = 0.00;
        $product['recurring_total'] = 0.00;

        // If we have a user ID and this product is taxed, get the tax rate.
        if(!is_null($user_id) AND $product['taxed']) {
            $tax_rates = $this->PMDR->get('Users')->getTaxRate($user_id);
            $product['tax_rate'] = (float) $tax_rates[1];
            $product['tax_rate2'] = (float) $tax_rates[2];
            unset($tax_rates);
        }

        // Set the default price in case we pro-rate
        $price = $product['price'];

        // If we have a product that must be renewed we calclate the next due date
        if($product['period_count'] != 0) {
            // If the price is 0.00 we calculate the next due date, else we set the next due date to today
            if($product['price'] == 0.00) {
                $product['next_due_date'] = $this->PMDR->get('Dates')->dateAdd(date('Y-m-d'),$product['period_count'],$product['period']);
            } else {
                $product['next_due_date'] = date('Y-m-d');
                // If the product is renewable we set the next invoice date
                if($product['renewable']) {
                    $product['next_invoice_date'] = $this->PMDR->get('Dates')->dateAdd(date('Y-m-d'),$product['period_count'],$product['period']);
                }
            }
            // If pro-rating is turned on for the pricing level, and pro rate day is a positive number and today is not the pro rate day, we calculate a new price
            if($product['prorate'] AND $product['prorate_day'] AND date('j') != $product['prorate_day'] AND $product['price'] != 0.00) {
                $price_per_day = ($product['period'] == 'years') ? $product['price'] / 365*$product['period_count'] : ($product['price'] * (12/$product['period_count'])) / 365;
                // If our pro rate day has already passed, go to the next month
                if($product['prorate_day'] < date('j')) {
                    // Get the price for the rest of this month
                    $price = ((date('t')-date('j'))+$product['prorate_day']) * $price_per_day;
                    $product['next_invoice_date'] = date('Y-m-d',mktime(0,0,0,date('n')+1,$product['prorate_day'],date('Y')));
                    if($product['prorate_day_next_month'] < date('j')) {
                        // Get the days in the next month
                        $days_in_next_month = date('t',mktime(0,0,0,date('n')+1,1,date('Y')));
                        // Add to to the price the next month price + the days up to the pro rate day in the month after that
                        $price = round($price+($price_per_day*$days_in_next_month),2);
                        $product['next_invoice_date'] = date('Y-m-d',mktime(0,0,0,date('n')+2,$product['prorate_day'],date('Y')));
                    }
                } else {
                    $price = ($product['prorate_day'] - date('j')) * $price_per_day;
                    $product['next_invoice_date'] = date('Y-m-d',mktime(0,0,0,date('n'),$product['prorate_day'],date('Y')));
                }
            }
        }

        // We set the future due date to the next invoice date because it will match the next due date in case of pro-rating.
        $product['future_due_date'] = $product['next_invoice_date'];

        // If a non-zero price (or setup price) calculate the subtotal by adding in the setup price.
        // The recurring price is the normal product price (not the pro-rate price)
        if((float) $price != 0.00 OR (float) $product['setup_price'] != 0.00) {
            $product['subtotal'] = round($price + $product['setup_price'],2);

            // The recurring total is only set if this is a non-unlimited product
            if($product['period_count'] != 0) {
                $product['recurring_total'] = round($product['price'],2);
            }

            // If the tax rate is not 0.00 calculate the tax
            if($product['tax_rate'] != 0.00) {
                if($this->PMDR->getConfig('tax_type') == 'exclusive') {
                    $product['tax'] = round($product['subtotal']*($product['tax_rate']/100),2);
                    if($product['tax_rate2'] != 0.00) {
                        if($this->PMDR->getConfig('compound_tax')) {
                            $product['tax2'] = round(($product['subtotal']+$product['tax'])*($product['tax_rate2']/100),2);
                        } else {
                            $product['tax2'] = round($product['subtotal']*($product['tax_rate2']/100),2);
                        }
                    }
                } else {
                    $product['tax'] = round($product['subtotal'] - ($product['subtotal']*100/($product['tax_rate']+100)),2);
                    if($product['tax_rate2'] != 0.00) {
                        $product['tax2'] = round($product['subtotal'] - ($product['subtotal']*100/($product['tax_rate2']+100)),2);
                    }
                    $product['subtotal'] = $product['subtotal'] - $product['tax'] - $product['tax2'];
                }
            }
        }

        // Get the total from the tax and subtotal
        $product['total'] = round($product['tax'] + $product['tax2'] + $product['subtotal'],2);
        return $product;
    }

    /**
    * Get products array
    * @param string $type Product type string
    * @param bool $get_hidden Include hidden products
    * @return array Products array
    */
    function getProductsArray($type = null, $get_hidden = false, $inactive = true) {
        if($product_groups = $this->db->GetAssoc("SELECT id, id, name FROM ".T_PRODUCTS_GROUPS.($get_hidden ? '' : ' WHERE hidden=0')." ORDER BY ordering")) {
            if(!is_null($type)) {
                $where_array[] = "type='".$type."'";
            }
            if(!$inactive) {
                $where_array[] = 'active=1';
            }
            if(!$get_hidden) {
                $where_array[] = 'hidden=0';
            }
            $where_array[] = 'group_id IN ('.implode(',',array_keys($product_groups)).')';
            $where = '';
            if(count($where_array)) {
                $where = ' WHERE '.implode(' AND ',$where_array);
            }
            if($products = $this->db->GetAssoc("SELECT id, id AS product_id, name, group_id, description FROM  ".T_PRODUCTS." p $where ORDER BY p.ordering")) {
                if($product_pricing = $this->db->GetAll("SELECT * FROM ".T_PRODUCTS_PRICING." WHERE product_id IN (".implode(',',array_keys($products)).") ORDER BY ordering")) {
                    foreach($product_pricing as $price) {
                        $products[$price['product_id']]['pricing'][] = $price;
                    }

                    foreach($products as $key=>$product) {
                        if(count($product['pricing']) > 0) {
                            $product_groups[$product['group_id']]['products'][] = $product;
                        }
                    }

                    foreach($product_groups as $key=>$group) {
                        if(count($group['products']) < 1) {
                            unset($product_groups[$key]);
                        }
                    }
                    return $product_groups;
                }
            }
        }
        return array();
    }
}
?>