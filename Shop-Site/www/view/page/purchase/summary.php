<div class="container">

	<h2>Récapitulatif</h2>
	<div class="row">
		<!-- list of the people informations -->
        <ul class="list-unstyled">
			<li>
				Envoyé à : [ Livraison : <?=$delivery[0]["delMethod"]?> ] - [ Paiement : <?=$payment[0]["payMethod"]?> ]
			</li>
			<li>
				<?= $_SESSION["adress"]["title"] == "H" ? "Monsieur" : "Madame" ?>
			</li>
			<li>
				<?= $_SESSION["adress"]["name"] . " " . $_SESSION["adress"]["surname"]?>
			</li>
			<li>
				<?= $_SESSION["adress"]["street"] . " " . $_SESSION["adress"]["streetNumber"]?>
			</li>
			<li>
				<?= $_SESSION["adress"]["npa"] . " " . $_SESSION["adress"]["locality"]?>
			</li>
		</ul>

		<!-- Recap -->
		<table class="col-lg-64 col-md-24 col-sm-12 col-xs-12 table table-striped">
			<!-- Titles -->
			<tr>
				<th>Description</th>
				<th>Prix</th>
				<th>Quantité</th>
				<th>Sous-total</th>
			</tr>
			<!-- Products -->
			
			<?php 
			foreach ($_SESSION["basket"] as $key => $product) 
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
				<td><?= $_SESSION["totalPrice"] . " CHF" ?></td>
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
				<td><?=$_SESSION["finalTotalPrice"] . " CHF" ?></td>
			</tr>
		</table>

		<a href="index.php?controller=purchase&action=confirmation">
			<input type="button" value="Envoyer la commande">
		</a>
	</div>
</div>