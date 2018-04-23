<<?php

class Sessie_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function wijzig($sessie) {
        $this->db->insert('Sessie', $sessie);
        return $this->db->insert_id();
    }
}
    ?>