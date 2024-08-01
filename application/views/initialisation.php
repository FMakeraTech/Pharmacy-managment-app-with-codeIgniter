<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ipharma</title>
</head>
<body>
	<h2>Initialisation des données</h2>
     <ul style="list-style-type: none;">
     	<li style="padding:5px;"><a style="color: black; font-size: 18px;" href="<?php echo site_url('initializeApplication/initializeIpharmaDb');?>" onclick="return confirm('Vous allez reinitialiser les données, etes Vous sur?');">Initialisez les tables de la base de données</a> </li>
     	<li style="padding:5px;"><a style="color: black; font-size: 18px;" href="<?php echo site_url('initializeApplication/initializeInsurance');?>" onclick="return confirm('Vous allez reinitialiser les données, etes Vous sur?');">Initialisez les assureurs</a> </li>
     	<li style="padding:5px;"><a style="color: black; font-size: 18px;" href="<?php echo site_url('initializeApplication/initializeInvoice');?>" onclick="return confirm('Vous allez reinitialiser les données, etes Vous sur?');">Initialisez les factures</a> </li>
     	<li style="padding:5px;"><a style="color: black; font-size: 18px;" href="<?php echo site_url('initializeApplication/initializeUsers');?>" onclick="return confirm('Vous allez reinitialiser les données, etes Vous sur?');">Initialisez les utilisateurs</a> </li>
          <li style="padding:5px;"><a style="color: black; font-size: 18px;" href="<?php echo site_url('initializeApplication/setApplication');?>" onclick="return confirm('Vous allez reinitialiser les données, etes Vous sur?');">Initialisez l'application</a> </li>
          <li style="padding:5px;"><a style="color: black; font-size: 18px;" href="<?php echo site_url('initializeApplication/setTestVersion');?>" onclick="return confirm('Vous allez reinitialiser les données, etes Vous sur?');">Créer l'instance - Version Test</a> </li>
     </ul>
     <hr>

     <?php if($this->session->flashdata('success')):?>
     	<span style="color: green"><?php echo $this->session->flashdata('success');?></span>
     <?php endif;?>
     <?php if($this->session->flashdata('error')):?>
     	<span style="color: red;"><?php echo $this->session->flashdata('error');?></span>
     <?php endif;?>

     <hr>

       <center> <a style="font-size: 20px; color: silver; text-align: center;" href="<?php echo site_url();?>"> Retour</a></center>
</body>
</html>