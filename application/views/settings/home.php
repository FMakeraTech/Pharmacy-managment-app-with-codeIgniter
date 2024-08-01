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
			<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Paramètres</span> <br>			
			<ul>
		<li>
		 <a href="<?php echo site_url('settings/managerUsers');?>" style="text-decoration: underline; color: black;">Gestion des utilisateurs</a>
		</li>
		<li>
		 <a href="<?php echo site_url('settings/managerDescription');?>" style="text-decoration: underline; color: black;">Gestion des libellés necessaires</a>
		</li>
		<li>
		  <a href="<?php echo site_url('settings/managerProfile');?>" style="text-decoration: underline; color: black;">Mon Profil</a>
	   </li>
	</ul>
		</div>
	</div>
	
</div>





















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->