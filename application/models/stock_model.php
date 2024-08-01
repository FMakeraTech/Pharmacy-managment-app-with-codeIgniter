<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_model extends CI_Model {

 function get_stockEnAttente(){
 	$this->db->where('Quantite2 >', 0);
 	$this->db->where('statut', 0);
 	$query = $this->db->get('stock');
 	if($query->num_rows() !=0){
 		return $query->result();
 	}
 }


 function get_medicaments(){
 	$query = $this->db->get('drugs');
 	if($query->num_rows() !=0){
 	  return $query->result();
 	}
 }

 function get_stockState($state){
 	if($state == 1){
 	  $this->db->where('dateExpiration1 <', date('Y-m-d'));
 	}
 	 $query = $this->db->get('stock');
 	if($query->num_rows() !=0){
 		return $query->result();
     }
}

  function get_oneStockState($drug){
    $val = urldecode($drug);
    $this->db->select('s.*');
    $this->db->from('stock s');
    $this->db->join('drugs d', 's.drugs_iddrugs = d.iddrugs');
    $this->db->like('d.nom', $val);
   $query = $this->db->get();
  if($query->num_rows() !=0){
    return $query->result();
     }
}

 function get_stockById($id){
 	 $this->db->where('drugs_iddrugs', $id);
 	 $query = $this->db->get('stock');
 	if($query->num_rows() !=0){
 		return $query->result();
     }
}

 function validateLoadStock($id,$date_peremption){
 	$this->db->where('idstock', $id);
 	$query = $this->db->get('stock');
 	if($query->num_rows() != 0){
 		$qte1 = $query->row(0)->Quantite1;
 		$qte2 = $query->row(1)->Quantite2;
    $iddrug = $query->row(2)->drugs_iddrugs;
    $dateP = $query->row(3)->dateExpiration1;
    $paTotal = $query->row(4)->paTotal;
 	}
  $Uqty = $this->facturation_model->get_spec_med($iddrug,'qty');
  $quantite2 = $qte2 * $Uqty;

  $pa = ceil($paTotal / $quantite2);
  $dataDrug['pa'] = $pa;

 	$qte_final = $qte1 + $quantite2;
 	$data['Quantite1'] = $qte_final;
 	$data['Quantite2'] = 0;
  $data['paTotal'] = 0;
 	$data['dateExpiration1'] = $date_peremption;
 	$data['statut'] = 1;

   $dateA = date('Y-m-d');

   if($dateP != "" and $dateP < $dateA){
 	      return 2;
  }else if($date_peremption <= $dateA){
    return 3;
  }else{
    $this->db->where('idstock', $id);
   if($this->db->update('stock', $data)){
         $this->db->where('iddrugs', $iddrug);
      if($this->db->update('drugs', $dataDrug)){
        return 1;
      }
   }else{
    return false;
   }
  }

 }


 function get_spec_stock($id, $n){
 	$this->db->where('idstock', $id);
 	$query = $this->db->get('stock');
 	if($query->num_rows() != 0){
 		return $query->row(0)->$n;
 	
 	}
 }


 function supplyStock($iduser){
 	$iddrug = $this->input->post('drugs');
 	$qte = $this->input->post('qte');
 	$date = $this->input->post('date');
  $paTotal = $this->input->post('paTotal');

    $data['dateExpiration1'] = $date;
    $data['Quantite2'] = 0;
    $data['paTotal'] = 0;
    $data['statut'] = 1;

    $pa = ceil($paTotal / $qte);
    $dataDrug['pa'] = $pa;

    $data_hist = array(
       'quantite'       => $qte,
        'pa'            => $pa,
       'date'           => date('Y-m-d'),
       'dateExpiration' => $date,
       'iddrugs'        => $iddrug,
       'type'           => 1,
       'idusers'        => $iduser
    );
  $Uqty = $this->facturation_model->get_spec_med($iddrug,'qty');
 	$this->db->where('drugs_iddrugs', $iddrug);
 	$query = $this->db->get('stock');
 	if($query->num_rows() != 0){
 		$qte1 = $query->row(0)->Quantite1;
 		$qte2 = $query->row(1)->Quantite2;
    $qte2F = $qte2 * $Uqty;
 		$qte_final = $qte + $qte1 + $qte2F;
 		$data['Quantite1'] = $qte_final;
 
 		$this->db->where('drugs_iddrugs', $iddrug);
 		if($this->db->update('stock', $data)){
 			if($this->db->insert('historique_stock', $data_hist)){
 				$this->db->where('iddrugs', $iddrug);
      if($this->db->update('drugs', $dataDrug)){
        return true;
      }
 			}else{
 				return false;
 			}
 		}
 	}else{
 		$data['Quantite1'] = $qte;
 		$data['drugs_iddrugs'] = $iddrug;
 		if($this->db->insert('stock', $data)){
 		   if($this->db->insert('historique_stock', $data_hist)){
 				$this->db->where('iddrugs', $iddrug);
      if($this->db->update('drugs', $dataDrug)){
        return true;
      }
 			}else{
 				return false;
 			}
 		}
 	}
 }


   function deleteOneStockState($id, $iduser){
     $this->db->where('idstock', $id);
     $query = $this->db->get('stock');
     if($query->num_rows() != 0){
       $qte1 = $query->row(0)->Quantite1;
       $date = $query->row(1)->dateExpiration1;
       $iddrugs = $query->row(2)->drugs_iddrugs;
      }

      $data_s['Quantite1'] = 0;
      $data_s['dateExpiration1'] = NULL;
      $this->db->where('idstock', $id);
      if($this->db->update('stock', $data_s)){
        $data_per = array(
            'iddrugs'   => $iddrugs,
            'quantite'  => $qte1,
            'date'      => date('Y-m-d'),
            'dateExpiration' => $date,
            'idusers'       => $iduser
        );

        $data_hist = array(
            'iddrugs'   => $iddrugs,
            'quantite'  => $qte1,
            'date'      => date('Y-m-d'),
            'type'      => 0,
            'dateExpiration' => $date,
            'idusers'       => $iduser
        );
        if($this->db->insert('sorties_perime', $data_per)){
          if($this->db->insert('historique_stock', $data_hist)){
            return true;
          }else{
            false;
          }
        }else{
          return false;
        }
      }
   }


  function checkExpiration(){
    $date = date('Y-m-d');
     $this->db->where('dateExpiration1 <', $date);
     $query = $this->db->get('stock');
     if($query->num_rows() != 0){
        return $query->result();
     }else{
      return false;
     }
  }

  function checkQuantity(){
    $query = $this->db->get('stock');
      if($query->num_rows() != 0){
        return $query->result();
     }else{
      return false;
     }
  }

  function getDrugStory($iddrug){
    $this->db->where('iddrugs', $iddrug);
    $query = $this->db->get('historique_stock');
    if($query->num_rows() != 0){
      return $query->result();
    }else{
      return false;
    }
  }



  function get_oneDrug($iddrug){
    $this->db->where('iddrugs', $iddrug);
    $query = $this->db->get('drugs');
    if($query->num_rows() != 0){
      return $query->result();
    }else{
      return false;
    }
  }

  function setNewPrice(){
    $iddrug = $this->input->post('drug');
    $pv = $this->input->post('pv');
    $piece = $this->input->post('piece');

    $PrixV = ceil($pv/$piece);
    $data = array(
       'pv' => $PrixV
    );
    $this->db->where('iddrugs', $iddrug);
    if($this->db->update('drugs', $data)){
      return true;
    }else{
      return false;
    }
  }

















}