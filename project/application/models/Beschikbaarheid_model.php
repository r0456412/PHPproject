<?php

Class Beschikbaarheid_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function wijzig($surveillant) {
        $this->db->insert('Beschikbaarheid', $surveillant);
        return $this->db->insert_id();
    }
    
    function getByGebruiker($gebruikerid) {
        $this->db->where('gebruikerid', $gebruikerid);
        $query = $this->db->get('Beschikbaarheid');
        
        return $query->result();
    }
    function delete($sessieid,$gebruikerid){
        $this->db->where('sessieid', $sessieid);
        $this->db->where('gebruikerid', $gebruikerid);
        $this->db->delete('Beschikbaarheid');
    }
    
    
}
