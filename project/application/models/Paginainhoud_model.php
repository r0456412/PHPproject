<?php

class Paginainhoud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Paginainhoud');
        return $query->row();
    }
    
    function wijzig($paginaInhoud) {
        $this->db->update('Paginainhoud', $paginaInhoud);
        return $this->db->insert_id();
    }
}

?>