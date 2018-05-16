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
        $this->load->helper('form');
        $this->load->model('partner_model');
    }
    
    public function index() {
        $data['titel'] = 'Manage Partners';
        $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['link'] = 'admin/index';
        
        $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'partners_beheren',);

        $this->template->load('main_master', $partials, $data);
    }
    
    public function save(){
        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $voornaam = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $achternaam = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $data[] = array(
                      'voornaam'  => $voornaam,
                      'achternaam'   => $achternaam,
                      'email'    => $email
                    );
                }
            }
            $this->partner_model->insert($data);
            redirect('gebruiker/toonMeldingPartnersToegevoegd');
        }
    }
}
