<<?php

class Sessie_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

function voegSessieToe($datum, $beginuur, $einduur, $lokaalid, $voorstelid) {
        // voeg nieuwe sessie toe
        $sessie = new stdClass();
        $sessie->datm = $datum;
        $sessie->beginuur = $beginuur;
        $sessie->einduur = $einduur;
        $sessie->lokaalid = $lokaalid;
        $sessie->voorstelid = $voorstelid;
        $sessie->jaargangid = '1';
        $this->db->insert('Sessie', $sessie);
        return $this->db->insert_id();
    }
}
    ?>