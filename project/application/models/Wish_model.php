<?php

class Wish_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('Wish');
        return $query->row();
    }
    
    function voegToe($wish, $soortwish) {
        // voeg nieuwe gebruiker toe
        $wishes = new stdClass();
        $wishes->wish = $wish;
        $wishes->soortwish = $soortwish;
        $this->db->insert('Wish', $wishes);
        return $this->db->insert_id();
    }
    
    function getAllByWish(){
        $this->db->order_by('wish', 'asc');
        $query = $this->db->get('Wish');
        return $query;
    }
    
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('Wish');
    }
    
    function update($wish){
        $this->db->where('id', $wish->id);
        $this->db->update('Wish', $wish);
    }

    function getAllByWishWithSoortAntwoord(){
        $this->db->order_by('wish', 'asc');
        $query = $this->db->get('Wish');
        $wishes = $query->result();
        
        $this->load->model('soortantwoord_model');
        
        foreach ($wishes as $wish){
            $wish->soortantwoord = $this->soortantwoord_model->get($wish->soortantwoordid);
        }
        
        return $wishes;
    }

}

?>
