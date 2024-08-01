<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->



<div style="width: 98%; margin:auto">
	<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px 0 2px 10px;">Revenu par médicaments</span> <br>

       <?php if(isset($drugs)):?>
      <table class="table">
      	<thead>
      		<th>Médicament</th>
      		<th>Prix d'achat</th>
      		<th>Prix de vente</th>
      		<th>Bénéfice</th>
      	</thead>
      	<tbody>
          <?php $total_pa = 0; $total_pv = 0; $benefice = 0;?>
      		<?php foreach($drugs as $dr):?>
             <?php
               	 	$iddrugs = $dr->iddrugs;
                  $nomDrug = $dr->nom; // Nom du medicament

                  $fact_drugs = $this->statistic_model->statsRevenuDrugs($iddrugs, $debut, $fin);
                  $pa_total = 0; $pv_total = 0;
                  if($fact_drugs){
                     foreach($fact_drugs as $fa){
                       $qte = $fa->quantite;
                       $pa = $fa->pa; $paT = $pa*$qte;
                       $pv = $fa->pv; $pvT = $pv*$qte;
                       $pa_total += $paT;
                       $pv_total += $pvT;
                     }

                     $benefice = $pv_total - $pa_total;
                  }
            ?>
                <?php if($pa_total != 0 and $pv_total != 0):?>
                <tr>
                 <td style="background: #b4deed ;padding-top:0; padding-bottom:0;"><?php echo $nomDrug;?></td>
                 <td style="padding-top:0; padding-bottom:0;"><?php echo number_format($pa_total,2);?></td>
                 <td style="padding-top:0; padding-bottom:0;"><?php echo number_format($pv_total,2);?></td>
                 <td style="padding-top:0; padding-bottom:0;"><?php echo number_format($benefice,2);?></td>
               </tr>
              <?php endif;?>
               <?php $total_pa += $pa_total; ?>
               <?php $total_pv += $pv_total; ?>
               <?php $total_ben = $total_pv - $total_pa; ?>
            <?php endforeach;?> 
            <?php if($total_pa != 0 and $total_pv != 0):?>              
               <tr>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;">Total</th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;"><?php echo number_format($total_pa,2); ?></th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;"><?php echo number_format($total_pv,2); ?></th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;"><?php echo number_format($total_ben,2); ?></th>
               </tr>
            <?php else:?>
              <tr>
                <td colspan="4" style="text-align: center;">Aucun résultat</td>
              </tr>
            
           <?php endif; ?>

          </tbody>
        </table>
        <center><button onclick="window.close()" style="border-radius: 3px;">Fermer</button></center>
        <?php else:?>
        <span style="margin-left:20px; font-size: 12px">Aucun résultat</span>
      <?php endif;?>














      	</tbody>
      </table>














</div>


















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->