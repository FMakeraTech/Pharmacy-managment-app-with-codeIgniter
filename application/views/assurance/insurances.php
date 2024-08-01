<?php if(isset($insurances)):?>
	<hr>
	<span style="padding-left:10px; text-align:left; display: block; width: 100%; height: 25px; background-color: #76b6d6; color: white;">
		Detais à facturer
	</span>
	<table class="table">
		 <tr>
		 	<th style="padding-left:0; font-size: 12px;"></th>
		 	<th style="padding-left:0; font-size: 12px;">Date</th>
		 	<th style="padding-left:0; font-size: 12px;">Facture</th>
		 	<th style="padding-left:0; font-size: 12px; max-width: 250px;">Medicament</th>
		 	<th style="padding-left:0; font-size: 12px;">Montant</th>
		 	<th style="padding-left:0; font-size: 12px;">Patient</th>
		 	<th style="padding-left:0; font-size: 12px;">Bon/Carte</th>
		 </tr>
		 <?php $i = 1; $tot = 0;?>
		 <?php foreach($insurances as $ins):?>
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

          $date2 = ucfirst(strftime("%d /%m/ %Y", strtotime($date)));
		 ?>
		 <tr>
		 	<td style="padding:0; font-size: 12px;"><?php echo $i;?></td>
		 	<td style="padding:0; font-size: 12px;"><?php echo $date2;?></td>
		 	<td style="padding:0; font-size: 12px;"><?php echo $facture;?></td>
		 	<td style="padding:0; font-size: 12px; max-width: 250px;"><?php echo $medicament;?></td>
		 	<td style="padding:0; font-size: 12px;"><?php echo $motAssure;?> (<?php echo $cat;?> %)</td>
		 	<td style="padding:0; font-size: 12px;"><?php echo $patient;?></td>
		 	<td style="padding:0; font-size: 12px;"><?php echo $bon;?></td>
		 </tr>
		 <?php $i++;?>
		<?php endforeach;?>
		<tr>
			<td></td>
			<td style="font-size: 12px; font-weight: bold;" colspan="3" >Total:</td>
			<td style="font-size: 12px; font-weight: bold;"><?php echo $tot;?></td>
		</tr>
	</table>
	<input type="date" id="date">
	<button type="button" style="border: 1px solid blue; background-color: white; color: blue; border-radius: 3px;" onclick="do_generateInsuranceInvoice(<?php echo $insuranceId;?>)">Generer une facture</button>
<?php endif; ?>



<!-- ================================================= -->
<!-- ========== Script ======================= -->
<script>
	function do_generateInsuranceInvoice(el){
	var date = document.getElementById('date').value;
       fetch("http://127.0.0.1/IPharma/index.php/assurance/generateInsuranceInvoice/"+el+"/"+date)
		.then(res => {
			return res.text();
		})
		.then(data => {
			
			$('#zone-insuranceInvoice').html(data);
			$('#zone-InsurancePrestation').html("");
		});
	  var zonePrestation = document.getElementById('zone-insurancePrestation');
	  zonePrestation.innerHTML = "";
	}

	function do_test(){
		console.log("Done");
	}
</script>

