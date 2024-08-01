<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturation extends CI_Controller {

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
		$result = $this->statistic_model->getAssurance();
		$select = $this->facturation_model->get_drugs_oninvonce();
		$tarif = $this->manager_model->getInsurancesTarifForVente();
		if($select){
			$data['drugs'] = $select;
		}
		if($result){
			$data['assurance'] = $result;
		}
		if($tarif){
			$data['tarif'] = $tarif;
		}
		

		$this->load->view('vente/facturation', $data);
	}

	public function creer_facture(){
		$this->form_validation->set_rules('nom','nom','trim');
		$this->form_validation->set_rules('bon','bon','trim');
		$this->form_validation->set_rules('date','date','trim|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Completer les champs necessaires.');
			redirect('facturation');
		}else{
			if($this->input->post('save')){
				$iduser = $this->session->userdata('user_id');
				$create = $this->facturation_model->create_facture($iduser);
				if($create){
					redirect('facturationShow/openedInvoice');
				}
			}else{
				redirect('facturation');
			}

		}
	}
	public function update_invoice(){
		$this->form_validation->set_rules('invoice','invoice','trim|required');
		$this->form_validation->set_rules('nom','nom','trim');
		$this->form_validation->set_rules('bon','bon','trim');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Completer les champs necessaires.');
			redirect('facturation');
		}else{
			if($this->input->post('save')){
				$update = $this->facturation_model->update_invoice();
				if($update){
					redirect('facturationShow/openedInvoice');
				}
			}else{
				redirect('facturation');
			}

		}
	}

	public function facture_creer(){
		if($this->input->post('send_invoice') !== null){
          $this->form_validation->set_rules('date','date','trim');
		  $this->form_validation->set_rules('statut','statut','trim');
		}
		$facture = $this->facturation_model->get_factures();
		if($facture){
			$data['facture'] = $facture;
		}else{
			$data ="";
		}
		$this->load->view('vente/facture_creer', $data);
	}

	public function payment_page($id,$tot){
		$iduser = $this->session->userdata('user_id');
		$result = $this->caisse_model->getCaisseById($iduser);
		if($result){
			$data['caisses'] = $result;
		} 
		    $data['invoice'] = $id;
			$data['amount'] = $tot;
			$this->load->view('vente/payment_page', $data);
	}
	public function payment_validation($numero, $montant){
		$this->form_validation->set_rules('date','date','trim|required');
		$this->form_validation->set_rules('caisse','caisse','trim|required');
		
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Completer les champs necessaires.');
			redirect('facturation/payment_page/'.$numero.'/'.$montant);
		}else{
			$iduser = $this->session->userdata('user_id');
			$pay = $this->facturation_model->pay_facture($numero, $montant, $iduser);
			if($pay){
				redirect('facturationShow/closedInvoice/'.$numero);
			}else{
				echo "Erreur";
			}



		}
	}


   public function search_invoice(){
   	   $this->load->view('vente/search_invoice');
   }














}

	/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */