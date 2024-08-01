<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Financial extends CI_Controller {

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
		$this->load->view('caisse/financial', $data);
	}



	public function financialState(){
		$this->form_validation->set_rules('debut','debut', 'trim|required');
		$this->form_validation->set_rules('fin','fin', 'trim|required');

		if($this->form_validation->run() == false){
             redirect('financial');
		}else{
			$data = array();
			$result1 = $this->caisse_model->getVenteState();
			$result2 = $this->caisse_model->getPeremptionState();
			$result3 = $this->caisse_model->getSupplyState();
			$result4 = $this->caisse_model->getDepensesState();
			$result5 = $this->caisse_model->getAssurancesState();
            
            if($result1){
            	$data['ventes'] = $result1;
            }
            if($result2){
            	$data['perimes'] = $result2;
            }
            if($result3){
            	$data['commandes'] = $result3;
            }
            if($result4){
            	$data['depenses'] = $result4;
            }
            if($result5){
            	$data['assurances'] = $result5;
            }

          /*$this->load->view('caisse/ventes', $data);
          $this->load->view('caisse/perimes', $data);
          $this->load->view('caisse/commandes', $data);
          $this->load->view('caisse/depenses', $data);
          $this->load->view('caisse/assurances', $data);*/
          $this->load->view('caisse/financial', $data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */