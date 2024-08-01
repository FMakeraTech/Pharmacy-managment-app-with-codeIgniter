<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supply extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('loggedin')){
            redirect('users');
         }
          
    }
    
	public function index()
	{
        $data = array();
        $result2 = $this->supply_model->get_commandes();
        $result = $this->supply_model->get_supplyDrugs();
        $validateEntries = $this->supply_model->get_nonValidatedEntries();
            if($result){
                $data['supplyDrugs'] = $result;
            }
            if($result2){
                $data['commandes'] = $result2;
            }
            if($validateEntries){
                $data['valideEntry'] = $validateEntries;
            }
		$this->load->view('supply/home', $data);
	}

    public function openDrugsSearchPage(){
        $this->load->view('supply/drugsSearchPage');
    }

    public function commandePopup(){
        $result = $this->supply_model->get_fournisseur();
        $data = array();
        if($result){
            $data['fournisseur'] = $result; 
        }
        $this->load->view('supply/commandePopup', $data);
    }

    public function commanderDrug($date="", $fournisseur=""){
       if(!empty($date) and !empty($fournisseur)){
        $iduser = $this->session->userdata('user_id');
           if($this->supply_model->insertCommandeDrug($date, $fournisseur, $iduser)){
               redirect('supply');
            }
       }
    }

    public function openSupplyBon($idcommande){
        $data = array();
        $result2 = $this->supply_model->openSupplyBon($idcommande);
        if($result2){
                $data['supplyCommande'] = $result2;
                $data['numeroBon'] = $idcommande;
            }
        $this->load->view('supply/openSupplyBon', $data);
    }

    /*public function commandeUpdate($id){
        if($this->supply_model->updateCommande($id)){
            redirect('supply');
        }else{
            echo "<h2>Error 108 </h2>";
        }
    }*/

    public function commandeClose($id){
        if($this->supply_model->closeCommande($id)){
            redirect('supply');
        }else{
            echo "<h2>Error 108 </h2>";
        }
    }


    public function openSearchClosedCommandePopup(){
        $this->load->view('supply/openSearchClosedCommandePopup');
    }

    public function getSearchedNumberOfCommande($num=""){
        if(!empty($num)){
            $result = $this->supply_model->openSupplyBon($num);
            if($result){
               $data['supplyCommande'] = $result; 
               $data['numeroBon'] = $num;
               $this->load->view('supply/specificBon', $data);
            }else{
                echo "<center>Numero non trouvé</center>";
            }
            
        }
    }


    public function getSearchedCommandeListByState($state="", $debut="",$fin=""){
        if($state != ""){
          $result2 = $this->supply_model->get_searchedCommandeListByState($state, $debut, $fin);  
          if($result2){
                $data['commandes'] = $result2;
                $this->load->view('supply/searchedCommandeListByState', $data);
            }else{
                echo "<center>Aucune information trouvée.</center>";
            }
        }
       
    }


    public function validateCommande($idcommande){
        $data = array();
        $result2 = $this->supply_model->openSupplyBon($idcommande);
        if($result2){
                $data['supplyCommande'] = $result2;
                $data['numeroBon'] = $idcommande;
            }
        $this->load->view('supply/validateCommande', $data);
    }

    public function printValidatedCommande($idcommandes){
        $data = array();
        $result2 = $this->supply_model->openSupplyBon($idcommandes);
        if($result2){
                $data['supplyCommande'] = $result2;
                $data['numeroBon'] = $idcommandes;
            }
        $this->load->view('supply/validateCommande', $data);
    }

    public function validateOneCommande($id,$idcommandes){
        $pa_total = $this->input->post('paTotal');
        $iduser = $this->session->userdata('user_id');
      if($this->supply_model->updateOneCommande($id, $iduser, $pa_total)){
           redirect('supply/printValidatedCommande/'.$idcommandes);
       }
    }


    public function cancelNonValidatedCommande(){
        $res = $this->supply_model->get_validatedCommandes();
        $i = 0;
        foreach($res as $r){
            $idco = $r->idcommandes;
            if($this->supply_model->cancelNonValidatedCommande($idco)){
                $i ++;
            }
        }

        if($i == 1){
           $this->session->set_flashdata('success', $i.' entrée a été supprimée.'); 
        }else if($i > 1){
            $this->session->set_flashdata('success', $i.' entrées ont été supprimées.');
        }
        
        redirect('supply');
    }











}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */