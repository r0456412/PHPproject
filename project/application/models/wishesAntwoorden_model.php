<?php
/**
 * @class wishesAntwoorden_model
 * @brief Model-klasse voor de antwoorden op wensen van de gastspreker
 * 
 * Model-klasse die alle methodes bevat om te
 * interageren met de database-tabel Gekozenantwoord.
 * Om zo de antwoorden van de gastsprekers op wensen te beheren
 */
class WishesAntwoorden_model extends CI_Model {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /**
     * Retourneert het record met id=$id uit de tabel Gekozenantwoord
     * @param $id De id van het antwoord dat je opvraagd
     * @return Het opgevraagde record
     */
    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Gekozenantwoord');
        return $query->row();
    }
    /**
     * Retourneert de antwoorden op wensen van een gebruiker met id=$id
     * @param $id De id van de gebruiker waar de de antwoorden van wilt opvragen
     * @return De antwoorden van gebruiker
     */
    function getAllByGebruikerid($id){
        $this->db->where('gebruikerid', $id);
        $query = $this->db->get('Gekozenantwoord');
        $antwoorden = $query->result();
        foreach($antwoorden as $antwoord){
            $this->db->where('id', $antwoord->wishid);
            $query = $this->db->get('Wens');
            $antwoord->wish = $query->row();
        }
        return $antwoorden;
    }
    /**
     * Zorgt ervoor dat het ingevulde antwoord van de gebruiker wordt geupdatet in de database
     * @param $antwoord Het antwoord op een wens van de gebruiker
     */
    function antwoordenIndienen($antwoord) {  
        $this->db->where('gebruikerid', $antwoord->gebruikerid);
        $this->db->where('wishid', $antwoord->wishid);
        $this->db->update('Gekozenantwoord', $antwoord);
    }
}
