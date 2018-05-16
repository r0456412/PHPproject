<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partner_model
 *
 * @author arnev
 */
class Partner_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert($data)
    {
        $this->db->insert_batch('Partner', $data);
    }
}
