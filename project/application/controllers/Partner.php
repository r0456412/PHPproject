<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @class Partner
 * @brief Controller-klasse voor Partner
 * 
 * Controller-klasse met alle methodes die gebruikt worden voor de partner
 */
class Partner extends CI_Controller {
    /**
    * Constructor
    */
    public function __construct() {
        parent::__construct();
        $this->load->library('excel');
        $this->load->helper('form');
        $this->load->model('partner_model');
    }
    
    /**
     * Toont de pagina waar de beheerder een excel bestand met partners kan importeren
     * 
     * @see partners_beheren.php
     */
    public function index() {
        $data['titel'] = 'Manage Partners';
        $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['link'] = 'admin/index';
        
        $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'partners_beheren',);

        $this->template->load('main_master', $partials, $data);
    }
    
    /**
     * Zorgt er voor dat de partners uit het excel bestand worden gehaald en worden toegevoegd aan de database
     * 
     * @see partner_model::insert()
     * @see gebruiker_melding.php 
     */
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
