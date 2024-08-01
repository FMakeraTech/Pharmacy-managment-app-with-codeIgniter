<?php if(isset($perimes)):?>

     <?php 
            $perime_pa = 0; $perime_pv = 0;
            foreach($perimes as $keyP){
            	$iddrugs = $keyP->iddrugs;
              $qte = $keyP->quantite;
              $pa = $this->facturation_model->get_spec_med($keyP->iddrugs, 'pa');
              $pv = $this->facturation_model->get_spec_med($keyP->iddrugs, 'pv');
              $paT = $pa * $qte;
              $pvT = $pv * $qte;
              $perime_pa += $paT;
              $perime_pv += $pvT;
            }
              $perime_state = true;
     ?>
<?php else:?>
  <?php $perime_pa = 0; ?>
  <?php $perime_pv = 0; ?>
  <?php $perime_state = false;?>
<?php endif;?>