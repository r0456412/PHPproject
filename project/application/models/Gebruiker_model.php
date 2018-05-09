<?php

class Gebruiker_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('Gebruiker');
        return $query->row();
    }

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
    
    function updateLaatstAangemeld($id) {
        // pas tijd laatstAangemeld aan
        $gebruiker = new stdClass();
        $gebruiker->laatstAangemeld = date("Y-m-d H-i-s");
        $this->db->where('id', $id);
        $this->db->update('Gebruiker', $gebruiker);
    }

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

    function veranderWachtwoord($niewWachtwoord,$email){
        $gebruiker = new stdClass();
        $gebruiker->wachtwoord = password_hash($niewWachtwoord, PASSWORD_DEFAULT);
        $this->db->where('email', $email);
        $this->db->update('Gebruiker', $gebruiker);
    }

    function getAllByNaam()
    {
        $this->db->order_by('voornaam', 'asc');
        $query = $this->db->get('Gebruiker');
        return $query->result();
    }

    function getVoorstelByUser($id){
        $this->db->where('gastsprekerID', $id);
        $query = $this->db->get('Voorstel');
        return $query->result();
    }

    function getVoorstel($id){
        $this->db->where('id', $id);
        $query = $this->db->get('Voorstel');
        return $query->row();
    }

    
}

?>