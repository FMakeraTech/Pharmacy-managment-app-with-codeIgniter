<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  if(!$this->session->userdata('loggedin')){
    redirect('users');
  }
   
}

public function index(){
  $data = array();
  $result2 = $this->stock_model->get_medicaments();
  $result  = $this->stock_model->get_stockEnAttente();
  if($result){
   $data['loadingStock'] = $result;
 }
 if($result2){
  $data['medicament'] = $result2; 
}

$this->load->view('stock/home', $data);
}

public function supplyStock(){
  $this->form_validation->set_rules('drugs','drugs','trim|required');
  $this->form_validation->set_rules('qte','qte','trim|required');
  $this->form_validation->set_rules('date','date','trim|required');
  if($this->form_validation->run() == false){
    $this->session->set_flashdata('error1','Veuillez renseigner tous les champs.');
    redirect('stock');
  }else{
    $iduser = $this->session->userdata('user_id');
    if($this->stock_model->supplyStock($iduser)){
      $this->session->set_flashdata('success1','Approvisionnement avec succès');
      redirect('stock');
    }
  }
}

public function stockPopupPage(){
 $data = array();
 $result = $this->statistic_model->get_drugsCategory();
 if($result){
   $data['categories'] = $result;
 }
 $this->load->view('stock/stockPopupPage', $data);
}


public function getStockState($state="", $category=""){
  $data = array();
  if(!empty($state) and !empty($category)){
   $result  = $this->stock_model->get_stockState($state);
   if($result){
     $data['stockState'] = $result;
     if($category != 'all'){
       $data['drugsCategory'] = $category;
     }
     if($state == 1){
       $data['perime'] = true;
     }else{
      $data['perime'] = false;
    }
    $this->load->view('stock/stockState', $data);
  }else{
   echo "Aucune information trouvée";
 }
}
}

public function deleteOneStockState($id="",$state="", $category=""){
  $data = array();
  if(!empty($state) and !empty($category)){
    $iduser = $this->session->userdata('user_id');
   if($this->stock_model->deleteOneStockState($id, $iduser))
   {
    $result  = $this->stock_model->get_stockState($state);
    if($result){
      $data['stockState'] = $result;
      if($category != 'all'){
       $data['drugsCategory'] = $category;
     }
     if($state == 1){
       $data['perime'] = true;
     }else{
      $data['perime'] = false;
    }
    $this->load->view('stock/stockState', $data);
  }else{
    echo "Aucune information trouvée";
  }
}else{
  echo "Erreur";
}
}
}


public function getOneStockState($drug=""){
  $data = array();
  if(!empty($drug)){
    $result  = $this->stock_model->get_oneStockState($drug);
    if($result){
      $data['OnestockState'] = $result;
      $this->load->view('stock/stockState', $data);
    }else{
      echo "Aucune information trouvée";
    }
  }
}

public function validateLoadStockPage($id=""){
 if(!empty($id)){
  $data['idstock'] = $id;
  $this->load->view('stock/validateLoadStockPage', $data);
}
}

public function validateLoadStock($id="",$date=""){
 if(!empty($id) and !empty($date)){
   $res = $this->stock_model->validateLoadStock($id,$date);
  if($res == 1){
   $this->session->set_flashdata('success','Approvisionnement fait avec succès.');
  }
  else if($res == 2){
   $this->session->set_flashdata('error','La quantité actuelle est périmée');
  }else if($res == 3){
   $this->session->set_flashdata('error','La date de peremption est déjà dépassé');
  }
  else{
    $this->session->set_flashdata('error','Erreur');
  }
  redirect('stock');
 }
}

public function getDateAndQty($id=""){
 if(!empty($id)){
   $res = $this->stock_model->get_stockById($id);
   if($res){
    foreach($res as $re){
      $qte1 = $re->Quantite1;
      $qte2 = $re->Quantite2;
      $date = $re->dateExpiration1;
    }
    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
    $dat = strftime("%d %B %Y", strtotime($date));
    echo "| Quantité : <b>$qte1</b> --- En attente: <b>$qte2</b> ----- Date de peremption : <b>$dat</b>";
  }
}
}


public function printFiche($iddrug){
     $this->load->helper('pdf_helper');
    /*
        ---- ---- ---- ---- 
        your code here*/
        $result = $this->stock_model->getDrugStory($iddrug);
        $data['drugStory'] = $result;
        $data['drug'] = $iddrug;
     /*
        ---- ---- ---- ----
    */
        $this->load->view('stock/pdfDrugStory', $data);
}


public function updatePrice($iddrug=""){
  $data = array();
  $res = $this->stock_model->get_oneDrug($iddrug);
  if($res){
    $data['drug'] = $res;
  }
  $this->load->view('stock/updateprice',$data);
}


public function setNewPrice(){
  $this->form_validation->set_rules('drug','drug','trim|required');
  $this->form_validation->set_rules('pv','pv','trim|required');
  $this->form_validation->set_rules('piece','piece','trim|required');

  $iddrug = $this->input->post('drug');
  if($this->form_validation->run() == false){
    $this->session->set_flashdata('error','Veuillez remplir tous les champs SVP!');
  }else{
     if($this->stock_model->setNewPrice()){
       $this->session->set_flashdata('success','Le prix a été défini avec succès.');
     }else{
       $this->session->set_flashdata('error','Erreur inconnu. le prix n a pas été dénifi.');
     }
  }
   redirect('stock/updatePrice/'.$iddrug);
}

















}