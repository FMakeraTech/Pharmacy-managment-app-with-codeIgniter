<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('users');
		}
		 
	}

	public function index()
	{
		$this->load->view('settings/home');
	}

	public function managerUsers(){
		$data = array();
		$result = $this->user_model->getUsers();
		$result2 = $this->user_model->get_profiles();
		if($result){
			$data['users'] = $result;
		}
		if($result2){
			$data['profiles'] = $result2;
		}
		$this->load->view('settings/users', $data);
	}

	public function createUsers(){
		$this->form_validation->set_rules('code','code','trim|required');
		$this->form_validation->set_rules('nom','nom','trim|required');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('phone','phone','trim');
		$this->form_validation->set_rules('profil','profil','trim|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('settings/managerUsers');
		}else{
			if($this->input->post('create')){
				$res = $this->manager_model->createUsers();
				if($res == 1){
					$this->session->set_flashdata('success','Creation avec succès.');
				}elseif($res == 2){
					$this->session->set_flashdata('error','Creation échouée.');
				}elseif($res == 3){
					$this->session->set_flashdata('error','Cet utilisateur exite déjà');
				}
			}elseif($this->input->post('update')){
				 $res2 = $this->manager_model->updateUsers();
				if($res2 == 1){
					$this->session->set_flashdata('success','Modification avec succès.');
				}elseif($res2 == 3){
					$this->session->set_flashdata('error','Pseudo déjà utilisé.');
				}else{
					$this->session->set_flashdata('error','Modification echoué.');
				}
			}elseif($this->input->post('reset')){
				if($this->manager_model->resetUsers()){
					$this->session->set_flashdata('success','Le mot de passe a été réinitialisé.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}elseif($this->input->post('delete')){
				if($this->manager_model->deleteUsers()){
					$this->session->set_flashdata('success','Suppression avec succès.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}else{
				echo "NOT DONE";
			}
			redirect('settings/managerUsers');
		}
	}

       public function managerProfile(){
       	 $this->load->view('settings/profile');
       }


		public function updatePassword(){
		$this->form_validation->set_rules('old','old','trim|required');
		$this->form_validation->set_rules('new1','new1','trim|required');
		$this->form_validation->set_rules('new2','new2','trim|required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('settings/managerProfile');
		}else{
			$iduser = $this->session->userdata('user_id');
			$res = $this->user_model->updatePassword($iduser);
            if($res == 1){
			 $this->session->set_flashdata('success','Mot de passe modifié avec succès.');
			}elseif($res == 2){
				$this->session->set_flashdata('error','Ancien mot de passe incorrect');
			}elseif($res == 3){
				$this->session->set_flashdata('error','Les mots de passe ne sont pas identiques.');
			}else{
				$this->session->set_flashdata('error','Modification echoué');
			}

			redirect('settings/managerProfile');
		}
	}


    public function managerDescription(){
    	$data = array();
    	$result = $this->manager_model->get_descriptions();
    	if($result){
    		$data['descriptions'] = $result;
    	}
    	$this->load->view('settings/description', $data);
     }

     public function createDescription(){
		$this->form_validation->set_rules('code','code','trim|required');
		$this->form_validation->set_rules('libelle','libelle','trim|required');
		$this->form_validation->set_rules('valeur','valeur','trim|required');
		$this->form_validation->set_rules('type','type','trim|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Veuillez renseigner tous les champs!');
			redirect('settings/managerDescription');
		}else{
			if($this->input->post('create')){
				$res = $this->manager_model->createDescription();
				if($res == 1){
					$this->session->set_flashdata('success','Creation avec succès.');
				}elseif($res == 2){
					$this->session->set_flashdata('error','Creation échouée.');
				}elseif($res == 3){
					$this->session->set_flashdata('error','Ce libellé exite déjà');
				}
			}elseif($this->input->post('update')){
				 $res2 = $this->manager_model->updateDescription();
				if($res2){
					$this->session->set_flashdata('success','Modification avec succès.');
				}else{
					$this->session->set_flashdata('error','Modification echoué.');
				}
			}elseif($this->input->post('delete')){
				if($this->manager_model->deleteDescription()){
					$this->session->set_flashdata('success','Suppression avec succès.');
				}else{
					$this->session->set_flashdata('error','Suppression échouée.');
				}
			}else{
				echo "NOT DONE";
			}
			redirect('settings/managerDescription');
		}
	}






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */