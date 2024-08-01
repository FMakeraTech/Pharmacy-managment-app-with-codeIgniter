<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->
<!-- ================== MENU ========================= -->
<?php $this->load->view('templates/menu.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->


<div class="container" id="print-me1">
	<div class="row">
		<div class="col-11 m-md-5">
			<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Résumé de caisse</span>
				<table style="margin-top: 10px;">
					<tr style="border-bottom: 1px solid #eee;">
						<td style="padding-left:5px; min-width:150px; background: #b4deed; color: black; font-weight: bold;">Caisse</td>
						<td style="padding-left: 5px;" colspan="2">
							<select id="caisse" style="min-width: 300px;padding:0;border-radius: 4px; font-size:11px;">
								<?php if(isset($caisses)):?>
								  <?php foreach($caisses as $cai):?>
								  	<option value="<?php echo $cai->idcaisses;?>"> <?php echo $cai->nom;?></option>
								  <?php endforeach;?>
								<?php endif;?>
							</select>
						</td>
					</tr>
					<tr style="border-bottom: 1px solid #eee;">
						<td style="padding-left:5px; min-width:150px; background: #b4deed; color: black; font-weight: bold;">Période</td>
						<td style="padding-left: 5px;">De <input style="padding:0;border-radius: 4px; font-size:11px;" type="date" id="debut" value="<?php echo date('Y-m-d');?>"></td>
						<td style="padding-left: 5px;">à <input style="padding:0;border-radius: 4px; font-size:11px;" type="date" id="fin" value="<?php echo date('Y-m-d');?>"></td>
						<td></td>
					</tr>
					<tr style="border-bottom: 1px solid #eee;">
						<td style="padding-left:5px; min-width:150px; background: #b4deed; color: black; font-weight: bold;"></td>
						<td style="padding-left: 25px;" >
							<button type="button" style="padding:2px 5px 2px 5px; border-radius: 4px; font-size:11px;" onclick="do_getCaisseEntree(); do_getCaisseSortie();">Chercher
							</button>
						</td>
					</tr>
				</table>
		</div>
	</div>
	<div class="row" style="margin-top: 0">
		<div class="col-11 ml-5">
			<table width="100%;">
					<tr>
						<td style="text-align: left" id="print-me3">
					
						</td>
						<td style="text-align: right" id="print-me2"><a href="#" onclick="printCaisseSummary();">Imprimer</a></td>
					</tr>
				</table>
			<span style="font-size:12px; padding:2px 0 2px 5px; display: block; width: 100%; background: #b4deed; color: black;" > Sorties</span> <br>
			<span id="zone-sortie">
				
			</span> <br>
			<span style="font-size:12px; padding:2px 0 2px 5px; display: block; width: 100%; background: #b4deed; color: black;" > Entrées</span> <br>
			<span id="zone-entree" style="height: 300px; overflow: scroll;">
				
			</span>

		</div>
	</div>
</div>

















<!-- ============= Scripts ===================== -->
<script>

	function printText(){
		console.log('Done');
	}

	function do_getCaisseSortie(){
		var caisse = document.getElementById('caisse').value;
		var debut = document.getElementById('debut').value;
		var fin = document.getElementById('fin').value;
		fetch('http://127.0.0.1/IPharma/index.php/caisse/getCaisseSorties/'+caisse+'/'+debut+'/'+fin).then(res =>{
			return res.text();
		}).then(data =>{
			$('#zone-sortie').html(data);
		});
	}

	function do_getCaisseEntree(){
		var caisse = document.getElementById('caisse').value;
		var debut = document.getElementById('debut').value;
		var fin = document.getElementById('fin').value;

		fetch("http://127.0.0.1/IPharma/index.php/caisse/getCaisseEntrees/"+caisse+"/"+debut+"/"+fin)
		.then(res =>{
			return res.text();
		})
		.then(data =>{
			$('#zone-entree').html(data);
			// console.log('Done');
		});
	}

	function printCaisseSummary(){
	  var zone2 = document.getElementById('print-me2');
	  zone2.style.display = "none";
	  // zone3.style.display = "none";
      var zone1 = document.getElementById('print-me1').innerHTML;
      
      var fen = this.window;
      fen.document.body.innerHTML = zone1;
       fen.print();


   }
</script>







<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->