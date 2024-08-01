<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/header.php'); ?>
<!-- ================================================= -->

<div style="width: 90%; margin: auto;">
	<span style="width: 100%; display: block; background-color:#a64b12; color: white; padding-left: 10px;">Définir le prix de ce médicament</span>
	<?php if($this->session->flashdata('error')):?>
     <span style="color: red"><?php echo $this->session->flashdata('error');?></span>
	<?php endif;?>
	<?php if($this->session->flashdata('success')):?>
     <span style="color: green"><?php echo $this->session->flashdata('success');?></span>
	<?php endif;?>
	<form action="<?php echo site_url('stock/setNewPrice');?>" method="post">
		<table style="margin-top: 10px;">
			<tr>
				<td style="text-align:right;padding-right: 10px; padding-top: 10px; padding-bottom: 4px;">Médicament :</td>
				<td style="padding-top: 10px; padding-bottom: 4px;">
					<select name="drug" id="" style="border-radius: 4px; min-width: 250px;">
						<?php if($drug):?>
							<?php foreach($drug as $dr):?>
					 <option value="<?php echo $dr->iddrugs?>"><?php echo $dr->nom;?></option>
					      <?php endforeach;?>
					     <?php endif;?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;padding-right: 10px; padding-top: 10px; padding-bottom: 4px;">PV :</td>
				<td style="padding-top: 10px; padding-bottom: 4px;"><input type="text" name="pv" style="border-radius: 4px;"></td>
			</tr>
			<tr>
				<td style="text-align:right;padding-right: 10px; padding-top: 10px; padding-bottom: 4px;">Nbre Pieces</td>
				<td style="padding-top: 10px; padding-bottom: 4px;"><input type="text" name="piece" style="border-radius: 4px;"></td>
			</tr>
			<tr>
				<td style="padding-top: 10px;"></td>
				<td style="padding-top: 10px;"><input type="submit" value="sauvegarder" style="border-radius: 4px;">
				<button style="margin-left:20px; border-radius: 4px;" type="button" onclick="window.close();">Fermer</button></td>
			</tr>
		</table>
	</form>
</div>




<!-- ================== HEADER ========================= -->
<?php $this->load->view('templates/footer.php'); ?>
<!-- ================================================= -->