<!-- ================== HEADER ============================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ======================================================= -->
<!-- ======================================================= -->
<!-- ================== MENU =============================== -->
<?php $this->load->view('templates/menu.php'); ?>
<!-- ======================================================= -->
<!-- ======================================================= -->

<div class="row" style="margin-left:50px;">
	<div class="col-md-8 mt-md-5" style="max-width: 500px;">
		<h5>Factures déjà créées</h5>
    <p>
      <form action="<?php echo site_url('facturation/facture_creer');?>" method="post">
      <table>
        <tr>
          <td>Date : </td>
          <td><input type="date" name="date" value="<?php echo date('Y-m-d');?>" style="padding:3px 0 3px 10px;
          border:1px solid #eee; border-radius: 4px;"> </td>
          <td>Statut: </td>
          <td>
            <select name="statut" id="" style="padding:5px 0 5px 10px;
          border:1px solid #eee; border-radius: 4px;">
        <option value="0">Ouvert</option>
        <option value="1">Fermé</option>
      </select>
          </td>
          <td><input type="submit" name="send_invoice" value="chercher" style="padding:5px 10px 5px 10px;border:1px solid #eee; border-radius: 4px; background: #44bef1; color: white;"> </td>
        </tr>
      </table>
    </form>
    <br>
    <input type="text" style="padding:5px 0 5px 10px; border:1px solid #eee; border-radius: 4px;" placeholder="Chercher une facture" onkeyup="get_searchedInvoiceList(this.value)">
      
    </p>
		<p id="zone-searchedInvoice">
        	<?php if(isset($facture)):?>
        	<table class="table" style="font-size: 12px;" >
        		<th style="padding-top: 0;">Date</th>
        		<th style="padding-top: 0;">Numero</th>
        		<th style="padding-top: 0;">Statut</th>
        		<?php foreach($facture as $fact):?>
        			<?php 
                      if($fact->statut == 0){
                      	$statut = "Ouvert";
                      }else{
                      	$statut = "Fermé";
                      }
        			?>
        			<tr onclick="changeBGColor(this);" class="mystyle">
        				<td style="padding-top: 0; padding-bottom:0"><?php echo $fact->date;?></td>
        				<td style="padding-top: 0; padding-bottom:0"><?php echo $fact->idfacture_client;?></td>
        				<td style="padding-top: 0; padding-bottom:0">
        					<a style="text-decoration: underline;" href="#" onclick="get_search_invoice(<?php echo $fact->idfacture_client;?>)
                  "><?php echo $statut;?></a>
        				</td>
        			</tr>
        <?php endforeach;?>
           </table>
           <?php else:?>
           	        	Aucune Facture
           	<?php endif;?>
        </p>
	</div>
	<div class="col-md-4 mt-md-5" style="margin-left:0px;">
		<h5>Factures patients</h5>
		<p id="zone_facture_creer" style="padding-top: 50px;">
				Cliquez sur une facture  pour l'afficher
		</p>
		
	</div>
</div>

<div class="row">

</div>















<script>
	function get_search_invoice(el)
	{
		fetch("http://127.0.0.1/IPharma/index.php/pageascync/invoices/"+el)
		.then(res => {
			return res.text();
		})
		.then(data => {
			$('#zone_facture_creer').html("");
			$('#zone_facture_creer').html(data);
		});
	}

  function get_search_invoiceToUpdate(el)
  {
    fetch("http://127.0.0.1/IPharma/index.php/pageascync/updateInvoice/"+el)
    .then(res => {
      return res.text();
    })
    .then(data => {
      $('#zone_facture_creer').html("");
      $('#zone_facture_creer').html(data);
    });
  }



function popup(ID, TOT)
{
  var mywindow = window.open('http://127.0.0.1/IPharma/index.php/facturation/payment_page/'+ID+'/'+TOT,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=470,height=500,left=500,top=120');
  mywindow.focus();
}

function changeBGColor(el) {
  var cols = document.getElementsByClassName('mystyle');
   for(i = 0; i < cols.length; i++) {
    cols[i].style.backgroundColor = "";
    // el.style.backgroundColor = 'blue';
  }
  for(i = 0; i < cols.length; i++) {
    // cols[i-1].style.backgroundColor = "";
    el.style.backgroundColor = '#baefff';
  }
}

function get_searchedInvoiceList(el){
    fetch("http://127.0.0.1/IPharma/index.php/pageascync/searchedInvoiceList/"+el)
    .then(res => {
      return res.text();
    })
    .then(data => {
      $('#zone-searchedInvoice').html("");
      $('#zone-searchedInvoice').html(data);
    });
}

</script>





<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- =======================================================