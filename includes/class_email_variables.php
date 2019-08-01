<?php
class Email_Variables {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database Database object
    */
    var $db;

    /**
    * Email Variables constructor
    * @param object $PMDR Registry
    */
    function Email_Variables($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
    }

    function getGeneralKeys() {
        $variables = array(
            'directory_title',
            'directory_url',
            'directory_members_url',
            'directory_admin_url',
            'signature',
            'ip_address'
        );
        return $variables;
    }

    function getUserKeys() {
        $variables = array(
            'user_id',
            'user_login',
            'user_email',
            'user_first_name',
            'user_last_name',
            'user_organization',
            'user_address1',
            'user_address2',
            'user_zip',
            'user_city',
            'user_state',
            'user_country',
            'user_phone',
            'user_fax',
            'user_admin_url',
            'user_unsubscribe_url'
        );
        // Add user custom variables to user array
        $variables = array_merge($variables,$this->db->GetCol("SELECT CONCAT('user_custom_',f.id) AS id FROM ".T_FIELDS." f, ".T_FIELDS_GROUPS." fg WHERE f.group_id=fg.id AND fg.type='users'"));
        return $variables;
    }

    function getListingKeys() {
        $variables = array(
            'listing_id',
            'listing_status',
            'listing_priority',
            'listing_title',
            'listing_description_short',
            'listing_www',
            'listing_website_clicks',
            'listing_pagerank',
            'listing_impressions',
            'listing_search_impressions',
            'listing_emails',
            'listing_banner_impressions',
            'listing_banner_clicks',
            'listing_rating',
            'listing_mail',
            'listing_url',
            'listing_admin_url',
            'listing_logo_url'
        );
        // Add listing custom fields variables
        $variables = array_merge($variables,$this->db->GetCol("SELECT CONCAT('listing_custom_',f.id) AS id FROM ".T_FIELDS." f, ".T_FIELDS_GROUPS." fg WHERE f.group_id=fg.id AND fg.type='listings'"));
        return $variables;
    }

    function getInvoiceKeys() {
        $variables = array(
            'invoice_id',
            'invoice_description',
            'invoice_date',
            'invoice_date_due',
            'invoice_date_paid',
            'invoice_subtotal',
            'invoice_tax',
            'invoice_tax_rate',
            'invoice_tax2',
            'invoice_tax_rate2',
            'invoice_total',
            'invoice_status',
            'invoice_payment_method',
            'invoice_discount_code',
            'invoice_discount_code_value',
            'invoice_discount_code_type',
            'invoice_discount_code_discount_type',
            'invoice_last_payment_amount',
            'invoice_last_transaction_id',
            'invoice_amount_paid',
            'invoice_balance',
            'invoice_url'
        );
        return $variables;
    }

    function getOrderKeys() {
        $variables = array(
            'order_id',
            'order_number',
            'order_type',
            'order_type_id',
            'order_pricing_id',
            'order_date',
            'order_status',
            'order_amount',
            'order_amount_recurring',
            'order_period',
            'order_period_count',
            'order_next_due_date',
            'order_next_invoice_date',
            'order_taxed',
            'order_subscription_id',
            'order_ip_address',
            'order_payment_method',
            'order_product_name',
            'order_product_description',
            'order_product_title',
            'order_discount_code',
            'order_discount_code_value',
            'order_discount_code_type',
            'order_discount_code_discount_type'
        );
        return $variables;
    }

    function getReviewKeys() {
        $variables = array(
            'review_id',
            'review_rating',
            'review_title',
            'review_review',
            'review_comment_count',
            'review_helpful_count',
            'review_helpful_total',
            'review_date',
            'review_status',
            'review_name'
        );
        // Add listing custom fields variables
        $variables = array_merge($variables,$this->db->GetCol("SELECT CONCAT('listing_custom_',f.id) AS id FROM ".T_FIELDS." f, ".T_FIELDS_GROUPS." fg WHERE f.group_id=fg.id AND fg.type='reviews'"));
        return $variables;
    }

    function getGeneralVariables() {
        $variables = array(
            'directory_title'=>$this->PMDR->getConfig('title'),
            'directory_url'=>BASE_URL,
            'directory_admin_url'=>BASE_URL_ADMIN,
            'directory_members_url'=>BASE_URL.MEMBERS_FOLDER,
            'ip_address'=>get_ip_address()
        );
        if(!$this->PMDR->getLanguage('signature')) {
            $this->PMDR->loadLanguage('email_templates');
        }
        $variables['signature'] = Strings::br2nl($this->PMDR->getLanguage('signature'));
        return $variables;
    }

