<?php if(isset($depenses)):?>

     <?php 
            $depenses_total = 0;
            foreach($depenses as $keyD){
              $montant = $keyP->montant;
              $depenses_total += $montant;
            }
              $depense_state = true;
     ?>
<?php else:?>
  <?php $depenses_total = 0; ?>
  <?php $depense_state = false;?>
<?php endif;?>