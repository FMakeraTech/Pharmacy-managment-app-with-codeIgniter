<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->

<div class="container" style="margin-top: 30px;">
	<div class="row">
		<div class="col-12">	
		<div style="margin-left:25%;">
		  <span class="logo" style="padding:0;font-size: 48px; font-weight: 900; color: #3445b4;">IPharma</span> <br>
		 <span style="font-size: 18px; font-weight: 900; color:#007bff;">Gestion d'une pharmacie</span>
		</div>
		<div style="width:50%; margin-left:25%; margin-top: 20px; background: white; padding-top: 50px; padding-bottom: 80px; border-radius: 12px;">
			<center>
				<h3>Connexion</h3>
				<hr>
               <?php if($this->session->flashdata('not_loggedin')):?>
               <span style="color: red;"><?php echo $this->session->flashdata('not_loggedin');?></span>
                <?php endif;?>


				<form action="<?php echo site_url('users/log_in');?>" method="post">
					<input type="text" name="username" style="width:300px; padding: 5px 20px 5px 20px; border:1px solid #8cc9e6; border-radius: 5px;" placeholder="Identifiant"> <p></p>
					<input type="password" name="password" style="width:300px; padding: 5px 20px 5px 20px; border:1px solid #8cc9e6; border-radius: 5px;" placeholder="Mot de passe"> <p></p>
					<input type="submit" value="Connexion" style="padding: 5px 20px 5px 20px; border:1px solid white; border-radius: 5px; background: #8cc9e6; color: white">
				</form>
			</center>
		</div>
		</div>
	</div>
</div>










<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->