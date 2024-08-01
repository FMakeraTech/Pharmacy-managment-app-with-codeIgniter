<!DOCTYPE html>
<html lang="en">
<head>
   <title>IPharma</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <style>
    body{
      font-size:18px;
      font-family: calibri;
    }
  </style>
   </head>
<body>





<div id="print-me">
<?php if(isset($insuranceInvoice)):?>
  <?php
       $idass = $this->insurance_model->get_spect_factureass($insuranceInvoice,'assurance_idassurance');
       $dateass = $this->insurance_model->get_spect_factureass($insuranceInvoice,'date');
       $client = $this->facturation_model->get_spec_assura($idass,'nom');

       setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
        $dat = ucfirst(strftime("%A, le %d /%m/ %Y", strtotime($dateass))); 

  ?>
  
  <table style="width: 100%">
  	<tr>
  		<td style="text-align: left; font-size: 20px;">
  			<?php $res = $this->insurance_model->get_libelle_entete();?>
  			<?php if($res):?>
  	<?php foreach($res as $re):?>
	<span><?php echo $re->libelle;?> :</span>
	<span><?php echo $re->valeur;?></span><br>
   <?php endforeach;?>
    <?php endif;?>
  		</td>
  		<td style="text-align: right">
  			<?php echo $dat;?>
  		</td>
  	</tr>
  </table>
  


	<span>----------------</span><p></p>
	<span>Client : <?php echo $client;?></span><br>
	<center style="margin-top: 70px;"><span style="font-size: 18px; font-weight: bold;">Facture numero : <?php echo $insuranceInvoice;?></span></center>
	<hr>
<?php endif;?>


<?php if(isset($insuranceDetails)):?>
	<div style="text-align: center;">
	<center>
	<table>
		<tr>
		 	<th style="text-align:left; font-size: 14px;"></th>
		 	<th style="text-align:left; padding-left:25px; font-size: 14px;">Date</th>
		 	<th style="text-align:left; padding-left:25px; font-size: 14px;">Facture</th>
		 	<th style="text-align:left; padding-left:25px; font-size: 14px; max-width: 250px;">Medicament</th>
		 	<th style="text-align:left; padding-left:25px; font-size: 14px;">Montant</th>
		 	<th style="text-align:left; padding-left:25px; font-size: 14px;">Patient</th>
		 	<th style="text-align:left; padding-left:25px; font-size: 14px;">Bon/Carte</th>
		 </tr>
		 <?php $i = 1; $tot = 0;?>
		 <?php foreach($insuranceDetails as $ins):?>
		 <?php
		 $insuranceId = $ins->idassurance;
		  $assurance =  $this->facturation_model->get_spec_assura( $insuranceId,'nom'); //Assurance
          $facture = $this->facturation_model->get_spec_factclientdrugs($ins->idfacture_clientdrugs,'idfacture_client'); // Facture
          $date = $this->facturation_model->get_spec_fact($facture,'date'); //Date
          $patient = $this->facturation_model->get_spec_fact($facture,'nom'); //Patient
          $bon = $this->facturation_model->get_spec_fact($facture,'bon'); //Bon
          $idmed = $this->facturation_model->get_spec_factclientdrugs($ins->idfacture_clientdrugs,'iddrugs');
          $medicament = $this->facturation_model->get_spec_med($idmed,'nom'); // Medicament

          $qte = $this->facturation_model->get_spec_factclientdrugs($ins->idfacture_clientdrugs,'quantite');
          $pv = $this->facturation_model->get_spec_factclientdrugs($ins->idfacture_clientdrugs,'pv');
          $idcat = $this->facturation_model->get_spec_factclientdrugs($ins->idfacture_clientdrugs,'idcategorie_assurance');
          $cat = $this->facturation_model->get_spec_cate($idcat,'percent');
          $mot = $qte * $pv;
          $motAssure = ($mot*$cat)/100;

          $tot += $motAssure;
          $dateP = ucfirst(strftime("%d /%m/ %Y", strtotime($date)));
		 ?>
		 <tr>
		 	<td style="font-size: 14px;"><?php echo $i;?></td>
		 	<td style="padding-left:25px; font-size: 14px;"><?php echo $dateP;?></td>
		 	<td style="padding-left:25px; font-size: 14px;"><?php echo $facture;?></td>
		 	<td style="padding-left:25px; font-size: 14px; max-width: 250px;"><?php echo $medicament;?></td>
		 	<td style="padding-left:25px; font-size: 14px;"><?php echo number_format($motAssure,2);?> (<?php echo $cat;?> %)</td>
		 	<td style="padding-left:25px; font-size: 14px;"><?php echo $patient;?></td>
		 	<td style="padding-left:25px; font-size: 14px;"><?php echo $bon;?></td>
		 </tr>
		 <?php $i++;?>
		<?php endforeach;?>
		<tr>
			<td colspan="7">
				<hr>
			</td>
		</tr>
		<tr>
			<td style="font-size: 14px;"></td>
			<td style="padding-left:25px; font-size: 14px; font-weight: bold;" colspan="3" >Total:</td>
			<td style="padding-left:25px; font-size: 14px; font-weight: bold;"><?php echo number_format($tot,2);?></td>
		</tr>
	</table>
</center>
</div>
<div style="text-align: right; margin-right: 70px; margin-top: 50px;">
  <?php $res2 = $this->insurance_model->get_libelle_pied();?>
  <?php if($res2):?>
  	<table style="width:100%; text-align: right;">
  		<tr>
  	<?php foreach($res2 as $re2):?>
       <td style="text-align: right;">
       	  <span><?php echo $re2->libelle;?></span> <br>
	<span style="font-weight: bold;"><?php echo $re2->valeur;?></span>
       </td>
   <?php endforeach;?>
    </tr>
   </table>
    <?php endif;?>
</div>
</div>
<footer>
		<center><button type="button" onclick="printInsuranceInvoice();" >Imprimer la facture</button></center>
</footer>
<?php endif;?>



<script>
	function printInsuranceInvoice(){
		var zone = document.getElementById('print-me').innerHTML;
		var fen = this.window;
		fen.document.body.innerHTML = zone;
	    fen.print();

	}


</script>
	
</body>
</html>