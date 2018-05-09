<?php

class Wish_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('Wens');
        return $query->row();
    }
    
    function voegToe($wish, $soortwish) {
        // voeg nieuwe gebruiker toe
        $wishes = new stdClass();
        $wishes->wish = $wish;
        $wishes->soortantwoordid = $soortwish;
        $this->db->insert('Wens', $wishes);
        return $this->db->insert_id();
    }
    
    function getAllByWish(){
        $this->db->order_by('wish', 'asc');
        $query = $this->db->get('Wens');
        return $query->result();
    }
    
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('Wens');
    }
    
    function update($wish){
        $this->db->where('id', $wish->id);
        $this->db->update('Wens', $wish);
    }
    
    function getAllWithAntwoorden($id){ 
        $this->db->order_by('wish', 'asc');
        $query = $this->db->get('Wens');
        $wishes = $query->result();
        
        $query = $this->db->get_where('Gekozenantwoord', array('gebruikerid' => $id)); 
        if ($query->num_rows() == 0 ){
            $antwoord = new stdClass();
            foreach($wishes as $wish){
                $antwoord->antwoord = "";
                $antwoord->wishid = $wish->id;
                $antwoord->gebruikerid = $id;
                $antwoord->jaargangid = 1;
                
                $wish->antwoord = $antwoord;
                
                $this->db->insert('Gekozenantwoord', $antwoord);
            }     
        }else{
            foreach($wishes as $wish){
                $this->db->where('gebruikerid', $id);
                $this->db->where('wishid', $wish->id);
                $query = $this->db->get('Gekozenantwoord');
                $wish->antwoord = $query->row();
            }
        }
        return $wishes;
    }
    
    function getAllByWishWithSoortAntwoord(){
        $this->db->order_by('wish', 'asc');
        $query = $this->db->get('Wens');
        $wishes = $query->result();
        
        $this->load->model('soortantwoord_model');
        
        foreach ($wishes as $wish){
            $wish->soortantwoord = $this->soortantwoord_model->get($wish->soortantwoordid);
        }
        return $wishes;
    }
}