<?php if(isset($facture)):?>
        	<table class="table" style="font-size: 12px;" >
        		<th style="padding-top: 0;">Date</th>
        		<th style="padding-top: 0;">Numero</th>
        		<th style="padding-top: 0;">Statut</th>
        		<?php foreach($facture as $fact):?>
        			<?php 
                      if($fact->statut == 0){
                      	$statut = "Ouvert";
                      }else{
                      	$statut = "Fermé";
                      }
        			?>
        			<tr onclick="changeBGColor(this);" class="mystyle">
        				<td style="padding-top: 0; padding-bottom:0"><?php echo $fact->date;?></td>
        				<td style="padding-top: 0; padding-bottom:0"><?php echo $fact->idfacture_client;?></td>
        				<td style="padding-top: 0; padding-bottom:0">
        					<a style="text-decoration: underline;" href="#" onclick="get_search_invoice(<?php echo $fact->idfacture_client;?>)
                  "><?php echo $statut;?></a>
        				</td>
        			</tr>
        <?php endforeach;?>
           </table>
           <?php else:?>
           	        	Aucune Facture
           	<?php endif;?>