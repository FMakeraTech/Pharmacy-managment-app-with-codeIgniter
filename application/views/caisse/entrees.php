<?php if(isset($entrees)):?>
	<table class="table">
		<tr style="background: #eee; color: black;">
			<th style="font-size: 12px; padding: 0 0 0 3px;">Date de transaction</th>
			<th style="font-size: 12px; padding: 0 0 0 3px;">ID</th>
			<th style="font-size: 12px; padding: 0 0 0 3px;">Montant</th>
			<th style="font-size: 12px; padding: 0 0 0 3px;">Facture</th>
			<th style="font-size: 12px; padding: 0 0 0 3px;">Utilisateur</th>
		</tr>
		<?php $total_desEntrees = 0;
		foreach($entrees as $entKey):?>
			<?php 
                $utilisateur = $this->user_model->get_spec_user($entKey->idusers,'nom');
                $total_desEntrees += $entKey->montant;
                $date = $entKey->date;
                $dateEntree = ucfirst(strftime("%d /%m/ %Y", strtotime($date)));
			?>
			<tr>
				<td style="font-size: 12px; padding: 0 0 0 3px;"><?php echo $dateEntree;?></td>
				<td style="font-size: 12px; padding: 0 0 0 3px;"><?php echo $entKey->idencaissement;?></td>
				<td style="font-size: 12px; padding: 0 0 0 3px;"><?php echo number_format($entKey->montant,2);?></td>
				<td style="font-size: 12px; padding: 0 0 0 3px;"><?php echo $entKey->idfacture_client;?></td>
				<td style="font-size: 12px; padding: 0 0 0 3px;"><?php echo $utilisateur;?></td>
			</tr>
		<?php endforeach;?>
		<tr>
			<th style="font-size: 12px; padding: 0 0 0 3px;" colspan="2" style="text-align: right;">Total</th>
			<th style="font-size: 12px; padding: 0 0 0 3px;"><?php echo number_format($total_desEntrees,2);?></th>
		</tr>
	</table>

	<?php endif;?>