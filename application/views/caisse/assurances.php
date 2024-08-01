<?php if(isset($assurances)):?>

     <?php 
            $montantAssurer = 0;
            foreach($assurances as $keyA){
            	$idfacture = $keyA->idfacture_client;
            	$resultAssurance = $this->caisse_model->getVenteByFacture($idfacture);
            	$pvass_total = 0;
            	foreach($resultAssurance as $keyAR){
            	     $qte = $keyAR->quantite;
                   $idcat = $keyAR->idcategorie_assurance;
                   $cat = $this->facturation_model->get_spec_cate($idcat,'percent');
                   $pv = $keyAR->pv;
                   $pvT = $pv * $qte;
                   $pvTA = ($pvT * $cat)/100;

                   $pvass_total += $pvTA;
            	}
              $montantAssurer += $pvass_total;
            }
              $assurance_state = true;
     ?>
<?php else:?>
  <?php $montantAssurer = 0; ?>
  <?php $assurance_state = false;?>
<?php endif;?>