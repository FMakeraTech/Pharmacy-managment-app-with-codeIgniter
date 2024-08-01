<?php if(isset($stockState) and isset($drugsCategory)):?>
<?php if($perime):?>
   <h4>Medicaments  perimés:</h4>
<?php endif;?>
	<table class="table table-striped" style="font-size:12px;">
	<thead class="thead-dark">
		<tr>
			<th style="padding-top: 0; padding-bottom: 0;">#</th>
			<th style="padding-top: 0; padding-bottom: 0;">Medicament</th>
			<th style="padding-top: 0; padding-bottom: 0;">Quantite</th>
      <th style="padding-top: 0; padding-bottom: 0;">Valeur</th>
			<th style="padding-top: 0; padding-bottom: 0;">Date de Peremption</th>

      <?php //if($perime):?>
      <th style="padding-top: 0; padding-bottom: 0;">Date d'aujourd'hui</th>
      <?php //endif?>
      <?php //if($perime):?>
      <th style="padding-top: 0; padding-bottom: 0;">Etagère</th>
      <th style="padding-top: 0; padding-bottom: 0;"></th>
      <?php //endif?>
		</tr>
	</thead>
		<?php $i = 1; $total_mount = 0;
         foreach($stockState as $ss):?>
			<?php
               $med = $this->facturation_model->get_spec_med($ss->drugs_iddrugs, 'nom');
               // $pa = $this->facturation_model->get_spec_med($ss->drugs_iddrugs, 'pa');
               $pa = $this->facturation_model->get_spec_med($ss->drugs_iddrugs,'pa');
               $cat = $this->facturation_model->get_spec_med($ss->drugs_iddrugs, 'drugs_category_iddrugs_category');
               $etagere = $this->facturation_model->get_spec_drugscat($cat, 'place');
               $alertQty = $this->facturation_model->get_spec_med($ss->drugs_iddrugs, 'alertQuantity');
               if($ss->Quantite1 > $alertQty){
               	 $color = "success";
               	 $code = 1;
               }elseif($ss->Quantite1 == $alertQty){
               	$color = "warning";
               	$code = 2;
               }else{
               	 $color = "danger";
               	 $code = 3;
               }
               // $valeurA = $pa * $ss->Quantite1;
               $valeurA = $pa * $ss->Quantite1;
               $total_mount += $valeurA;
			?>
      <?php if($drugsCategory == $cat):?>
			<tr class="table-<?php echo $color;?>" style="cursor: pointer;" onclick="do_hide(<?php echo $code;?>);">
				<td style="padding-top: 0; padding-bottom: 0;"><?php echo $i;?></td>
				<td style="padding-top: 0; padding-bottom: 0;"><?php echo $med;?></td>
        <td style="padding-top: 0; padding-bottom: 0; font-weight: bold;" ><?php echo $ss->Quantite1;?></td>
        <td style="padding-top: 0; padding-bottom: 0; font-weight: bold;" ><?php echo number_format($valeurA,2);?></td>
				<td style="padding-top: 0; padding-bottom: 0;"><?php echo $ss->dateExpiration1;?></td>
         <?php //if($perime):?>
          <td style="padding-top: 0; padding-bottom: 0;"><?php echo date('Y-m-d');?></td>
          <?php //endif?>
          <?php //if($perime):?>
          <td style="padding-top: 0; padding-bottom: 0;"><?php echo $etagere;?></td>
          <td style="padding-top: 0; padding-bottom: 0;">
            <a href="<?php echo site_url('stock/printFiche/'.$ss->drugs_iddrugs);?>" target="_blank">Fiche
            </a>
          </td>
      <?php //endif;?>
			</tr>
    <?php endif;?>
		<?php $i++; endforeach;?>
     <tr>
        <th colspan="3" style="padding-top: 0; padding-bottom: 0;">Valeur Total</th>
        <th colspan="5" style="padding-top: 0; padding-bottom: 0;">
           <?php echo number_format($total_mount, 2);?>
        </th>
     </tr>
	</table>
	<span><a href="#" onclick="do_hide(0);">Show all</a></span>

  <?php elseif(isset($stockState) and !isset($drugsCategory)):?>
  <?php if($perime):?>
   <h4>Medicaments  perimés:</h4>
  <?php endif;?>
      <table class="table table-striped" style="font-size:12px;">
  <thead class="thead-dark">
    <tr>
      <th style="padding-top: 0; padding-bottom: 0;">#</th>
      <th style="padding-top: 0; padding-bottom: 0;">Medicament</th>
      <th style="padding-top: 0; padding-bottom: 0;">Quantite</th>
      <th style="padding-top: 0; padding-bottom: 0;">Valeur</th>
      <th style="padding-top: 0; padding-bottom: 0;">Date de Peremption</th>
      <?php //if($perime):?>
      <th style="padding-top: 0; padding-bottom: 0;">Date d'aujourd'hui</th>
      <?php //endif?>
      <?php //if($perime):?>
      <th style="padding-top: 0; padding-bottom: 0;">Etagère</th>
       <th style="padding-top: 0; padding-bottom: 0;"></th>
      <?php //endif;?>
    </tr>
  </thead>
    <?php $i = 1; $total_mount = 0;
     foreach($stockState as $ss):?>
      <?php
               $med = $this->facturation_model->get_spec_med($ss->drugs_iddrugs, 'nom');
               $pa = $this->facturation_model->get_spec_med($ss->drugs_iddrugs, 'pa');
               $cat = $this->facturation_model->get_spec_med($ss->drugs_iddrugs, 'drugs_category_iddrugs_category');
               $etagere = $this->facturation_model->get_spec_drugscat($cat, 'place');
               $alertQty = $this->facturation_model->get_spec_med($ss->drugs_iddrugs, 'alertQuantity');
               if($ss->Quantite1 > $alertQty){
                 $color = "success";
                 $code = 1;
               }elseif($ss->Quantite1 == $alertQty){
                $color = "warning";
                $code = 2;
               }else{
                 $color = "danger";
                 $code = 3;
               }

               $valeurA = $pa * $ss->Quantite1;
                $total_mount += $valeurA;
      ?>
      <tr class="table-<?php echo $color;?>" style="cursor: pointer;" onclick="do_hide(<?php echo $code;?>);">
        <td style="padding-top: 0; padding-bottom: 0;"><?php echo $i;?></td>
        <td style="padding-top: 0; padding-bottom: 0;"><?php echo $med;?></td>
        <?php if($perime):?>
          <td style="padding-top: 0; padding-bottom: 0; font-weight: bold;" >
             <?php if($ss->idstock > 0):?>
            <a href="#" onclick="do_deleteOneStockState(<?php echo $ss->idstock;?>)" style="text-decoration: underline;"><?php echo $ss->Quantite1;?>
            </a>
            <?php else: ?>
              <?php echo $ss->Quantite1;?>
           <?php endif;?>
          </td>
          <?php else: ?>
          <td style="padding-top: 0; padding-bottom: 0; font-weight: bold;" ><?php echo $ss->Quantite1;?></td>
        <?php endif;?>
        <td style="padding-top: 0; padding-bottom: 0;"><?php echo number_format($valeurA,2);?></td>
        <td style="padding-top: 0; padding-bottom: 0;"><?php echo $ss->dateExpiration1;?></td>
        <?php //if(isset($perime)):?>
          <td style="padding-top: 0; padding-bottom: 0;"><?php echo date('Y-m-d');?></td>
      <?php //endif?>

       <?php //if(isset($perime)):?>
      <td style="padding-top: 0; padding-bottom: 0;"><?php echo $etagere;?></td>
      <td style="padding-top: 0; padding-bottom: 0;">
            <a href="<?php echo site_url('stock/printFiche/'.$ss->drugs_iddrugs);?>" target="_blank">Fiche
            </a>
          </td>
       <?php //endif;?>
      </tr>
    <?php $i++; endforeach;?>
    <tr>
        <th colspan="3" style="padding-top: 0; padding-bottom: 0;">Valeur Total</th>
        <th colspan="5" style="padding-top: 0; padding-bottom: 0;">
           <?php echo number_format($total_mount, 2);?>
        </th>
     </tr>
  </table>
  <span><a href="#" onclick="do_hide(0);">Show all</a></span>
	<?php endif;?>

