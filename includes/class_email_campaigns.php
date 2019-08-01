<?php
class Email_Campaigns extends TableGateway {
    var $PMDR;
    var $db;

    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_EMAIL_CAMPAIGNS;
    }

    function insert($data) {
        if($data['attachment']['size'] > 0) {
            move_uploaded_file($data['attachment']['tmp_name'], TEMP_UPLOAD_PATH.basename($data['attachment']['name']));
            $data['attachment_mimetype'] = $data['attachment']['type'];
            $data['attachment'] = basename($data['attachment']['name']);
        } else {
            unset($data['attachment']);
        }
        parent::insert($data);
    }

    function update($data, $id) {
        if($data['attachment']['size'] > 0) {
            move_uploaded_file($data['attachment']['tmp_name'], TEMP_UPLOAD_PATH.basename($data['attachment']['name']));
            $data['attachment_mimetype'] = $data['attachment']['type'];
            $data['attachment'] = basename($data['attachment']['name']);
        } else {
            unset($data['attachment']);
        }
        parent::update($data,$id);
    }

    function delete($id) {
        $this->db->Execute("DELETE FROM ".T_EMAIL_QUEUE." WHERE campaign_id=?",array($id));
        parent::delete($id);
    }
}
?>