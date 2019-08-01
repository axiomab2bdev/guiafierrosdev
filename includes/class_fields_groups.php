<?php
/**
* Field Groups Class
*/
class Fields_Groups extends TableGateway {
    /**
    * Registry
    * @var object Registry
    */
    var $PMDR;

    /**
    * Database
    * @var object Database
    */
    var $db;

    /**
    * Field Groups Constructor
    * @param object $PMDR Registry
    * @return void
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $PMDR->get('DB');
        $this->table = T_FIELDS_GROUPS;
    }

    /**
    * Delete field group
    * @param int $id Field group ID
    * @return void
    */
    function delete($id) {
        $fields = $this->db->GetAll("SELECT id FROM ".T_FIELDS." WHERE group_id=?",array($id));
        foreach($fields as $field) {
            $this->PMDR->get('Fields')->delete($field['id']);
        }
        parent::delete($id);
    }

    /**
    * Get field groups and included fields
    * @param string $type
    * @return array Groups
    */
    function getFieldGroups($type, $display = true) {
        $groups = array();
        if($groups = $this->db->GetAssoc("SELECT id AS array_id, id, title FROM ".T_FIELDS_GROUPS." WHERE type=? ORDER BY ordering ASC",array($type))) {
            $fields = $this->db->GetAll("SELECT id, group_id, name, admin_only, hidden, type FROM ".T_FIELDS." f  WHERE f.group_id IN(".implode(',',array_keys($groups)).") ORDER BY ordering ASC");
            foreach($fields AS $field) {
                if($display AND $field['hidden']) {
                    continue;
                }
                $groups[$field['group_id']]['fields'][] = $field;
            }
            foreach($groups AS $key=>$group) {
                if(!isset($group['fields'])) {
                    unset($groups[$key]);
                }
            }
        }
        return $groups;
    }

    /**
    * Get groups and fields by category
    * @param string $type Field type
    * @param int $category_id Category ID
    * @param bool $display Parse the data for public display
    * @return array
    */
    function getFieldGroupsByCategory($type,$category,$display = true) {
        $groups = array();
        if($field_ids = $this->db->GetCol("SELECT field_id FROM ".T_CATEGORIES_FIELDS." WHERE category_id=? GROUP BY field_id",array($category))) {
            if($groups = $this->db->GetAssoc("SELECT id AS array_id, id, title FROM ".T_FIELDS_GROUPS." WHERE type=? ORDER BY ordering ASC",array($type))) {
                $fields = $this->db->GetAll("SELECT id, group_id, name, admin_only, hidden, type FROM ".T_FIELDS." f  WHERE f.group_id IN(".implode(',',array_keys($groups)).") AND f.id IN(".implode(',',$field_ids).") ORDER BY ordering ASC");
                foreach($fields AS $field) {
                    if($display AND $field['hidden']) {
                        continue;
                    }
                    $groups[$field['group_id']]['fields'][] = $field;
                }
                foreach($groups AS $key=>$group) {
                    if(!isset($group['fields'])) {
                        unset($groups[$key]);
                    }
                }
            }
        }
        return $groups;
    }

