<?php
/**
 * @class Sessie_model
 * @brief Model-klasse voor sessies beheren
 * 
 * Model-klasse die alle methodes bevat om te
 * interageren met de database-tabel Sessie
 */
class Sessie_model extends CI_Model {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Voegt een nieuwe sessie toe.
     * @param $sessie De datumid, lokaalid, voorstelid, jaarganiden tabelid
     * @return voegt sessie toe aan database
     */
    function wijzig($sessie) {
        $this->db->insert('Sessie', $sessie);
        return $this->db->insert_id();
    }
    /**
     * Retourneert alle voorstellen gesorteerd op de titel
     * @return Alle voorstellen
     */
    function getVoorstel(){
        $this->db->order_by('titel','asc');
        $query = $this->db->get('Voorstel');
        return $query->result();
    }
     /**
     * Retourneert alle sessies met datum=$datumid uit de tabel Sessie
     * @param $datumid De datumid van de sessies die opgevraagd worden
     * @return de opgevraagde sessies
     */
    function getByDatum($datumid) {
        $this->db->order_by('tabelid','asc');
        $this->db->where('datum', $datumid);
        $query = $this->db->get('Sessie');
        $sessies = $query->result();
        $beschikbaarheid = new stdClass;
        
        foreach($sessies as $sessie){
            $this->db->where('sessieid', $sessie->id);
            $query = $this->db->get('Beschikbaarheid');
             if ($query->num_rows() == 0 ){
                 $beschikbaarheid->sessieid = $sessie->id;
                 $beschikbaarheid->gebruikerid = 14;
                 $sessie->beschikbaarheid = $beschikbaarheid;
             }else{
                 $sessie->beschikbaarheid = $query->row();
             }
        }

        return $sessies;
    }
     /**
     * Update de sessie in de tabel Sessie met sessie=$sessie
     * @param $sessie De sessie die gewijzigd word in de database
     * @return id
     */
    function update($sessie) {
        $this->db->where('id',$sessie->id);
        $this->db->update('Sessie', $sessie);
        return $this->db->insert_id();
    }
     /**
     * Verwijdert de sessie in de tabel Sessie met sessie=$sessie
     * @param $sessie De sessie die verwijderd word in de database
     * @return id
     */
     function delete($sessie){
        $this->db->where('id', $sessie->id);
        $this->db->delete('Sessie');
    }
}
    ?>