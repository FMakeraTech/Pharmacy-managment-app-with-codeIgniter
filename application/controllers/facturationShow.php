<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FacturationShow extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('users');
		 }
		  
	}
	public function openedInvoice()
	{
		           $facture = $this->facturation_model->get_factures();
					if($facture){
						$data['facture'] = $facture;
					}else{
						$data ="";
					}
					$this->load->view('vente/facture_creer', $data);
	}
	public function closedInvoice($numero="")
	{
		        $result = $this->facturation_model->get_prestations_invoice_created($numero);
			    if($result){
				  $data['donnees_facture'] = $result;
				  $data['num_fact'] = $numero;
				  $this->load->view('vente/prestations_facture2', $data);
			     }else{
				  echo "Aucune facture selectionnée.";
				 }
	}
    
    public function closedInvoiceList()
	{
		        $result = $this->facturation_model->get_closedInvoiceList();
			    if($result){
				  $data['donnees_factures'] = $result;
				  $this->load->view('vente/closedInvoiceListPage', $data);
			     }else{
				  echo "Aucune facture selectionnée.";
				 }
	}


	/*public function printPatientInvoice($num){
        $this->load->library('Pdf');
        $result = $this->facturation_model->get_prestations_invoice_created($num);
        $data['donnees_facture'] = $result;
        $this->load->view('vente/test_print', $data);
	}*/


	public function printPatientInvoice($num="",$date=""){
		 $this->load->helper('pdf_helper');
    /*
        ---- ---- ---- ---- 
        your code here*/
        $result = $this->facturation_model->get_prestations_invoice_created($num);
        $data['donnees_facture'] = $result;
        $data['numeroFacture'] = $num;
        $data['dateFacture'] = $date;
     /*
        ---- ---- ---- ----
    */
        $this->load->view('vente/pdfreport', $data);
	}









}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */