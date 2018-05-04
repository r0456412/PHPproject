<?php

class WishesAntwoorden_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Gekozenantwoord');
        return $query->row();
    }
    function getAllByGebruikerid($id){
        $this->db->where('gebruikerid', $id);
        $query = $this->db->get('Gekozenantwoord');
        $antwoorden = $query->result();
        foreach($antwoorden as $antwoord){
            $this->db->where('id', $antwoord->wishid);
            $query = $this->db->get('Wens');
            $antwoord->wish = $query->row();
        }
        return $antwoorden;
    }
    function antwoordenIndienen($antwoorden) {  
        $this->db->insert('Gekozenantwoord', $antwoorden);
        return $this->db->insert_id();
    }
}
