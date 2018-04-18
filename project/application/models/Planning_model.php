<?php

class Planning_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        // geef gebruiker-object met opgegeven $id
        $this->db->where('id', $id);
        $query = $this->db->get('Voorstel');
        return $query->row();
    }
    
    function getVoorstel(){
        $this->db->order_by('titel','asc');
        $query = $this->db->get('Voorstel');
        return $query->result();
    }


}

?>