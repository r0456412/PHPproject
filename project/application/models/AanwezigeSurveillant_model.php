<?php
/**
 * @class AanwezigeSurveillant_model
 * @brief Model-klasse voor de AanwezigeSurveillant
 * 
 * Model-klasse die alle methodes bevat om te
 * interageren met de database-tabel AanwezigeSurveillant
 */
Class AanwezigeSurveillant_model extends CI_Model {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }


    
    /**
     * Retourneert de gebruiker met gebruikerid=$gebruikerid uit de tabel AanwezigeSurveillant
     * @param $gebruikerid De id van de gebruiker
     * @return Alle beschikbaarheden van specifieke gebruiker
     */
    function getByGebruiker($gebruikerid) {
        $this->db->where('gebruikerid', $gebruikerid);
        $query = $this->db->get('AanwezigeSurveillant');
        
        return $query->result();
    }
    
}

