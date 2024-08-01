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
			<span style="display: block; width: 100%; background: #d1e3e8; padding-left: 10px;"><a style="color: black;text-decoration: underline;" href="<?php echo site_url('settings');?>">Paramètres</a></span>
			<span style="display: block; width: 100%; background: #3445b4; color: white; padding: 2px;">Mon profil</span> <br>	
            <?php if($this->session->flashdata('error')): ?>
            <span style="color: red;"><?php echo $this->session->flashdata('error');?></span>
            <?php elseif($this->session->flashdata('success')): ?>
            <span style="color: green;"><?php echo $this->session->flashdata('success');?></span>
            <?php endif;?>
			<form action="<?php echo site_url('settings/updatePassword');?>" method="post">
				<table>
					<tr>
						<td>Ancien mot de pass</td>
						<td> : <input type="password" name="old" style="height:25px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td>Nouveau mot de pass</td>
						<td> : <input type="password" name="new1" style="height:25px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td>Confirmer mot de pass</td>
						<td> : <input type="password" name="new2" style="height:25px; padding:0; border-radius: 4px;"></td>
					</tr>

					<tr>
						<td></td>
						<td> : <input type="submit" name="create" value="Sauvegarer" style="background: #6acc98; color: white; border: 1px solid white; border-radius: 3px;">
						</td>
					</tr>
				</table>
			</form>	
			<hr>	
		</div>
	</div>

	
</div>






<script>
	function selectUsers(code, nom, username, profil, phone){
        document.getElementById('code').value = code;
        document.getElementById('nom').value = nom;
        document.getElementById('username').value = username;
         document.getElementById('profil').value = profil;
          document.getElementById('phone').value = phone;
	}


	function vider(){
        document.getElementById('code').value = "";
        document.getElementById('nom').value = "";
        document.getElementById('username').value = "";
         document.getElementById('profil').value = "";
          document.getElementById('phone').value = "";
	}
</script>

















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->