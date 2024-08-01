<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
	{
		//	Obligatoire
		parent::__construct();
		 
	}

	public function index(){
		if(!$this->session->userdata('loggedin')){
			$this->load->view('users/login_view');
		}else{
			redirect('test');
		}
		
	}

	public function log_in(){
       $this->form_validation->set_rules('username','\'Username\'','trim|required');
		$this->form_validation->set_rules('password','\'Password\'','trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('not_loggedin','Veuillez remplir tous les champs SVP!');
			redirect('users');
		}else{

			$user = $this->input->post('username');
			$pass = $this->input->post('password');

			$result = $this->user_model->log_in($user,$pass);
			if($result)
			{
				$data = array();
				foreach($result->result() as $row) {
					$data['user_id'] = $row->idusers;
					$data['nom'] = $row->nom;
					$data['code_user'] = $row->code;
					$data['droit'] = $row->droit;
					
					if($row->droit == 5){
                      $data['loggedin'] = false;
					}else{
						$data['loggedin'] = true;
					}
					if($row->super == 1){
                        $data['isSuper'] = true;
					}
				}
        //    $user_data = array(
        //          'user_id' => $user_id,
        //          'user_name' => $user,
        //          'agence' => $agence,
        //         'loggedin' => true
    	 		// );
				$this->session->set_flashdata('logged-in','You are logged in.');
				$this->session->set_userdata($data);
				redirect('test');
			}
			else
			{
		      $this->session->set_flashdata('not_loggedin','identifiant ou mot de passe invalide.');
				redirect('users');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('nom');
		$this->session->unset_userdata('loggedin');
		$this->session->unset_userdata('droit');
		$this->session->sess_destroy();
		redirect('users');
	}






}