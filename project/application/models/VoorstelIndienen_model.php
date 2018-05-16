<?php
/**
 * Constructor
 */

class VoorstelIndienen_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    /**
     * Retourneert het antwoord met id=$id uit de tabel Antwoord
     * @param $id De id van het antwoord dat opgevraagd wordt
     * @return Het opgevraagde antwoord
     */
    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Antwoord');

        return $query->row();
    }
    /**
     * Voegt een voorstel toe in de database
     * @param $voorstel De inhoud van het voorstel dat in de database wordt geschreven
     * @return id
     */
    function indienen($voorstel) {  
        $this->db->insert('Voorstel', $voorstel);
        return $this->db->insert_id();
    }
}