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
			<span style="display: block; width: 100%; background: #3445b4; color: white; padding: 2px;">Gestion des utilisateurs</span> <br>	
            <?php if($this->session->flashdata('error')): ?>
            <span style="color: red;"><?php echo $this->session->flashdata('error');?></span>
            <?php elseif($this->session->flashdata('success')): ?>
            <span style="color: green;"><?php echo $this->session->flashdata('success');?></span>
            <?php endif;?>
			<form action="<?php echo site_url('settings/createUsers');?>" method="post">
				<table>
					<tr>
						<td>Code</td>
						<td> : <input type="text" id="code" name="code" style="height:25px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td>Nom de l'utilisateur</td>
						<td> : <input type="text" id="nom" name="nom" style="height:25px; width: 300px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td>Pseudo</td>
						<td> : <input type="text" id="username" name="username" style="height:25px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td>Profil</td>
						<td> : <select id="profil" name="profil" style="height:25px; padding:0; border-radius: 4px;">
							<option value=""></option>
							<?php if(isset($profiles)):?>
								<?php foreach($profiles as $pro):?>
                             <option value="<?php echo $pro->type;?>"> <?php echo $pro->nom;?></option>
							<?php endforeach;?>
						<?php endif;?>
						</select>
						</td>
					</tr>
					<tr>
						<td>Telephone</td>
						<td> : <input type="text" id="phone" name="phone" style="height:25px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td></td>
						<td> : <input type="submit" name="create" value="Créer" style="background: #6acc98; color: white; border: 1px solid white; border-radius: 3px;">

		<input type="submit" name="update" value="Modifier"
		 onclick="return checkUser();" style="background: #edc379; color: white; border: 1px solid white; border-radius: 3px;">
							<!--    <input type="submit" name="delete" value="Supprimer" style="background: #e88f80; color: white; border: 1px solid white; border-radius: 3px;" onclick="confirm('Voulez-vous supprimer cette catégorie?');"> -->
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
							<input type="button" value="vider" onclick="vider()" style="border: 1px solid silver; border-radius: 3px;">

							<input type="submit" name="reset" value="Reinitialiser le mot de passe" class="btn btn-link">
						</td>
					</tr>
				</table>
			</form>	
			<hr>	
			<span style=" display:block; height: 400px; border:1px solid #eee; overflow: scroll;">
				<?php if(isset($users)):?>
				<table class="table table-striped" style="font-size: 12px;">
					<thead class="thead-dark">
					<tr>
						<th style="padding-top: 0; padding-bottom: 0;">Code</th>
						<th style="padding-top: 0; padding-bottom: 0;">Nom de l'utilisateur</th>
						<th style="padding-top: 0; padding-bottom: 0;">Pseudo</th>
						<th style="padding-top: 0; padding-bottom: 0;">Phone</th>
						<th style="padding-top: 0; padding-bottom: 0;">Profil</th>
					</tr>
				</thead>
					<?php foreach($users as $user):?>
					<?php
                       $profil = $this->user_model->get_spec_profil($user->droit, 'nom');
                       $sup = $user->super;
                       if($sup == 1){
                       	 $profil = "Super User";
                       }
					?>
					<?php //if($user->super == 0):?>
				    <tr style="cursor: pointer;" 
				    onclick="selectUsers('<?php echo $user->code?>','<?php echo $user->nom?>','<?php echo $user->username; ?>','<?php echo $user->droit; ?>','<?php echo $user->phone?>');" 
				    >
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $user->code;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $user->nom;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $user->username;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $user->phone;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $profil;?></td>
				    </tr>
				<?php //endif;?>
				<?php endforeach;?>
			<?php endif;?>
				</table>
			</span>
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

	function checkUser(){
		var a = document.getElementById('code').value;
		if(a == 'user.00'){
			if(confirm('This is the super user.It is not recommanded, Are you sure?')){
				return true;
			}else{
				return false;
			}
		}
	}
</script>

















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->