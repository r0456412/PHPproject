<?php
/**
 * @class Lokaal_model
 * @brief Model-klasse voor Lokaal beheren
 * 
 * Model-klasse die alle methodes bevat om te
 * interageren met de database-tabel Lokaal
 */
class Lokaal_model extends CI_Model {
    /**
    * Constructor
    */
    function __construct() {
        parent::__construct();
    }
    /**
     * Retourneert alle lokalen gesorteerd op de nummer
     * @return Alle lokalen
     */
    function getLokaal(){
        $this->db->order_by('nummer','asc');
        $query = $this->db->get('Lokaal');
        return $query->result();
    }
     /**
     * Retourneert een lokaal met id=$id uit de tabel Lokaal
     * @param $id De id van het lokaal dat opgevraagd wordt
     * @return het opgevraagde lokaal
     */
    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Lokaal');
        return $query->row();
    }
}