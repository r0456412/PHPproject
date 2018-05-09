<?php

Class AanwezigeSurveillant_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    
    
    function getByGebruiker($gebruikerid) {
        $this->db->where('gebruikerid', $gebruikerid);
        $query = $this->db->get('Beschikbaarheid');
        
        return $query->result();
    }
    
}

