<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<?php 
      if (isset($insuranceInvoice)) {
      	$numero = $insuranceInvoice;
      	$idass = $this->insurance_model->get_spect_factureass($numero,'assurance_idassurance');
      	$assurance = $this->facturation_model->get_spec_assura($idass,'nom');
      }else{
      	$numero = "";
      	$assurance = "";
      }
?>

<div class="container">
<div class="row">
	<div class="col-12">
		<span style="display:block; width:470; padding:12px 20px 12px 20px; background: #3445b4; color:#44bef1">Recouvrement Facture assureur : <?php echo $numero;?></span>
		<?php if($this->session->flashdata('error')):?>
			<center><span style="color: red;"><?php echo $this->session->flashdata('error');?></span></center>
		<?php endif;?>
		<!-- <span>Assurance : <?php echo $assurance;?></span> -->
		<form action="<?php echo site_url('assurance/recover_validation/'.$numero);?>" class="payment-form" style="border-left: 1px solid #3445b4; margin-top: 20px; padding-left:15px;" method="post">
			<div class="form-group row">
				<label for="" class="col-4 col-form-label">Date : </label>
				<div class="col-8">
					<input type="date" id="date" name="date" class="form-control" value="<?php echo date('Y-m-d');?>" style="border:1px solid #eee">
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-4 col-form-label">Mode de paiement</label>
				<div class="col-8">
					<select name="paiement" class="form-control" style="border:1px solid #eee">
						<option value="choisir"></option>
						<option value="1">Banque</option>                
			</select>
				</div>
			</div>	
			  <button type="button" onclick="do_recoverInsurance(<?php echo $numero;?>)" class="form-control btn btn-primary"
			  > Valider </button>
		</form>
	</div>
</div>
</div>

<script>
	function send_data(){
		window.location('http://127.0.0.1/IPharma/index.php/facturation/payment_validation');
	}


	function do_recoverInsurance(num){
	var date = document.getElementById('date').value;
     opener.location.replace('http://127.0.0.1/IPharma/index.php/assurance/recover_validation/'+date+'/'+num);
                   window.close();
                   return false;
	}
	
</script>




















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- =======================================================