    function getUserVariables($user_id) {
        $prefix = 'user';
        $variables = array();
        $user_fields = array('*');
        $user_fields = array_merge($user_fields,$this->db->GetCol("SELECT CONCAT('custom_',f.id) AS id FROM ".T_FIELDS." f, ".T_FIELDS_GROUPS." fg WHERE f.group_id=fg.id AND fg.type='users'"));
        $new_variables = $this->db->GetRow("SELECT ".implode(',',$user_fields)." FROM ".T_USERS." WHERE id=?",array($user_id));
        if(!isset($new_variables['user_url'])) {
            if(in_array(5,$this->db->GetCol("SELECT group_id FROM ".T_USERS_GROUPS_LOOKUP." WHERE user_id=?",array($user_id)))) {
                $new_variables['user_url'] = BASE_URL.MEMBERS_FOLDER.'user_confirm_email.php?c='.md5($new_variables['user_email'].LICENSE).'-'.$user_id;
            } else {
                $new_variables['user_url'] = BASE_URL.MEMBERS_FOLDER;
            }
        }
        $new_variables['user_admin_url'] = BASE_URL_ADMIN.'/admin_users_summary.php?id='.$user_id;
        $new_variables['unsubscribe_url'] = BASE_URL.MEMBERS_FOLDER.'index.php?action=unsubscribe&id='.$user_id.'&token='.hash('sha256',$user_id.$new_variables['user_email'].SECURITY_KEY);
        foreach($new_variables AS $key=>$new_variable) {
            $variables[((substr($key,0,strlen($prefix)+1) == $prefix.'_') ? '' : $prefix.'_').$key] = $new_variable;
        }
        return $variables;
    }

    function getListingVariables($listing_id) {
        $prefix = 'listing';
        $variables = array();
        $listing_fields = array(
            'id', 'user_id', 'friendly_url', 'status', 'priority', 'title', 'description_short', 'www', 'website_clicks', 'pagerank', 'impressions', 'search_impressions', 'banner_impressions', 'banner_clicks', 'emails', 'rating', 'mail'
        );
        $listing_fields = array_merge($listing_fields,$this->db->GetCol("SELECT CONCAT('custom_',f.id) AS id FROM ".T_FIELDS." f, ".T_FIELDS_GROUPS." fg WHERE f.group_id=fg.id AND fg.type='listings'"));
        $new_variables = $this->db->GetRow("SELECT ".implode(',',$listing_fields)." FROM ".T_LISTINGS." WHERE id=?",array($listing_id));
        $new_variables['url'] = $this->PMDR->get('Listings')->getURL($new_variables['id'],$new_variables['friendly_url']);
        $new_variables['admin_url'] = BASE_URL_ADMIN.'/admin_listings.php?action=edit&id='.$new_variables['id'];
        $new_variables['logo_url'] = get_file_url(LOGO_PATH.$new_variables['id'].'.*');
        $new_variables['status'] = $this->PMDR->getLanguage($new_variables['status']);

        // get payment terms, etc?
        foreach($new_variables AS $key=>$new_variable) {
            $variables[((substr($key,0,strlen($prefix)+1) == $prefix.'_') ? '' : $prefix.'_').$key] = $new_variable;
        }
        $order_id = $this->db->GetOne("SELECT id FROM ".T_ORDERS." WHERE type='listing_membership' AND type_id=?",array($listing_id));
        $other_variables = $this->getOrderVariables($order_id);
        return array_merge($variables,$other_variables);
    }

    function getOrderVariables($order_id) {
        $prefix = 'order';
        $variables = array();
        $new_variables = $this->db->GetRow("SELECT * FROM ".T_ORDERS." WHERE id=?",array($order_id));
        $new_variables['order_payment_method'] = $this->db->GetOne("SELECT display_name FROM ".T_GATEWAYS." WHERE id=?",array($new_variables['gateway_id']));
        $new_variables['status'] = $this->PMDR->getLanguage($new_variables['status']);
        $new_variables['order_number'] = $new_variables['order_id'];
        unset($new_variables['order_id']);

        $new_variables['date_time'] = $this->PMDR->get('Dates_Local')->formatDateTime($new_variables['date']);
        $new_variables['date'] = $this->PMDR->get('Dates_Local')->formatDate($new_variables['date']);

        $product = $this->db->GetRow("SELECT p.name, p.description, p.taxed, pp.activate FROM ".T_PRODUCTS." p INNER JOIN ".T_PRODUCTS_PRICING." pp ON p.id=pp.product_id WHERE pp.id=?",array($new_variables['pricing_id']));
        $new_variables['order_product_name'] = $product['name'];
        $new_variables['order_product_description'] = $product['description'];

        if(!$new_variables['order_amount'] = $this->db->GetOne("SELECT total FROM ".T_INVOICES." WHERE id=?",array($new_variables['invoice_id']))) {
            $new_variables['order_amount'] = 0.00;
        }
        $new_variables['order_amount'] = format_number_currency($new_variables['order_amount']);
        $new_variables['amount_recurring'] = format_number_currency($new_variables['amount_recurring']);

        switch($new_variables['type']) {
            case 'listing_membership':
                $new_variables['order_product_title'] = $this->db->GetOne("SELECT title FROM ".T_LISTINGS." WHERE id=?",array($new_variables['type_id']));
                break;
        }
        foreach($new_variables AS $key=>$new_variable) {
            $variables[((substr($key,0,strlen($prefix)+1) == $prefix.'_') ? '' : $prefix.'_').$key] = $new_variable;
        }

        $user_variables = $this->getUserVariables($variables['order_user_id']);
        return array_merge($variables,$user_variables);
    }

