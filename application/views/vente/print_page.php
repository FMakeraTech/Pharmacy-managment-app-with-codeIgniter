<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ipharma</title>
  <style>
    body{
      width: 100%;
    }
  </style>
</head>
<body>
  <?php if(isset($donnees_facture)):?>
  <?php
    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
   $datFact = ucfirst(strftime("le %d /%m/ %Y", strtotime($dateFacture)));

   $nomClient = $this->facturation_model->get_spec_fact($numeroFacture, 'nom');
   if(!empty($nomClient) and $nomClient != null){
    $client = $nomClient;
   }else{
    $client = "";
   }
  ?>
  <table style="width: 100%;">
    <tr>
      <td colspan="2" style="font-size:13px; text-align: center;padding:0">Facture</td>

    </tr>
  </table>
  <span>Client:<?php echo $client;?> </span> <hr>
  <table style="width: 100%;">
    <tr>
      <td style="font-size:8px; text-align: left;padding:0">Numero: <?php echo $numeroFacture;?></td>
      <td style="font-size:8px; text-align: right;">DF: <?php echo $datFact;?></td>
    </tr>
  </table>
  <span>-------</span> <br>
  <table style="width:100%; font-size: 9px;">
  <tr>
      <th style="padding:0">Med</th>
      <th style="padding:0">Qté</th>
      <th style="padding:0">PU</th>
      <th style="padding:0">PT</th>
  </tr>
  <tr>
    <th colspan="4"><hr></th>
  </tr>
    <?php $montant_total_apaye = 0; $mt = 0; $mta = 0;?>
    <?php foreach($donnees_facture as $df):?>
    <?php $med = $this->facturation_model->get_spec_med($df->iddrugs,'nom');?>
    <?php $assura = $this->facturation_model->get_spec_assura($df->idassurance,'nom');?>
    <?php $cate = $this->facturation_model->get_spec_cate($df->idcategorie_assurance,'percent');?>
    <?php $qte = $df->quantite;?>
    <?php $pv = $df->pv;?>

     <?php $nom = $this->facturation_model->get_spec_fact($df->idfacture_client,'nom');?>
     <?php $bon = $this->facturation_model->get_spec_fact($df->idfacture_client,'bon');?>
     <?php $montant = $df->quantite * $df->pv;?>
     <?php $mt += $montant;?>
     <?php $montant_assurance = ($montant * $cate)/100;?>
     <?php $mta += $montant_assurance;?>
     <?php $montant_apaye = $montant - $montant_assurance;?>
     <?php $montant_total_apaye += $montant_apaye;?>
     <?php $nume = $df->idfacture_client; ?>
     <tr>
      <td style="border-bottom:0.5px solid #eee; padding:0; font-size: 8px;"><?php echo $med;?></td>
      <td style="border-bottom:0.5px solid #eee; padding:0; font-size: 8px;"><?php echo $df->quantite;?></td>
      <td style="border-bottom:0.5px solid #eee; padding:0; font-size: 8px;"><?php echo $df->pv;?></td>
      <td style="border-bottom:0.5px solid #eee; padding:0; font-size: 8px;"><?php echo $montant;?></td>
     </tr>
     <?php endforeach;?>
     <tr>
       <td colspan="4">------------------------------</td>
     </tr>
     <tr>
       <td colspan="3" style="font-weight:bold; padding:0; font-size: 8px;">Total</td>
       <td style="font-weight:bold; padding:0; font-size: 8px;"><?php echo $mt;?></td>
     </tr>
   </table>
   <span style="text-align: center;">------------------</span>
<br>
<table style="width: 100%;">
   <tr>
    <td style="padding:0; font-size: 9px;">Assureur </td>
    <td style="padding:0; font-size: 9px;"> : <?php echo $mta;?></td>
    <td style="padding:0; font-size: 9px;">Patient</td>
    <td style="padding:0; font-size: 9px;">: <?php echo $montant_total_apaye;?></td>
  </tr>
</table>
<span style="text-align: center">
  <hr>
</span> <br>
<table style="width: 100%; font-size: 8px;">
  <tr>
    <td>
      <span style="font-style: italic;">Utilisateur: </span>
      <span><?php echo $this->session->userdata('nom');?></span>
    </td>
    <td style="text-align: right;">
       Date Imp: le <?php echo date('d-m-Y');?>
    </td>
  </tr>
</table>


  <?php endif;?>
</body>
</html>








