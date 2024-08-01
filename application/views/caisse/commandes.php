<?php if(isset($commandes)):?>

     <?php 
            $commande_pa = 0; $commande_pv = 0;
            foreach($commandes as $keyC){
            	$idcommandes = $keyC->idcommandes;
            	$resultCommande = $this->caisse_model->getCommandeByDrug($idcommandes);
            	$pa_total = 0; $pv_total = 0;
            	foreach($resultCommande as $keyCR){
                   $qte = $keyCR->quantite;
                   $pa = $this->facturation_model->get_spec_med($keyCR->iddrugs, 'pa');
                   $pv = $this->facturation_model->get_spec_med($keyCR->iddrugs, 'pv');
                   $paT = $pa * $qte;
                   $pvT = $pv * $qte;
                   $pa_total += $paT;
                   $pv_total += $pvT;
            	}
              $commande_pa += $pa_total;
              $commande_pv += $pv_total;
            }
              $commande_state = true;
     ?>
<?php else:?>
  <?php $commande_pa = 0; ?>
  <?php $commande_pv = 0; ?>
  <?php $commande_state = false;?>
<?php endif;?>