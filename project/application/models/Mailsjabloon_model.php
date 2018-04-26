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
        $sjabloon ->onderwerp = $mailsjabloon->onderwerp;
        $this->db->where('id', $mailsjabloon->id);
        $this->db->update('Sjabloon', $sjabloon);
    }

}

?>