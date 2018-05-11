<?php
/**
 * @class Paginainhoud_model
 * @brief Model-klasse voor de pagina inhoud
 * 
 * Model-klase die alle methodes bevat om te
 * interageren met de database-tabel Paginainhoud
 */
class Paginainhoud_model extends CI_Model {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /**
     * Retourneert de alle pagina inhoud uit de tabel Paginainhoud
     * @return Alle paginainhoud
     */
    function get() {
        $query = $this->db->get('Paginainhoud');
        return $query->row();
    }
    /**
     * Wijzigd de pagina inhoud met paginainhoud=$paginainhoud
     * @param $paginaInhoud De content die wordt geupdatet in de database
     * @return id
     */
    function wijzig($paginaInhoud) {
        $this->db->update('Paginainhoud', $paginaInhoud);
        return $this->db->insert_id();
    }
}

?>