<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supply_model extends CI_Model {


   public function addDrugToSuppy($idDrug, $qte){

   	    $data = array(
          'quantite' => $qte,
          'iddrugs'  => $idDrug,
          'idcommandes' => 0,
          'statut'      => 0
   	    );

   	    if($this->db->insert('commande_drugs', $data)){
   	    	return true;
   	    }else{
   	    	return false;
   	    }
   }

     public function get_supplyDrugs(){
   	  $this->db->where('idcommandes',0);
		$query = $this->db->get('commande_drugs');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
   }

   public function deleteDrugToSuppy($id){
           $this->db->where('idcommande_drugs',$id);
		if($this->db->delete('commande_drugs')){
			return true;
		}else{
			return false;
		}
   }


   public function get_fournisseur(){
   	  $query = $this->db->get('fournisseur');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
   }


   public function insertCommandeDrug($date, $fournisseur, $iduser){
   	  $data['date'] = $date;
   	  $data['fournisseur_idfournisseur'] = $fournisseur;
       $data['statut'] = 0;
   	  $data['idusers'] = $iduser;

   	   if($this->db->insert('commandes', $data)){
   	  	$this->db->select_max('idcommandes');
   	  	$num = $this->db->get('commandes')->row(0)->idcommandes;
   	  	$data2['idcommandes'] = $num;
   	  	$this->db->where('idcommandes',0);
   	  	if($this->db->update('commande_drugs', $data2)){
   	  		return true;
   	  	}else{
   	  		return false;
   	  	}
   	  }
   }


   public function get_commandes(){
    $this->db->where('statut',0);
    $this->db->order_by('idcommandes','desc');
    $this->db->limit(5);
    $query = $this->db->get('commandes');
    if($query->num_rows() != 0){
      return $query->result();
    }else{
      return false;
    }
   }

   public function get_validatedCommandes(){
    $query = $this->db->query("SELECT c.*
                             FROM commande_drugs cd, commandes c
                             WHERE cd.idcommandes = c.idcommandes and c.statut = 1 and cd.statut = 0");
    if($query->num_rows() != 0){
      return $query->result();
    }else{
      return false;
    }
   }

   public function cancelNonValidatedCommande($id){
       $this->db->where('idcommandes',$id);
       $this->db->where('statut',0);
       if($this->db->delete('commande_drugs')){
        return true;
       }else{
        return false;
       }
   }

   public function get_nonValidatedEntries(){
     
    $query = $this->db->query("SELECT COUNT(cd.idcommande_drugs) as total
                             FROM commande_drugs cd, commandes c
                             WHERE cd.idcommandes = c.idcommandes and c.statut = 1 and cd.statut = 0");
      if($query->num_rows() != 0){
        return $query->row(0)->total;
      }else{
        return false;
      }
   }




   public function get_spec_fourn($idfournisseur, $n){
      $this->db->where('idfournisseur', $idfournisseur);
    $query = $this->db->get('fournisseur');
    if($query->num_rows() != 0){
           return $query->row(0)->$n;
    }
  }

  public function get_spec_dateOfCommande($idcommandes, $n){
     $this->db->where('idcommandes', $idcommandes);
    $query = $this->db->get('commandes');
    if($query->num_rows() != 0){
           return $query->row(0)->$n;
    }
  }


  public function openSupplyBon($id){
    $this->db->where('idcommandes',$id);
    $query = $this->db->get('commande_drugs');
    if($query->num_rows() != 0){
      return $query->result();
    }else{
      return false;
    }
  }


  /*function updateCommande($id){
    $data['statut'] = 1;
    $this->db->where('idcommandes', $id);
    if($this->db->update('commande_drugs', $data)){
      $this->db->where('idcommandes', $id);
        if($this->db->update('commandes', $data)){
          return true;
        }
    }
  }*/


  function closeCommande($id){
    $data['statut'] = 1;
    $this->db->where('idcommandes', $id);
    if($this->db->update('commandes', $data)){
        return true;
      }
  }


  function updateOneCommande($id, $iduser, $pa_total){
    $data['statut'] = 1;
    $data['paTotal'] = $pa_total;
    $this->db->where('idcommande_drugs', $id);
    if($this->db->update('commande_drugs', $data)){ // Mise a jour du statut du medicament dans la table commande
       $this->db->where('idcommande_drugs', $id); // verfier la quantite dans la table des commandes
       $query = $this->db->get('commande_drugs');
        if($query->num_rows() != 0){
           $drug = $query->row(0)->iddrugs; // Recuperation du medicament $drug
           $qte = $query->row(1)->quantite; // '''''' de la quantite   $qte
           $uqty = $this->facturation_model->get_spec_med($drug, 'qty');
           $this->db->where('drugs_iddrugs', $drug);
           $result = $this->db->get('stock');
           if($result->num_rows != 0){
              $qte2 = $result->row(0)->Quantite2;
              if($qte2 == null){
                $qte2 = 0;
              }
           }else{
            $qte2 = 0;
           }

           $quantite = $qte2 + $qte;
           $data_stock = array(
               'drugs_iddrugs' => $drug,
               'Quantite2'  => $quantite,
               'paTotal'  => $pa_total,
               'statut'     => 0
           );
           $data_hist = array(
               'iddrugs' => $drug,
               'quantite'=> $qte*$uqty,
               'pa' => ceil($pa_total / ($qte*$uqty)),
               'type'    => 1,
               'idusers'   => $iduser,
               'date'     => date('Y-m-d')
           );
           $this->db->where('drugs_iddrugs', $drug);
           $result = $this->db->get('stock');
           if($result->num_rows != 0){
              $this->db->where('drugs_iddrugs', $drug);
              if($this->db->update('stock', $data_stock)){
                 if($this->db->insert('historique_stock', $data_hist))
                  return true;
              }
           }else{
              if($this->db->insert('stock', $data_stock)){
                if($this->db->insert('historique_stock', $data_hist))
                 return true;
              }
           }
        }
    }
  }


  function get_searchedCommandeListByState($state, $debut, $fin){
       $this->db->where('statut', $state);
    if(!empty($debut) and !empty($fin)){
       $this->db->where('date >=',$debut);
       $this->db->where('date <=',$fin);
    }
     $query = $this->db->get('commandes');
    if($query->num_rows() != 0){
      return $query->result();
    }else{
      return false;
    }
  }
























}