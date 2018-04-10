<?php

class Datum_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('Datum');
        return $query->row();
    }
    
    function wijzig($paginaInhoud) {
        $this->db->update('Paginainhoud', $paginaInhoud);
        return $this->db->insert_id();
    }
}
