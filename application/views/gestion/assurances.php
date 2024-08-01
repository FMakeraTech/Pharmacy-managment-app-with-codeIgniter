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
		<div class="col-12 m-md-5">
			<span style="display: block; width: 100%; background: #d1e3e8; padding-left: 10px;">
				<a style="color: black;text-decoration: underline;" style="color: black;text-decoration: underline;" href="<?php echo site_url('manager');?>">Gestion</a></span>
			<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Gestion des assureurs</span> <br>	
            <?php if($this->session->flashdata('error')): ?>
            <span style="color: red;"><?php echo $this->session->flashdata('error');?></span>
            <?php elseif($this->session->flashdata('success')): ?>
            <span style="color: green;"><?php echo $this->session->flashdata('success');?></span>
            <?php endif;?>
			<form action="<?php echo site_url('manager/createInsurances');?>" method="post">
				<table>
					<tr>
						<td>Code</td>
						<td> : <input type="text" id="code" name="code" style="height:25px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td>Nom de la societé</td>
						<td> : <input type="text" id="nom" name="nom" style="height:25px; width: 300px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td></td>
						<td> : <input type="submit" name="create" value="Créer" style="background: #6acc98; color: white; border: 1px solid white; border-radius: 3px;">
							   <input type="submit" name="update" value="Modifier" style="background: #edc379; color: white; border: 1px solid white; border-radius: 3px;">
							<!--    <input type="submit" name="delete" value="Supprimer" style="background: #e88f80; color: white; border: 1px solid white; border-radius: 3px;" onclick="confirm('Voulez-vous supprimer cette catégorie?');"> -->
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
							<input type="button" value="vider" onclick="vider()" style="border: 1px solid silver; border-radius: 3px;">
						</td>
					</tr>
				</table>
			</form>	
			<hr>	
			<span style=" display:block; height: 400px; border:1px solid #eee; overflow: scroll;">
				<?php if(isset($insurances)):?>
				<table class="table table-striped" style="font-size: 12px;">
					<thead class="thead-dark">
					<tr>
						<th style="padding-top: 0; padding-bottom: 0;">Code</th>
						<th style="padding-top: 0; padding-bottom: 0;">Nom de la societé</th>
						<th style="padding-top: 0; padding-bottom: 0;">Type</th>
					</tr>
				</thead>
					<?php foreach($insurances as $ins):?>
					<?php
                          if($ins->type == 0){
                          	 $type = "Privé";
                          }else{
                          	$type = "Prise en charge";
                          }

					?>
				    <tr style="cursor: pointer;" 
				    onclick="selectInsurances('<?php echo $ins->code?>','<?php echo $ins->nom?>');" 
				    >
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $ins->code;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $ins->nom;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $type;?></td>
				    </tr>
				<?php endforeach;?>
			<?php endif;?>
				</table>
			</span>
		</div>
	</div>

	
</div>






<script>
	function selectInsurances(code, nom){
        document.getElementById('code').value = code;
        document.getElementById('nom').value = nom;
	}

	function vider(){
        document.getElementById('code').value = "";
        document.getElementById('nom').value = "";
	}
</script>

















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->