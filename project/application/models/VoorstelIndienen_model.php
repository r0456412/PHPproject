<?php

class VoorstelIndienen_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Antwoord');

        return $query->row();
    }
    
    function indienen($voorstel) {  
        $this->db->insert('Voorstel', $voorstel);
        return $this->db->insert_id();
    }
}