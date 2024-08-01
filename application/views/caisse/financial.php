<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->
<!-- ================== MENU ========================= -->
<?php $this->load->view('templates/menu.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->

<div class="container">
	<div class="row">
		<div class="col-11 m-md-5">
			<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Resumé financier</span><br>
			<form action="<?php echo site_url('financial/financialState');?>" method="post">
				<table>
					<tr>
						<td style="width:100px; padding-left:10px;background: #b4deed;; color: black;">Période</td>
						<td>De : <input type="date" name="debut" style="border-radius: 3px;" value="<?php echo date('Y-m-d');?>"></td>
						<td>à : <input type="date" name="fin" style="border-radius: 3px;" value="<?php echo date('Y-m-d');?>"></td>
						<td><input type="submit" value="chercher"></td>
					</tr>

				</table>
			</form>
			<hr>
           <div class="result">
 <!-- =========================== VENTES ======================== -->
 <!-- =========================================================== -->
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


<!-- ============================== PERIMES ================================= -->
<!-- ======================================================================= -->

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


<!-- =================================== COMMANDES ======================= -->
<!-- ============================================================================ -->

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


<!-- ======================== ASSURANCES ======================== -->
<!-- ============================================================= -->

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



<!-- ================================== DEPENSES =================== -->
<!-- =================================================================== -->
<?php if(isset($depenses)):?>

     <?php 
            $depenses_total = 0;
            foreach($depenses as $keyD){
              $montant = $keyD->montant;
              $depenses_total += $montant;
            }
              $depense_state = true;
     ?>
<?php else:?>
  <?php $depenses_total = 0; ?>
  <?php $depense_state = false;?>
<?php endif;?>












<?php //echo "$vente_pa ------ $vente_pv ------------- $benefice ---------- $montantEncaisse-- <br>";?>

<?php //echo "$perime_pa ------------ $perime_pv -- <br>";?>

<?php //echo "$commande_pa ------------- $commande_pv -- <br>";?>

<?php //echo "$montantAssurer -- <br>";?>

<?php //echo "$depenses_total -- <br>";?>

 <?php if(isset($ventes) or isset($perimes) or isset($commandes) or isset($depenses) or isset($assurance)):?>
 	<table class="table">
 		<thead>
 		   <th></th>
 		   <th>PA</th>
 		   <th>PV</th>
 		   <th>Bene</th>
 		   <th>EnCaisse</th>
 		   <th>Assurance</th>
 		   <th>Invest</th>
 		   <th>Charges</th>
 		   <th>Pertes</th>
 		</thead>
 		<tbody>
 			<tr>
 				<td style="background:#b4deed">Ventes</td>
 				<td><?php echo number_format($vente_pa,2);?></td>
 				<td><?php echo number_format($vente_pv,2);?></td>
 				<td><?php echo number_format($benefice,2);?></td>
 				<td><?php echo number_format($montantEncaisse,2);?></td>
 				<td><?php echo number_format($montantAssurer,2);?></td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 			</tr>
 			<tr>
 				<td style="background:#b4deed">Commandes</td>
 				<td><?php echo number_format($commande_pa,2);?></td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td><?php echo number_format($commande_pa,2);?></td>
 				<td> - </td>
 				<td> - </td>
 			</tr>
 			<tr>
 				<td style="background:#b4deed">Depenses</td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td><?php echo number_format($depenses_total,2);?></td>
 				<td> - </td>
 			</tr>
 			<tr>
 				<td style="background:#b4deed">Perimés</td>
 				<td><?php echo number_format($perime_pa,2);?></td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td> - </td>
 				<td><?php echo number_format($perime_pa,2);?></td>
 			</tr>
 		</tbody>
 		
 	</table>






















 <?php else:?>
 	<center>Aucune information dans cette période</center>
 <?php endif;?>





















           </div>





















		</div>
	</div>
</div>


















<?php $this->load->view('templates/footer.php'); ?>
<!-- =================================================
<!-- ======================================================= -->