<?php

class WishesAntwoorden_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Antwoord');

        return $query->row();
    }
    
    function antwoordenIndienen($antwoorden) {  
        $this->db->insert('Gekozenantwoord', $antwoorden);
        return $this->db->insert_id();
    }
}

?>
