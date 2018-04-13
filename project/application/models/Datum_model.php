<?php

class Datum_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function getDatum(){
        $this->db->order_by('datum','asc');
        $query = $this->db->get('Datum');
        return $query->result();
    }


}