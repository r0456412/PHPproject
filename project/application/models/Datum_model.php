<?php

class Datum_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function get(){
        $this->db->order_by('id','asc');
        $query = $this->db->get('Datum');
        return $query->result();
    }

    function wijzig($datum) {
        $this->db->update('Datum', $datum);
        return $this->db->insert_id();
    }
}