<?php

class Antwoord_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('Antwoord');
        return $query->row();
    }
    
    function voegToe($antwoord, $wishid) {
        // voeg nieuwe gebruiker toe
        $antwoorden = new stdClass();
        $antwoorden->antwoord = $antwoord;
        $antwoorden->wishid = $wishid;
        $this->db->insert('Antwoord', $antwoorden);
        return $this->db->insert_id();
    }
    
    function getAllByWish(){
        $this->db->order_by('antwoord', 'asc');
        $query = $this->db->get('Antwoord');
        return $query;
    }
    
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('Antwoord');
    }
    
    function update($wish){
        $this->db->where('id', $wish->id);
        $this->db->update('Antwoord', $wish);
    }
}

?>