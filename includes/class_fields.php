<?php
/**
* Fields class
*/
class Fields extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;

    /**
    * Fields Constructor
    * @param object $PMDR Registry
    * @return void
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $PMDR->get('DB');
        $this->table = T_FIELDS;
    }

    /**
    * Insert field
    * @param array $data
    * @return void
    */
    function insert($data) {
        $id = parent::insert($data);
        if(isset($data['character_limit']) AND intval($data['character_limit']) > 0) {
            $type = $this->getDatabaseFieldType($data['type'], $data['character_limit']);
        } else {
            $type = $this->getDatabaseFieldType($data['type']);
        }
        switch($data['type']) {
            case 'text':
            case 'radio':
            case 'select':
            case 'hidden':
                $selected_sql = 'DEFAULT '.$this->PMDR->get('Cleaner')->clean_db($data['selected']);
                break;
            case 'number':
            case 'decimal':
            case 'rating':
                if(empty($data['selected'])) {
                    $data['selected'] = '0';
                }
                $selected_sql = 'DEFAULT '.$this->PMDR->get('Cleaner')->clean_db(intval($data['selected']));
                break;
        }
        if($data['group_type'] == 'listings') {
            $this->db->Execute("ALTER TABLE ".T_LISTINGS." ADD custom_$id $type NOT NULL ".$selected_sql);
        }
        if($data['group_type'] == 'users') {
            $this->db->Execute("ALTER TABLE ".T_USERS." ADD custom_$id $type NOT NULL ".$selected_sql);
        }
        if($data['group_type'] == 'classifieds') {
            $this->db->Execute("ALTER TABLE ".T_CLASSIFIEDS." ADD custom_$id $type NOT NULL ".$selected_sql);
        }
        if($data['group_type'] == 'reviews') {
            $this->db->Execute("ALTER TABLE ".T_REVIEWS." ADD custom_$id $type NOT NULL ".$selected_sql);
        }
        if($data['group_type'] == 'categories') {
            $this->db->Execute("ALTER TABLE ".T_CATEGORIES." ADD custom_$id $type NOT NULL ".$selected_sql);
        }
        if($data['group_type'] == 'locations') {
            $this->db->Execute("ALTER TABLE ".T_LOCATIONS." ADD custom_$id $type NOT NULL ".$selected_sql);
        }
        if(in_array($data['group_type'],array('listings','send_message','send_message_friend','reviews'))) {
            $this->db->Execute("ALTER TABLE ".T_LISTINGS." ADD custom_".$id."_allow TINYINT(1) NOT NULL default '0'");
            $this->db->Execute("ALTER TABLE ".T_MEMBERSHIPS." ADD custom_".$id."_allow TINYINT(1) NOT NULL default '0'");

            if($category_count = count($data['categories'])) {
                if($category_count == ($this->db->GetOne("SELECT COUNT(*) FROM ".T_CATEGORIES) - 1)) {
                    $this->db->Execute("INSERT INTO ".T_CATEGORIES_FIELDS." (category_id,field_id) SELECT id, ? FROM ".T_CATEGORIES,array($id));
                } else {
                    foreach($data['categories'] AS $category) {
                        $this->db->Execute("INSERT INTO ".T_CATEGORIES_FIELDS." (category_id,field_id) VALUES(?,?)",array($category,$id));
                    }
                }
            }
            if(count($data['products'])) {
                $this->db->Execute("UPDATE ".T_MEMBERSHIPS." m, ".T_PRODUCTS." p SET custom_".$id."_allow=1 WHERE m.id=p.type_id AND p.type='listing_membership' AND p.id IN (".implode(',',$data['products']).")");
                if($data['products_update']) {
                    foreach($data['products'] AS $product_id) {
                        $this->PMDR->get('Products')->syncProduct($product_id);
                    }
                }
            }
        }
        $this->PMDR->get('Cache')->deletePrefix('fields_');
    }

    /**
    * Update field
    * @param array $data
    * @param int $id
    * @return void
    */
    function update($data, $id) {
        $field = $this->db->GetRow("SELECT * FROM ".T_FIELDS." WHERE id=?",array($id));
        parent::update($data,$id);
        if(isset($data['character_limit']) AND intval($data['character_limit']) > 0) {
            $type = $this->getDatabaseFieldType($data['type'], $data['character_limit']);
        } else {
            $type = $this->getDatabaseFieldType($data['type']);
        }
        switch($data['type']) {
            case 'text':
            case 'radio':
            case 'select':
            case 'hidden':
                $selected_sql = 'DEFAULT '.$this->PMDR->get('Cleaner')->clean_db($data['selected']);
                break;
            case 'number':
            case 'decimal':
            case 'rating':
                if(empty($data['selected'])) {
                    $data['selected'] = '0';
                }
                $selected_sql = 'DEFAULT '.$this->PMDR->get('Cleaner')->clean_db(intval($data['selected']));
                break;
        }
        if($data['group_type'] == 'listings') {
            $this->db->Execute("ALTER TABLE ".T_LISTINGS." CHANGE `custom_".$id."` `custom_".$id."` $type NOT NULL $selected_sql");
            if($data['selected'] != $field['selected']) {
                $this->db->Execute("UPDATE ".T_LISTINGS." SET custom_".$id."=? WHERE custom_".$id."=?",array($data['selected'],$field['selected']));
            }
        }
        if($data['group_type'] == 'users') {
            $this->db->Execute("ALTER TABLE ".T_USERS." CHANGE `custom_".$id."` `custom_".$id."` $type NOT NULL $selected_sql");
            if($data['selected'] != $field['selected']) {
                $this->db->Execute("UPDATE ".T_USERS." SET custom_".$id."=? WHERE custom_".$id."=?",array($data['selected'],$field['selected']));
            }
        }
        if($data['group_type'] == 'classifieds') {
            $this->db->Execute("ALTER TABLE ".T_CLASSIFIEDS." CHANGE `custom_".$id."` `custom_".$id."` $type NOT NULL $selected_sql");
            if($data['selected'] != $field['selected']) {
                $this->db->Execute("UPDATE ".T_CLASSIFIEDS." SET custom_".$id."=? WHERE custom_".$id."=?",array($data['selected'],$field['selected']));
            }
        }
        if($data['group_type'] == 'reviews') {
            $this->db->Execute("ALTER TABLE ".T_REVIEWS." CHANGE `custom_".$id."` `custom_".$id."` $type NOT NULL $selected_sql");
            if($data['selected'] != $field['selected']) {
                $this->db->Execute("UPDATE ".T_REVIEWS." SET custom_".$id."=? WHERE custom_".$id."=?",array($data['selected'],$field['selected']));
            }
        }
        if($data['group_type'] == 'categories') {
            $this->db->Execute("ALTER TABLE ".T_CATEGORIES." CHANGE `custom_".$id."` `custom_".$id."` $type NOT NULL $selected_sql");
            if($data['selected'] != $field['selected']) {
                $this->db->Execute("UPDATE ".T_CATEGORIES." SET custom_".$id."=? WHERE custom_".$id."=?",array($data['selected'],$field['selected']));
            }
        }
        if($data['group_type'] == 'locations') {
            $this->db->Execute("ALTER TABLE ".T_LOCATIONS." CHANGE `custom_".$id."` `custom_".$id."` $type NOT NULL $selected_sql");
            if($data['selected'] != $field['selected']) {
                $this->db->Execute("UPDATE ".T_LOCATIONS." SET custom_".$id."=? WHERE custom_".$id."=?",array($data['selected'],$field['selected']));
            }
        }
        if(in_array($data['group_type'],array('listings','send_message','send_message_friend','reviews'))) {
            $this->db->Execute("DELETE FROM ".T_CATEGORIES_FIELDS." WHERE field_id=?",array($id));
            if($category_count = count($data['categories'])) {
                if($category_count == ($this->db->GetOne("SELECT COUNT(*) FROM ".T_CATEGORIES) - 1)) {
                    $this->db->Execute("INSERT IGNORE INTO ".T_CATEGORIES_FIELDS." (category_id,field_id) SELECT id, ? FROM ".T_CATEGORIES,array($id));
                } else {
                    foreach($data['categories'] AS $category) {
                        $this->db->Execute("INSERT INTO ".T_CATEGORIES_FIELDS." (category_id,field_id) VALUES(?,?)",array($category,$id));
                    }
                }
            }
            $this->db->Execute("UPDATE ".T_MEMBERSHIPS." SET custom_".$id."_allow=0");
            if(count($data['products'])) {
                $this->db->Execute("UPDATE ".T_MEMBERSHIPS." m, ".T_PRODUCTS." p SET custom_".$id."_allow=1 WHERE m.id=p.type_id AND p.type='listing_membership' AND p.id IN (".implode(',',$data['products']).")");
            }
            if($data['products_update']) {
                $this->PMDR->get('Products')->syncProducts();
            }
        }
        $this->PMDR->get('Cache')->deletePrefix('fields_');
    }

    /**
    * Delete field
    * @param int $id
    * @return void
    */
    function delete($id) {
        $type = $this->db->GetOne("SELECT g.type FROM ".T_FIELDS." f, ".T_FIELDS_GROUPS." g WHERE f.group_id=g.id AND f.id=?",array($id));
        $this->db->Execute("DELETE FROM ".T_FIELDS." WHERE id=?",array($id));
        if($type == 'listings') {
            $this->db->Execute("ALTER IGNORE TABLE ".T_LISTINGS." DROP `custom_".$id."`");
            $this->db->Execute("UPDATE ".T_SETTINGS." SET value=0 WHERE (varname='skype_field' OR varname='reciprocal_field') AND value='custom_".$id."'");
        }
        if($type == 'users') {
            $this->db->Execute("ALTER IGNORE TABLE ".T_USERS." DROP `custom_".$id."`");
        }
        if($type == 'classifieds') {
            $this->db->Execute("ALTER IGNORE TABLE ".T_CLASSIFIEDS." DROP `custom_".$id."`");
        }
        if($type == 'reviews') {
            $this->db->Execute("ALTER IGNORE TABLE ".T_REVIEWS." DROP `custom_".$id."`");
        }
        if($type == 'categories') {
            $this->db->Execute("ALTER IGNORE TABLE ".T_CATEGORIES." DROP `custom_".$id."`");
        }
        if($type == 'locations') {
            $this->db->Execute("ALTER IGNORE TABLE ".T_LOCATIONS." DROP `custom_".$id."`");
        }
        if(in_array($type,array('listings','send_message','send_message_friend','reviews'))) {
            $this->db->Execute("ALTER IGNORE TABLE ".T_LISTINGS." DROP `custom_".$id."_allow`");
            $this->db->Execute("ALTER IGNORE TABLE ".T_MEMBERSHIPS." DROP `custom_".$id."_allow`");
            $this->db->Execute("DELETE FROM ".T_CATEGORIES_FIELDS." WHERE field_id=?",array($id));
        }
        $this->PMDR->get('Cache')->deletePrefix('fields_');
    }

    /**
    * Get fields
    * @param string $type
    * @return array
    */
    function getFields($type) {
        if(!is_array($type)) $type = array($type);
        return $this->db->GetAll("SELECT f.id, group_id, name, description, f.type, options, selected, f.ordering AS field_ordering, fg.ordering AS field_group_ordering, required, admin_only, editable, hidden, character_limit, regex, regex_error, fg.title AS group_title FROM ".T_FIELDS." f INNER JOIN ".T_FIELDS_GROUPS." fg ON f.group_id=fg.id WHERE fg.type IN ('".implode("','",$type)."') ORDER BY field_group_ordering ASC, field_ordering ASC");
    }

    /**
    * Get a field count
    * @param mixed $type
    * @return int Count
    */
    function getFieldsCount($type) {
        if(!is_array($type)) $type = array($type);
        return $this->db->GetOne("SELECT COUNT(*) FROM ".T_FIELDS." f INNER JOIN ".T_FIELDS_GROUPS." fg ON f.group_id=fg.id WHERE fg.type IN ('".implode("','",$type)."')");
    }

    /**
    * Get fields by category
    * @param string $type
    * @param int $category
    * @return array
    */
    function getFieldsByCategory($type, $category) {
        $fields = array();
        if($field_ids = $this->db->GetCol("SELECT field_id FROM ".T_CATEGORIES_FIELDS." WHERE category_id=? GROUP BY field_id",array($category))) {
            $fields = $this->db->GetAll("SELECT f.id, group_id, name, description, f.type, options, selected, f.ordering AS field_ordering, fg.ordering AS field_group_ordering, required, admin_only, editable, hidden, character_limit, regex, regex_error FROM ".T_FIELDS." f INNER JOIN ".T_FIELDS_GROUPS." fg ON f.group_id=fg.id WHERE fg.type=? AND f.id IN(".implode(',',$field_ids).") ORDER BY field_group_ordering ASC, field_ordering ASC",array($type));
        }
        return $fields;
    }

    /**
    * Get field labels
    * @param string $type
    * @return array
    */
    function getFieldLabels($type) {
        if(!is_array($type)) $type = array($type);
        return $this->db->GetAssoc("SELECT CONCAT('custom_',f.id) AS id, f.name FROM ".T_FIELDS." f INNER JOIN ".T_FIELDS_GROUPS." fg ON f.group_id=fg.id WHERE fg.type IN('".implode("','",$type)."')");
    }

    /**
    * Add field to form class
    * @param object reference $form Form Object
    * @return void
    */
    function addToForm(&$form, $type, $parameters = array()) {
        if(isset($parameters['category'])) {
            $fields = $this->getFieldsByCategory($type,$parameters['category']);
        } else {
            if(!$fields = $this->PMDR->get('Cache')->get('fields_'.$type, 0, 'fields_')) {
                $fields = $this->getFields($type);
                $this->PMDR->get('Cache')->write('fields_'.$type,$fields,'fields_');
            }
        }
        foreach($fields as $key=>$f) {
            // Check if the field is in the filter array to see if it is allowed.
            if(isset($parameters['filter']) AND count($parameters['filter'])) {
                if(!$parameters['filter']['custom_'.$f['id'].'_allow']) {
                    unset($fields[$key]);
                    continue;
                }
            }
            // Check if the field is administrator only, and hide if it is.
            if(isset($parameters['admin_only']) AND $parameters['admin_only'] == false AND $f['admin_only']) {
                unset($fields[$key]);
                continue;
            }
            // If not an HTML editor we explode options by each line
            $options = array();
            if($f['type'] != 'htmleditor') {
                $options = explode("\n",preg_replace("/(\r\n)+|(\n|\r)+/", "\n", $f['options']));
                $options = array_combine($options,$options);
            }
            // Check if the field should be edit only, and if so make it a text only field.
            if(isset($parameters['editable']) AND $parameters['editable'] == true AND !$f['editable']) {
                $f['type'] = 'custom';
            }
            // Set the default field options
            $field_options = array(
                'label'=>$f['name'],
                'value'=>$f['selected'],
                'options'=>$options,
                'implode'=>0
            );

            // Implode the selected value if needed.
            if($f['type'] == 'select_multiple' OR ($f['type'] == 'checkbox' AND count($options) > 0)) {
                $field_options['implode'] = 1;
            }

            // Set the fieldset
            if(isset($parameters['fieldset'])) {
                $field_options['fieldset'] = $parameters['fieldset'];
            }
            // Set the character limit for text, textarea, and htmleditor fields
            if(isset($f['character_limit']) AND $f['character_limit'] > 0 AND ($f['type'] == 'text' OR $f['type'] == 'textarea' OR $f['type'] == 'htmleditor')) {
                $field_options['counter'] = $f['character_limit'];
            }
            // If the field is a number, add the numeric validator and change the type to "text" so the form handler displays a text field.
            if($f['type'] == 'number' OR $f['type'] == 'decimal') {
                $form->addValidator('custom_'.$f['id'],new Validate_Numeric());
                $f['type'] = 'text';
            }
            if($f['type'] == 'currency') {
                $form->addValidator('custom_'.$f['id'],new Validate_Currency());
            }
            // If the field is a number, add the numeric validator and change the type to "stars" so the form handler displays a rating field.
            if($f['type'] == 'rating') {
                $form->addValidator('custom_'.$f['id'],new Validate_Numeric());
                $f['type'] = 'stars';
            }
            // Add the field to the form
            $form->addField('custom_'.$f['id'],$f['type'],$field_options);
            // If required, add the validator
            if($f['required']) {
                $form->addValidator('custom_'.$f['id'],new Validate_NonEmpty($f['type'] != 'checkbox'));
            }
            // Check for banned words in text type fields
            if($f['type'] == 'text' OR $f['type'] == 'textarea' OR $f['type'] == 'htmleditor') {
                $form->addValidator('custom_'.$f['id'],new Validate_Banned_Words());
            }
            // If custom regex validation
            if(!empty($f['regex'])) {
                $form->addValidator('custom_'.$f['id'],new Validate_Regex($f['regex'],$f['regex_error']));
            }
            // If a description exists, add the field note
            if($f['description'] != '') {
                $form->addFieldNote('custom_'.$f['id'],$f['description']);
            }
        }
        return $fields;
    }

    /**
    * Get the field type data used for the database
    * @param string $type
    * @param int $length
    */
    function getDatabaseFieldType($type, $length = null) {
        switch($type) {
            case 'text':
            case 'radio':
            case 'select':
            case 'hidden':
                $db_type = 'varchar';
                if(is_null($length)) {
                    $length = '255';
                }
                if(intval($length) > 65535) {
                    $length = '65535';
                }
                $db_type .= '('.$length.')';
                break;
            case 'textarea':
            case 'htmleditor':
            case 'checkbox':
            case 'select_multiple':
            case 'hours':
                $db_type = 'text';
                break;
            case 'date':
                $db_type = 'date';
                break;
            case 'number':
                if(is_null($length)) {
                    $length = 10;
                }
                if($length < 3) {
                    $db_type = 'tinyint';
                } elseif($length < 6) {
                    $db_type = 'smallint';
                } elseif($length < 9) {
                    $db_type = 'mediumint';
                } elseif($length < 11) {
                    $db_type = 'int';
                } else {
                    $db_type = 'bigint';
                }
                $db_type .= '('.$length.') unsigned';
                break;
            case 'decimal':
                if(is_null($length)) {
                    $length = 10;
                }
                $db_type = 'decimal';
                if($length > 65) {
                    $length = 65;
                } elseif($length < 1) {
                    $length = 1;
                }
                $db_type .= '('.$length.',2) unsigned';
                break;
            case 'color':
                $db_type = 'varchar(7)';
                break;
            case 'rating':
                $db_type = 'tinyint(1)';
                break;
            case 'currency':
                $db_type = 'decimal(10,4)';
                break;
        }
        if(!isset($db_type)) {
            return false;
        } else {
            return $db_type;
        }
    }
}
?>