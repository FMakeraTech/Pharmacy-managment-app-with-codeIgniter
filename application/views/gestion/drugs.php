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
			<span style="display: block; width: 100%; background: #d1e3e8; padding-left: 10px;"><a style="color: black;text-decoration: underline;" href="<?php echo site_url('manager');?>">Gestion</a></span>
			<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Gestion des médicaments</span> <br>	
            <?php if($this->session->flashdata('error')): ?>
            <span style="color: red;"><?php echo $this->session->flashdata('error');?></span>
            <?php elseif($this->session->flashdata('success')): ?>
            <span style="color: green;"><?php echo $this->session->flashdata('success');?></span>
            <?php endif;?>
			<form action="<?php echo site_url('manager/createDrugs');?>" method="post">
				<table>
					<tr>
						<td>Code</td>
						<td> : <input type="text" id="code" name="code" style="height:25px; padding:0; border-radius: 4px;"></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Nom du médicament</td>
						<td> : <input type="text" id="nom" name="nom" style="height:25px; padding:0; width: 350px; border-radius: 4px;"></td>
						<td>Categorie parent</td>
						<td> : <select id="categorie" name="categorie" style="height:25px; padding:0; width:200px; border-radius: 4px;">
							<!-- <option value=""></option> -->
							<?php if(isset($categorie)):?>
								<?php foreach($categorie as $cat):?>
                             <option value="<?php echo $cat->iddrugs_category;?>"><?php echo $cat->nom;?></option>
							<?php endforeach;?>
						<?php endif;?>
						    </select>
						</td>
					</tr>
					<tr>
						<td>Prix d'achat</td>
						<td> : <input type="text" id="pa" name="pa" style="height:25px; padding:0; border-radius: 4px;"></td>
						<td>Prix de vente</td>
						<td> : <input type="text" id="pv" name="pv" style="height:25px; padding:0; border-radius: 4px;"></td>
					</tr>
					<tr>
						<td>Prix MFP</td>
						<td> : <input type="text" id="prixmfp" name="prixmfp" style="height:25px; padding:0; border-radius: 4px;"></td>
						<td>Prise en charge MFP</td>
						<td> : <input type="text" id="percentmfp" name="percentmfp" style="height:25px; padding:0; border-radius: 4px;">%</td>
					</tr>
					<tr>
						<td>Unité</td>
						<td> :
						<select id="unity" name="unity" style="height:25px; padding:0; width:100px; border-radius: 4px;" onchange="uQty(this.value);">
							<option value=""></option>
							<option value="0">Unit</option>
							<option value="1">Flacon</option>
							<option value="2">Boite</option>
						</select>
						<input type="text" id="uqty" name="uqty" style="height:25px; padding:0;padding-left:6px; font-weight: bold; width:100px; border-radius: 4px;">
					  </td>
						<td>Quantité d'alerte</td>
						<td> : <input type="text" id="alertqte" name="alertqte" style="height:25px; padding:0; border-radius: 4px;"></td>
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
			<input type="recherche" placeholder="Chercher un médicament" style="border-radius: 4px;margin-bottom: 6px; width:300px;padding:3px 10px 3px 10px;" onkeyup="searchDrugsInManagment(this.value);">
			<span style=" display:block; height: 400px; border:1px solid #eee; overflow: scroll;" id="drugs-zone">
				<?php if(isset($drugs)):?>
				<table class="table table-striped" style="font-size: 12px;">
					<thead class="thead-dark">
					<tr>
						<th style="padding-top: 0; padding-bottom: 0;">Code</th>
						<th style="padding-top: 0; padding-bottom: 0;">Nom</th>
						<th style="padding-top: 0; padding-bottom: 0;">Categorie</th>
						<th style="padding-top: 0; padding-bottom: 0;">Prix d'achat</th>
						<th style="padding-top: 0; padding-bottom: 0;">Prix de vente</th>
						<th style="padding-top: 0; padding-bottom: 0;">Prix MFP</th>
						<th style="padding-top: 0; padding-bottom: 0;">Prise en charge MFP</th>
						<th style="padding-top: 0; padding-bottom: 0;">Unité</th>
						<th style="padding-top: 0; padding-bottom: 0;">Nobre/E</th>
						<th style="padding-top: 0; padding-bottom: 0;">Quantité alerte</th>
					</tr>
				</thead>
					<?php foreach($drugs as $dr):
                      $category = $this->statistic_model->get_spec_med_cat($dr->drugs_category_iddrugs_category, 'nom');
                      $place = $this->statistic_model->get_spec_med_cat($dr->drugs_category_iddrugs_category, 'place');
                      if($dr->unity == 0){
                      	$unity = "Unit";
                      }elseif($dr->unity == 2){
                      	$unity = "Boite";
                      }elseif($dr->unity == 1){
                      	$unity = "Flacon";
                      }else{
                      	$unity = "Flacon";
                      }

						?>
				    <tr style="cursor: pointer;" 
				    onclick="selectDrug(
				    '<?php echo $dr->code?>',
				    '<?php echo $dr->nom?>',
				    '<?php echo $dr->drugs_category_iddrugs_category?>',
				    '<?php echo $dr->pa?>',
				    '<?php echo $dr->pv?>',
				    '<?php echo $dr->prixmfp?>',
				    '<?php echo $dr->percentmfp?>',
				    '<?php echo $dr->unity?>',
				    '<?php echo $dr->qty?>',
				    '<?php echo $dr->alertQuantity?>'
				    );" 
				    >
				        <th style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->code;?></th>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->nom;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $category;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->pa;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->pv;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->prixmfp;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->percentmfp;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $unity?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->qty;?></td>
				    	<td style="padding-top: 0; padding-bottom: 0;"><?php echo $dr->alertQuantity;?></td>
				    </tr>
				<?php endforeach;?>
			<?php endif;?>
				</table>
			</span>
		</div>
	</div>

	
</div>






<script>
	function selectDrug(code, nom, idcat,pa,pv,prixmfp,percentmfp,idunity,qty,aqte){
        document.getElementById('code').value = code;
        document.getElementById('nom').value = nom;
        document.getElementById('categorie').value = idcat;
        document.getElementById('pa').value = pa;
        document.getElementById('pv').value = pv;
        document.getElementById('prixmfp').value = prixmfp;
        document.getElementById('percentmfp').value = percentmfp;
        document.getElementById('unity').value = idunity;
        document.getElementById('uqty').value =qty;
        document.getElementById('alertqte').value = aqte;
        
	}


	function vider(){
        document.getElementById('code').value = ""; 
        document.getElementById('nom').value = "";
        document.getElementById('categorie').value = "";
        document.getElementById('pa').value = "";
        document.getElementById('pv').value = "";
        document.getElementById('prixmfp').value = "";
        document.getElementById('percentmfp').value = ""; 
        document.getElementById('unity').value = "";
        document.getElementById('uqty').value = "";
        document.getElementById('alertqte').value = "";
	}

	function uQty(el){
		if(el == 0){
			document.getElementById('uqty').value = 1;
		}
		else if(el == 1){
			document.getElementById('uqty').value = 1;
		}else{
			document.getElementById('uqty').value = "";
		}		
	}

	function searchDrugsInManagment(el)
	{
		fetch("http://127.0.0.1/IPharma/index.php/manager/searchDrugsInManagment/"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#drugs-zone').html("");
			$('#drugs-zone').html(data);
		});
	}
</script>

















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->