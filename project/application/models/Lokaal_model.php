<?php
class Lokaal_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getLokaal(){
        $this->db->order_by('nummer','asc');
        $query = $this->db->get('Lokaal');
        return $query->result();
    }
}