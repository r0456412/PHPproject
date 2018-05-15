<?php
/**
 * @class Beschikbaarheid_model
 * @brief Model-klasse voor de beschikbaarheid
 * 
 * Model-klasse die alle methodes bevat om te
 * interageren met de database-tabel Beschikbaarheid
 */
Class Beschikbaarheid_model extends CI_Model {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /**
     * Voegt een docent toe aan de tabel die zich heeft opgegeven via de planning om surveillant te zijn.
     * @param $surveillant De sessieid van de sessie en de gebruikerid van de docent.
     * @return Voegt een gebruikerid en sessieid toe aan de database
     */

    function wijzig($surveillant) {
        $this->db->insert('Beschikbaarheid', $surveillant);
        return $this->db->insert_id();
    }
    /**
     * Retourneert de gebruiker met gebruikerid=$gebruikerid uit de tabel Beschikbaarheid
     * @param $gebruikerid De id van de gebruiker
     * @return Alle beschikbaarheden van specifieke gebruiker
     */
    function getByGebruiker($gebruikerid) {
        $this->db->where('gebruikerid', $gebruikerid);
        $query = $this->db->get('Beschikbaarheid');
        
        return $query->result();
    }
    /**
     * Verwijdert de gebruiker met gebruikerid=$gebruikerid en waar sessieid=$sessieid uit de tabel Beschikbaarheid
     * @param $gebruikerid de id van de gebruiker
     * @param $sessieid de id van de sessie
     */
    function delete($sessieid,$gebruikerid){
        $this->db->where('sessieid', $sessieid);
        $this->db->where('gebruikerid', $gebruikerid);
        $this->db->delete('Beschikbaarheid');
    }
    
    /**
     * Retourneert de beschikbaarheden met sessieid=$sessieid uit de tabel Beschikbaarheid
     * @param $sessieid De id van de sessie
     * @return Alle beschikbaarheden van specifieke sessie
     */
    function getBySessie($sessieid) {
        $this->db->where('sessieid',$sessieid);
        $query = $this->db->get('Beschikbaarheid');
        
        return $query->result();
    }
    
    
}
