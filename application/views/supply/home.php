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
   <span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Selection des medicaments <a href="#" style="margin-left:550px;background-color: white; color: blue; padding: 1px 10px 1px 10px; border-radius: 4px; text-decoration: underline;" onclick="do_openSearchClosedCommandePopup();">Commandes livrées</a></span> <br>

			Médicament : <select name="" style="padding: 2px 0 2px 10px; border-radius: 4px; width: 350px;" readonly>
				<option id="drug"></option>
			</select>

			<!-- <input type="text" id="drug" > -->
			<input type="submit" value="choisir" style="border-radius: 2px; font-size: 12px;" onclick="do_openDrugWindow()"> <p></p>
			Quantité: <input type="number" id="quantity" style="width: 100px;">
			<input type="submit" value="ajouter" onclick="do_addSearchedDrug()">
		</div>
	</div>

		<div class="row" style="margin-top: 0">
		<div class="col-11 ml-5">
			<?php
             if(isset($valideEntry)){
             	$vE = $valideEntry;
             } else{
             	$vE = 0;
             }

			?>
			<?php if($this->session->flashdata('success')):?>
            <span style="color: green;"><?php echo $this->session->flashdata('success');?></span>
			<?php endif;?>
			<span style="font-size:12px; padding:2px 0 2px 5px; display: block; width: 100%; background: #b4deed; color: black;" > Commandes encours 
                 <?php if($vE != 0):?>
				(<a href="<?php echo site_url('supply/cancelNonValidatedCommande');?>" onclick="confirm('Vous allez supprimer les commandes non validées');">Supprimer les commandes non validées (<?php echo $vE;?> Entrées)</a>)
			<?php endif;?>
			</span>  <br>
			<span>
				<?php if(isset($commandes)):?>
					<table class="table" style="font-size: 12px;">
						<tr>
							<th style="padding-top: 0; padding-bottom: 0;">Date</th>
							<th style="padding-top: 0; padding-bottom: 0;">Numero de Bon</th>
							<th style="padding-top: 0; padding-bottom: 0;">Fournisseur</th>
							<th style="padding-top: 0; padding-bottom: 0;">Etat</th>
							<th style="padding-top: 0; padding-bottom: 0;"></th>
						</tr>
					
				  <?php foreach($commandes as $com):?>
                   <?php  
                     $datt = $com->date;
                     setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                     $dat = strftime("%A %d %B", strtotime($datt));                      // echo (strftime("%A %d %B", strtotime($datt))); 
                     $numero = $com->idcommandes;
                     $fourn = $this->supply_model->get_spec_fourn($com->fournisseur_idfournisseur, 'nom');
                     $statut = $com->statut;
                     if($statut == 0){
                     	$etat = "en cours";
                     }else{
                     	$etat = "Terminée";
                     }
                   ?>
                     <tr>
                     	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dat;?></td>
                     	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $numero;?></td>
                     	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $fourn;?></td>
                     	<td style="padding-top: 0; padding-bottom: 0;">
                     	<a href="#" style="display: block; background: #007bff; width:100px; padding-left:10px; color: white;" 
                     	onclick="confirm(do_validateCommande(<?php echo $numero;?>));"><?php echo $etat;?></a></td>
                     	<td style="padding-top: 0; padding-bottom: 0;">
                     		<a href="#" onclick="do_openSupplyBon(<?php echo $numero;?>)">Print</a></td>
                     </tr>
                 <?php endforeach;?>
                 </table>
				  <?php endif;?>
			</span>
		</div>
		</div>
	<div class="row" style="margin-top: 0">
		<div class="col-11 ml-5">
			<span style="font-size:12px; padding:2px 0 2px 5px; display: block; width: 100%; background: #b4deed; color: black;" >Médicaments à commander</span> <br>
			<span id="zone_commande" style="height: 300px; overflow: scroll;">
				<?php if(isset($supplyDrugs)):?>
	<table class="table">
		<tr>
			<th style="padding-top: 0; padding-bottom: 0;">Medicament</th>
			<th style="padding-top: 0; padding-bottom: 0;">Quantité</th>
			<th style="padding-top: 0; padding-bottom: 0;">Prix d'achat</th>
			<th style="padding-top: 0; padding-bottom: 0;"></th>
		</tr>
		<?php $tot = 0;?>
		<?php foreach($supplyDrugs as $sd):?>
         <?php 
            $med = $this->facturation_model->get_spec_med($sd->iddrugs, 'nom');
            $pa = $this->facturation_model->get_spec_med($sd->iddrugs, 'pa');
            $unit = $this->facturation_model->get_spec_med($sd->iddrugs, 'unity');
            if($unit == 0){
            	$typeOfUnity = 'Unité';
            }else if($unit == 1){
            	$typeOfUnity  = 'Flacon';
            }
            else if($unit == 2){
            	$typeOfUnity  = 'Boite';
            }
            $qte = $sd->quantite;
            $tot += $pa;
         ?>
         <tr>
         	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $med;?></td>
         	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $qte;?>(<?php echo $typeOfUnity;?>)</td>
         	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $pa;?></td>
         	<td style="padding-top: 0; padding-bottom: 0;"><a href="#" onclick="do_deleteSearchedDrug(<?php echo $sd->idcommande_drugs;?>)">Delete</a></td>
         </tr>
		<?php endforeach;?>
		<tr>
			<th colspan="2" style="padding-top: 0; padding-bottom: 0;">Total</th>
			<th style="padding-top: 0; padding-bottom: 0;"><?php echo $tot;?></th>
		</tr>
	</table>
	<center><input type="submit" value="commander" onclick="do_openCommandePopup();" style="border-radius: 4px;"></center>
