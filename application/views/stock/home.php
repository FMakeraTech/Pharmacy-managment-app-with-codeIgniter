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
		<div class="col-11 m-md-5">
			<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Approvisionnement du Stock <a href="#" style="margin-left:620px;background-color: white; color: blue; padding: 1px 10px 1px 10px; border-radius: 4px; text-decoration: underline;" onclick="do_stockPopupPage();">Etat de stock</a></span><br>
			<center>
				<?php if($this->session->flashdata('error1')):?>
                 <span style="color: red;"><?php echo $this->session->flashdata('error1');?></span>
				<?php elseif($this->session->flashdata('success1')):?>
					<span style="color: green;"><?php echo $this->session->flashdata('success1');?></span>
				<?php endif;?>
			</center>
			<form action="<?php echo site_url('stock/supplyStock');?>" method="post">
				<table>
					<tr>
					  <td>Medicament</td>
					  <td>
					   <select name="drugs" id="" style="border-radius: 4px;" onchange="getDateAndQty(this.value);">
						<?php if(isset($medicament)):?>
                          <option value="">Choisir</option>
                           <?php foreach($medicament as $med):?>
                           <option value="<?php echo $med->iddrugs;?>"><?php echo $med->nom ?>
                               	</option>
                              <?php endforeach;?>
							<?php endif;?>
					   </select>
						</td>
					</tr>
					<tr>
						<td>Quantité</td>
						<td><input type="text" name="qte" style="height: 25px; padding-left:10px; border-radius: 4px;"><span id="zone-dq"></span></td>
					</tr>
					<tr>
						<td>Prix d'achat</td>
						<td><input type="text" name="paTotal" style="height: 25px; padding-left:10px; border-radius: 4px;" required></td>
					</tr>
					<tr>
						<td>Date de peremption</td>
						<td><input type="date" name="date" style="height: 28px; padding-left:10px; border-radius: 4px; width: 190px;"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Sauvegarder" style="margin-top:10px; width:110px;  border-radius: 3px"></td>
					</tr>
				</table>
			</form>
			
		</div>
	</div>
	<div class="row">
		<div class="col-11 m-md-5">
			<?php if($this->session->flashdata('success')):?>
            <span style="color: green;"><?php echo $this->session->flashdata('success');?></span>
			<?php endif;?>
			<?php if($this->session->flashdata('error')):?>
            <span style="color: red;"><?php echo $this->session->flashdata('error');?></span>
			<?php endif;?>
			<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Stock en attente</span> <br>
			<?php if(isset($loadingStock)):?>
				
				<table class="table">
					<th style="padding-top:0; padding-bottom: 0; background-color: #badee0; color: black"></th>
					<th style="padding-top:0; padding-bottom: 0; background-color: #badee0; color: black">Medicament</th>
					<th style="padding-top:0; padding-bottom: 0; background-color: #badee0; color: black">Quantité</th>
					<th style="padding-top:0; padding-bottom: 0; background-color: #badee0; color: black">Etat</th>
				<?php $i = 1; foreach($loadingStock as $lodS):?>
				<?php 
                    $med = $this->facturation_model->get_spec_med($lodS->drugs_iddrugs,'nom');
                    $unit = $this->facturation_model->get_spec_med($lodS->drugs_iddrugs, 'unity');
            if($unit == 0){
            	$typeOfUnity = 'Unité';
            }else if($unit == 1){
            	$typeOfUnity  = 'Flacon';
            }else if($unit == 2){
            	$typeOfUnity  = 'Boite';
            }
                    
                    if($lodS->statut == 0){
                    	$statut = "En attente";
                    }
				?>
					<tr>
						<td style="padding-top:0; padding-bottom: 0;"><?php echo $i;?></td>
						<td style="padding-top:0; padding-bottom: 0;"><?php echo $med;?></td>
						<td style="padding-top:0; padding-bottom: 0;"><?php echo $lodS->Quantite2;?>(<?php echo $typeOfUnity;?>)</td>
						<td style="padding-top:0; padding-bottom: 0;">
							<a href="#" style="color: orange" onclick="do_validateLoadStock(<?php echo $lodS->idstock;?>)">
								<?php echo $statut;?>
							</a>
						</td>
					</tr>
					<?php $i++;?>
				<?php endforeach; ?>
				</table>
			<?php endif;?>
			
		</div>
	</div>
</div>








<script>
	function do_stockPopupPage(){
    	var mywindow = window.open('http://127.0.0.1/IPharma/index.php/stock/stockPopupPage','Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=1100,height=650,left=200,top=50');
         mywindow.focus();
    }


    function do_validateLoadStock(el){
    	var mywindow = window.open('http://127.0.0.1/IPharma/index.php/stock/validateLoadStockPage/'+el,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=600,height=300,left=500,top=125');
         mywindow.focus();
    }


    function getDateAndQty(el){
    	 fetch("http://127.0.0.1/IPharma/index.php/stock/getDateAndQty/"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone-dq').html("");
			$('#zone-dq').html(data);
			// console.log('Good');
		});
    }
</script>


















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->