<?php if(isset($OnestockState)):?>
  <table class="table table-striped" style="font-size:12px;">
  <thead class="thead-dark">
    <tr>
      <th style="padding-top: 0; padding-bottom: 0;">#</th>
      <th style="padding-top: 0; padding-bottom: 0;">Medicament</th>
      <th style="padding-top: 0; padding-bottom: 0;">Quantite</th>
      <th style="padding-top: 0; padding-bottom: 0;">Valeur</th>
      <th style="padding-top: 0; padding-bottom: 0;">Date de Peremption</th>
      <th style="padding-top: 0; padding-bottom: 0;">Date d'aujourd'hui</th>
      <?php //if($perime):?>
      <th style="padding-top: 0; padding-bottom: 0;">Etagère</th>
      <th style="padding-top: 0; padding-bottom: 0;"></th>
      <?php //endif;?>
    </tr>
  </thead>
    <?php $i = 1; $total_mount = 0;
    foreach($OnestockState as $Os):?>
        <?php
               $med = $this->facturation_model->get_spec_med($Os->drugs_iddrugs, 'nom');
               $pa = $this->facturation_model->get_spec_med($Os->drugs_iddrugs, 'pa');
               $cat = $this->facturation_model->get_spec_med($Os->drugs_iddrugs, 'drugs_category_iddrugs_category');
               $etagere = $this->facturation_model->get_spec_drugscat($cat, 'place');
               $alertQty = $this->facturation_model->get_spec_med($Os->drugs_iddrugs, 'alertQuantity');
               if($Os->Quantite1 > $alertQty){
                 $color = "success";
                 $code = 1;
               }elseif($Os->Quantite1 == $alertQty){
                $color = "warning";
                $code = 2;
               }else{
                 $color = "danger";
                 $code = 3;
               }
               $valeurA = $pa * $Os->Quantite1;
                $total_mount += $valeurA;
      ?>
        <tr class="table-<?php echo $color;?>" style="cursor: pointer;" onclick="do_hide(<?php echo $code;?>);">
        <td style="padding-top: 0; padding-bottom: 0;"><?php echo $i;?></td>
        <td style="padding-top: 0; padding-bottom: 0;"><?php echo $med;?></td>
        <?php if($Os->dateExpiration1 < date('Y-m-d')):?>
          <td style="padding-top: 0; padding-bottom: 0; font-weight: bold;" >
             <?php if($Os->idstock > 0):?>
            <a href="#" onclick="do_deleteOneStockState(<?php echo $Os->idstock;?>)" style="text-decoration: underline;"><?php echo $Os->Quantite1;?>
            </a>
            <?php else: ?>
              <?php echo $Os->Quantite1;?>
           <?php endif;?>
            </td>
          <?php else: ?>
          <td style="padding-top: 0; padding-bottom: 0; font-weight: bold;" ><?php echo $Os->Quantite1;?></td>
        <?php endif;?>
        <td style="padding-top: 0; padding-bottom: 0; font-weight: bold;" ><?php echo number_format($valeurA,2);?></td>
        <td style="padding-top: 0; padding-bottom: 0;"><?php echo $Os->dateExpiration1;?></td>
        <td style="padding-top: 0; padding-bottom: 0;"><?php echo date('Y-m-d');?></td>
        <?php //if($perime):?>
          <td style="padding-top: 0; padding-bottom: 0;"><?php echo $etagere;?></td>
          <td style="padding-top: 0; padding-bottom: 0;">
            <a href="<?php echo site_url('stock/printFiche/'.$Os->drugs_iddrugs);?>" target="_blank">Fiche
            </a>
          </td>
      <?php //endif;?>
      </tr>
    <?php endforeach;?>
    <tr>
        <th colspan="3" style="padding-top: 0; padding-bottom: 0;">Valeur Total</th>
        <th colspan="5" style="padding-top: 0; padding-bottom: 0;">
           <?php echo number_format($total_mount, 2);?>
        </th>
     </tr>
  </table>
 
<?php endif;?>

	<script>
		function do_hide(el){
			var element1 = document.getElementsByClassName('table-success');
			var element2 = document.getElementsByClassName('table-warning');
			var element3 = document.getElementsByClassName('table-danger');

		  if(el == 1){
            for(i = 0; i < element2.length; i++) {
             element2[i].style.display = "none";
              }
            for(i = 0; i < element3.length; i++) {
             element3[i].style.display = "none";
              }
		  }

		  else if(el == 2){
            for(i = 0; i < element1.length; i++) {
             element1[i].style.display = "none";
              }
              for(i = 0; i < element3.length; i++) {
             element3[i].style.display = "none";
              }
		  }

		  else if(el == 3){
            for(i = 0; i < element2.length; i++) {
             element2[i].style.display = "none";
              }
            for(i = 0; i < element1.length; i++) {
             element1[i].style.display = "none";
              }
		  }else{
		  	for(i = 0; i < element1.length; i++) {
             element1[i].style.display = "table-row";
              }
            for(i = 0; i < element2.length; i++) {
             element2[i].style.display = "table-row";
              }
            for(i = 0; i < element3.length; i++) {
             element3[i].style.display = "table-row";
              }
		  }
		}
	</script>