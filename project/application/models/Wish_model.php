<?php

class Wish_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('wish');
        return $query->row();
    }
    
    function voegToe($wish, $soortwish) {
        // voeg nieuwe gebruiker toe
        $wishes = new stdClass();
        $wishes->wish = $wish;
        $wishes->soortwish = $soortwish;
        $this->db->insert('wish', $wishes);
        return $this->db->insert_id();
    }
    
    function getAllByWish(){
        $this->db->order_by('wish', 'asc');
        $query = $this->db->get('wish');
        return $query;
    }
    
    
}

?>