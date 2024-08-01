<?php if(isset($prestations)):?>

<table class="table">
	<thead>
		
	</thead>
	<tbody>
		<?php foreach($prestations as $p):?>

			<?php 
               $iddrugs = $p->iddrugs;
               $qteStock = $this->facturation_model->get_spec_stock($iddrugs,'Quantite1');
               $nom = $p->nom;
               $unit = $p->unity;
               if($unit == 0){
               	 $type = 'Unité';
               	 $message = $p->qty.'/'.$type;
               }elseif ($unit == 1){
               	$type = 'Flacon';
               	$message = $p->qty.'/'.$type;
               }
               elseif ($unit == 2){
               	$type = 'Boite';
               	$message = $p->qty.'/'.$type;
               }

			?>
			<tr>
				<!-- <td id="drugCode" style="padding: 4px; margin:0; color:#47b2c4; font-size:12px;"><?php echo $p->iddrugs;?></td> -->
				<td style="padding: 4px; margin:0; color:#47b2c4; font-size:12px;"><?php echo $p->nom;?></td>
				<td style="padding: 4px; margin:0; color:#47b2c4; font-size:12px;"><?php echo $message;?></td>
				<td style="padding:4px; font-size: 12px;"><a style="text-decoration: underline;" href="#" id="drug" onclick="do_addDrugs(<?php echo $iddrugs;?>,'<?php echo $nom;?>')">Ajouter</a></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
<?php endif;?>

