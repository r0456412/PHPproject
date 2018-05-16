<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partner_model
 *
 * @author arnev
 */
class Partner_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert($data)
    {
        $this->db->insert_batch('Partner', $data);
    }
    function getPartners(){
        $this->db->order_by('voornaam', 'asc');
        $query = $this->db->get('Partner');
        return $query->result();
    }
    function getPartnerOpNaam($zoekstring){
        $this->db->like('voornaam', $zoekstring);
        $this->db->or_like('achternaam', $zoekstring);
        $query = $this->db->get('Partner');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return "geen resultaten";
        }
    }
    function getById($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('Partner');
        return $query->row();
    }
}