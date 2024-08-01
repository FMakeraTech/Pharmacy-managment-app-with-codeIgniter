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
   	<div class=" col-md-12 mt-md-5">
		<center><h4>Facturation des societés</h4>
		<select name="" id="" type="text" style="padding:5px 10px 5px 10px; border-radius: 4px;" onchange="get_search_insurances(this.value); get_insuranceInvoices(this.value)">
			<option value="">Select insurance</option>
			  	<?php if(isset($assurance)):?>
								  <?php foreach($assurance as $ass):?>
								  	<option value="<?php echo $ass->idassurance;?>"> <?php echo $ass->nom;?></option>
								  <?php endforeach;?>
								<?php endif;?>
		</select></center>
		<p>
			<hr>
			<?php if($this->session->flashdata('success')):?>
			<center><span style="color:green"><?php echo $this->session->flashdata('success');?></span></center>
		    <?php endif;?>
		</p>
		
	</div>
  </div>
	<div class="row">
		<div class="col-12">
		<center>
			<div id="zone-insuranceInvoice" style="max-height: 500px; overflow: scroll;">
				
			</div>
		</center>
		
	</div>
	</div>

	<div class="row">
		<div class="col-12">
		<center>
			<div id="zone-InsurancePrestation">
			</div>
		</center>
		
	</div>
	</div>

</div>
		

		




<script>
	function get_search_insurances(el)
	{

		fetch("http://127.0.0.1/IPharma/index.php/assurance/insurances/"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone-InsurancePrestation').html(data);
			// console.log('prestations');
		});
	}

	function get_insuranceInvoices(el)
	{
		fetch("http://127.0.0.1/IPharma/index.php/assurance/insuranceInvoices/"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone-insuranceInvoice').html(data);
		});
	}
</script>











<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->