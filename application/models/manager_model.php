<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager_model extends CI_Model {


     public function get_drugsCategories(){
               $this->db->where('type', 1);
     	         $this->db->order_by('code','desc');
		$query = $this->db->get('drugs_category');
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
	}

     function createDrugsCategory(){
     	$code = $this->input->post('code');
     	$nom = $this->input->post('nom');
     	$place = $this->input->post('place');
     	$data = array(
              'code'  => $code,
              'nom'   => $nom,
              'place' => $place,
              'type'  => 1
     	);

     	         $this->db->where('code', $code);
     	$query = $this->db->get('drugs_category');
     	if($query->num_rows() != 0){
     		return 3;
     	}else{
     		if($this->db->insert('drugs_category', $data)){
     		  return 1;
         	}else{
     		  return 2;
     	    }
     	}     	
     }


      function updateDrugsCategory(){
     	$code = $this->input->post('code');
     	$nom = $this->input->post('nom');
     	$place = $this->input->post('place');
     	$data = array(
              'nom'   => $nom,
              'place' => $place,
     	);

           $this->db->where('code', $code);
     	if($this->db->update('drugs_category', $data)){
     		return true;
     	}else{
     		return false;
     	}
     }

     function deleteDrugsCategory(){
     	$code = $this->input->post('code');
           $this->db->where('code', $code);
     	if($this->db->delete('drugs_category')){
     		return true;
     	}else{
     		return false;
     	}
     }


    public function getDrugs(){
                 $this->db->order_by('iddrugs','desc');
        $query = $this->db->get('drugs');
        if($query->num_rows() != 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getSearchedDrugs($drug){
                 $val = urldecode($drug);
                 $this->db->like('nom',$val);
        $query = $this->db->get('drugs');
        if($query->num_rows() != 0){
            return $query->result();
        }else{
            return false;
        }
    }


     function createDrugs(){
      $code = $this->input->post('code');
     	$nom = $this->input->post('nom');
     	$categorie = $this->input->post('categorie');
     	$pa = $this->input->post('pa');
     	$pv = $this->input->post('pv');
     	$prixmfp = $this->input->post('prixmfp');
     	$percentmfp = $this->input->post('percentmfp');
      $unit = $this->input->post('unity');
      $uqty = $this->input->post('uqty');
        $alertQuantity = $this->input->post('alertqte');
     	$data = array(
              'code'   => $code,
              'nom'   => $nom,
              'pa'  => $pa,
              'pv' => $pv,
              'prixmfp' => $prixmfp,
              'percentmfp' => $percentmfp,
              'unity'      => $unit,
              'qty'       => $uqty,
              'alertQuantity' => $alertQuantity,
              'drugs_category_iddrugs_category'  => $categorie
               
     	);

     	         $this->db->where('code', $code);
     	$query = $this->db->get('drugs');
     	if($query->num_rows() != 0){
     		return 3;
     	}else{
     		if($this->db->insert('drugs', $data)){
     		  return 1;
         	}else{
     		  return 2;
     	    }
     	}     	
     }


     function updateDrugs(){
        $code = $this->input->post('code');
        $nom = $this->input->post('nom');
        $categorie = $this->input->post('categorie');
        $pa = $this->input->post('pa');
        $pv = $this->input->post('pv');
        $prixmfp = $this->input->post('prixmfp');
        $percentmfp = $this->input->post('percentmfp');
        $unit = $this->input->post('unity');
        $uqty = $this->input->post('uqty');
        $alertQuantity = $this->input->post('alertqte');
        $data = array(
              'nom'   => $nom,
              'pa'  => $pa,
              'pv' => $pv,
              'prixmfp' => $prixmfp,
              'percentmfp' => $percentmfp,
              'unity'       => $unit,
              'qty'       => $uqty,
              'alertQuantity' => $alertQuantity,
              'drugs_category_iddrugs_category'  => $categorie
               
        );

           $this->db->where('code', $code);
        if($this->db->update('drugs', $data)){
            return true;
        }else{
            return false;
        }
     }

       public function getInsurances(){
                 $this->db->where('type', 1);
                 $this->db->order_by('code','desc');
        $query = $this->db->get('assurance');
        if($query->num_rows() != 0){
            return $query->result();
        }else{
            return false;
        }
    }


     function createInsurances(){
        $code = $this->input->post('code');
        $nom = $this->input->post('nom');
        $data = array(
              'code'  => $code,
              'nom'   => $nom,
              'type'  => 1
        );

                 $this->db->where('code', $code);
        $query = $this->db->get('assurance');
        if($query->num_rows() != 0){
            return 3;
        }else{
            if($this->db->insert('assurance', $data)){
              return 1;
            }else{
              return 2;
            }
        }       
     }

      function updateInsurances(){
        $code = $this->input->post('code');
        $nom = $this->input->post('nom');
        $data = array(
              // 'code'   => $code,
              'nom' => $nom
        );
           $this->db->where('code', $code);
        if($this->db->update('assurance', $data)){
            return true;
        }else{
            return false;
        }
     }
     function deleteInsurances(){
           $code = $this->input->post('code');
           $this->db->where('code', $code);
        if($this->db->delete('assurance')){
            return true;
        }else{
            return false;
        }
     }

     public function getCaisses(){
                 $this->db->order_by('code','desc');
        $query = $this->db->get('caisses');
        if($query->num_rows() != 0){
            return $query->result();
        }else{
            return false;
        }
    }

     function createCaisses(){
        $code = $this->input->post('code');
        $nom = $this->input->post('nom');
        $user = $this->input->post('user');
        $data = array(
              'code'  => $code,
              'nom'   => $nom,
              'idusers'  => $user
        );

                 $this->db->where('code', $code);
        $query = $this->db->get('caisses');
        if($query->num_rows() != 0){
            return 3;
        }else{
            if($this->db->insert('caisses', $data)){
              return 1;
            }else{
              return 2;
            }
        }       
     }

     function updateCaisses(){
        $code = $this->input->post('code');
        $nom = $this->input->post('nom');
        $user = $this->input->post('user');
        $data = array(
              'nom' => $nom,
              'idusers' => $user
        );
           $this->db->where('code', $code);
        if($this->db->update('caisses', $data)){
            return true;
        }else{
            return false;
        }
     }

     function deleteCaisses(){
           $code = $this->input->post('code');
           $this->db->where('code', $code);
        if($this->db->delete('caisses')){
            return true;
        }else{
            return false;
        }
     }

     public function getFournisseurs(){
                 $this->db->where('type', 1);
                 $this->db->order_by('code','desc');
        $query = $this->db->get('fournisseur');
        if($query->num_rows() != 0){
            return $query->result();
        }else{
            return false;
        }
    }


     function createFournisseurs(){
        $code = $this->input->post('code');
        $nom = $this->input->post('nom');
        $phone = $this->input->post('phone');
        $adresse = $this->input->post('adresse');
        $data = array(
              'code'  => $code,
              'nom'   => $nom,
              'phone'  => $phone,
              'adresse' => $adresse,
               'type'   => 1
        );

                 $this->db->where('code', $code);
        $query = $this->db->get('fournisseur');
        if($query->num_rows() != 0){
            return 3;
        }else{
            if($this->db->insert('fournisseur', $data)){
              return 1;
            }else{
              return 2;
            }
        }       
     }

     function updateFournisseurs(){
        $code = $this->input->post('code');
        $nom = $this->input->post('nom');
        $phone = $this->input->post('phone');
        $adresse = $this->input->post('adresse');
        $data = array(
              'nom' => $nom,
              'phone' => $phone,
              'adresse' => $adresse
        );
           $this->db->where('code', $code);
        if($this->db->update('fournisseur', $data)){
            return true;
        }else{
            return false;
        }
     }

     function deleteFournisseurs(){
           $code = $this->input->post('code');
           $this->db->where('code', $code);
        if($this->db->delete('fournisseur')){
            return true;
        }else{
            return false;
        }
     }


     public function getDepenses(){
                 $this->db->order_by('iddepenses','desc');
        $query = $this->db->get('depenses');
        if($query->num_rows() != 0){
            return $query->result();
        }else{
            return false;
        }
    }


     function createDepenses($user){
        $code = $this->input->post('code');
        $date = $this->input->post('date');
        $description = $this->input->post('description');
        $montant = $this->input->post('montant');
        $data = array(
              'code' => $code,
              'date' => $date,
              'description' => $description,
              'montant' => $montant,
              'iduser'  => $user,
              'lastuser' => ''
        );
                 $this->db->where('code', $code);
        $query = $this->db->get('depenses');
        if($query->num_rows() != 0){
            return 3;
        }else{
            if($this->db->insert('depenses', $data)){
              return 1;
            }else{
              return 2;
            }
        }       
     }

      function updateDepenses($user){
        $code = $this->input->post('code');
        $date = $this->input->post('date');
        $description = $this->input->post('description');
        $montant = $this->input->post('montant');
        $data = array(
              'code' => $code,
              'date' => $date,
              'description' => $description,
              'montant' => $montant,
              'lastuser' => $user
        );
           $this->db->where('code', $code);
        if($this->db->update('depenses', $data)){
            return true;
        }else{
            return false;
        }
     }
     function deleteDepenses(){
           $code = $this->input->post('code');
           $this->db->where('code', $code);
        if($this->db->delete('depenses')){
            return true;
        }else{
            return false;
        }
     }


















     function createUsers(){
      $code = $this->input->post('code');
      $nom = $this->input->post('nom');
      $username = $this->input->post('username');
      $phone = $this->input->post('phone');
      $profil = $this->input->post('profil');
      $data = array(
              'code'  => $code,
              'nom'   => $nom,
              'username' => $username,
              'password'   => md5('ipharma'),
              'phone'   => $phone,
              'droit'   => $profil,
              'super'   => 0

      );

                $this->db->select('*');
                 $this->db->where("(code = '$code' OR username = '$username')");
        $query = $this->db->get('users');
      if($query->num_rows() != 0){
        return 3;
      }else{
        if($this->db->insert('users', $data)){
          return 1;
          }else{
          return 2;
          }
      }       
     }

     function updateUsers(){
      $code = $this->input->post('code');
      $nom = $this->input->post('nom');
      $username = $this->input->post('username');
      $phone = $this->input->post('phone');
      $profil = $this->input->post('profil');
      $data = array(
              'nom'   => $nom,
              'username' => $username,
              'phone'   => $phone,
              'droit'   => $profil,

      );
        $this->db->where('code !=', $code);
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if($query->num_rows() != 0){
          return 3;
        }else{
          if(!$this->session->userdata('isSuper')){
             $this->db->where('super 0', 0);
          }
           $this->db->where('code', $code);
        if($this->db->update('users', $data)){
            return 1;
        }else{
            return 2;
        }
        }
            

           


     }

     function deleteUsers(){
           $code = $this->input->post('code');
           $this->db->where('code', $code);
        if($this->db->delete('users')){
            return true;
        }else{
            return false;
        }
     }
   
      function get_descriptions(){
        $query = $this->db->get('libelle');
        if($query->num_rows() != 0){
          return $query->result();
        }else{
          return false;
        }
      }

      function createDescription(){
        $code = $this->input->post('code');
        $libelle = $this->input->post('libelle');
        $valeur = $this->input->post('valeur');
        $type = $this->input->post('type');
        $data = array(
              'code'   => $code,
              'libelle' => $libelle,
              'valeur'   => $valeur,
              'type'   => $type
        );

                 $this->db->where('code', $code);
        $query = $this->db->get('libelle');
        if($query->num_rows() != 0){
            return 3;
        }else{
            if($this->db->insert('libelle', $data)){
              return 1;
            }else{
              return 2;
            }
        }       
     }

      function updateDescription(){
        $code = $this->input->post('code');
        $libelle = $this->input->post('libelle');
        $valeur = $this->input->post('valeur');
        $type = $this->input->post('type');
        $data = array(
              'libelle' => $libelle,
              'valeur'   => $valeur,
              'type'   => $type
        );
           $this->db->where('code', $code);
        if($this->db->update('libelle', $data)){
            return true;
        }else{
            return false;
        }
     }
     function deleteDescription(){
           $code = $this->input->post('code');
           $this->db->where('code', $code);
        if($this->db->delete('assurance')){
            return true;
        }else{
            return false;
        }
     }


     function resetUsers(){
         $code = $this->input->post('code');
         $data['password'] = md5('ipharma');
         $this->db->where('code', $code);
         if($this->db->update('users', $data)){
            return true;
         }else{
            return false;
         }
     }

      
     public function getInsurancesTarifForVente(){
        $query = $this->db->get('categorie_assurance');
        if($query->num_rows() != 0){
            return $query->result();
        }else{
            return false;
        }
    }

     public function getInsurancesTarif(){
                 // $this->db->order_by('code','desc');
                 $this->db->where('type', 1);
        $query = $this->db->get('categorie_assurance');
        if($query->num_rows() != 0){
            return $query->result();
        }else{
            return false;
        }
    }


     function createInsurancesTarif(){
        $code = $this->input->post('code');
        $nom = $this->input->post('nom');
         $perc = $this->input->post('perc');
        $data = array(
              'code'  => $code,
              'nom'   => $nom,
              'percent'  => $perc,
              'type'    => 1
        );

                 $this->db->where('code', $code);
        $query = $this->db->get('categorie_assurance');
        if($query->num_rows() != 0){
            return 3;
        }else{
            if($this->db->insert('categorie_assurance', $data)){
              return 1;
            }else{
              return 2;
            }
        }       
     }

      function updateInsurancesTarif(){
        $code = $this->input->post('code');
        $nom = $this->input->post('nom');
        $perc = $this->input->post('perc');
        $data = array(
              // 'code'   => $code,
              'nom'     => $nom,
              'percent' => $perc
        );
           $this->db->where('code', $code);
        if($this->db->update('categorie_assurance', $data)){
            return true;
        }else{
            return false;
        }
     }
     function deleteInsurancesTarif(){
           $code = $this->input->post('code');
           $this->db->where('code', $code);
        if($this->db->delete('categorie_assurance')){
            return true;
        }else{
            return false;
        }
     }


  

 


















}