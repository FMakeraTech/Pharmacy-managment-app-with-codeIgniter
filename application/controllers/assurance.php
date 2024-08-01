<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assurance extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('users');
		 }
		  
	}
	
	public function index()
	{
		$data = array();
		$result = $this->statistic_model->get_assurance();
		if($result){
			$data['assurance'] = $result;
		}
		$this->load->view('assurance/home', $data);
	}


	public function insurances($idInsurance=""){
		if(!empty($idInsurance)){
			$result = $this->insurance_model->get_searched_insurances($idInsurance);
			if ($result) {
				$data['insurances'] = $result;
				$this->load->view('assurance/insurances', $data);
				// echo "Done done";
			}else{
				echo "Aucune nouvelle facture trouvée.";
			}
		}else{
			echo "Selectionnez une societé.";
		}
	}

	public function insuranceInvoices($idInsuranceInvoice=""){
		if(!empty($idInsuranceInvoice)){
			$result = $this->insurance_model->get_insuranceInvoices($idInsuranceInvoice);
			if ($result) {
				$data['insuranceInvoices'] = $result;
				$this->load->view('assurance/insuranceInvoices', $data);
			}else{
				// echo "Aucune facture trouvée.";
			}
		}else{
			// echo "Selectionnez une societé.";
		}
	}

	public function generateInsuranceInvoice($idInsurance="", $date=""){
		if(!empty($idInsurance) and !empty($date)){
			$iduser = $this->session->userdata('user_id');
			if($this->insurance_model->do_generateInsuranceInvoice($idInsurance, $date, $iduser)){
				$this->session->set_flashdata('success','Facture créée avec succès.');
				redirect('assurance/insuranceInvoices/'.$idInsurance);
				/*$result = $this->insurance_model->get_insuranceInvoices($idInsurance);
				if ($result) {
					$this->session->set_flashdata('success','Facture créée avec succès.');
					$data['insuranceInvoices'] = $result;
					$this->load->view('assurance/insuranceInvoices', $data);
				}else{
					echo "Aucune facture trouvée.";
				}*/
			}else{
				echo "Not Done 1";
			}

		}else{
			echo "Quelques informations manquent";
		}
	}

	public function openInsuranceInvoice($idInsuranceInvoice){
		$result = $this->insurance_model->get_searched_insuranceDetails($idInsuranceInvoice);
			if ($result) {
				$data['insuranceInvoice'] = $idInsuranceInvoice;
				$data['insuranceDetails'] = $result;
				$this->load->view('assurance/insurancesDetails', $data);
			}else{
				// echo "Aucune facture trouvée.";
			}
		
	}

	public function openInsuranceRecover($idInsuranceInvoice){
		$iduser = $this->session->userdata('user_id');
		$result = $this->caisse_model->getCaisseById($iduser);
		if($result){
			$data['caisses'] = $result;
		} 
		$data['insuranceInvoice'] = $idInsuranceInvoice;
		$this->load->view('assurance/insuranceRecover', $data);
	}

	public function recover_validation($date, $idfact){
		if($this->insurance_model->recoverInsurance($date, $idfact)){
            $this->session->set_flashdata('success', 'Recouvrement avec succès.');
            redirect('assurance');
		}
	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */