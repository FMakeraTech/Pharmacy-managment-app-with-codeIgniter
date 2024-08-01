<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('users');
		}
		 
	}

	public function index()
	{
		$this->load->view('gestion/home');
	}

	public function managerDrugsCategory(){
		$data = array();
		$result = $this->manager_model->get_drugsCategories();
		if($result){
			$data['category'] = $result;
		}
		$this->load->view('gestion/categories', $data);
	}


	public function createDrugsCategory(){
		$this->form_validation->set_rules('code','code','trim|required');
		$this->form_validation->set_rules('nom','nom','trim|required');
		$this->form_validation->set_rules('place','place','trim|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('manager/managerDrugsCategory');
		}else{
			if($this->input->post('create')){
				$res = $this->manager_model->createDrugsCategory();
				if($res == 1){
					$this->session->set_flashdata('success','Creation avec succès.');
				}elseif($res == 2){
					$this->session->set_flashdata('error','Creation échouée.');
				}elseif($res == 3){
					$this->session->set_flashdata('error','Cette catégorie existe déjà');
				}
			}elseif($this->input->post('update')){
				if($this->manager_model->updateDrugsCategory()){
					$this->session->set_flashdata('success','Modification avec succès.');
				}else{
					$this->session->set_flashdata('error','Modification échouée.');
				}
			}elseif($this->input->post('delete')){
				if($this->manager_model->deleteDrugsCategory()){
					$this->session->set_flashdata('success','Suppression avec succès.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}else{
				echo "NOT DONE";
			}
			redirect('manager/managerDrugsCategory');
		}
	}


	public function managerDrugs(){
		$data = array();
		$result1 = $this->manager_model->getDrugs();
		$result2 = $this->statistic_model->get_drugsCategory();
		if($result1){
			$data['drugs'] = $result1;
		}
		if($result2){
			$data['categorie'] = $result2;
		}
		$this->load->view('gestion/drugs', $data);
	}

	public function searchDrugsInManagment($drug=""){
		$data = array();
		$result1 = $this->manager_model->getSearchedDrugs($drug);
		if($result1){
			$data['drugs'] = $result1;
		}
		$this->load->view('gestion/searchedDrugs', $data);
	}



   public function createDrugs(){
   	    $this->form_validation->set_rules('code','code','trim|required');
		$this->form_validation->set_rules('nom','nom','trim|required');
		$this->form_validation->set_rules('categorie','categorie','trim|required');
		$this->form_validation->set_rules('pa','pa','trim');
		$this->form_validation->set_rules('pv','pv','trim|required');
		$this->form_validation->set_rules('prixmfp','prixmfp','trim');
		$this->form_validation->set_rules('percentmfp','percentmfp','trim');
		$this->form_validation->set_rules('unity','unity','trim|required');
		$this->form_validation->set_rules('uqty','unity_quantity','trim|required');
		$this->form_validation->set_rules('alertqte','alertqte','trim|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('manager/managerDrugs');
		}else{
			if($this->input->post('create')){
				$res = $this->manager_model->createDrugs();
				if($res == 1){
					$this->session->set_flashdata('success','Creation avec succès.');
				}elseif($res == 2){
					$this->session->set_flashdata('error','Creation échouée.');
				}elseif($res == 3){
					$this->session->set_flashdata('error','Ce médicament exite déjà');
				}
			}elseif($this->input->post('update')){
				if($this->manager_model->updateDrugs()){
					$this->session->set_flashdata('success','Modification avec succès.');
				}else{
					$this->session->set_flashdata('error','Modification échouée.');
				}
			}elseif($this->input->post('delete')){
				if($this->manager_model->deleteDrugs()){
					$this->session->set_flashdata('success','Suppression avec succès.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}else{
				echo "NOT DONE";
			}
			redirect('manager/managerDrugs');
		}
	}



	public function managerInsurances(){
		$data = array();
		$result = $this->manager_model->getInsurances();
		if($result){
			$data['insurances'] = $result;
		}
		
		$this->load->view('gestion/assurances', $data);
	}


	public function createInsurances(){
		$this->form_validation->set_rules('code','code','trim|required');
		$this->form_validation->set_rules('nom','nom','trim|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('manager/managerInsurances');
		}else{
			if($this->input->post('create')){
				$res = $this->manager_model->createInsurances();
				if($res == 1){
					$this->session->set_flashdata('success','Creation avec succès.');
				}elseif($res == 2){
					$this->session->set_flashdata('error','Creation échouée.');
				}elseif($res == 3){
					$this->session->set_flashdata('error','Cette assurance exite déjà');
				}
			}elseif($this->input->post('update')){
				if($this->manager_model->updateInsurances()){
					$this->session->set_flashdata('success','Modification avec succès.');
				}else{
					$this->session->set_flashdata('error','Modification échouée.');
				}
			}elseif($this->input->post('delete')){
				if($this->manager_model->deleteInsurances()){
					$this->session->set_flashdata('success','Suppression avec succès.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}else{
				echo "NOT DONE";
			}
			redirect('manager/managerInsurances');
		}
	}


	public function managerCaisses(){
		$data = array();
		$result = $this->manager_model->getCaisses();
		$result2 = $this->user_model->get_users();
		if($result){
			$data['caisses'] = $result;
		}
		if($result2){
			$data['users'] = $result2;
		}
		
		$this->load->view('gestion/caisses', $data);
	}


	public function createCaisses(){
		$this->form_validation->set_rules('code','code','trim|required');
		$this->form_validation->set_rules('nom','nom','trim|required');
		$this->form_validation->set_rules('user','user','trim|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('manager/managerCaisses');
		}else{
			if($this->input->post('create')){
				$res = $this->manager_model->createCaisses();
				if($res == 1){
					$this->session->set_flashdata('success','Creation avec succès.');
				}elseif($res == 2){
					$this->session->set_flashdata('error','Creation échouée.');
				}elseif($res == 3){
					$this->session->set_flashdata('error','Cette caisse exite déjà');
				}
			}elseif($this->input->post('update')){
				if($this->manager_model->updateCaisses()){
					$this->session->set_flashdata('success','Modification avec succès.');
				}else{
					$this->session->set_flashdata('error','Modification échouée.');
				}
			}elseif($this->input->post('delete')){
				if($this->manager_model->deleteCaisses()){
					$this->session->set_flashdata('success','Suppression avec succès.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}else{
				echo "NOT DONE";
			}
			redirect('manager/managerCaisses');
		}
	}


	public function managerFournisseurs(){
		$data = array();
		$result = $this->manager_model->getFournisseurs();
		if($result){
			$data['fournisseurs'] = $result;
		}	
		$this->load->view('gestion/fournisseurs', $data);
	}

	public function createFournisseurs(){
		$this->form_validation->set_rules('code','code','trim|required');
		$this->form_validation->set_rules('nom','nom','trim|required');
		$this->form_validation->set_rules('phone','phone','trim');
		$this->form_validation->set_rules('adresse','adresse','trim');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('manager/managerFournisseurs');
		}else{
			if($this->input->post('create')){
				$res = $this->manager_model->createFournisseurs();
				if($res == 1){
					$this->session->set_flashdata('success','Creation avec succès.');
				}elseif($res == 2){
					$this->session->set_flashdata('error','Creation échouée.');
				}elseif($res == 3){
					$this->session->set_flashdata('error','Ce fournisseur exite déjà');
				}
			}elseif($this->input->post('update')){
				if($this->manager_model->updateFournisseurs()){
					$this->session->set_flashdata('success','Modification avec succès.');
				}else{
					$this->session->set_flashdata('error','Modification échouée.');
				}
			}elseif($this->input->post('delete')){
				if($this->manager_model->deleteFournisseurs()){
					$this->session->set_flashdata('success','Suppression avec succès.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}else{
				echo "NOT DONE";
			}
			redirect('manager/managerFournisseurs');
		}
	}




	public function managerDepenses(){
		$data = array();
		$result = $this->manager_model->getDepenses();
		if($result){
			$data['depenses'] = $result;
		}
		
		$this->load->view('gestion/depenses', $data);
	}


	public function createDepenses(){
		$this->form_validation->set_rules('code','code','trim|required');
		$this->form_validation->set_rules('date','date','trim|required');
		$this->form_validation->set_rules('description','description','trim|required');
		$this->form_validation->set_rules('montant','montant','trim|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('manager/managerDepenses');
		}else{
			$user = $this->session->userdata('user_id');
			if($this->input->post('create')){
				$res = $this->manager_model->createDepenses($user);
				if($res == 1){
					$this->session->set_flashdata('success','Creation avec succès.');
				}elseif($res == 2){
					$this->session->set_flashdata('error','Creation échouée.');
				}elseif($res == 3){
					$this->session->set_flashdata('error','Cette depenses a déjà été enregistrée');
				}
			}elseif($this->input->post('update')){
				if($this->manager_model->updateDepenses($user)){
					$this->session->set_flashdata('success','Modification avec succès.');
				}else{
					$this->session->set_flashdata('error','Modification échouée.');
				}
			}elseif($this->input->post('delete')){
				if($this->manager_model->deleteDepenses()){
					$this->session->set_flashdata('success','Suppression avec succès.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}else{
				echo "NOT DONE";
			}
			redirect('manager/managerDepenses');
		}
	}




		public function managerInsurancesTarif(){
		$data = array();
		$result = $this->manager_model->getInsurancesTarif();
		if($result){
			$data['insurances'] = $result;
		}
		
		$this->load->view('gestion/categories_assurances', $data);
	}


	public function createInsurancesTarif(){
		$this->form_validation->set_rules('code','code','trim|required');
		$this->form_validation->set_rules('nom','nom','trim|required');
			$this->form_validation->set_rules('perc','perc','trim|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('manager/managerInsurances');
		}else{
			if($this->input->post('create')){
				$res = $this->manager_model->createInsurancesTarif();
				if($res == 1){
					$this->session->set_flashdata('success','Creation avec succès.');
				}elseif($res == 2){
					$this->session->set_flashdata('error','Creation échouée.');
				}elseif($res == 3){
					$this->session->set_flashdata('error','Cette categorie-tarif exite déjà');
				}
			}elseif($this->input->post('update')){
				if($this->manager_model->updateInsurancesTarif()){
					$this->session->set_flashdata('success','Modification avec succès.');
				}else{
					$this->session->set_flashdata('error','Modification échouée.');
				}
			}elseif($this->input->post('delete')){
				if($this->manager_model->deleteInsurancesTarif()){
					$this->session->set_flashdata('success','Suppression avec succès.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}else{
				echo "NOT DONE";
			}
			redirect('manager/managerInsurancesTarif');
		}
	}



















}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */