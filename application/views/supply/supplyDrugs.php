<?php if(isset($supplyDrugsAdded)):?>
	<table class="table">
		<tr>
			<th style="padding-top:0">Medicament</th>
			<th style="padding-top:0">Quantité</th>
			<th style="padding-top:0">Prix d'achat</th>
			<th style="padding-top:0"></th>
		</tr>
			<?php $tot = 0;?>
		<?php foreach($supplyDrugsAdded as $sda):?>
         <?php 
            $med = $this->facturation_model->get_spec_med($sda->iddrugs, 'nom');
            $pa = $this->facturation_model->get_spec_med($sda->iddrugs, 'pa');
            $unit = $this->facturation_model->get_spec_med($sda->iddrugs, 'unity');
            if($unit == 0){
               $typeOfUnity = 'Unité';
            }else if($unit == 1){
               $typeOfUnity  = 'Flacon';
            }
            else if($unit == 2){
               $typeOfUnity  = 'Boite';
            }
            $qte = $sda->quantite;
            $tot += $pa;
         ?>
         <tr>
         	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $med;?></td>
         	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $qte;?>(<?php echo $typeOfUnity;?>)</td>
         	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $pa;?></td>
         	<td style="padding-top: 0; padding-bottom: 0;"><a href="#" onclick="do_deleteSearchedDrug(<?php echo $sda->idcommande_drugs;?>)">Delete</a></td>
         </tr>
 
		<?php endforeach;?>
		<tr>
			<th colspan="2" style="padding-top: 0; padding-bottom: 0;">Total</th>
			<th style="padding-top: 0; padding-bottom: 0;"><?php echo $tot;?></th>
		</tr>
	</table>
	<center><input type="submit" value="commander" onclick="return do_openCommandePopup();" style="border-radius: 4px;"></center>
<?php endif;?>