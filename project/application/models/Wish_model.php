<?php
/**
 * @class Wish_model
 * @brief Model-klasse voor wishes te beheren
 * 
 * Model-klasse die alle methode bevat om te
 * integrageren met de database-tabel Wens
 */
class Wish_model extends CI_Model {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /**
     * Retourneert de wens (wish) met id=$id uit de tabel Wens
     * @param $id De id van de wens (wish) die opgevraagd wordt
     * @return De opgevraagde wens (wish)
     */
    function get($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('Wens');
        return $query->row();
    }
    /**
     * Voegt een wens met inhoud=$wish toe aan de tabel Wens
     * @param $wish De inhoud van een wens
     * @param $soortwish Het soort wens
     * @return id
     */
    function voegToe($wish, $soortwish) {
        // voeg nieuwe gebruiker toe
        $wishes = new stdClass();
        $wishes->wish = $wish;
        $wishes->soortantwoordid = $soortwish;
        $this->db->insert('Wens', $wishes);
        return $this->db->insert_id();
    }
    /**
     * Retourneert alle wensen uit de tabel Wens
     * @return Alle wensen
     */
    function getAllByWish(){
        $this->db->order_by('wish', 'asc');
        $query = $this->db->get('Wens');
        return $query->result();
    }
    /**
     * Verwijderd een wens met id=$id uit de tabel Wens
     * @param $id De id van de wens die verwijderd wordt
     */
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('Wens');
    }
    /**
     * updaten van een wens met inhoud=$wish in de tabel Wens
     * @param $wish De inhoud van de wens die aangepast wordt
     */
    function update($wish){
        $this->db->where('id', $wish->id);
        $this->db->update('Wens', $wish);
    }
    /**
     * Retourneert alle wensen en de antwoorden van gebruiker met id=$id op die wensen uit de tabel Wens en Gekozenantwoord 
     * @param $id De id van de gebruiker van wie je de antwoorden opvraag
     * @return De opgevraagde wensen en antwoorden op die wensen
     */
    function getAllWithAntwoorden($id){ 
        $this->db->order_by('wish', 'asc');
        $query = $this->db->get('Wens');
        $wishes = $query->result();
        
        $query = $this->db->get_where('Gekozenantwoord', array('gebruikerid' => $id)); 
        if ($query->num_rows() == 0 ){
            $antwoord = new stdClass();
            foreach($wishes as $wish){
                $antwoord->antwoord = "";
                $antwoord->wishid = $wish->id;
                $antwoord->gebruikerid = $id;
                $antwoord->jaargangid = 1;
                
                $wish->antwoord = $antwoord;
                
                $this->db->insert('Gekozenantwoord', $antwoord);
            }     
        }else{
            foreach($wishes as $wish){
                $this->db->where('gebruikerid', $id);
                $this->db->where('wishid', $wish->id);
                $query = $this->db->get('Gekozenantwoord');
                $wish->antwoord = $query->row();
            }
        }
        return $wishes;
    }
    /**
     * Retourneert de wensen met het soort antwoord uit de tabel Wens
     * @return Alle wensen met hun soort antwoord
     */
    function getAllByWishWithSoortAntwoord(){
        $this->db->order_by('wish', 'asc');
        $query = $this->db->get('Wens');
        $wishes = $query->result();
        
        $this->load->model('soortantwoord_model');
        
        foreach ($wishes as $wish){
            $wish->soortantwoord = $this->soortantwoord_model->get($wish->soortantwoordid);
        }
        return $wishes;
    }
}