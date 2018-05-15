<?php
/**
 * @class planning_model
 * @brief Model-klasse voor de planning
 * 
 * Model-klasse die alle methodes bevat om te
 * interageren met de database-tabel Voorstel
 */
class Planning_model extends CI_Model {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /**
     * Retourneert het voorstel met id=$id uit de tabel Voorstel
     * @param $id De id van het voorstel
     * @return Het voorstel
     */
    function get($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('Voorstel');
        return $query->row();
    }
    
    
    
    
    
    
        
}

?>