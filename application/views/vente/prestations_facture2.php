<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->

<div class="container">
  <div class="row">
    <div class="col-12">
<?php if(isset($num_fact)):?>
       <?php $nom = $this->facturation_model->get_spec_fact($num_fact,'nom');?>
       <?php $bon = $this->facturation_model->get_spec_fact($num_fact,'bon');?>
       <?php $stat = $this->facturation_model->get_spec_fact($num_fact,'statut');?>
       <?php $date_fact = $this->facturation_model->get_spec_fact($num_fact,'date');?>
       <?php
              if($stat == 1){
                $statut = "Fermé";
              }else{
               $statut = "Ouvert";
              }


       ?>

<h6 style="color: green">Paiement de la facture</h6>

<table>
	<tr>
			<th style="min-width: 200px; font-size: 11px; text-align: left">Medicament</th>
			<th style=" padding-left: 15px; font-size: 11px; text-align: left">Qté</th>
			<th style="padding-left: 15px;  font-size: 11px; text-align: left">Prix</th>
			<th style="padding-left: 15px;  font-size: 11px; text-align: left">Assurance</th>
			<th style="min-width:150px; padding-left: 15px; font-size: 11px; text-align: left">A payer</th>

		</tr>
      <?php if(isset($donnees_facture)):?>
	  <?php $montant_total_apaye = 0;?>
     <?php foreach($donnees_facture as $df):?>
     <?php $med = $this->facturation_model->get_spec_med($df->iddrugs,'nom');?>
		 <?php $assura = $this->facturation_model->get_spec_assura($df->idassurance,'nom');?>
		 <?php $cate = $this->facturation_model->get_spec_cate($df->idcategorie_assurance,'percent');?>
		 
		 <?php $montant = $df->quantite * $df->pv;?>
		 <?php $montant_assurance = ($montant * $cate)/100;?>
		 <?php $montant_apaye = $montant - $montant_assurance;?>
		 <?php $montant_total_apaye += $montant_apaye;?>
		 <?php $nume = $df->idfacture_client; ?>
     
		 <tr style="border-bottom: 1px solid silver;">
		 	<td style="padding:0;  font-size:11px;"><?php echo $med;?></td>
		 	<td style="padding:0; padding-left: 15px;  font-size:11px;"><?php echo $df->quantite;?></td>
		 	<td style="padding:0; padding-left: 15px; font-size:11px;"><?php echo $df->pv;?></td>
		 	<td style="padding:0; padding-left: 15px; font-size:11px;"><?php echo $assura;?>(<?php echo $cate.'%';?>)</td>
		 	<td style="padding:0; padding-left:15px; font-size:10px;"><?php echo $montant_apaye;?></td>
		 </tr>
<?php endforeach;?>
 <?php else:?>
        <tr>
           <td colspan="5">
              <center><span style="color: #ebb734; font-size: 12px;">Cliquer sur modifier pour ajouter les médicaments déjà selectionnés!</span><br>
              <span style="color: #ebb734; font-size: 12px;">Ou <strong><a href="<?php echo site_url('facturation');?>">---ici---</a></strong> pour selectionner les médicaments</span></center>
           </td>
        </tr>
      
 <?php endif;?>
         <tr>
         	<th colspan="4" style="padding:0;  font-size:10px;">Tot</th>
         	<th style="padding:0; padding-left:15px; font-size:10px;">
               <?php
                          if(!isset($montant_total_apaye)){
                            $montant_total_apaye = 0;
                          }
                echo $montant_total_apaye;
                ?></th>
         </tr>
         <tr style="background: #ebf2f5;">
         	<td style="font-size:12px; text-align: left; padding-left: 0">
         		Numero : 
         	</td>
         	<td colspan="5" style="font-size:12px; text-align: left; padding-left: 0"><?php echo $num_fact;?></td>
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
         		<?php echo $statut;?>
         	</td>
         </tr>

         
</table>
<p>

   <?php if($stat == 0):?>
   <center>
      <button type="button" name="pay" class="ml-4 btn" style="border:1px solid #3445b4; color: #3445b4; font-size:12px;"
      onclick="get_search_invoiceToUpdate(<?php echo $num_fact;?>);">Modifier</button></td>
            <button type="submit" name="print" class="ml-4 btn" style="border:1px solid #3445b4; color: #3445b4; font-size:12px;"
               onclick="popup(<?php echo $num_fact; ?>,<?php echo $montant_total_apaye; ?>);">Paiement</button>
   </center>
   <?php else:?>
            <center><button type="submit" name="save" class="btn" style="text-align:center;border:1px solid #3445b4; color: #3445b4; font-size:12px;"
               onclick="doPrintPatientReceiptPdf(<?php echo $num_fact;?>,'<?php echo $date_fact;?>'); opener.location.reload(); window.close();">Imprimer le recu</button></center>
         </p>
      <?php endif;?>
<?php endif;?> 


</div>
</div>
</div>







<script>
   function doPrintPatientReceiptPdf(num,date){
          var url = "http://127.0.0.1/IPharma/index.php/facturationShow/printPatientInvoice/"+num+"/"+date;
         window.open(url,'Invoicenumero1','height=1000,width=300,toolbar=yes,status=no,scrollbars=yes,resizable=yes,menubar=yes');
       }
</script>



<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->