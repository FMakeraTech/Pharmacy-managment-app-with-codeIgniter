<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->
<!-- ================== MENU ========================= -->
<?php $this->load->view('templates/menu.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->

<div class="p-4 p-md-5 pt-5" style="margin-top: 50px;">
       
        <p style="display: block; width: 50%; margin-left:850px;">
           <?php if($this->session->flashdata('logged-in')):?>
               <span style="color: green;"><?php echo $this->session->flashdata('logged-in');?></span>
                <?php endif;?>
          <center>
          	<span class="logo" style="padding:0;font-size: 48px; font-weight: 900; color: #3445b4;">IPharma</span>
          	<br>
		 <span style="font-size: 18px; font-weight: 900; color:#007bff;">Gestion d'une pharmacie</span>
		  <p style="margin-top: 40px">
           	 <?php if($this->session->userdata('nom')):?>
               <span style="font-size: 24px;">Bienvenue <?php echo $this->session->userdata('nom');?></span>
           	 <?php endif;?>
           </p>
          </center>
           

       </p> 
</div>











<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->
<!-- ======================================================= -->