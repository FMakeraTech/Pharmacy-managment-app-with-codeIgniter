<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('users');
		 }
		  
	}

	public function index()
	{
		$this->load->view('home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */