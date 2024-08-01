<?php if(isset($drugs)):?>
				<table class="table table-striped" style="font-size: 12px;">
					<thead class="thead-dark">
					<tr>
						<th style="padding-top: 0; padding-bottom: 0;">Code</th>
						<th style="padding-top: 0; padding-bottom: 0;">Nom</th>
						<th style="padding-top: 0; padding-bottom: 0;">Categorie</th>
						<th style="padding-top: 0; padding-bottom: 0;">Prix d'achat</th>
						<th style="padding-top: 0; padding-bottom: 0;">Prix de vente</th>
						<th style="padding-top: 0; padding-bottom: 0;">Prix MFP</th>
						<th style="padding-top: 0; padding-bottom: 0;">Prise en charge MFP</th>
						<th style="padding-top: 0; padding-bottom: 0;">Unité</th>
						<th style="padding-top: 0; padding-bottom: 0;">Nobre/E</th>
						<th style="padding-top: 0; padding-bottom: 0;">Quantité alerte</th>
					</tr>
				</thead>
					<?php foreach($drugs as $dr):
                      $category = $this->statistic_model->get_spec_med_cat($dr->drugs_category_iddrugs_category, 'nom');
                      $place = $this->statistic_model->get_spec_med_cat($dr->drugs_category_iddrugs_category, 'place');
                      if($dr->unity == 0){
                      	$unity = "Unit";
                      }elseif($dr->unity == 2){
                      	$unity = "Boite";
                      }elseif($dr->unity == 1){
                      	$unity = "Flacon";
                      }else{
                      	$unity = "Flacon";
                      }

						?>
				    <tr style="cursor: pointer;" 
				    onclick="selectDrug(
				    '<?php echo $dr->code?>',
				    '<?php echo $dr->nom?>',
				    '<?php echo $dr->drugs_category_iddrugs_category?>',
				    '<?php echo $dr->pa?>',
				    '<?php echo $dr->pv?>',
				    '<?php echo $dr->prixmfp?>',
				    '<?php echo $dr->percentmfp?>',
				    '<?php echo $dr->unity?>',
				    '<?php echo $dr->qty?>',
				    '<?php echo $dr->alertQuantity?>'
				    );" 
				    >
				        <th style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->code;?></th>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->nom;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $category;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->pa;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->pv;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->prixmfp;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->percentmfp;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $unity?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->qty;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->alertQuantity;?></td>
				    </tr>
				<?php endforeach;?>
			<?php endif;?>
				</table>