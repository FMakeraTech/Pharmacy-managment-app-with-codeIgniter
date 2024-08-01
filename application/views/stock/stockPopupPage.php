<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->
<!-- ================== MENU ========================= -->


<div style="width: 98%; margin: auto;">
	<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">
		Etat de stock
	</span>
  <center> 
	<input type="text" style="margin-top:20px;width: 300px; border-radius: 4px;" placeholder="Medicament" onkeyup="do_getOneStockState(this.value)">
	<select id="etat" style="margin-top:20px; border-radius: 3px; width: 150px; padding:3px 10px 3px 10px;"  >
		<option value="">Filtrer</option>
		<option value="all">Tout</option>
		<option value="1">Périmé</option>
	</select>
	<select id="category" style="border-radius: 3px; width: 130px; padding:3px 10px 3px 10px;">
		<option value="">categorie</option>
		<option value="all">Tout</option>
		<?php if(isset($categories)):?>
								<?php foreach($categories as $cat):?>
                             <option value="<?php echo $cat->iddrugs_category;?>"> <?php echo $cat->nom;?></option>
							<?php endforeach;?>
						<?php endif;?>
	</select>
	<button style="background: white; border:1px solid blue; border-radius: 4px; color: #3445b4;" onclick="do_getStockState();">Chercher</button>
</center>
<hr>
<p style="width: 90%; margin: auto" id="zone-statut-stock">
	
</p>
<p>
	<center><button type="button" onclick="window.close()">Fermer</button></center>
</p>
</div>
<div class="row">
	<div class="col-12">
		
	</div>
	
</div>

 



<script>
	function do_getStockState(){
		var option = document.getElementById('etat').value;
		var category = document.getElementById('category').value;
	fetch("http://127.0.0.1/IPharma/index.php/stock/getStockState/"+option+"/"+category)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone-statut-stock').html("");
			$('#zone-statut-stock').html(data);
			// console.log('Good');
		});
	}



	function do_getOneStockState(el){
	fetch("http://127.0.0.1/IPharma/index.php/stock/getOneStockState/"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone-statut-stock').html("");
			$('#zone-statut-stock').html(data);
			// console.log('Good');
		});
	}



	function do_deleteOneStockState(el){
		if(el != '0'){
	var res = confirm("Vous allez retirer la quantité périmé dans le stock. Etes vous sur?");
	 if(res){
		var option = document.getElementById('etat').value;
		var category = document.getElementById('category').value;
	fetch("http://127.0.0.1/IPharma/index.php/stock/deleteOneStockState/"+el+"/"+option+"/"+category)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone-statut-stock').html("");
			$('#zone-statut-stock').html(data);
			// console.log('Good');
		});
	  }
	 }
	}
</script>










<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->