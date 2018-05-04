<?php

Class Beschikbaarheid_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function wijzig($surveillant) {
        $this->db->insert('Beschikbaarheid', $surveillant);
        return $this->db->insert_id();
    }
}
