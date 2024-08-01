<!--================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->


	<?php if(isset($supplyCommande)):?>
<div class="" style="width: 100%; margin: auto;">
	<div class="row">
		<div class="col-12">
<span style="display: block; padding-left: 10px; color: white; width: 95%; margin:auto; background: blue; padding-top: 5px; padding-bottom: 5px">
	Réception des médicaments commandés
      </span>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
	<span style="font-size: 16px; margin: 70px; font-weight: bold">Bon numero : <?php echo $numeroBon;?></span>
	<hr>
  
	<table style="width: 80%; margin-left:10%;">
 	<tr>
 		<th style="text-align: left;">Medicaments</th>
 		<th style="text-align: left;">Quantité</th>
        <!-- <th style="text-align: left;">Prix unitaire</th> -->
        <th style="text-align: left;"></th>

 		<!-- <th></th> -->
 	</tr>
  <?php $tot = 0;?>
 <?php foreach($supplyCommande as $sc):?>
      <?php
         $med = $this->facturation_model->get_spec_med($sc->iddrugs, 'nom');
         $pa = $this->facturation_model->get_spec_med($sc->iddrugs, 'pa');
         $unit = $this->facturation_model->get_spec_med($sc->iddrugs, 'unity');
            if($unit == 0){
              $typeOfUnity = 'Unité';
            }else if($unit == 1){
              $typeOfUnity  = 'Flacon';
            }else if($unit == 2){
              $typeOfUnity  = 'Boite';
            }
         $qte = $sc->quantite;
         $tot += $pa;
      ?>
      <form action="<?php echo site_url('supply/validateOneCommande/'.$sc->idcommande_drugs.'/'.$sc->idcommandes);?>" method="post">
      <tr style="border-top: 1px solid #eee;">
      <td style="padding-top: 0; padding-bottom: 0;"><?php echo $med;?></td>
      <td style="padding-top: 0; padding-bottom: 0;"><?php echo $qte;?>(<?php echo $typeOfUnity;?>)</td>
      <?php if($sc->statut == 0):?>
      <td style="padding-top: 0; padding-bottom: 0;">Prix par <?php echo $typeOfUnity;?> :
        <input type="text" name="paTotal" style="width: 100px;" required></td>
       <?php endif; ?> 
      <td style="padding-top: 0; padding-bottom: 0;">
      	<?php if($sc->statut == 0):?>
      	<button type="submit">Valider</button>
      	<?php else:?>
      	 Livrée
      	<?php endif; ?>
      </td>
      </tr>
      </form>
 <?php endforeach; ?>
</table>

		</div>
	</div>

	<div class="row" style="margin-top: 10px;">
		<div class="col-12">
			<center>
  <!-- <a class="btn btn-success" onclick="return supplyOpenWindow(<?php echo $sc->idcommandes;?>);"
       href="#">Valider tous les médicaments</a> -->
         <a class="btn btn-success" onclick="supplyOpenWindowAndClose(<?php echo $sc->idcommandes;?>);"
       href="#">Cloturer la commande</a>
  	<a href="#" onclick="opener.location.reload(); window.close();">Fermer</a></center>
		</div>
	</div>
</div>

<?php endif;?>




<script>
	/*function supplyOpenWindow(el){
		var res = confirm('Vous allez marquer tous les medicaments comme livrés et cloturer la commande!');
		if(res){
         opener.location.replace('http://127.0.0.1/IPharma/index.php/supply/commandeUpdate/'+el);
                   window.close();
                   return false;
		}
	} */

	function supplyOpenWindowAndClose(el){
		var res = confirm('Vous allez marquer la commande comme livrée sans valider tous les medicaments');
         if(res){
		 opener.location.replace('http://127.0.0.1/IPharma/index.php/supply/commandeClose/'+el);
                   window.close();
                   return false;
               }
	}
</script>





























<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- =======================================================