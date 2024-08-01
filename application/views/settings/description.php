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
			<span style="display: block; width: 100%; background: #3445b4; color: white; padding: 2px;">Gestion des libellés necessaire</span> <br>	
            <?php if($this->session->flashdata('error')): ?>
            <span style="color: red;"><?php echo $this->session->flashdata('error');?></span>
            <?php elseif($this->session->flashdata('success')): ?>
            <span style="color: green;"><?php echo $this->session->flashdata('success');?></span>
            <?php endif;?>
			<form action="<?php echo site_url('settings/createDescription');?>" method="post">
				<table>
					<tr>
						<td>Code</td>
						<td> : <input type="text" id="code" name="code" style="height:25px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td>Libellé</td>
						<td> : <input type="text" id="libelle" name="libelle" style="height:25px; width: 300px; padding:0; border-radius: 4px;"></td>
						<td>Valeur</td>
						<td> : <input type="text" id="valeur" name="valeur" style="height:25px; width: 300px; padding:0; border-radius: 4px;"></td>
						<td> : <select id="type" name="type" style="height:25px; width: 100px; padding:0; border-radius: 4px;">
							<option value=""></option>
							<option value="1">entete</option>
							<option value="2">pied</option>
						</select></td>
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
				<?php if(isset($descriptions)):?>
				<table class="table table-striped" style="font-size: 12px;">
					<thead class="thead-dark">
					<tr>
						<th style="padding-top: 0; padding-bottom: 0;">Code</th>
						<th style="padding-top: 0; padding-bottom: 0;">libellé</th>
						<th style="padding-top: 0; padding-bottom: 0;">Valeur</th>
						<th style="padding-top: 0; padding-bottom: 0;">Emplacement</th>
					</tr>
				</thead>
					<?php foreach($descriptions as $desc):?>
					<?php
                       if($desc->type == 1){
                          $type = "Entete";
                       }else{
                       	$type = "Pied";
                       }
					?>
				    <tr style="cursor: pointer;" 
				    onclick="selectDescription('<?php echo $desc->code?>','<?php echo $desc->libelle?>','<?php echo $desc->valeur; ?>','<?php echo $desc->type; ?>');" 
				    >
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $desc->code;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $desc->libelle;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $desc->valeur;?></td>
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
	function selectDescription(code, libelle, valeur, type){
        document.getElementById('code').value = code;
        document.getElementById('libelle').value = libelle;
        document.getElementById('valeur').value = valeur;
         document.getElementById('type').value = type;
	}


	function vider(){
        document.getElementById('code').value = "";
        document.getElementById('libelle').value = "";
         document.getElementById('valeur').value = "";
          document.getElementById('type').value = "";
	}
</script>

















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->