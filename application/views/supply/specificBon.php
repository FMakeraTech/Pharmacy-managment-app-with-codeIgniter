
<?php if(isset($supplyCommande)):?>
   <span id="print-me">
<?php
   
   $numero = $numeroBon;
   $date = $this->supply_model->get_spec_dateOfCommande($numero,'date');
   $state = $this->supply_model->get_spec_dateOfCommande($numero,'statut');
   setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
   $dat = ucfirst(strftime("Le %d %B %Y", strtotime($date)));
?>
<?php if($state == 1): ?>
<span style="color: #c40c0c; font-weight: bold;">Cette commande a été cloturée</span>
<?php endif;?>
<table style="width: 100%;">
	<tr>
		<td>Pharamacie :</td> <td style="text-align: right;"> <?php echo $dat;?> </td>
	</tr>
	<tr>
		<td>NIF:</td>
	</tr>
	<tr>
		<td>Fournisseur : </td>
	</tr>
</table>

 <center><span style="font-weight:bold; font-size: 16px;">Numero du bon : <?php echo $numero;?></span></center>
 <table style="width: 80%; margin-left:10%;">
 	<tr style="border-bottom: 1px solid #eee;">
 		<th style="text-align: left;">Medicaments</th>
 		<th style="text-align: left;">Quantité</th>
 		<!-- <th></th> -->
 	</tr>
   <?php $tot = 0;?>
 <?php foreach($supplyCommande as $sc):?>
      <?php
         $med = $this->facturation_model->get_spec_med($sc->iddrugs, 'nom');
         $pa = $this->facturation_model->get_spec_med($sc->iddrugs, 'pa');
         $qte = $sc->quantite;
         $tot += $pa;

      ?>
      <tr style="border-bottom: 1px solid #eee;">
      <td style="padding-top: 0; padding-bottom: 0;"><?php echo $med;?></td>
      <td style="padding-top: 0; padding-bottom: 0;"><?php echo $qte;?></td>
      </tr>


 <?php endforeach; ?>
</table>
</span>
 <table style="width: 80%; margin-left:10%;">
    <tr>
       <th style="padding-top: 0; padding-bottom: 0; text-align: left;">Total</th>
       <th style="padding-top: 0; padding-bottom: 0; text-align: left;"><?php echo $tot;?>fbu</th>
    </tr>
 </table>
<center><button type="button" style="margin-top:15px; border-radius: 4px; padding: 5px 15px 5px 15px; cursor: pointer;" onclick="printSupplyBon()">Imprimer</button></center>

<?php endif;?>






<script>
   function printSupplyBon(){
      var zone = document.getElementById('print-me').innerHTML;
      var fen = this.window;
      fen.document.body.innerHTML = zone;
       fen.print();

   }
</script>

