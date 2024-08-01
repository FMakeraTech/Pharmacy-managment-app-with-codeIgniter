<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pageascync extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('users');
		 }
		  
	}

	public function prestations($n=""){
		if(isset($n) and !empty($n)){
			$result = $this->facturation_model->get_prestations($n);
			if($result){
				$data['prestations'] = $result;
				$this->load->view('vente/prestations_searched', $data);
			}else{
				echo "Aucun medicament correspond à votre recherche";
			}
		}else{
			echo "chercher un medicament";
		}		
	}

	public function send_drugs($d="",$ass="",$cat="",$q=""){
		if(!empty($d) and !empty($ass) and !empty($cat) and !empty($q)){
			$result = $this->facturation_model->send_drugs($d,$ass,$cat,$q);
			if($result){
				$select = $this->facturation_model->get_drugs_oninvonce();
				if($select){
					$data['drugs'] = $select;
					$this->load->view('vente/prestations_searched', $data);
				}
			}
		}else{
			echo "Ajouter les medicaments pour créer une facture";
		}
		// echo $d.' | '.$ass.' | '.$cat.' | '.$q;
	}

	public function delete_drugs($id=""){
		if(!empty($id)){
			$result = $this->facturation_model->delete_drugs($id);
			if($result){
				$select = $this->facturation_model->get_drugs_oninvonce();
				if($select){
					$data['drugs'] = $select;
					$this->load->view('vente/prestations_searched', $data);
				}
			}
		}else{
			echo "Ajouter les medicaments pour creer une facture";
		}
		// echo $d.' | '.$ass.' | '.$cat.' | '.$q;
	}

	public function invoices($e){
		if(isset($e) and !empty($e)){
			    $result = $this->facturation_model->get_prestations_invoice_created($e);
			    if($result){
			    	$data['donnees_facture'] = $result;
			    }
				
				$data['num_fact'] = $e;
				$this->load->view('vente/prestations_facture', $data);
			
		}else{
			echo "chercher un medicament";
		}
	}


	public function updateInvoice($n){
		$result1 = $this->facturation_model->get_drugs_oninvonceToUpdate($n);
		$result2 = $this->facturation_model->get_drugs_oninvonce();
		if ($result1) {
			$data['drugs_invoiceToUpdate'] = $result1;
		}
		if ($result2) {
			$data['drugs_invoice'] = $result2;
		}
		  $data['num_fact'] = $n;
		$this->load->view('vente/updateInvoice', $data);
	}

	public function delete_drugsOnInvoiceToUpdate($id="", $num=""){
		if(!empty($id)){
			$result = $this->facturation_model->delete_drugs($id);
			if($result){
				$result1 = $this->facturation_model->get_drugs_oninvonceToUpdate($id);
				$result2 = $this->facturation_model->get_drugs_oninvonce();
				$data = array();
				if ($result1) {
					$data['drugs_invoiceToUpdate'] = $result1;
				}
				if ($result2) {
					$data['drugs_invoice'] = $result2;
				}

				if(!empty($num)){
					$data['num_fact'] = $num;
				}
				$this->load->view('vente/updateInvoice', $data);
				// echo "Done";
			}
		   }else{
			    echo "Not Done";
		    }
	}


   public function searchedInvoiceList($id=""){
   	  if(!empty($id)){
   	  	$facture = $this->facturation_model->get_factureSearched($id);
		if($facture){
			$data['facture'] = $facture;
		}else{
			$data ="";
		}
		$this->load->view('vente/search_invoice', $data);
   	  }
   }


   public function suppydrugs($n=""){
		if(isset($n) and !empty($n)){

			$result = $this->facturation_model->get_prestations($n);
			if($result){
				$data['prestations'] = $result;
				$this->load->view('supply/supplydrugs_searched', $data);
			}else{
				echo "Aucun medicament correspond à votre recherche";
			}
		}else{
			echo "chercher un medicament";
		}		
	}

   public function addDrugToSuppy($idDrug="", $qte=""){
         if(!empty($idDrug) and !empty($qte))
         {
          if($this->supply_model->addDrugToSuppy($idDrug, $qte)){
          	$result = $this->supply_model->get_supplyDrugs();
			if($result){
				$data['supplyDrugsAdded'] = $result;
				$this->load->view('supply/supplyDrugs', $data);
			}else{
				echo "Aucun medicament";
			}
          }else{
          	echo "Wapi";
          }
      }else{
      	echo "<span style='color:red;'>Les champs << Médicament et Quantité >> doivent etre remplis</span>";
      }
   }


   public function deleteSearchedDrug($id){
       if($this->supply_model->deleteDrugToSuppy($id)){
          	$result = $this->supply_model->get_supplyDrugs();
			if($result){
				$data['supplyDrugsAdded'] = $result;
				$this->load->view('supply/supplyDrugs', $data);
			}else{
				echo "Aucun medicament";
			}
          }
   }









}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */