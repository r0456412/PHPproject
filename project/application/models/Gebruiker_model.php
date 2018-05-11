<?php
/**
 * @class Gebruiker_model
 * @brief Model-klasse voor gebruikers
 * 
 * Model-klasse die alle methodes bevat om te
 * interageren met de database-tabel Gebruiker
 */

class Gebruiker_model extends CI_Model {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /**
     * Retourneert het record met id=$id uit de tabel Gebruiker
     * @param $id De id van het record dat opgevraagd wordt
     * @return Het opgevraagde record
     */
    function get($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('Gebruiker');
        return $query->row();
    }
    /**
     * Retourneert de gebruiker met email=$email uit de tabel Gebruiker,
     * als het wachtwoord=$wachtwoord overeenkomt met het opgegeven wachtwoord
     * @param $email de email van de 
     * @param type $wachtwoord
     * @return De opgevraagde gebruiker
     */
    function getGebruiker($email, $wachtwoord) {
        $this->db->where('email', $email);
        $query = $this->db->get('Gebruiker');
        
        if ($query->num_rows() == 1) {
            $gebruiker = $query->row();
            // controleren of het wachtwoord overeenkomt
            if (password_verify($wachtwoord, $gebruiker->wachtwoord)) {
                return $gebruiker;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    /**
     * Retourneert true of false als email=$email al dan niet al bestaat
     * @param $email Het email adres dat gebruikt word om te controleren of dit al dan niet al bestaat
     * @return True of False
     */
    function controleerEmailVrij($email) {
        // is email al dan niet aanwezig
        $this->db->where('email', $email);
        $query = $this->db->get('Gebruiker');

        if ($query->num_rows() == 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Voegt een gebruiker toe die zich registreerd met het registratieformulier
     * @param $titel De titel gebruiker
     * @param $voornaam De voornaam van de gebruiker
     * @param $achternaam De achternaam van de gebruiker
     * @param $geslacht Het geslacht van de gebruiker
     * @param $insituut Het instituut waar de gebruiker voor werkt
     * @param $biografie Een biografie van de gebruiker
     * @param $position De functie van de gebruiker binnen zijn instituut
     * @param $telefoonnummer De telefoonnummer van de gebruiker
     * @param $email Het email adres van de gebruiker
     * @param $studiegebied Het studiegebied van de gebruiker
     * @param $contactpersoon De contactpersoon bij Thomas More waar de gebruiker contact mee heeft 
     * @param $soort Het soort gebruiker (gastspreker, docent)
     * @param $straat De straat waar de gebruiker woont
     * @param $postcode De postcode van de gebruiker
     * @param $land Het land van herkomst
     * @param $wachtwoord Het wachtwoord
     * @return Voegt gebruiker toe aan database
     */
    function voegToe($titel, $voornaam, $achternaam, $geslacht, $insituut, $biografie, $position, $telefoonnummer, $email, $studiegebied, $contactpersoon, $soort, $straat, $postcode, $land, $wachtwoord) {
        // voeg nieuwe gebruiker toe
        $gebruiker = new stdClass();
        $gebruiker->titel = $titel;
        $gebruiker->voornaam = $voornaam;
        $gebruiker->achternaam = $achternaam;
        $gebruiker->geslacht = $geslacht;
        $gebruiker->insituut = $insituut;
        $gebruiker->biografie = $biografie;
        $gebruiker->position = $position;
        $gebruiker->telefoonnummer = $telefoonnummer;
        $gebruiker->email = $email;
        $gebruiker->studiegebied = $studiegebied;
        $gebruiker->contactpersoon = $contactpersoon;
        $gebruiker->soort = $soort;
        $gebruiker->straat = $straat;
        $gebruiker->postcode = $postcode;
        $gebruiker->land = $land;
        $gebruiker->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $gebruiker->jaargangid = '1';
        $this->db->insert('Gebruiker', $gebruiker);
        return $this->db->insert_id();
    }
    /**
     * Veranderen van het wachtwoord van de gebruiker met email=$email in tabel Gebruiker
     * @param $niewWachtwoord Het nieuwe wachtwoord van de gebruiker
     * @param $email Het email adres van de gebruiker
     */
    function veranderWachtwoord($niewWachtwoord,$email){
        $gebruiker = new stdClass();
        $gebruiker->wachtwoord = password_hash($niewWachtwoord, PASSWORD_DEFAULT);
        $this->db->where('email', $email);
        $this->db->update('Gebruiker', $gebruiker);
    }
    /**
     * Retourneert alle gebruikers gesorteerd op de voornaam
     * @return Alle gebruikers
     */
    function getAllByNaam()
    {
        $this->db->order_by('voornaam', 'asc');
        $query = $this->db->get('Gebruiker');
        return $query->result();
    }
    /**
     * Retourneert een voorstel met id=$id uit de tabel Voorstel
     * @param $id Het gastsprekerid van een voorstel dat opgevraagd wordt
     * @return Het opgevraagde voorstel
     */
    function getVoorstelByUser($id){
        $this->db->where('gastsprekerID', $id);
        $query = $this->db->get('Voorstel');
        return $query->row();
    }

}
?>