<?php $active = "";?>

<nav id="sidebar" style="min-height: 600px;">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
	<h1><a href="index.html" class="logo">IPharma <span>Gestion de la pharmacie</span></a></h1>
	        <ul class="list-unstyled components mb-5" >
	         <?php if($this->session->userdata('nom')):?>	
	          <li style="font-size:13px;">
	        	<span style="color:#d3dee3;">Bienvenue <?php echo $this->session->userdata('nom');?></span>
	          </li>
	          <?php endif;?>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
	            <a href="<?php echo site_url('test');?>"><span class="fa fa-home mr-3"></span> Accueil</a>
	          </li>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
	              <a href="<?php echo site_url('facturation');?>"><span class="fa fa-user mr-3"></span> Vente</a>
	          </li>
	          <?php if($this->session->userdata('droit') < 3):?>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
              <a href="<?php echo site_url('stock');?>"><span class="fa fa-briefcase mr-3"></span> Stock</a>
	          </li>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
              <a href="<?php echo site_url('assurance');?>"><span class="fa fa-sticky-note mr-3"></span> Assureur</a>
	          </li>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
              <a href="<?php echo site_url('supply');?>"><span class="fa fa-suitcase mr-3"></span> Commandes</a>
	          </li>
	          <?php endif;?>
	          <?php if($this->session->userdata('droit') < 3):?>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
              <a href="<?php echo site_url('caisse');?>"><span class="fa fa-cogs mr-3"></span> Caisses</a>
	          </li>
	      <?php endif;?>
	          <?php if($this->session->userdata('droit') < 3):?>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
              <a href="<?php echo site_url('financial');?>"><span class="fa fa-cogs mr-3"></span> Financier</a>
	          </li>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
              <a href="<?php echo site_url('settings');?>"><span class="fa fa-paper-plane mr-3"></span> Parametres</a>
	          </li>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
              <a href="<?php echo site_url('manager');?>"><span class="fa fa-suitcase mr-3"></span> Gestion</a>
	          </li>
	          <li class="<?php echo $active;?>" style="font-size:13px;">
              <a href="<?php echo site_url('statistique');?>"><span class="fa fa-suitcase mr-3"></span>Statistiques</a>
	          </li>
	          <?php endif;?>
	          <li style="font-size:13px;">
              <a href="<?php echo site_url('users/logout');?>"><span class="fa fa-suitcase mr-3"></span>Déconnexion</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This software is made<i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" style="color: white;">Intelligent Software house</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

   <?php
          $checkP = $this->stock_model->checkExpiration();
          $checkQ = $this->stock_model->checkQuantity();
          if(!empty($checkQ)){
          	$count = 0;
          	foreach($checkQ as $cq){
          		$iddrugs = $cq->drugs_iddrugs;
          		$alertQte = $this->facturation_model->get_spec_med($iddrugs,'alertQuantity');
          		$qte = $cq->Quantite1;

          		if($alertQte > $qte){
          			$count++;
          		}
          	}
          }else{
          	$count = 0;
          }

   ?>
    
    <div style="margin-left:250px; position: fixed; top: 0;">
    	<?php if($count > 0):?>
    	 <span style="font-size:16px; margin-left: 50px; color: red;">
    	 	<blink><b style="font-size: 30px;">!</b><b>Alert quantité</b></blink>
    	 </span>
    	 <?php endif;?>

    	 <?php if($checkP):?>
    	 <span style="font-size:16px; margin-left: 50px; color: red;">
    	 	<blink><b style="font-size: 30px;">!</b><b>Médicaments périmés</b></blink>
    	 </span>
    	 <?php endif;?>
     </div>

     <div style="margin-left:250px; position: fixed; top: 0; right: 0; margin-right: 15px;">
     	<?php $version = $this->user_model->test_application();?>
     	<?php if($version == 1):?>
    	<span style="color: red; font-size: 18px;">Version Test</span>
    <?php endif;?>
     </div>

    	