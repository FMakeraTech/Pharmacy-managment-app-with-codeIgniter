<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->

<div style="width: 98%; margin:auto;">
	<span style="background: blue; display: block; width: 100%; color: white; padding-left: 10px;">Reception dans le stock</span>

	<div class="row" style="margin-top: 25px;">
		<div class="col-12">
			<?php if(isset($idstock)){
				$idstock = $idstock;
				$iddrugs = $this->stock_model->get_spec_stock($idstock,'drugs_iddrugs');
				$qte1 = $this->stock_model->get_spec_stock($idstock,'Quantite1');
				$qte2 = $this->stock_model->get_spec_stock($idstock,'Quantite2');
				$med = $this->facturation_model->get_spec_med($iddrugs,'nom');
				$uqty = $this->facturation_model->get_spec_med($iddrugs,'qty');
				$qteRec = $qte2 * $uqty;

			}else{
				$idstock = "";
				$med = "";
				$qte1 = "";
				$qte2 = "";
			}
			?>
				<table class="table-striped">
					<tr>
						<td>Medicament</td>
						<td> : <?php echo $med;?></td>
					</tr>
					<tr>
						<td>Stock actuel</td>
						<td> : <?php echo $qte1;?></td>
					</tr>
					<tr>
						<td>Quantite à receptionner</td>
						<td> : <?php echo $qteRec;?></td>
					</tr>
					<tr style="border-bottom: 1px solid #eee;">
						<td>Date de peremption</td>
						<td> : <input type="date" id="date" style="width:200px; border-radius: 4px;" required></td>
					</tr>
					<tr>
					  <td style="padding-top: 10px;"></td>
					  <td style="padding-top: 10px;">
						<button type="button" style="border-radius: 3px;" onclick="do_validateLoadStock(<?php echo $idstock;?>)">sauvegarder</button></td>
					</tr>
				</table>
		</div>
	</div>
</div>




<script>
	function do_validateLoadStock(el){
		var date = document.getElementById('date').value;
		var res = confirm("Vous allez receptionner une Quantite dans le stcok. Etes-vous certain?");
		if(date != ""){
		if(res){
		 opener.location.replace('http://127.0.0.1/IPharma/index.php/stock/validateLoadStock/'+el+'/'+date);
         window.close();
         return false;
        }
       }
	}
</script>













<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->