<?php endif;?>
			</span>

		</div>
	</div>




</div>


<script>
	function do_openDrugWindow(){
		document.getElementById('drug').text = '';
		document.getElementById('drug').value = '';
		var el = document.getElementById('test');
	var mywindow = window.open('http://127.0.0.1/IPharma/index.php/supply/openDrugsSearchPage','Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=470,height=500,left=500,top=120');
  mywindow.focus();
}

    function do_addSearchedDrug(){
    	var qte = document.getElementById('quantity').value;
    	var drug = document.getElementById('drug').value;
    	fetch("http://127.0.0.1/IPharma/index.php/pageascync/addDrugToSuppy/"+drug+'/'+qte)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone_commande').html("");
			$('#zone_commande').html(data);
			// console.log('Good');
		});
	  
    }


    function do_deleteSearchedDrug(el){
       fetch("http://127.0.0.1/IPharma/index.php/pageascync/deleteSearchedDrug/"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone_commande').html("");
			$('#zone_commande').html(data);
			// console.log('Good');
		});
    }


    function do_openCommandePopup(){
    	var a = confirm('Voulez-vous continuer?');
    	if(a){
    	var mywindow = window.open('http://127.0.0.1/IPharma/index.php/supply/commandePopup','Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=470,height=300,left=500,top=120');
         mywindow.focus();
     }
    }

   function do_openSupplyBon(ID)
{
  var mywindow = window.open('http://127.0.0.1/IPharma/index.php/supply/openSupplyBon/'+ID,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=700,height=600,left=250,top=120');
  mywindow.focus();
}



function do_updateCommande(el){
         fetch("http://127.0.0.1/IPharma/index.php/supply/commandeUpdate"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone_commande').html("");
			$('#zone_commande').html(data);
			// console.log('Good');
		});
    }


function do_openSearchClosedCommandePopup()
{
  var mywindow = window.open('http://127.0.0.1/IPharma/index.php/supply/openSearchClosedCommandePopup/','Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=700,height=600,left=250,top=120');
  mywindow.focus();
}


function do_validateCommande(el){
	var mywindow = window.open('http://127.0.0.1/IPharma/index.php/supply/validateCommande/'+el,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=700,height=600,left=250,top=120');
  mywindow.focus();
}


</script>















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->