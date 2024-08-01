<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->
<div class="container">
	<div class="row">
		<div class="col-12">
			<span style="font-size:12px; padding:2px 0 2px 5px; display: block; width: 100%; background: #b4deed; color: black;" >Chercher un médicament</span>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<table style="margin-top: 10px;">
	<tr>
		<td>Description : </td>
		<td><input type="text" style="border-radius: 3px; width: 300px; height: 25px;" onkeyup="get_search_prestation(this.value)"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="chercher"></td>
		<td></td>
	</tr>
</table>
<hr>
		</div>
	</div>
	<div class="ro">
		<div class="col-12">
			<span id="zone-drugsSearched">
				
			</span>
		</div>
	</div>
</div>









<script>
	function get_search_prestation(el)
	{

		fetch("http://127.0.0.1/IPharma/index.php/pageascync/suppydrugs/"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone-drugsSearched').html(data);
		});
	}


	function do_addDrugs(el, al){
		opener.document.getElementById('drug').text = al;
	    opener.document.getElementById('drug').value = el;
	    window.close();
	}

</script>



















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->