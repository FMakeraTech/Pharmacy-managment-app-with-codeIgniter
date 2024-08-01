<?php if(isset($prestations)):?>

<table class="table">
	<thead>
		
	</thead>
	<tbody>
		<tr>
			
		</tr>
		<?php
         $i = 1;
		 foreach($prestations as $p):?>

			<?php 
               $iddrugs = $p->iddrugs;
               $qteStock = $this->facturation_model->get_spec_stock($iddrugs,'Quantite1');

			?>
			<tr>
				<td style="padding: 4px; margin:0; color:#47b2c4; font-size:12px;"><?php echo $p->nom?></td>
				<!-- <td style="padding: 4px; margin:0; color:#47b2c4; font-size:12px;"><?php echo $p->pv;?></td> -->
				<td style="padding: 4px; margin:0; color:#47b2c4; font-size:12px;">
				 Qté : <input type="text" style="width:30px;" id="qty<?php echo $i;?>" onkeyup="check_quantity(this.value, <?php echo $qteStock;?>);"> / <?php echo $qteStock;?><small style="color: red;" id="checkQuantity"></small></td>
				<?php if($p->pv != ""): ?>
				<td style="padding:4px; font-size: 12px;"><a style="text-decoration: underline;" href="#" id="drug" onclick="send_drugs(<?php echo $p->iddrugs;?>, <?php echo $qteStock;?>,<?php echo $i;?>)">Ajouter</a></td>
			<?php endif;?>
				<?php if($p->pv == ""): ?>
				<td style="padding:4px; font-size: 12px;"><a style="text-decoration: underline;" href="#" id="drug" onclick="do_updatePrice(<?php echo $p->iddrugs;?>)">Set Price</a></td>
			<?php endif;?>
			</tr>
			<?php $i++;?>
		<?php endforeach;?>
		<tr>
			
		</tr>
		</tr>
	</tbody>
</table>
<?php endif;?>



<?php if(isset($drugs)):?>
	<form method="post" action="<?php echo site_url('facturation/creer_facture');?>">
		<table style="font-size: 12px; color: black; margin-bottom: 6px;">
		<tr>
			<td>Numero facture:</td>
			<td></td>
		</tr>
		<tr>
			<td>Date:</td>
			<td><input style="width: 200px; height: 25px; border-radius: 4px;" type="date" name="date" value="<?php echo date('Y-m-d');?>"></td>
		</tr>
		<tr>
			<td>Nom du client/patient : </td>
			<td><input style="width: 200px; height: 20px; border-radius: 4px;" type="text" name="nom"></td>
		</tr>
		<tr>
			<td>Bon</td>
			<td><input style="width: 200px; height: 20px; border-radius: 4px;" type="text" name="bon"></td>
		</tr>
	</table>
<table class="table" style="background-color: white;">
	<thead>
		<tr>
			<th style="padding:0; font-size: 10px; text-align: left">Medicament</th>
			<th style="padding:0; font-size: 10px; text-align: left">Qté</th>
			<th style="padding:0; font-size: 10px; text-align: left">Prix</th>
			<th style="padding:0; font-size: 10px; text-align: left">Mont</th>
			<th style="padding:0; font-size: 10px; text-align: left">Ass</th>
			<th style="padding:0; font-size: 10px; text-align: left">A payer</th>
			<th style="padding:0; font-size: 10px; text-align: left"></th>
		</tr>
	</thead>
	<tbody>
		<?php $montant_total = 0; $montant_total_apaye = 0;?>
		<?php foreach($drugs as $dr):?>
		 <?php $med = $this->facturation_model->get_spec_med($dr->iddrugs,'nom');?>
		 <?php $assura = $this->facturation_model->get_spec_assura($dr->idassurance,'nom');?>
		 <?php $cate = $this->facturation_model->get_spec_cate($dr->idcategorie_assurance,'percent');?>
		 <?php $montant = $dr->quantite * $dr->pv;?>
		 <?php $montant_assurance = ($montant * $cate)/100;?>
		 <?php $montant_apaye = $montant - $montant_assurance;?>
		 <?php $montant_total += $montant;?>
		 <?php $montant_total_apaye += $montant_apaye;?>
		 <tr>
		 	<td style="padding:0; font-size:10px;"><?php echo $med;?></td>
		 	<td style="padding:0; font-size:10px;"><?php echo $dr->quantite;?></td>
		 	<td style="padding:0; font-size:10px;"><?php echo $dr->pv;?></td>
		 	<td style="padding:0; font-size:10px;"><?php echo $montant;?></td>
		 	<td style="padding:0; font-size:10px;"><?php echo $assura;?>(<?php echo $cate.'%';?>)</td>
		 	<td style="padding:0; font-size:10px;"><?php echo $montant_apaye;?></td>
		 	<td style="padding:0; font-size:10px;">
		 		<a href="#" onclick="delete_drugs(<?php echo $dr->idfacture_clientDrugs;?>)">Delete</a>
		 	</td>
		 </tr>
         <?php endforeach;?>
         <tr>
         	<th colspan="3" style="padding:0; font-size:10px;">Tot</th>
         	<th style="padding:0; font-size:10px;"><?php echo $montant_total;?></th> <td></td>
         	<th style="padding:0; font-size:10px;"><?php echo $montant_total_apaye;?></th>
         </tr>
         <tr style="background: #ebf2f5;">
         	<td colspan="7" style="font-size:12px; text-align: left; padding-left: 0">Statut : 
         		 <select name="statut" id="">
         			<option value="">Ouvert</option>
         			<option value="">Fermé</option>
         		</select>
         	</td>
         </tr>
         <tr>
         	<td style="background: #ebf2f5; " colspan="2"><input type="submit" name="save" class="ml-4 btn" style="border:1px solid #3445b4; color: #3445b4; font-size:12px;" value="Sauvegarder"></td>
         	<td style="background: #ebf2f5; " colspan="2"><!-- <button type="submit" name="pay" class="ml-4 btn" style="border:1px solid #3445b4; color: #3445b4; font-size:12px;">Paiement</button> --></td>
         	<td style="background: #ebf2f5; " colspan="4"><!-- <button type="submit" name="print" class="ml-4 btn" style="border:1px solid #3445b4; color: #3445b4; font-size:12px;">Imprimer récu</button> --></td>
         </tr>
	</tbody>
</table>
</form>
<?php endif;?>


