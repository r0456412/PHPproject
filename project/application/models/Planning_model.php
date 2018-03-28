<?php

class Planning_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        // geef gebruiker-object met opgegeven $id
        $this->db->where('id', $id);
        $query = $this->db->get('voortel');
        return $query->row();
    }



}

?>