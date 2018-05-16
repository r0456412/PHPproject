<?php


class Mailsjabloon_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getSjablonen(){
        $this->db->order_by('onderwerp', 'asc');
        $query = $this->db->get('Sjabloon');
        return $query->result();
    }

        function getSjabloon($onderwerp) { 
        $this->db->where('onderwerp', $onderwerp);
        $query = $this->db->get('Sjabloon');
        return $query->row();
    }
    
    function UpdateSjabloon($mailsjabloon){
        $sjabloon = new stdClass();
        $sjabloon->inhoud = $mailsjabloon->inhoud;
        if(!($mailsjabloon->onderwerp == "")){
            $sjabloon ->onderwerp = $mailsjabloon->onderwerp;
        }else{
            $sjabloon ->onderwerp = $mailsjabloon->oudOnderwerp;
        }
        $this->db->where('onderwerp', $mailsjabloon->oudOnderwerp);
        $this->db->update('Sjabloon', $sjabloon);
    }
    
    function voegSjabloonToe($mailsjabloon) {
        $sjabloon = new stdClass();
        $sjabloon->onderwerp = $mailsjabloon->onderwerp;
        $sjabloon->inhoud = $mailsjabloon->inhoud;
        $this->db->insert('Sjabloon', $sjabloon);
        return $this->db->insert_id();
    }
    
    function verwijderSjabloon($onderwerp){
        $this->db->where('onderwerp', $onderwerp);
        $this->db->delete('Sjabloon');
    }

}

?>