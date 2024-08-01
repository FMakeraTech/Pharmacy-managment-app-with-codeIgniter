<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<?php $this->load->view('templates/menu.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->


<div class="container">
	<div class="row">
		<div class="col-12 m-md-5">
			<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px;">Statistiques</span> <br>
			<span style="margin-left: 20px;">
				de <input type="date" id="debut" style="border-radius: 4px;" value="<?php echo date('Y-m-d');?>"> à <input type="date" id="fin" style="border-radius: 4px;" value="<?php echo date('Y-m-d');?>">
			</span><br>
			<hr>
			
			<ul>
		<li>
			<a href="#" style="text-decoration: underline; color: black;" onclick="open_statsRevenuDrugsCategory()">Revenu par categorie de medicament</a></li>
		<li><a href="#" style="text-decoration: underline; color: black;" onclick="open_statsRevenuDrugs()">
		Revenu par medicaments</a></li>
		<li><a href="#" style="text-decoration: underline; color: black;" onclick="open_statsInvoiceInsurance()">
		Factures assureur emises</a></li>
		<li><a href="#" style="text-decoration: underline; color: black;" onclick="open_statsInvoiceInsuranceCover()">
		Taux de recouvrement des factures assureur</a></li>
		<li><a href="#" style="text-decoration: underline; color: black;" onclick="open_statsDepenses()">
		Rapport des dépenses</a></li>
	</ul>
		</div>
	</div>
	
</div>





<script>
	function open_statsRevenuDrugsCategory(){
		var debut = document.getElementById('debut').value;
		var fin = document.getElementById('fin').value;
        
		var mywindow = window.open('http://127.0.0.1/IPharma/index.php/statistique/statsRevenuDrugsCategory/'+debut+'/'+fin,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=1100,height=650,left=200,top=50');
         mywindow.focus();
     
	}


	function open_statsRevenuDrugs(){
		var debut = document.getElementById('debut').value;
		var fin = document.getElementById('fin').value;
        
		var mywindow = window.open('http://127.0.0.1/IPharma/index.php/statistique/statsRevenuDrugs/'+debut+'/'+fin,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=1100,height=650,left=200,top=50');
         mywindow.focus();
     
	}

	function open_statsInvoiceInsurance(){
		var debut = document.getElementById('debut').value;
		var fin = document.getElementById('fin').value;
        
		var mywindow = window.open('http://127.0.0.1/IPharma/index.php/statistique/statsInvoiceInsurance/'+debut+'/'+fin,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=1100,height=650,left=200,top=50');
         mywindow.focus();
     
	}

	function open_statsInvoiceInsuranceCover(){
		var debut = document.getElementById('debut').value;
		var fin = document.getElementById('fin').value;
        
		var mywindow = window.open('http://127.0.0.1/IPharma/index.php/statistique/statsInvoiceInsuranceCover/'+debut+'/'+fin,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=1100,height=650,left=200,top=50');
         mywindow.focus();
     
	}

	function open_statsDepenses(){
		var debut = document.getElementById('debut').value;
		var fin = document.getElementById('fin').value;
        
		var mywindow = window.open('http://127.0.0.1/IPharma/index.php/statistique/statsDepenses/'+debut+'/'+fin,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=1100,height=650,left=200,top=50');
         mywindow.focus();
     
	}
</script>























<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->