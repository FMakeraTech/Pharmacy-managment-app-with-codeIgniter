<?php if(isset($ventes)):?>

     <?php 
            $montantEncaisse = 0; $vente_pa = 0; $vente_pv = 0;
            foreach($ventes as $keyV){
            	$idfacture = $keyV->idfacture_client;
            	$montantVente = $keyV->montant;
            	$resultVente = $this->caisse_model->getVenteByFacture($idfacture);
            	$pa_total = 0; $pv_total = 0;
            	foreach($resultVente as $keyVR){
            	   $qte = $keyVR->quantite;
                   $pa = $keyVR->pa; 
                   $pv = $keyVR->pv;

                   $paT = $pa * $qte;
                   $pvT = $pv * $qte;

                   $pa_total += $paT;
                   $pv_total += $pvT;
            	}
              $vente_pa += $pa_total;
              $vente_pv += $pv_total;
              $montantEncaisse += $montantVente;
            }
              $benefice = $vente_pv - $vente_pa;
              $vente_state = true;
     ?>
<?php else:?>
  <?php $vente_pa = 0; ?>
  <?php $vente_pv = 0; ?>
  <?php $montantEncaisse = 0; ?>
  <?php  $benefice = 0;?>
  <?php $vente_state = false;?>
<?php endif;?>