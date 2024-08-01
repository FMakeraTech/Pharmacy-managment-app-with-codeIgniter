
				<?php if(isset($commandes)):?>
					<table class="table" style="font-size: 12px;">
						<tr>
							<th style="padding-top: 0; padding-bottom: 0;">Date</th>
							<th style="padding-top: 0; padding-bottom: 0;">Numero de Bon</th>
							<th style="padding-top: 0; padding-bottom: 0;">Fournisseur</th>
							<th style="padding-top: 0; padding-bottom: 0;">Etat</th>
							<th style="padding-top: 0; padding-bottom: 0;"></th>
						</tr>
					
				  <?php foreach($commandes as $com):?>
                   <?php  
                     $datt = $com->date;
                     setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                     $dat = strftime("%A %d %B", strtotime($datt));                      // echo (strftime("%A %d %B", strtotime($datt))); 
                     $numero = $com->idcommandes;
                     $fourn = $this->supply_model->get_spec_fourn($com->fournisseur_idfournisseur, 'nom');
                     $statut = $com->statut;
                     if($statut == 0){
                     	$etat = "en cours";
                     }else{
                     	$etat = "Terminée";
                     }
                   ?>
                     <tr>
                     	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dat;?></td>
                     	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $numero;?></td>
                     	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $fourn;?></td>
                     	<td style="padding-top: 0; padding-bottom: 0;">
                     		<?php echo $etat;?></td>
                     	<td style="padding-top: 0; padding-bottom: 0;">
                     		<a href="#" onclick="do_openSupplyBon(<?php echo $numero;?>)">Print</a></td>
                     </tr>
                 <?php endforeach;?>
                 </table>
				  <?php endif;?>