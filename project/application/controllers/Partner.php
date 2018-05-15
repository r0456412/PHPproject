<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partner
 *
 * @author arnev
 */
class Partner extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('excel');
    }
    
    public function index() {
        $data['titel'] = 'Manage Partners';
        $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['link'] = 'admin/index';
        
        $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'partners_manage',);

        $this->template->load('main_master', $partials, $data);
    }
    
    public function save(){
        
    }
}