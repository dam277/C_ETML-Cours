<div class="container">
	
	<h2>Confirmation de commande - Merci de votre achat : Num. <?=$order[0]["ordNumber"]?></h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		
		<ul class="list-unstyled">
			<li>
				Envoyé à : [ Livraison : <?=$delivery[0]["delMethod"]?> ] - [ Paiement : <?=$payment[0]["payMethod"]?> ]
			</li>
			<li>
				<?= $order[0]["ordGender"] == "H" ? "Monsieur" : "Madame" ?>
			</li>
			<li>
				<?= $order[0]["ordClientName"] . " " . $order[0]["ordClientSurname"]?>  <?= $isPayed == 1 ? "[ Statut de paiement : Payé" : "[ Statut de paiement : Non Payé" ?> ]
			</li>
			<li>
				<?= $order[0]["ordClientStreet"] . " " . $order[0]["ordClientStreetNumber"]?>
			</li>
			<li>
				<?= $order[0]["ordClientNPA"] . " " . $order[0]["ordClientLocality"]?>
			</li>
		</ul>

		<table class="col-lg-64 col-md-24 col-sm-12 col-xs-12 table table-striped">
			<!-- Titles -->
			<tr>
				<th>Description</th>
				<th>Prix</th>
				<th>Quantité</th>
				<th>Sous-total</th>
			</tr>
			<?php 
			// Get products
			foreach ($products as $key => $product) 
			{
			?>
				<tr>
				<td><?= $product["proName"] ?></td>
				<td><?= $product["proPrice"] . " CHF" ?></td>
				<td><?= $product["quantity"] ?></td>
				<td><?= $product["subtotal"] . " CHF" ?></td>
				</tr>
			<?php
			}
			?>
			<!-- Delivery method -->
			<?php
			if ($delivery[0]["delFee"] != NULL) 
			{
			?>
			<tr>
				<td><?=$delivery[0]["delType"] == "%" ? $delivery[0]["delMethod"] . " ( " . $delivery[0]["delFee"] . $delivery[0]["delType"] . " )" : $delivery[0]["delMethod"] ?></td>
				<td></td>
				<td></td>
				<td><?=$delivery[0]["delFee"] . " " . $delivery[0]["delType"]?></td>
			</tr>
			<?php
			}
			?>
			<!-- TOTAL -->
			<tr>
				<td>Total</td>
				<td></td>
				<td></td>
				<td><?= $order[0]["ordSubtotal"] . " CHF" ?></td>
			</tr>
			<!-- Payment method -->
			<?php
			if ($payment[0]["payFee"] != NULL) 
			{
			?>
			<tr>
				<td><?=$payment[0]["payType"] == "%" ? $payment[0]["payMethod"] . " ( +" . $payment[0]["payFee"] . $payment[0]["payType"] . " )" : $payment[0]["payMethod"] ?></td>
				<td></td>
				<td></td>
				<td><?=$payPrice . " CHF"?></td>
			</tr>
			<?php
			}
			?>
			<!-- Final total price -->
			<tr>
				<td>Total à payer</td>
				<td></td>
				<td></td>
				<td><?=$order[0]["ordTotalPrice"] . " CHF" ?></td>
			</tr>
		</table>
    </div>
</div>