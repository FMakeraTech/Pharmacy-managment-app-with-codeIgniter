<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caisse_model extends CI_Model {


	public function getCaisseSorties($caisse,$debut,$fin){
		$this->db->where('date >=', $debut);
		$this->db->where('date <=', $fin);
		$this->db->where('idcaisses', $caisse);
		$this->db->where('type', 0);
		$query = $this->db->get('encaissement');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getCaisseEntrees($caisse,$debut,$fin){
		$this->db->where('date >=', $debut);
		$this->db->where('date <=', $fin);
		$this->db->where('idcaisses', $caisse);
		$this->db->where('type', 1);
		$query = $this->db->get('encaissement');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}


	function getVenteState(){
		$debut = $this->input->post('debut');
		$fin = $this->input->post('fin');

		$this->db->where('date >=', $debut);
		$this->db->where('date <=', $fin);
		$this->db->where('type', 1);
		$query = $this->db->get('encaissement');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getPeremptionState(){
		$debut = $this->input->post('debut');
		$fin = $this->input->post('fin');

		$this->db->where('date >=', $debut);
		$this->db->where('date <=', $fin);
		$query = $this->db->get('sorties_perime');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getSupplyState(){
		$debut = $this->input->post('debut');
		$fin = $this->input->post('fin');

		$this->db->where('date >=', $debut);
		$this->db->where('date <=', $fin);
		$query = $this->db->get('commandes');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}


	function getDepensesState(){
		$debut = $this->input->post('debut');
		$fin = $this->input->post('fin');

		$this->db->where('date >=', $debut);
		$this->db->where('date <=', $fin);
		$query = $this->db->get('depenses');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getAssurancesState(){
		$debut = $this->input->post('debut');
		$fin = $this->input->post('fin');

		$this->db->where('date >=', $debut);
		$this->db->where('date <=', $fin);
		$this->db->where('statut', 1);
		$query = $this->db->get('facture_client');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}


	function getVenteByFacture($idfacture){
		$this->db->where('idfacture_client', $idfacture);
		$query = $this->db->get('facture_clientdrugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getCommandeByDrug($idcommandes){
		$this->db->where('idcommandes', $idcommandes);
		$query = $this->db->get('commande_drugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}



	function getCaisseById($iduser){
		$this->db->where('idusers', $iduser);
		$query = $this->db->get('caisses');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}


















}