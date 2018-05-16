<?php
/**
 * @class Mailsjabloon_model
 * @brief Model-klasse voor mailsjablonen
 * 
 * Model-klasse die alle methodes bevat om te
 * interageren met de database-tabel Sjabloon
 */
class Mailsjabloon_model extends CI_Model {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /**
     * Retourneert alle records gesorteerd op onderwerp
     * 
     * @return Alle records
     */
    function getSjablonen(){
        $this->db->order_by('onderwerp', 'asc');
        $query = $this->db->get('Sjabloon');
        return $query->result();
    }
    /**
     * Retourneert het mailsjabloon met onderwerp=$onderwerp uit de tabel Sjabloon.
     * 
     * @param $onderwerp Het onderwerp van het sjabloon
     * @return Het gevraagde mailsjabloon
     */
    function getSjabloon($onderwerp) { 
        $this->db->where('onderwerp', $onderwerp);
        $query = $this->db->get('Sjabloon');
        return $query->row();
    }
    /**
     * Slaat de aanpassingen aan het mailsjabloon op in de tabel Sjabloon.
     * 
     * @param $mailsjabloon Object met de nieuwe gegevens voor het mailsjabloon
     * @return Slaat de aanpassingen op in database
     */
    function UpdateSjabloon($mailsjabloon){
        $sjabloon = new stdClass();
        $sjabloon->inhoud = $mailsjabloon->inhoud;
        if(!($mailsjabloon->onderwerp == "")){
            $sjabloon ->onderwerp = $mailsjabloon->onderwerp;
        }else{
            $sjabloon ->onderwerp = $mailsjabloon->oudOnderwerp;
        }
        $this->db->where('onderwerp', $mailsjabloon->oudOnderwerp);
        return $this->db->update('Sjabloon', $sjabloon);
    }
    /**
     * Voegt een nieuw mailsjabloon toe aan de tabel Sjabloon.
     * 
     * @param $mailsjabloon Object met de gegevens voor het mailsjabloon
     * @return Voegt sjabloon toe aan database
     */
    function voegSjabloonToe($mailsjabloon) {
        $sjabloon = new stdClass();
        $sjabloon->onderwerp = $mailsjabloon->onderwerp;
        $sjabloon->inhoud = $mailsjabloon->inhoud;
        $this->db->insert('Sjabloon', $sjabloon);
        return $this->db->insert_id();
    }
    /**
     * Verwijderd het geselecteerde mailsjabloon uit de tabel Sjabloon
     * 
     * @param $onderwerp Het onderwerp van het sjabloon
     */
    function verwijderSjabloon($onderwerp){
        $this->db->where('onderwerp', $onderwerp);
        $this->db->delete('Sjabloon');
    }

}

?>