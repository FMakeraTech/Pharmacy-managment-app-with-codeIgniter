<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->



<div style="width: 98%; margin:auto">
	<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px 0 2px 10px;">Factures assureur emises</span> <br>

       <?php if(isset($assurance)):?>
      <table class="table">
      	<thead>
      		<th>Assurance</th>
      		<th>Nombre de factures</th>
      		<th>Montant</th>
      		<th>Montant Revouvre</th>
          <th>Taux de recouvrement</th>
      	</thead>
      	<tbody>
          <?php $total = 0; $totalR = 0; $taux_final = 0;?>
          <?php foreach($assurance as $as): ?>
          <?php 
          $idassurance = $as->idassurance;
          $nomAssurance = $as->nom; // Nom de l assurance;

$facture_assurance = $this->statistic_model->get_factureAssuranceClient($idassurance, $debut, $fin);
          $mont = 0; $count = 0; $montR = 0; $taux = 0;
          if($facture_assurance){
           foreach($facture_assurance as $fa){
               $numero_facture = $fa->idfacture_assurance;
               $statut = $fa->statut;

    $assurance_client = $this->statistic_model->get_assurance_client($numero_facture);
                 $montant = 0; 
                 if($assurance_client){
               	 foreach($assurance_client as $ac){
               	 	$idfcd = $ac->idfacture_clientdrugs;

  $fact_drugs = $this->statistic_model->statsInvoiceInsurance($idfcd);
                  $pvA_total = 0;
                  if($fact_drugs){
                     foreach($fact_drugs as $fd){
                       $qte = $fd->quantite;
                       $idcat = $fd->idcategorie_assurance;
                       $cat = $this->facturation_model->get_spec_cate($idcat,'percent');
                       $pv = $fd->pv; 
                       $pvT = $pv * $qte;
                       $pvTA = ($pvT * $cat)/100;
                       $pvA_total += $pvTA;
                     }
                  }
                    $montant += $pvA_total;
               	 }
               }
                if($statut == 1){
                  $montR += $montant;
                }

                $mont += $montant; 
                $count++;
                if($mont > 0){
                  $taux = ($montR * 100)/$mont;
                }else{
                  $taux = 0;
                }
                
          }
         } ?>
              <?php if($count != 0):?>
          <tr>
          <td style="background: #b4deed ;padding-top:0; padding-bottom:0;"><?php echo $nomAssurance;?></td>
              <td style="padding-top:0; padding-bottom:0;"><?php echo $count;?></td>
              <td style="padding-top:0; padding-bottom:0;"><?php echo number_format($mont,2);?></td>
              <td style="padding-top:0; padding-bottom:0;"><?php echo number_format($montR,2);?></td>
              <td style="padding-top:0; padding-bottom:0;"><?php echo $taux;?>%</td>
          </tr>
        <?php endif ?>

          <?php $total += $mont;?>
          <?php $totalR += $montR;?>

          <?php
                 if($total > 0){
                    $taux_final = ($totalR * 100) / $total;
                 }else{
                   $taux_final = 0;
                 }

          ?>

       <?php endforeach;?>



               
              <?php if($total != 0):?>


               <tr>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;">Total</th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;"></th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;">
                   <?php echo number_format($total,2); ?>
                 </th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;">
                   <?php echo number_format($totalR,2); ?>
                 </th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;">
                   <?php echo $taux_final; ?>%
                 </th>
               </tr>
               <?php else:?>
                <tr>
                  <td colspan="5" style="text-align: center;">Aucun résultat</td>
                </tr>
              <?php endif;?>
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