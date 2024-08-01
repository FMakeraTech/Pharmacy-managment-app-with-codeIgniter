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
			<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Gestion</span> <br>			
			<ul>
		<li>
			<a href="<?php echo site_url('manager/managerDrugsCategory');?>" style="text-decoration: underline; color: black;">Gestion des catégories des médicaments</a>
		</li>
		<li><a href="<?php echo site_url('manager/managerDrugs');?>" style="text-decoration: underline; color: black;">
		Gestion des médicaments</a></li>
		<li><a href="<?php echo site_url('manager/managerInsurances');?>" style="text-decoration: underline; color: black;">
		Gestion des assureurs</a></li>
		<li><a href="<?php echo site_url('manager/managerInsurancesTarif');?>" style="text-decoration: underline; color: black;">
		Gestion des categories de tarif assureurs</a></li>
		<li><a href="<?php echo site_url('manager/managerCaisses');?>" style="text-decoration: underline; color: black;">
		Gestion des caisses</a></li>
		<li><a href="<?php echo site_url('manager/managerFournisseurs');?>" style="text-decoration: underline; color: black;">
		Gestion des fournisseurs</a></li>
		<li><a href="<?php echo site_url('manager/managerDepenses');?>" style="text-decoration: underline; color: black;">
		Gestion des dépenses</a></li>
	</ul>
		</div>
	</div>
	
</div>





















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->