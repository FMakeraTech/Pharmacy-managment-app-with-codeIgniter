<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturation_model extends CI_Model {

	
	public function get_prestations($n)
	{
    $val = urldecode($n);
		$this->db->like('nom',$val);
		$query = $this->db->get('drugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}

	}

  public function get_spec_stock($iddrugs, $n){
      $this->db->where('drugs_iddrugs', $iddrugs);
    $query = $this->db->get('stock');
    if($query->num_rows() != 0){
           return $query->row(0)->$n;
    }
  }


		public function get_prestations_invoice_created($n)
	{
		$this->db->where('idfacture_client', $n);
		$query = $this->db->get('facture_clientdrugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}

	}

	public function send_drugs($d,$ass,$cat,$q){
		$this->db->where('iddrugs', $d);
		$query = $this->db->get('drugs');
		if($query->num_rows() != 0){
           $pa = $query->row(0)->pa;
           $pv = $query->row(1)->pv;
		}else{
			$pa = "";
			$pv = "";
		}
		$data = array(
             'quantite'=> $q,
             'pa'      => $pa,
             'pv'      => $pv,
             'iddrugs' => $d,
             'idfacture_client' => 0,
             'idassurance'      => $ass,
             'idcategorie_assurance' => $cat
		);
		if($this->db->insert('facture_clientdrugs', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function get_spec_med($id,$n){
		$this->db->where('iddrugs', $id);
		$query = $this->db->get('drugs');
		if($query->num_rows() != 0){
           return $query->row(0)->$n;
		}
	}
	public function get_spec_assura($id,$n){
		$this->db->where('idassurance', $id);
		$query = $this->db->get('assurance');
		if($query->num_rows() != 0){
           return $query->row(0)->$n;
		}
	}
	public function get_spec_cate($id,$n){
		$this->db->where('idcategorie_assurance', $id);
		$query = $this->db->get('categorie_assurance');
		if($query->num_rows() != 0){
           return $query->row(0)->$n;
		}
	}

  public function get_spec_drugscat($id,$n){
    $this->db->where('iddrugs_category', $id);
    $query = $this->db->get('drugs_category');
    if($query->num_rows() != 0){
           return $query->row(0)->$n;
    }
  }

	public function get_spec_fact($id,$n){
		$this->db->where('idfacture_client', $id);
		$query = $this->db->get('facture_client');
		if($query->num_rows() != 0){
           return $query->row(0)->$n;
		}
	}

  public function get_spec_factclientdrugs($id,$n){
    $this->db->where('idfacture_clientDrugs', $id);
    $query = $this->db->get('facture_clientdrugs');
    if($query->num_rows() != 0){
           return $query->row(0)->$n;
    }
  }

	public function get_drugs_oninvonce()
	{
		$this->db->where('idfacture_client', 0);
		$query = $this->db->get('facture_clientdrugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_drugs_oninvonceToUpdate($n)
	{
		$this->db->where('idfacture_client', $n);
		$query = $this->db->get('facture_clientdrugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}

	}

	public function delete_drugs($id){
		$this->db->where('idfacture_clientDrugs', $id);
		if($this->db->delete('facture_clientdrugs')){
			return true;
		}else{
			return false;
		}
	}

   public function create_facture($iduser){
   	  $nom = $this->input->post('nom');
   	  $bon = $this->input->post('bon');
   	  $date = $this->input->post('date');
   	  $data = array(
         'nom'     => $nom,
         'bon'     => $bon,
         'date'    => $date,
         'statut'  => 0,
         'idusers' => $iduser
   	  );
   	  if($this->db->insert('facture_client', $data)){
   	  	$this->db->select_max('idfacture_client');
   	  	$num = $this->db->get('facture_client')->row(0)->idfacture_client;
   	  	$data2['idfacture_client'] = $num;
   	  	$this->db->where('idfacture_client',0);
   	  	if($this->db->update('facture_clientdrugs', $data2)){
   	  		return true;
   	  	}else{
   	  		return false;
   	  	}
   	  }
   }

      public function update_invoice(){
      	$nume = $this->input->post('invoice');
   	    $nom = $this->input->post('nom');
   	    $bon = $this->input->post('bon');
   	  // $date = $this->input->post('date');
   	  $data = array(
         'nom'     => $nom,
         'bon'     => $bon,
         // 'date'    => $date,
         // 'statut'  => 0,
         // 'idusers' => 0
   	  );
   	     $this->db->where('idfacture_client', $nume);
   	  if($this->db->update('facture_client', $data)){
   	  	$data2['idfacture_client'] = $nume;
   	  	$this->db->where('idfacture_client',0);
   	  	$this->db->update('facture_clientdrugs', $data2);
   	  		return true;
   	  }else{
   	  	return false;
   	  }
   }


   public function get_factures(){
   	 if($this->input->post('date') != null){
   	 	$date = $this->input->post('date');  
   	 }
   	 if($this->input->post('statut') != null){
   	 	$statut = $this->input->post('statut');
   	 }
   	 if(isset($date) and !empty($date)){
   	 	$this->db->where('date', $date);
   	 }
   	 if(isset($statut) and !empty($statut)){
   	 	$this->db->where('statut', $statut);
   	 }else{
   	 	$this->db->where('statut', 0);
   	 }
   	 
   	   $this->db->order_by('idfacture_client', 'desc');
		$query = $this->db->get('facture_client');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
   }

   public function get_factureSearched($id){
        $this->db->like('idfacture_client', $id, 'after');
        $query = $this->db->get('facture_client');
       if($query->num_rows() != 0){
           return $query->result();
        }else{
          return false;
        }
   }

    public function get_closedInvoiceList(){
   	   $this->db->where('statut', 1);
   	   $this->db->order_by('idfacture_client', 'desc');
		$query = $this->db->get('facture_client');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
		  return false;
		}
    }


   public function get_caisses(){
		$query = $this->db->get('caisses');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
   }

   public function pay_facture($numero, $montant, $iduser){
   	  $date = $this->input->post('date');
   	  $caisse = $this->input->post('caisse');

   	  $data_caisse = array(
         'date' => $date,
         'idfacture_client' => $numero,
         'idcaisses' => $caisse,
         'montant'  => $montant,
         'type'  => 1,
         'idusers'  => $iduser
   	  );

   	  $data_fact['statut'] = 1;
   	  if($this->db->insert('encaissement', $data_caisse)){
   	  	$this->db->where('idfacture_client', $numero);
   	  	if($this->db->update('facture_client', $data_fact)){

             $this->db->where('idfacture_client',$numero);
            $q = $this->db->get('facture_clientdrugs');
            if($q->num_rows() != 0){
            	$data_pre = $q->result();
            	foreach($data_pre as $dp){
                  $ass = $dp->idassurance;
                  $idfcd = $dp->idfacture_clientDrugs;
                  if($ass !== 1){
                    $data_ass = array(
                          'idfacture_clientdrugs' => $idfcd,
                          'idassurance' => $ass,
                          'idfacture_assurance' => '0'
                    );
                    $this->db->insert('facture_assuranceclient', $data_ass);
                  }
                  $idm = $dp->iddrugs;
                  $qt = $dp->quantite;
                  $pa = $this->get_spec_med($idm, 'pa');
                  $this->db->where('drugs_iddrugs', $idm);
                  $q2 = $this->db->get('stock');
                  if($q2->num_rows() != 0){
                  	$quantite = $q2->row(0)->Quantite1;
                  	$up_quantity = $quantite - $qt;
                  	$data_up['Quantite1'] = $up_quantity;
                  	$this->db->where('drugs_iddrugs', $idm);
                  	if($this->db->update('stock', $data_up)){
                      $data_sorties = array(
                         'date'  => date('Y-m-d'),
                         'quantite' => $qt,
                         'pa'       => $pa,
                         'dateExpiration' => null,
                         'iddrugs'  => $idm,
                         'type'     => 0,
                         'idusers'  => $iduser
                      );
                      $this->db->insert('historique_stock', $data_sorties);
                    }
                  }
            	}
            	return true;
            } else{
            	return false;
            }
   	  	}
   	  }
   }














}

/* End of file welcome.php */
