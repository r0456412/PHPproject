<?php

class PaginaInhoud_model extends CI_Model {

    // +----------------------------------------------------------
    // | Lekkerbier - Brouwerij_model
    // +----------------------------------------------------------
    // | 2 ITF - 201x-201x
    // +----------------------------------------------------------
    // | Brouwerij model
    // |
    // +----------------------------------------------------------
    // | Thomas More Kempen
    // +----------------------------------------------------------

    function __construct()
    {
        parent::__construct();
    }

    function get($id)
    {
        $this->db->where('sjabloon');
        $query = $this->db->get('paginaInhoud');
        return $query->row();
    }
}

?>