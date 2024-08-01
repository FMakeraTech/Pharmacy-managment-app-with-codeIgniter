<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {


 public function get_spec_user($id, $n){
  $this->db->where('idusers', $id);
  $query = $this->db->get('users');
  if($query->num_rows() != 0){
   return $query->row(0)->$n;
 }else{
   return "";
 }
}


function log_in($user,$pass){
  $enc_password = md5($pass);
  $this->db->where('username',$user);
  $this->db->where('password',$enc_password);
  $result = $this->db->get('users');
  if($result->num_rows() == 1){ 	
    return $result;
  }
  else
  {
    return false;
  }
}


function get_users(){
      // $code = $this->session->userdata('code_user');
        // $this->db->where('code !=', $code);
  $result = $this->db->get('users');
  if($result->num_rows() != 0){  
    return $result->result();
  }
}

function getUsers(){
          if(!$this->session->userdata('isSuper')){
             $this->db->where('super', 0);
          }    
  $this->db->order_by('code','desc');
  $result = $this->db->get('users');
  if($result->num_rows() != 0){  
    return $result->result();
  }
}

function get_profiles(){
  $result = $this->db->get('profiles');
  if($result->num_rows() != 0){  
    return $result->result();
  }
}

public function get_spec_profil($id, $n){
  $this->db->where('idprofiles', $id);
  $query = $this->db->get('profiles');
  if($query->num_rows() != 0){
    return $query->row(0)->$n;
  }else{
    return "";
  }
}


public function updatePassword($iduser){
 $old = md5($this->input->post('old'));
 $new1 = md5($this->input->post('new1'));
 $new2 = md5($this->input->post('new2'));

 $data['password'] = $new1;

 if($new1 == $new2){
   $this->db->where('idusers', $iduser);
   $this->db->where('password', $old);
   $query = $this->db->get('users');
   if($query->num_rows() != 0){
     $this->db->where('idusers', $iduser);
     if($this->db->update('users', $data)){
       return 1;
     }else{
      return false;
    }
  }
  else{
    return 2;
  }
}else{
  return 3;
}
}

function test_application(){
 $query = $this->db->get('application');
 if($query->num_rows() != 0){
  return $query->row(0)->version;
}else{
  return false;
}
}

function initialiseDb(){
 if($this->db->query(" TRUNCATE depenses")
  and $this->db->query(" TRUNCATE stock")
  and $this->db->query(" TRUNCATE historique_stock")
  and $this->db->query(" TRUNCATE sorties_perime")
  and $this->db->query(" TRUNCATE facture_clientdrugs")
  and $this->db->query(" TRUNCATE facture_assuranceclient")
  and $this->db->query(" TRUNCATE encaissement")
  and $this->db->query(" TRUNCATE depenses")
  and $this->db->query(" TRUNCATE encaissement")
  and $this->db->query(" TRUNCATE facture_assurance")
  and $this->db->query(" TRUNCATE encaissement_assurance")
  and $this->db->query(" TRUNCATE commande_drugs")
  and $this->db->query(" TRUNCATE commandes")
  and $this->db->query(" TRUNCATE caisses")
  and $this->db->query(" TRUNCATE libelle")
  and $this->db->query(" TRUNCATE application")
  and $this->db->query(" TRUNCATE categorie_assurance")
){
   $this->db->where('idfournisseur !=', 0);
 $this->db->delete('fournisseur');
 $this->db->where('iddrugs !=', 0);
 $this->db->delete('drugs');
 $this->db->where('iddrugs_category !=', 0);
 $this->db->delete('drugs_category');
 return true; 
} else
return false;
}

function initialiseInvoice(){
 if($this->db->query(" TRUNCATE facture_client")){
   return true;
 }else{
  return false;
}
}

function initialiseInsurars(){
 $this->db->where('idassurance >', 0);
 if($this->db->delete('assurance')){
  $data = array(
   'code'    => 'ass.00',
   'nom'     => 'CASH',
   'type'    => 0
 );

  $data_tar = array(
   'code'    => 'tar.00',
   'nom'     => '0%',
   'percent'    => 0,
   'type'       => 0
 );

$data_fourn = array(
   'code'    => 'four.00',
   'nom'     => 'Default',
   'phone'   => '000000',
   'adresse' => '000000',
   'type'    => 0
 );

$data_drugCat = array(
   'code'    => 'cat.00',
   'nom'     => 'Default',
   'place'   => 'ET0',
   'type'    => 0
 );


  if($this->db->insert('assurance', $data)){
    if($this->db->insert('categorie_assurance', $data_tar)){
       if($this->db->insert('fournisseur', $data_fourn)){
        if($this->db->insert('drugs_category', $data_drugCat)){
          return true;
        }
      }
    }else{
      return false;
    }
  }else{
    return false;
  }
}
}

function initialiseUser(){
 $this->db->where('super', 0);
 if($this->db->delete('users')){
  return true;
}else{
  return false;
}
}


function setApplication(){
   $this->db->where('id >', 0);
 if($this->db->delete('application')){
   return true;
 }else{
  return false;
 }
}

function setTestVersion(){
  $data['version'] = 1;
  $query = $this->db->get('application');
  if($query->num_rows() != 0){
   $this->db->where('id', 1);
   if($this->db->update('application', $data)){
    return true;
  }else{
    return false;
  }
}else{
  if($this->db->insert('application', $data)){
    return true;
  }else{
    return false;
  }
}


}








}