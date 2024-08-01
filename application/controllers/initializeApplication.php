<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InitializeApplication extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin') or !$this->session->userdata('isSuper')){
			 redirect('users');
		 }
          
	}

   public function index(){
      $this->load->view('initialisation');
   }

    function initializeIpharmaDb(){
    	if($this->user_model->initialiseDb()){
    		$this->session->set_flashdata('success','La base de donnée a été initialisée.');
    	}else{
    		$this->session->set_flashdata('error','Il y a des erreurs, veuillez le faire manuellement.');
    	}
    	redirect('initializeApplication');
    }

    function initializeInvoice(){
    	if($this->user_model->initialiseInvoice()){
    		$this->session->set_flashdata('success','Les factures ont été initialisées.');
    	}else{
    		$this->session->set_flashdata('error','Il y a des erreurs, veuillez le faire manuellement.');
    	}
    	redirect('initializeApplication');
    }



    function initializeInsurance(){
    	if($this->user_model->initialiseInsurars()){
    		$this->session->set_flashdata('success','Les assureurs ont été initialisés.');
    	}else{
    		$this->session->set_flashdata('error','Il y a des erreurs, veuillez le faire manuellement.');
    	}
    	redirect('initializeApplication');
    }



    function initializeUsers(){
    	if($this->user_model->initialiseUser()){
    		$this->session->set_flashdata('success','Les utilisateurs ont été initialisés.');
    	}else{
    		$this->session->set_flashdata('error','Il y a des erreurs, veuillez le faire manuellement.');
    	}
    	redirect('initializeApplication');
    }

     function setApplication(){
        if($this->user_model->setApplication()){
            $this->session->set_flashdata('success','Application initialisée');
        }else{
            $this->session->set_flashdata('error','Il y a des erreurs, veuillez le faire manuellement.');
        }
        redirect('initializeApplication');
    }

    function setTestVersion(){
        if($this->user_model->setTestVersion()){
            $this->session->set_flashdata('success','Version test initialisée');
        }else{
            $this->session->set_flashdata('error','Il y a des erreurs, veuillez le faire manuellement.');
        }
        redirect('initializeApplication');
    }























}