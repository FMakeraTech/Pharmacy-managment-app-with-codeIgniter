<!doctype html>
<html lang="en">
  <head>
   <title>IPharma</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <style>
    body{
      font-size:16px;
      font-family: calibri;
    }
  </style>
   </head>
<body>


<?php if(isset($supplyCommande)):?>
   <span id="print-me1">
<?php
   
   $numero = $numeroBon;
   $dateCo = $this->supply_model->get_spec_dateOfCommande($numero, 'date');
   setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
   $dat = ucfirst(strftime("%A, le %d /%m/ %Y", strtotime($dateCo))); 
?>
<table style="width: 100%;">
	<tr>
		<td style="text-align: left; font-size:20px;">
        <?php $res = $this->insurance_model->get_libelle_entete();?>
        <?php if($res):?>
    <?php foreach($res as $re):?>
  <span sty><?php echo $re->libelle;?> :</span>
  <span sty><?php echo $re->valeur;?></span><br>
   <?php endforeach;?>
    <?php endif;?>
      </td>
    <td style="text-align: right; font-size: 18px;"> <?php echo $dat;?> </td>
	</tr>

</table>

 <center><h3>Bon numéro <?php echo $numero;?></h3></center>
 <table style="width: 80%; margin-left:10%;">
 	<tr>
 		<th style="text-align: left;">Medicaments</th>
 		<th style="text-align: left;">Quantité</th>
    <!-- <th style="text-align: left;">Prix unitaire</th> -->
    <!-- <th style="text-align: left;">Prix Total</th> -->
 		<!-- <th></th> -->
 	</tr>
  <?php $tot = 0;?>
 <?php foreach($supplyCommande as $sc):?>
      <?php
         $med = $this->facturation_model->get_spec_med($sc->iddrugs, 'nom');
         $pa = $this->facturation_model->get_spec_med($sc->iddrugs, 'pa');
         $qte = $sc->quantite;
         $pt = $qte * $pa;
         $tot += $pt;
      ?>
      <tr style="border-top: 1px solid #eee;">
      <td style="padding-top: 0; padding-bottom: 0;"><?php echo $med;?></td>
      <td style="padding-top: 0; padding-bottom: 0;"><?php echo $qte;?></td>
      <!-- <td style="padding-top: 0; padding-bottom: 0;"><?php echo $pa;?></td> -->
      <!-- <td style="padding-top: 0; padding-bottom: 0;"><?php echo $pt;?></td> -->
      </tr>
 <?php endforeach; ?>
 <tr>
   <td colspan="4"><hr></td>
 </tr>
 <tr >
    <th colspan="3" style="text-align: left; padding-top: 0; padding-bottom: 0;">Total</th>
    <th style="text-align: left;padding-top: 0; padding-bottom: 0;"><?php echo $tot;?></th>
 </tr>
</table>
</span>


<div id="print-me2" style="text-align: right; margin-right: 70px; margin-top: 80px; font-size: 20px;">
  <?php $res2 = $this->insurance_model->get_libelle_pied();?>
  <?php if($res2):?>
    <?php foreach($res2 as $re2):?>
  <span id="print-me3"><?php echo $re2->libelle;?></span> <br>
  <span id="print-me4" style="font-weight: bold;"><?php echo $re2->valeur;?></span>
   <?php endforeach;?>
    <?php endif;?>
</div>
<center><button type="button" style="border-radius: 4px; padding: 5px 15px 5px 15px; cursor: pointer;" onclick="printSupplyBon()">Imprimer</button></center>

<?php endif;?>






<script>
   function printSupplyBon(){
      var zone1 = document.getElementById('print-me1').innerHTML;
      var zone2 = document.getElementById('print-me2').innerHTML;
      var fen = this.window;
      fen.document.body.innerHTML = zone1 + zone2;
       fen.print();

   }
</script>

</body>
</html>
