<?php

class Sessie_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function wijzig($sessie) {
        $this->db->insert('Sessie', $sessie);
        return $this->db->insert_id();
    }
    function getVoorstel(){
        $this->db->order_by('titel','asc');
        $query = $this->db->get('Voorstel');
        return $query->result();
    }
    function getByDatum($datumid) {
        $this->db->order_by('tabelid','asc');
        $this->db->where('datum', $datumid);
        $query = $this->db->get('Sessie');
        
        return $query->result();
    }
}
    ?>