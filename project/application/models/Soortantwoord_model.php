<?php

class Soortantwoord_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('Soortantwoord');
        return $query->row();
    }
    
    function getAllBySoortantwoord(){
        $this->db->order_by('soort', 'asc');
        $query = $this->db->get('Soortantwoord');
        return $query;
    }
}

?>