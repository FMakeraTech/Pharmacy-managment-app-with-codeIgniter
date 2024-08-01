<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fiche de stock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo img_url('ipharma.jpg');?>" />
</head>
<body>
	<?php 
	  $drugname = $this->facturation_model->get_spec_med($drug, 'nom');
	  $qteA = $this->facturation_model->get_spec_med($drug, 'alertQuantity');
	  $unit = $this->facturation_model->get_spec_med($drug, 'unity');
	  $Uqty = $this->facturation_model->get_spec_med($drug, 'qty');
	  if($unit == 0){
	  	$unite = "Unité";
	  }else if($unit == 1){
	  	$unite = "Flacon";
	  }else if($unit == 2){
	  	$unite = "Boite";
	  }
	 ?>
	<table>
		<tr>
			<td style="font-size:12px;">
  			<?php $res = $this->insurance_model->get_libelle_entete();?>
  			<?php if($res):?>
  	<?php foreach($res as $re):?>
	<span><?php echo $re->libelle;?> :</span>
	<span><?php echo $re->valeur;?></span><br>
   <?php endforeach;?>
    <?php endif;?>
  		</td>
			<td>
				<h3>FICHE DE STOCK</h3>
				Désignation : <?php echo $drugname;?>
			</td>
			<td>
				QUANTITE D'ALERTE : <?php echo $qteA;?> <br>
				UNITE : <?php echo $unite;?> <br>
				Quantité/unité: <?php echo $Uqty;?>
			</td>
		</tr>
	</table>
   <?php if(isset($drugStory)):?>
	<table style="margin-top: 20px;">
		<tr>
			<th style="text-align: center; border:1px solid black; background-color: #ddd"></th>
			<th colspan="2" style="text-align: center; border:1px solid black; background-color: #ddd">Entrées</th>
			<th colspan="2" style="text-align: center; border:1px solid black; background-color: #ddd">Sorties</th>
			<th colspan="2" style="text-align: center; border:1px solid black; background-color: #ddd">Disponible</th>
		</tr>
		<tr style="padding-top: 10px;">
			<th style="text-align: center; border:1px solid black; border-bottom:1px solid white; background-color: #ddd">Date</th>
			<th style="text-align: center; border:1px solid black; border-bottom:1px solid white; background-color: #ddd">Qté</th>
			<th style="text-align: center; border:1px solid black; border-bottom:1px solid white; background-color: #ddd">Valeur</th>
			<th style="text-align: center; border:1px solid black; border-bottom:1px solid white; background-color: #ddd">Qté</th>
			<th style="text-align: center; border:1px solid black; border-bottom:1px solid white; background-color: #ddd">Valeur</th>
			<th style="text-align: center; border:1px solid black; border-bottom:1px solid white; background-color: #ddd">Qté</th>
			<th style="text-align: center; border:1px solid black; border-bottom:1px solid white; background-color: #ddd">Valeur</th>
		</tr>
		<?php $solde = 0;?>
		<?php foreach($drugStory as $ds):?>
		<?php  //$pv = $this->facturation_model->get_spec_med($ds->iddrugs,'pv'); ?>
		<?php  $pa =  $ds->pa;?>
		<?php $type = $ds->type;?>
		<?php
		     if($type == 1){
		     	$qteE = $ds->quantite;
		     	$qteS = 0;
		     	$aE = $qteE * $pa;
		     	$aS = 0;
		     	$solde += $qteE;
		     }else if($type == 0){
		     	$qteS = $ds->quantite;
		     	$qteE = 0;
		     	$aS = $qteS * $pa;
		     	$aE = 0;
		     	$solde -= $qteS;
		     }
		     $valeurSolde = $solde * $pa;
		     $date = $ds->date;
		     $dateHist = ucfirst(strftime("%d /%m/ %Y", strtotime($date)));
		?>
		<tr>
			<td style="border:1px solid #ddd; text-align: center"><?php echo $dateHist;?></td>
			<td style="border:1px solid #ddd; text-align: center"><?php echo $qteE;?></td>
		 	<td style="border:1px solid #ddd; text-align: center"><?php echo number_format($aE,2);?></td>
		 	<td style="border:1px solid #ddd; text-align: center"><?php echo $qteS;?></td>
		 	<td style="border:1px solid #ddd; text-align: center"><?php echo number_format($aS,2);?></td>
		 	<td style="border:1px solid #ddd; text-align: center"><?php echo $solde;?></td>
		 	<td style="border:1px solid #ddd; text-align: center"><?php echo number_format($valeurSolde,2);?></td>
		</tr>
		<?php endforeach;?>

	</table>
	<?php endif;?>
	
</body>
</html>