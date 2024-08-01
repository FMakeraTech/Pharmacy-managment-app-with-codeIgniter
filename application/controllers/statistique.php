<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistique extends CI_Controller {

     public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('users');
		 }
            
	}

	public function index()
	{
		$this->load->view('statistiques/home');
	}

	public function statsRevenuDrugsCategory($debut="", $fin=""){
     if(!empty($debut) and !empty($fin)){
     	$query = $this->statistic_model->get_drugsCategory();
     	$data = array();
     	if($query){
     		$data['category'] = $query;
     		$data['debut'] = $debut;
     		$data['fin']   = $fin;
     	}
     	$this->load->view('statistiques/statsRevenuDrugsCategory', $data);
     }
	}

	public function statsRevenuDrugs($debut="", $fin=""){
     if(!empty($debut) and !empty($fin)){
     	$query = $this->statistic_model->get_drugs();
     	$data = array();
     	if($query){
     		$data['drugs'] = $query;
     		$data['debut'] = $debut;
     		$data['fin']   = $fin;
     	}
     	$this->load->view('statistiques/statsRevenuDrugs', $data);
       }
	}

	public function statsInvoiceInsurance($debut="", $fin=""){
     if(!empty($debut) and !empty($fin)){
     	$query = $this->statistic_model->get_factureAssurance($debut, $fin);
     	$data = array();
     	if($query){
     		$data['facture_assurance'] = $query;
     		$data['debut'] = $debut;
     		$data['fin']   = $fin;
     	}
     	$this->load->view('statistiques/statsInvoiceInsurance', $data);
     }
	}

	public function statsInvoiceInsuranceCover($debut="", $fin=""){
     if(!empty($debut) and !empty($fin)){
     	$query = $this->statistic_model->get_assurance($debut, $fin);
     	$data = array();
     	if($query){
     		$data['assurance'] = $query;
     		$data['debut'] = $debut;
     		$data['fin']   = $fin;
     	}
     	$this->load->view('statistiques/statsInvoiceInsuranceCover', $data);
       }
	}

     public function statsDepenses($debut="", $fin=""){
     if(!empty($debut) and !empty($fin)){
          $query = $this->statistic_model->statsDepenses($debut, $fin);
          $data = array();
          if($query){
               $data['depenses'] = $query;
               $data['debut'] = $debut;
               $data['fin']   = $fin;
          }
          $this->load->view('statistiques/statsDepenses', $data);
       }
     }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */