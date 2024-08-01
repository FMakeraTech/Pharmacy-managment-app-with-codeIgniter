<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insurance_model extends CI_Model {

	public function get_searched_insurances($id){
		$this->db->where('idassurance', $id);
		$this->db->where('idfacture_assurance', 0);
		$query = $this->db->get('facture_assuranceclient');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function do_generateInsuranceInvoice($id,$date,$iduser){
		$data = array(
           'date' => $date,
           'assurance_idassurance' => $id,
           'statut'  => 0,
           'idusers' => $iduser
		);
		if($this->db->insert('facture_assurance', $data)){
			$this->db->select_max('idfacture_assurance');
			$query = $this->db->get('facture_assurance');
			if($query->num_rows() !=0){
				$invoiceId = $query->row(0)->idfacture_assurance;
				$data_insurance['idfacture_assurance'] = $invoiceId;
				$this->db->where('idassurance', $id);
				$this->db->where('idfacture_assurance', 0);
				if($this->db->update('facture_assuranceclient', $data_insurance)){
					return true;
				}else{
					return false;
				}
			}
		}
	}

	public function get_insuranceInvoices($idInsurance){
		$this->db->where('assurance_idassurance', $idInsurance);
		$this->db->order_by('idfacture_assurance', 'desc');
		$query = $this->db->get('facture_assurance');
		if($query->num_rows() != 0){
          return $query->result();
		}else{
			return false;
		}
	}


	public function get_searched_insuranceDetails($idInsuranceInvoice){
		$this->db->where('idfacture_assurance', $idInsuranceInvoice);
		$query = $this->db->get('facture_assuranceclient');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

    function get_libelle_entete(){
		$this->db->where('type', 1);
		$query = $this->db->get('libelle');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_libelle_pied(){
		$this->db->where('type', 2);
		$query = $this->db->get('libelle');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_libelle_date(){
		$this->db->where('type', 3);
		$query = $this->db->get('libelle');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_spect_factureass($id,$n){
		$this->db->where('idfacture_assurance', $id);
    $query = $this->db->get('facture_assurance');
    if($query->num_rows() != 0){
           return $query->row(0)->$n;
    }
	}

	function recoverInsurance($date, $idfact){
		if(!empty($date)){
			$data['statut'] = 1;

		   $data['dateRecouvrement'] = $date;
		   $this->db->where('idfacture_assurance', $idfact);
		  if($this->db->update('facture_assurance', $data)){
			return true;
		   }else{
			return false;
		   }
		}else{
			return false;
		}

		
	}






















}