    function getInvoiceVariables($invoice_id) {
        $prefix = 'invoice';
        $variables = array();
        $new_variables = $this->db->GetRow("SELECT * FROM ".T_INVOICES." WHERE id=?",array($invoice_id));
        // Do not format this variable yet, as we use it below.
        $new_variables['invoice_amount_paid'] = $this->db->GetOne("SELECT SUM(amount) FROM ".T_TRANSACTIONS." WHERE invoice_id=? GROUP BY invoice_id",array($invoice_id));
        $new_variables['invoice_balance'] = format_number_currency($new_variables['total'] - $new_variables['invoice_amount_paid']);
        $new_variables['invoice_amount_paid'] = format_number_currency($new_variables['invoice_amount_paid']);
        $new_variables['subtotal'] = format_number_currency($new_variables['subtotal']);
        $new_variables['tax'] = format_number_currency($new_variables['tax']);
        $new_variables['tax2'] = format_number_currency($new_variables['tax2']);
        $new_variables['total'] = format_number_currency($new_variables['total']);
        $new_variables['discount_code_value'] = format_number_currency($new_variables['discount_code_value']);
        $new_variables['invoice_url'] = BASE_URL.MEMBERS_FOLDER.'user_invoices.php?id='.$invoice_id;
        $new_variables['invoice_admin_url'] = BASE_URL_ADMIN.'admin_invoices.php?id='.$invoice_id;

        $last_transaction = $this->db->GetRow("SELECT amount, transaction_id FROM ".T_TRANSACTIONS." WHERE invoice_id=? ORDER BY date DESC LIMIT 1",array($invoice_id));

        $new_variables['invoice_payment_method'] = $this->db->GetOne("SELECT display_name FROM ".T_GATEWAYS." WHERE id=?",array($new_variables['gateway_id']));
        $new_variables['invoice_last_payment_amount'] = format_number_currency($last_transaction['amount']);
        $new_variables['invoice_last_transaction_id'] = $last_transaction['transaction_id'];

        $new_variables['date'] = $this->PMDR->get('Dates_Local')->formatDate($new_variables['date']);
        $new_variables['date_due'] = $this->PMDR->get('Dates_Local')->formatDate($new_variables['date_due']);
        $new_variables['date_paid'] = $this->PMDR->get('Dates_Local')->formatDate($new_variables['date_paid']);

        unset($payment_total);
        unset($last_transaction);
        // payment link, transactions, previous balance, total due for all invoices
        foreach($new_variables AS $key=>$new_variable) {
            $variables[((substr($key,0,strlen($prefix)+1) == $prefix.'_') ? '' : $prefix.'_').$key] = $new_variable;
        }
        $user_variables = $this->getUserVariables($variables['invoice_user_id']);
        return array_merge($variables,$user_variables);
    }

    function getReviewVariables($review_id) {
        $prefix = 'review';
        $variables = array();
        $review_fields = array(
            'id', 'listing_id', 'rating_id', 'title', 'review', 'comment_count', 'helpful_count', 'helpful_total', 'date', 'status', 'name'
        );
        $review_fields = array_merge($review_fields,$this->db->GetCol("SELECT CONCAT('custom_',f.id) AS id FROM ".T_FIELDS." f, ".T_FIELDS_GROUPS." fg WHERE f.group_id=fg.id AND fg.type='reviews'"));
        $new_variables = $this->db->GetRow("SELECT ".implode(',',$review_fields)." FROM ".T_REVIEWS." WHERE id=?",array($review_id));
        $new_variables['date'] = $this->PMDR->get('Dates_Local')->formatDateTime($new_variables['date']);
        $new_variables['status'] = $this->PMDR->getLanguage($new_variables['status']);
        if(!is_null($new_variables['rating_id'])) {
            $new_variables['rating'] = $this->db->GetOne("SELECT rating FROM ".T_RATINGS." WHERE id=?",array($new_variables['rating_id']));
        } else {
            $new_variables['rating'] = '';
        }
        foreach($new_variables AS $key=>$new_variable) {
            $variables[((substr($key,0,strlen($prefix)+1) == $prefix.'_') ? '' : $prefix.'_').$key] = $new_variable;
        }
        $listing_variables = $this->getListingVariables($variables['review_listing_id']);
        unset($variables['review_listing_id']);
        return array_merge($variables,$listing_variables);
    }

    function replace($content, $variables, $html = false) {
        foreach($variables as $variable_key=>$variable) {
            if($html) {
                $variable = nl2br($variable);
            }
            $content = str_replace("*$variable_key*",$variable,$content);
        }
        return $content;
    }
}
?>