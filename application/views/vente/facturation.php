<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->
<!-- ================== MENU ========================= -->
<?php $this->load->view('templates/menu.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->
<div class="container">
<div class="row" style="width: 100%; margin:0">
	<div class="col-md-5 p-3 l-4 p-md-5" style="margin-left:30px;">
		<h5 class="mb-4">Vente des médicaments</h5>
		<p>
			<form class="form-inline" name="drug_form">
			 <label for="" class="ml-1">Assurance : </label>
			  <select class="col-md-5 ml-1 mb-2" id="assurance" style="border:1px solid #eee; border-radius: 4px; padding:5px 0 5px 10px">
			  	<?php if(isset($assurance)):?>
								  <?php foreach($assurance as $ass):?>
								  	<option value="<?php echo $ass->idassurance;?>"> <?php echo $ass->nom;?></option>
								  <?php endforeach;?>
								<?php endif;?>
			  </select>
			  <select id="categorie" class="col-md-3 ml-1 mb-2" style="border:1px solid #eee; border-radius: 4px; padding:5px 0 5px 10px">

			  	<?php if(isset($tarif)):?>
								  <?php foreach($tarif as $tar):?>
								  	<option value="<?php echo $tar->idcategorie_assurance;?>"> <?php echo $tar->nom;?></option>
								  <?php endforeach;?>
								<?php endif;?>
			  </select>
	<input style="color:#7d84af;" onkeyup="get_search_prestation(this.value)" type="recherche" class="ml-4 col-md-10 form-control" placeholder="Chercher un médicament" />
			  <div class="col-md-12 ml-4 mt-3" id="zone_prestation">

			  </div>
			  <a href="<?php echo site_url('facturation/facture_creer');?>" class="ml-4 mt-4 form-control btn btn-link" style="text-decoration: underline; color: #3445b4;">Facture patients</a>
			 <!--  <a href="<?php echo site_url('facturation/search_invoice/');?>" class="ml-4 mt-4 form-control btn btn-link" style="text-decoration: underline; color: #3445b4;">Chercher facture</a> -->
			</form>
		</p>
	</div>
	<div class="col-md-6 p-4 p-md-5 pt-3" style="background-color: #ebf2f5;">
		<h5 class="mb-4">Factures patients</h5>
			<div id="zone_facture" >
				<?php $this->load->view('vente/prestations_searched.php'); ?>
			</div>
	</div>
</div>
</div>









<script>
	function get_search_prestation(el)
	{

		fetch("http://127.0.0.1/ipharma/index.php/pageascync/prestations/"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone_prestation').html(data);
		});
	}

	function test_drug(e){
		// var el = document.getElementById('drug');
		var r = document.getElementById('test_zone');
		var ass = document.getElementById('assurance');
		var qte = document.getElementById('qty').value;
		var assura = ass.value;
		r.innerHTML = 'Méd : '+e+' | Assurance : '+assura+' | Quantité : '+qte;
	}
    
    function send_drugs(e, qteS, i){
    	if(confirm('Continuer')){
    	var assurance = document.getElementById('assurance').value;
	    var quantite = document.getElementById('qty'+i).value;

        var categorie = document.getElementById('categorie').value;
		if(quantite <= qteS){
			fetch("http://127.0.0.1/ipharma/index.php/pageascync/send_drugs/"+e+'/'+assurance+'/'+categorie+'/'+quantite)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone_facture').html(data);
		});
		}   		
	  }else{
	  	return false;
	  }
    }

    function check_quantity(qte,qteStock){
    	var check = document.getElementById('checkQuantity');
    	if(qte > qteStock){
            check.innerHTML = " - quantité";
    	}else{
    		check.innerHTML = "";
    	}
    	var assurance = document.getElementById('assurance').value;
		
      
    }

    function delete_drugs(e){
    	if(confirm('Continuer')){
       fetch("http://127.0.0.1/ipharma/index.php/pageascync/delete_drugs/"+e)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone_facture').html('');
			$('#zone_facture').html(data);
		});
	  }else{
	  	return false;
	  }
    }

 function do_updatePrice(el){
    	var mywindow = window.open('http://127.0.0.1/IPharma/index.php/stock/updatePrice/'+el,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=500,height=350,left=200,top=50');
         mywindow.focus();
    }



</script>






<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->