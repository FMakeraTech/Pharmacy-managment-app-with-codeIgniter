<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->



<div style="width: 98%; margin:auto">
	<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px 0 2px 10px;">Dépenses</span> <br>

       <?php if(isset($depenses)):?>
      <table class="table">
      	<thead>
          <th></th>
      		<th>Date</th>
      		<th>Code</th>
      		<th>Description</th>
      		<th>Montant </th>
      	</thead>
      	<tbody>
          <?php $total = 0; $count = 1;?>
          <?php foreach($depenses as $dep): ?>
          <?php
           $total += $dep->montant;
            $dateDepenses = ucfirst(strftime("%d /%m/ %Y", strtotime($dep->date)));
           ?>
          <tr>
              <td style="padding-top:0; padding-bottom:0;"><?php echo $count;?></td>
              <td style="padding-top:0; padding-bottom:0;"><?php echo $dateDepenses;?></td>
              <td style="padding-top:0; padding-bottom:0;"><?php echo $dep->code;?></td>
              <td style="padding-top:0; padding-bottom:0;"><?php echo $dep->description;?></td>
              <td style="padding-top:0; padding-bottom:0;"><?php echo number_format($dep->montant,2);?></td>
          </tr>
          <?php $count++;?>
       <?php endforeach;?>
               <tr>
                <th style="padding-top:0; padding-bottom:0;"></th>
                 <th colspan="3" style="padding-top:0; padding-bottom:0; background:#688cba; color: white;">Total</th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;">
                   <?php echo number_format($total,2); ?>
                 </th>
               </tr>
          </tbody>
        </table>
        <center><button onclick="window.close()" style="border-radius: 3px;">Fermer</button></center>
      <?php else:?>
        <span style="margin-left:20px; font-size: 12px">Aucun résultat</span>
      <?php endif;?>














      	</tbody>
      </table>














</div>


















<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->