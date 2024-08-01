<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->
<div onload="window.close()">
<form action="<?php echo site_url('supply/commanderDrug');?>" method="post">
<table class="table">
	<tr>
		<td>Date</td>
		<td><input type="date" id="date" value="<?php echo date('Y-m-d');?>" style="width:250px;border-radius: 4px;"></td>
	</tr>
	<tr>
		<td>Fournisseur</td>
		<td><select id="fournisseur" style="width:250px; padding-top: 3px; padding-bottom: 3px; border-radius: 4px">
			<?php if(isset($fournisseur)):?>
				<?php foreach($fournisseur as $four):?>
               <option value="<?php echo $four->idfournisseur;?>"><?php echo $four->nom;?></option>
				<?php endforeach;?>
			<?php endif;?>
		</select></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="button" value="sauvegarder" style="border-radius: 4px;"
			onclick="do_commanderDrugs();"> Sauvegarder </button><input type="button" value="Annuler" style="border-radius: 4px;" onclick="window.close();"></td>
		<td></td>
	</tr>
</table>
</form>

</div>



<script>
	function do_commanderDrugs(){
	var date = document.getElementById('date').value;
	var fournisseur = document.getElementById('fournisseur').value;
     opener.location.replace('http://127.0.0.1/IPharma/index.php/supply/commanderDrug/'+date+'/'+fournisseur);
                   window.close();
                   return false;
	}
</script>

























<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->