<?php
/**
 * @class Datum_model
 * @brief Model-klasse voor datums beheren
 * 
 * Model-klasse die alle methodes bevat om te
 * interageren met de database-tabel Datum
 */
class Datum_model extends CI_Model {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /**
     * Retourneert alle datums uit de tabel Datum
     * @return Alle datums
     */
    function get(){
        $this->db->order_by('id','asc');
        $query = $this->db->get('Datum');
        return $query->result();
    }
    /**
     * Update de datum in de tabel Datum met datum=$datum
     * @param $datum De datum die gewijzigd word in de database
     * @return id
     */
    function wijzig($datum) {
        $this->db->where('id', $datum->id);    
        $this->db->update('Datum', $datum);
        return $this->db->insert_id();
    }
}