<?php

/**
 * @class Partner_model
 * @brief Model-klasse voor Partner
 * 
 * Model-klasse die alle methode bevat om te
 * integrageren met de database-tabel Partner
 */
class Partner_model extends CI_Model {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Voegt de partners toe die geimporteerd werden via partners_beheren.php
     * 
     * @param $data Een array met de voornaam, achternaam en e-mail van de partners uit het excel bestand
     */
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