    function addToTemplate(&$template,$data,$group,$category = null,$exclude=array()) {
        if(is_null($category)) {
            $custom_fields_groups = $this->PMDR->get('Fields_Groups')->getFieldGroups($group);
        } else {
            $custom_fields_groups = $this->PMDR->get('Fields_Groups')->getFieldGroupsByCategory($group,$category);
        }
        $groups_template = $this->PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/fields_groups.tpl');
        foreach($custom_fields_groups as $group_id=>$custom_fields_group) {
            $custom_fields_groups[$group_id]['empty'] = true;
            foreach($custom_fields_group['fields'] AS $field_key=>$custom_field) {
                if((isset($data['custom_'.$custom_field['id'].'_allow']) AND !$data['custom_'.$custom_field['id'].'_allow']) OR $custom_field['hidden'] OR in_array('custom_'.$custom_field['id'],$exclude)) {
                    unset($custom_fields_group['fields'][$field_key]);
                } else {
                    // Send custom field name and custom field value to the template for individual use (i.e. $custom_1_name and $custom_1)
                    $template->set('custom_'.$custom_field['id'].'_name',$custom_field['name']);
                    $template_value = 'custom_'.$custom_field['id'];
                    if($custom_field['type'] == 'date') {
                        $template->set('custom_'.$custom_field['id'],$this->PMDR->get('Dates_Local')->formatDate($data['custom_'.$custom_field['id']]));
                        $groups_template->set('custom_'.$custom_field['id'],$this->PMDR->get('Dates_Local')->formatDate($data['custom_'.$custom_field['id']]));
                    } elseif($custom_field['type'] == 'hours') {
                        if($hours = unserialize($data['custom_'.$custom_field['id']])) {
                            $hours_template = $this->PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/hours.tpl');
                            $data['custom_'.$custom_field['id']] = array();
                            $days = $this->PMDR->get('Dates')->getWeekDays();
                            $open = false;
                            foreach($hours AS $hour) {
                                $hour = explode(' ',$hour);
                                if(!$open AND $hour[0] == strftime('%w',$this->PMDR->get('Dates_Local')->timestampNow())) {
                                    $current_time = strftime('%R',$this->PMDR->get('Dates_Local')->timestampNow());
                                    if(floatval($hour[1]) < $current_time AND floatval($hour[2]) > $current_time) {
                                        $open = true;
                                    }
                                    unset($current_time);
                                }
                                $data['custom_'.$custom_field['id']][] = array('day'=>$days[$hour[0]],'start'=>$this->PMDR->get('Dates')->formatTime(strtotime($hour[1])),'end'=>$this->PMDR->get('Dates')->formatTime(strtotime($hour[2])));
                            }
                            $hours_template->set('hours', $data['custom_'.$custom_field['id']]);
                            $hours_template->set('open', $open);
                            $template->set('custom_'.$custom_field['id'], $hours_template);
                            $groups_template->set('custom_'.$custom_field['id'], $hours_template);
                        }
                    } elseif($custom_field['type'] == 'rating') {
                        $rating_template = $this->PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/rating.tpl');
                        $rating_template->set('rating',$data['custom_'.$custom_field['id']]);
                        $template->set('custom_'.$custom_field['id'], $rating_template);
                        $groups_template->set('custom_'.$custom_field['id'], $rating_template);
                    } elseif($custom_field['type'] == 'htmleditor') {
                        $template->set('custom_'.$custom_field['id'],$this->PMDR->get('Cleaner')->clean_output_html($data['custom_'.$custom_field['id']]));
                        $groups_template->set('custom_'.$custom_field['id'],$this->PMDR->get('Cleaner')->clean_output_html($data['custom_'.$custom_field['id']]));
                    } elseif($custom_field['type'] == 'currency') {
                        $template->set('custom_'.$custom_field['id'],$this->PMDR->get('Cleaner')->clean_output(format_number_currency($data['custom_'.$custom_field['id']])));
                        $groups_template->set('custom_'.$custom_field['id'],$this->PMDR->get('Cleaner')->clean_output(format_number_currency($data['custom_'.$custom_field['id']])));
                    } else {
                        $template->set('custom_'.$custom_field['id'],$this->PMDR->get('Cleaner')->clean_output($data['custom_'.$custom_field['id']]));
                        $groups_template->set('custom_'.$custom_field['id'],nl2br($this->PMDR->get('Cleaner')->clean_output($data['custom_'.$custom_field['id']])));
                    }
                    // We set an empty flag so we can determine if the group is completely empty or not.
                    if(!empty($data['custom_'.$custom_field['id']])) {
                        $custom_fields_groups[$group_id]['empty'] = false;
                    }
                }
            }
            // If the group no longer has any fields in it, we remove it from the array
            if(count(array_filter($custom_fields_group['fields'])) == 0 OR $custom_fields_groups[$group_id]['empty']) {
                unset($custom_fields_groups[$group_id]);
            } else {
                // Send the custom field group title to the template for individual use (i.e. $custom_group_1_title)
                $template->set('custom_group_'.$group_id.'_title',$custom_fields_group['title']);
            }
        }
        $template->set('custom_fields_groups',$custom_fields_groups);
        $groups_template->set('custom_fields_groups',$custom_fields_groups);
        $template->set('custom_fields',$groups_template);
    }

    /**
    * Update Field Group
    * @param array $data Field group data
    * @param array $id Field group ID
    * @return void
    */
    function update($data, $id) {
        parent::update($data,$id);
    }
}
?>