









<div  style="margin-left:20px;">
   <span style="display: block; background: silver;color:white; width:400px; padding-top: 5px; padding-bottom:5px; padding-left: 5px;">
      Details de la facture à imprimer
   </span>

<?php if(isset($donnees_facture)):?>

<table>
	<tr>
			<th style="padding-right:45px; font-size: 11px; text-align: left">Medicament</th>
			<th style="padding-right:45px; padding-left: 15px; font-size: 11px; text-align: left">Qté</th>
			<th style="padding-right:25px;  font-size: 11px; text-align: left">Prix</th>
			<th style="padding-right:45px;  font-size: 11px; text-align: left">Ass</th>
			<th style="padding-right:15px; padding-left: 30px; font-size: 11px; text-align: left">A payer</th>

		</tr>
	<?php $montant_total_apaye = 0;?>
    <?php foreach($donnees_facture as $df):?>
    <?php $med = $this->facturation_model->get_spec_med($df->iddrugs,'nom');?>
		 <?php $assura = $this->facturation_model->get_spec_assura($df->idassurance,'nom');?>
		 <?php $cate = $this->facturation_model->get_spec_cate($df->idcategorie_assurance,'percent');?>
		 <?php $nom = $this->facturation_model->get_spec_fact($df->idfacture_client,'nom');?>
		 <?php $bon = $this->facturation_model->get_spec_fact($df->idfacture_client,'bon');?>
		 <?php $montant = $df->quantite * $df->pv;?>
		 <?php $montant_assurance = ($montant * $cate)/100;?>
		 <?php $montant_apaye = $montant - $montant_assurance;?>
		 <?php $montant_total_apaye += $montant_apaye;?>
		 <?php $nume = $df->idfacture_client; ?>

       <?php $etatid = $this->facturation_model->get_spec_fact($df->idfacture_client,'statut');
                if($etatid == 1){
                  $etat = "Fermé";
                }else{
                  $etat = "Ouvert";
                }

       ?>
		 <tr>
		 	<td style="padding:0;  font-size:11px;"><?php echo $med;?></td>
		 	<td style="padding:0; padding-left: 15px;  font-size:11px;"><?php echo $df->quantite;?></td>
		 	<td style="padding:0;  font-size:11px;"><?php echo $df->pv;?></td>
		 	<td style="padding:0;  font-size:11px;"><?php echo $assura;?>(<?php echo $cate.'%';?>)</td>
		 	<td style="padding:0; padding-left:30px; font-size:10px;"><?php echo $montant_apaye;?></td>
		 </tr>
<?php endforeach;?>
         <tr>
         	<th colspan="4" style="padding:0;  font-size:10px;">Tot</th>
         	<th style="padding:0; padding-left:30px; font-size:10px;"><?php echo $montant_total_apaye;?></th>
         </tr>
         <tr style="background: #ebf2f5;">
         	<td style="font-size:12px; text-align: left; padding-left: 0">
         		Numero : 
         	</td>
         	<td colspan="5" style="font-size:12px; text-align: left; padding-left: 0"><?php echo $nume;?></td>
         </tr>
         <tr style="background: #ebf2f5;">
         	<td style="font-size:12px; text-align: left; padding-left: 0">
         		Patient
         	</td>
         	<td colspan="5" style="font-size:12px; text-align: left; padding-left: 0"><?php echo $nom;?></td>
         </tr>
         <tr style="background: #ebf2f5;">
         	<td style="font-size:12px; text-align: left; padding-left: 0">
         		Bon
         	</td>
         	<td colspan="5" style="font-size:12px; text-align: left; padding-left: 0"><?php echo $bon;?></td>
         </tr>
         <tr style="background: #ebf2f5;">
         	<td style="font-size:12px; text-align: left; padding-left: 0">Statut : 
         		 
         	</td>
         	<td colspan="5" style="font-size:12px; text-align: left; padding-left: 0">
         		<?php echo $etat;?>
         	</td>
         </tr>


</table>
<center> <button type="button" class="mt-4 ml-4 btn" style="border:1px solid #3445b4; color: #3445b4; font-size:12px;" 
   onclick="doPrintPatientReceiptPdf(<?php echo $nume;?>); opener.location.reload(); window.close();"
   >Imprimer le recu</button></center>
<?php endif;?> 
</div>




<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->
