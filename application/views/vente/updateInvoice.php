<?php if(isset($num_fact)):?>
	<?php 
	   // $nume2 = $di->idfacture_client;
	   $nomF = $this->facturation_model->get_spec_fact($num_fact,'nom');
	   $bonF = $this->facturation_model->get_spec_fact($num_fact,'bon');
	   $statuF = $this->facturation_model->get_spec_fact($num_fact,'statut');
	  
              if($statuF == 1){
                $statutF = "Fermé";
              }else{
               $statutF = "Ouvert";
              }
       ?>

 <h6 style="color: #ebb734">Modifier la facture</h6>
	<form method="post" action="<?php echo site_url('facturation/update_invoice');?>">
<table>
	<tr>
			<th style="min-width: 200px; font-size: 11px; text-align: left">Medicament</th>
			<th style=" padding-left: 15px; font-size: 11px; text-align: left">Qté</th>
			<th style="padding-left: 15px;  font-size: 11px; text-align: left">Prix</th>
			<th style="padding-left: 15px;  font-size: 11px; text-align: left">Assurance</th>
			<th style="padding-left: 15px; font-size: 11px; text-align: left">A payer</th>
			<th style="padding:0; font-size: 10px; text-align: left"></th>
		</tr>
		<?php if(isset($drugs_invoiceToUpdate)):?>
		<?php $montant_total = 0; $montant_total_apaye = 0;?>
		<?php foreach($drugs_invoiceToUpdate as $dtup):?>
			<?php $nume = $dtup->idfacture_client;?>
			<?php $numeClientDrugs = $dtup->idfacture_clientDrugs;?>
			<?php $nom = $this->facturation_model->get_spec_fact($dtup->idfacture_client,'nom');?>
		 <?php $bon = $this->facturation_model->get_spec_fact($dtup->idfacture_client,'bon');?>
       <?php $stat = $this->facturation_model->get_spec_fact($dtup->idfacture_client,'statut');?>
		 <?php $med = $this->facturation_model->get_spec_med($dtup->iddrugs,'nom');?>
		 <?php $assura = $this->facturation_model->get_spec_assura($dtup->idassurance,'nom');?>
		 <?php $cate = $this->facturation_model->get_spec_cate($dtup->idcategorie_assurance,'percent');?>
		 <?php $montant = $dtup->quantite * $dtup->pv;?>
		 <?php $montant_assurance = ($montant * $cate)/100;?>
		 <?php $montant_apaye = $montant - $montant_assurance;?>
		 <?php $montant_total += $montant;?>
		 <?php $montant_total_apaye += $montant_apaye;?>
		 
		 <tr>
		 	<td style="padding:0;  font-size:11px;"><?php echo $med;?></td>
		 	<td style="padding:0; padding-left: 15px;  font-size:11px;"><?php echo $dtup->quantite;?></td>
		 	<td style="padding:0; padding-left: 15px; font-size:11px;"><?php echo $dtup->pv;?></td>
		 	<td style="padding:0; padding-left: 15px; font-size:11px;"><?php echo $assura;?>(<?php echo $cate.'%';?>)</td>
		 	<td style="padding:0; padding-left:15px; font-size:10px;"><?php echo $montant_apaye;?></td>
		 	<td style="padding-left:15px; font-size:10px;">
		 		<a href="#" onclick="confirm(delete_drugsOnInvoiceToUpdate(<?php echo $numeClientDrugs;?>, <?php echo $num_fact;?>))">Delete</a>
		 	</td>
		 </tr>
		<?php endforeach;?>
		<?php endif;?>
		<?php if(isset($drugs_invoice)):?>
			<?php $montant_total2 = 0; $montant_total_apaye2 = 0;?>
		  <?php foreach($drugs_invoice as $di):?>
		  	<?php $nume2 = $di->idfacture_client;?>
			<?php $nom2 = $this->facturation_model->get_spec_fact($di->idfacture_client,'nom');?>
		 <?php $bon2 = $this->facturation_model->get_spec_fact($di->idfacture_client,'bon');?>
       <?php $stat2 = $this->facturation_model->get_spec_fact($di->idfacture_client,'statut');?>
			<?php $numeClientDrugs2 = $di->idfacture_clientDrugs;?>
		 <?php $med2 = $this->facturation_model->get_spec_med($di->iddrugs,'nom');?>
		 <?php $assura2 = $this->facturation_model->get_spec_assura($di->idassurance,'nom');?>
		 <?php $cate2 = $this->facturation_model->get_spec_cate($di->idcategorie_assurance,'percent');?>
		 <?php $montant2 = $di->quantite * $di->pv;?>
		 <?php $montant_assurance2 = ($montant2 * $cate2)/100;?>
		 <?php $montant_apaye2 = $montant2 - $montant_assurance2;?>
		 <?php $montant_total2 += $montant2;?>
		 <?php $montant_total_apaye2 += $montant_apaye2;?>
		 <tr>
		 	<td style="padding:0;  font-size:11px;"><?php echo $med2;?></td>
		 	<td style="padding:0; padding-left: 15px;  font-size:11px;"><?php echo $di->quantite;?></td>
		 	<td style="padding:0; padding-left: 15px; font-size:11px;"><?php echo $di->pv;?></td>
		 	<td style="padding:0; padding-left: 15px; font-size:11px;"><?php echo $assura2;?>(<?php echo $cate2.'%';?>)</td>
		 	<td style="padding:0; padding-left:15px; font-size:10px;"><?php echo $montant_apaye2;?></td>
		 	<td style="padding-left:15px; font-size:10px;">
		 		<a href="#" onclick="delete_drugsOnInvoiceToUpdate(<?php echo $numeClientDrugs2;?>, <?php echo $num_fact;?>)">Delete</a>
		 	</td>
		 </tr>
          <?php endforeach;?>
	<?php endif;?>
	<?php if(!isset($drugs_invoiceToUpdate) and !isset($drugs_invoice)):?>
	<tr>
		<td colspan="5">
			<center><span style="color: #ebb734; font-size: 12px;">
				Aucun médicament selectionné. <a href="<?php echo site_url('facturation');?>"> Cliquez <strong>Ici</strong>!</a>
			</span></center>
		</td>
	</tr>
     <?php endif;?>

	   <?php if(!isset($montant_total_apaye2)){
	   	             $montant_total_apaye2 = 0;
	          }
	          if(!isset($montant_total_apaye)){
	          	$montant_total_apaye = 0;
	          }
	          
                     
               ?>
		<tr>
         	<th colspan="4" style="padding:0;  font-size:10px;">Tot</th>
         	<th style="padding:0; padding-left:15px; font-size:10px;">
                

         		<?php echo $montant_total_apaye + $montant_total_apaye2;?></th>
         </tr>
		<tr style="background: #ebf2f5;">
         	<td style="font-size:12px; text-align: left; padding-left: 0">
         		Numero : 
         	</td>
         	<td colspan="5" style="font-size:12px; text-align: left; padding-left: 0">
         		<input type="text" readonly name="invoice" value="<?php echo $num_fact;?>"></td>
         </tr>
         <tr style="background: #ebf2f5;">
         	<td style="font-size:12px; text-align: left; padding-left: 0">
         		Patient
         	</td>
         	<td colspan="5" style="font-size:12px; text-align: left; padding-left: 0">
         		<input type="text" name="nom" value="<?php echo $nomF;?>"></td>
         </tr>
         <tr style="background: #ebf2f5;">
         	<td style="font-size:12px; text-align: left; padding-left: 0">
         		Bon
         	</td>
         	<td colspan="5" style="font-size:12px; text-align: left; padding-left: 0">
         		<input type="text" name="bon" value="<?php echo $bonF;?>">
         	</td>
         </tr>
         <tr style="background: #ebf2f5;">
         	<td style="font-size:12px; text-align: left; padding-left: 0">Statut : 
         		 
         	</td>
         	<td colspan="5" style="font-size:12px; text-align: left; padding-left: 0">
         		<?php echo $statutF;?>
         	</td>
         </tr>
         <tr>
         	<td style="background: #ebf2f5; " colspan="2"><input type="submit" name="save" class="ml-4 btn" style="border:1px solid #3445b4; color: #3445b4; font-size:12px;" value="Sauvegarder"></td>
         	<td style="background: #ebf2f5; " colspan="2"><!-- <button type="submit" name="pay" class="ml-4 btn" style="border:1px solid #3445b4; color: #3445b4; font-size:12px;">Paiement</button> --></td>
         	<td style="background: #ebf2f5; " colspan="4"><!-- <button type="submit" name="print" class="ml-4 btn" style="border:1px solid #3445b4; color: #3445b4; font-size:12px;">Imprimer récu</button> --></td>
         </tr>
	
</table>
</form>



<?php endif;?>








<script>
	function delete_drugsOnInvoiceToUpdate(e, n){
	if(confirm('Continuer?')){
    fetch("http://127.0.0.1/IPharma/index.php/pageascync/delete_drugsOnInvoiceToUpdate/"+e+"/"+n)
    .then(res => {
      return res.text();
    })
    .then(data => {
      $('#zone_facture_creer').html('');
      $('#zone_facture_creer').html(data);
      // console.log("Done");
    });
  }else{
  	return false;
  }
}
</script>