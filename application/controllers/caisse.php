<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caisse extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('loggedin')){
            redirect('users');
         }
          
    }
    
	public function index()
	{
        $iduser = $this->session->userdata('user_id');
		$result = $this->caisse_model->getCaisseById($iduser);
		$data = array();
		if($result){
			$data['caisses'] = $result;
		}
		$this->load->view('caisse/home', $data);
	}

    public function getCaisseSorties($caisse="",$debut="",$fin=""){
    	if (!empty($caisse) and !empty($debut) and !empty($fin)) {
    		$result = $this->caisse_model->getCaisseSorties($caisse,$debut,$fin);
    		$data = array();
    		if($result){
    			$data['sorties'] = $result;
    			$this->load->view('caisse/sorties', $data);
    		}else{
    			echo 'Sorties : 0';
    		}
    		
    	}else{
    		echo "Remplissez tous les champs.";
    	}
    }

    public function getCaisseEntrees($caisse="",$debut="",$fin=""){
    	if (!empty($caisse) and !empty($debut) and !empty($fin)) {
    		$result = $this->caisse_model->getCaisseEntrees($caisse,$debut,$fin);
    		$data = array();
    		if($result){
    			$data['entrees'] = $result;
    			$this->load->view('caisse/entrees', $data);
    		}else{
    			echo "entrees : 0";
    		}
    		
    	}else{
    		echo "Remplissez tous les champs.";
    	}
    }
















}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */