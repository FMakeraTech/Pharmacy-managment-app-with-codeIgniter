<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->

<?php 
      if (isset($invoice)) {
      	$numero = $invoice;
      }else{
      	$numero = "";
      }

      if (isset($amount)) {
      	$montant = $amount;
      }else{
      	$montant = "";
      }


?>

<div class="container">
<div class="row">
	<div class="col-12">
		<span style="display:block; width:470; padding:12px 20px 12px 20px; background: #3445b4; color:#44bef1">Paiement de la facture</span>
		<?php if($this->session->flashdata('error')):?>
			<center><span style="color: red;"><?php echo $this->session->flashdata('error');?></span></center>
		<?php endif;?>
		<form action="<?php echo site_url('facturation/payment_validation/'.$numero.'/'.$montant);?>" class="payment-form" style="border-left: 1px solid #3445b4; margin-top: 20px; padding-left:15px;" method="post">
			<div class="form-group row">
				<label for="" class="col-2 col-form-label">Date : </label>
				<div class="col-6">
					<input type="date" name="date" value="<?php echo date('Y-m-d');?>" class="form-control" style="border:1px solid #eee">
				</div>
			</div>
			 <div class="form-group row">
				<label for="" class="col-2 col-form-label">Facture</label>
				<div class="col-6">
				  <input type="text" name="numero" readonly value="<?php echo $numero;?>" class="form-control" readonly>
				</div>
			</div> 
			<div class="form-group row">
				<label for="" class="col-2 col-form-label">Montant</label>
				<div class="col-6">
					<input type="text" name="montant" value="<?php echo $montant;?>" class="form-control" style="border:1px solid #eee" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-2 col-form-label">Cash</label>
				<div class="col-4">
					<input type="text" id="cash" onkeyup="getRest(this.value,'<?php echo $montant;?>');" class="form-control" style="border:1px solid #eee" >
				</div>
				<label for="" class="col-2 col-form-label">Retour</label>
				<div class="col-4">
					<input type="text" id="retour" class="form-control" style="border:1px solid #eee">
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-2 col-form-label">Type</label>
				<div class="col-6">
					
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-2 col-form-label">Caisse</label>
				<div class="col-6">
					<select name="caisse" class="form-control" style="border:1px solid #eee">
			<?php if(isset($caisses)):?>
				<?php foreach($caisses as $c):?>
					<option value="<?php echo $c->idcaisses;?>"> <?php echo $c->nom;?> </option>
				<?php endforeach;?>
			<?php endif;?>
			</select>
				</div>
			</div>	
			  <center><input type="submit" class="form-control btn btn-primary" value="sauvegarder" style="width: 150px; text-align: center; margin: auto;"> </center>
		
<!-- 		</form>
	<a href="#" onclick="
                   // opener.location.reload();
                   opener.location.replace('http://127.0.0.1/IPharma/index.php/facturation/payment_validation');
                   window.close();
                   return false; " >Tente d'accéder à la page appelante </a> -->
	</div>
</div>
</div>

<script>
	function send_data(){
		window.location('http://127.0.0.1/IPharma/index.php/facturation/payment_validation');
	}

	function getRest(el, montant){
		var rest = el - montant;
		document.getElementById('retour').value = rest;

	}
	
</script>




















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- =======================================================