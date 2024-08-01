<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->


<div style="width: 98%; margin: auto;">
	<div class="row">
		<div class="col-12">
			<span style="display: block; background-color: #3445b4; color: white; width: 100%; padding-left: 10px;"> Chercher une commande</span>
			N: <input type="text" style="width: 150px; border-radius: 4px; margin-top: 20px; margin-left: 10px;" onkeyup="do_getSearchedNumberOfCommande(this.value)">
			De <input type="date" id="debut" style="width: 140px; border-radius: 4px; margin-top: 20px; margin-left: 10px;" onchange="do_clearStateField()">
			à <input type="date" id="fin" style="width: 140px; border-radius: 4px; margin-top: 20px; margin-left: 10px;" onchange="do_clearStateField()">
			Etat: <select name="" id="state" onchange="do_getSearchedCommandeListByState();" style="width: 100px; border-radius: 4px; margin-left: 5px;">
				<option value=""></option>
				<option value="0">Encours</option>
				<option value="1">Livrée</option>
			</select>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<span id="zone-searched-commande">
			</span>
		</div>
	</div>
</div>
















<script>
	function do_getSearchedNumberOfCommande(num){
      fetch("http://127.0.0.1/IPharma/index.php/supply/getSearchedNumberOfCommande/"+num)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone-searched-commande').html("");
			$('#zone-searched-commande').html(data);
			// console.log('Good');
		});
	}



	function do_getSearchedCommandeListByState(){
		var debut = document.getElementById('debut').value;
		var fin = document.getElementById('fin').value;
		var state = document.getElementById('state').value;

         fetch("http://127.0.0.1/IPharma/index.php/supply/getSearchedCommandeListByState/"+state+"/"+debut+"/"+fin)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone-searched-commande').html("");
			$('#zone-searched-commande').html(data);
		});        
	}

	function do_clearStateField(){
		document.getElementById('state').value = "";
		document.getElementById('state').text = "";
	}



	function do_openSupplyBon(ID)
{
  var mywindow = window.open('http://127.0.0.1/IPharma/index.php/supply/openSupplyBon/'+ID,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=700,height=600,left=250,top=120');
  mywindow.focus();
}
</script>


























<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->