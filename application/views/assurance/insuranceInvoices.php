<?php if(isset($insuranceInvoices)):?>
<?php if($this->session->flashdata('success')):?>
  <small style="color: green;"><?php echo $this->session->flashdata('success');?></small>
<?php endif;?>
<span style="padding-left:10px; text-align: left; font-size:14px; display: block; width: 100%; height: 25px; background-color: #76b6d6; color: white;">
	Facture assureur
</span>
<table class="table">
	<tr>
		<th style="padding: 0; font-size: 11px; font-weight: bold;">Date</th>
		<th style="padding: 0; font-size: 11px; font-weight: bold;">Numero</th>
		<th style="padding: 0; font-size: 11px; font-weight: bold;">statut</th>
		<th style="padding: 0; font-size: 11px; font-weight: bold;"></th>
	</tr>
	<?php foreach($insuranceInvoices as $insInvoicesKey):?>
		<?php $idstatut = $insInvoicesKey->statut;
              if($idstatut == 0){
              	$statut = "Emise";
              	$recover = 1;
              }else{
              	$statut = "Payée";
              	$recover = 2;
              }
       $date = ucfirst(strftime("%d /%m/ %Y", strtotime($insInvoicesKey->date)));
		?>
		<tr onclick="changeBGColor(this);" class="mystyle" style="border-bottom: 1px solid #eee; cursor: pointer;"  >
			<td style="padding: 0; font-size: 12px;"><?php echo $date;?></td>
			<td style="padding: 0; font-size: 12px;"><?php echo $insInvoicesKey->idfacture_assurance;?></td>
			<td style="padding: 0; font-size: 12px;"><?php echo $statut;?></td>
			<td style="padding: 0; font-size: 12px;">
			<a href="#" onclick="do_openInsuranceInvoice(<?php echo $insInvoicesKey->idfacture_assurance;?>);"> Ouvrir</a>
		</td>
        <?php if($recover == 1):?>
		<td style="padding: 0; font-size: 12px;">
			<a href="#" onclick="do_openInsuranceRecover(<?php echo $insInvoicesKey->idfacture_assurance;?>);">Recouvrement</a>
		</td>
	    <?php endif;?>
		</tr>
	<?php endforeach;?>
</table>
<?php endif;?>





<script>
	function do_openInsuranceInvoice(ID)
{
  var mywindow = window.open('http://127.0.0.1/IPharma/index.php/assurance/openInsuranceInvoice/'+ID,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=700,height=600,left=250,top=120');
  mywindow.focus();
}

function do_openInsuranceRecover(ID){
  var mywindow = window.open('http://127.0.0.1/IPharma/index.php/assurance/openInsuranceRecover/'+ID,'Commentaires','toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=yes,width=400,height=600,left=250,top=120');
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
</script>

