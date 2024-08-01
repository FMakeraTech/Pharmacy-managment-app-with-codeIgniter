<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->



<div style="width: 98%; margin:auto">
	<span style="display: block; widows: 100%; background: #3445b4; color: white; padding: 2px 0 2px 10px;">Factures assureur emises</span> <br>

       <?php if(isset($facture_assurance)):?>
      <table class="table">
      	<thead>
      		<th>Date</th>
      		<th>Numero facture</th>
      		<th>Assurance</th>
      		<th>Montant</th>
      	</thead>
      	<tbody>
          <?php $total = 0; ?>
      		<?php foreach($facture_assurance as $fa):?>
             <?php
               $numero_facture = $fa->idfacture_assurance;
               $assurance = $this->facturation_model->get_spec_assura($fa->assurance_idassurance,'nom'); // Nom Assurance

               $assurance_client = $this->statistic_model->get_assurance_client($numero_facture);
                $montant = 0;
               if($assurance_client){
               	 foreach($assurance_client as $ac){
               	 	$idfcd = $ac->idfacture_clientdrugs;

                  $fact_drugs = $this->statistic_model->statsInvoiceInsurance($idfcd);
                  $pvA_total = 0;
                  if($fact_drugs){
                     foreach($fact_drugs as $fd){
                       $qte = $fd->quantite;
                       $idcat = $fd->idcategorie_assurance;
                       $cat = $this->facturation_model->get_spec_cate($idcat,'percent');
                       $pv = $fd->pv; 
                       $pvT = $pv * $qte;
                       
                       $pvTA = ($pvT * $cat)/100;
                       $pvA_total += $pvTA;
                     }
                  }
                    $montant += $pvA_total;
                    $date = ucfirst(strftime("%d /%m/ %Y", strtotime($fa->date)));
               	 }
               }
              ?>
               <tr>
                 <td style="background: #b4deed ;padding-top:0; padding-bottom:0;"><?php echo $date;?></td>
                 <td style="padding-top:0; padding-bottom:0;"><?php echo $numero_facture;?></td>
                 <td style="padding-top:0; padding-bottom:0;"><?php echo $assurance;?></td>
                 <td style="padding-top:0; padding-bottom:0;"><?php echo number_format($montant,2);?></td>
               </tr>
               <?php $total += $montant; ?>
            <?php endforeach;?>
               <tr>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;">Total</th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;"></th>
                 <th style="padding-top:0; padding-bottom:0; background:#688cba; color: white;"></th>
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