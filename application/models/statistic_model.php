<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistic_model extends CI_Model {




   public function get_drugsCategory(){
		$query = $this->db->get('drugs_category');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_drugs(){
		$query = $this->db->get('drugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}



	public function get_Onedrugs($id){
		$this->db->where('drugs_category_iddrugs_category', $id);
		$query = $this->db->get('drugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function statsRevenuDrugs($id, $debut, $fin){

		  $this->db->select('f.*');
		  $this->db->from('facture_clientdrugs f');
		  $this->db->join('facture_client fc', 'f.idfacture_client = fc.idfacture_client');
		  $this->db->where('fc.date >=', $debut);
		  $this->db->where('fc.date <=', $fin);
		  $this->db->where('f.iddrugs', $id);
		  
		$query = $this->db->get();
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_spec_med_cat($id, $n){
		         $this->db->where('iddrugs_category', $id);
		$query = $this->db->get('drugs_category');
		if($query->num_rows() != 0){
			return $query->row(0)->$n;
		}else{
			return false;
		}
	}


	function get_factureAssurance($debut,$fin){
		         $this->db->where('date >=', $debut);
		         $this->db->where('date <=', $fin);
		$query = $this->db->get('facture_assurance');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}


	function get_assurance_client($numero_facture){
		        $this->db->where('idfacture_assurance', $numero_facture);
		$query = $this->db->get('facture_assuranceclient');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}


	function statsInvoiceInsurance($idfcd){
		$this->db->where('idfacture_clientDrugs', $idfcd);
		$query = $this->db->get('facture_clientdrugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}


		public function statsDepenses($debut, $fin){
			 $this->db->where('date >=', $debut);
		     $this->db->where('date <=', $fin);
		     $this->db->order_by('code', 'asc');
		$query = $this->db->get('depenses');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}
    
    function get_assurance(){
    	         $this->db->where('type', 1);
    	$query = $this->db->get('assurance');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
    }
    function getAssurance(){
    	$query = $this->db->get('assurance');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
    }

	function get_factureAssuranceClient($idassurance, $debut, $fin){
		         $this->db->where('assurance_idassurance', $idassurance);
		         $this->db->where('date >=', $debut);
		         $this->db->where('date <=', $fin);
		$query = $this->db->get('facture_assurance');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}



























}