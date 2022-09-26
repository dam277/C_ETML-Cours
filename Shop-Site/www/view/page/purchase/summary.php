<div class="container">

	<h2>Récapitulatif</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
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

		<table class="col-lg-64 col-md-24 col-sm-12 col-xs-12 table table-striped">
			<tr>
				<th>Description</th>
				<th>Prix</th>
				<th>Quantité</th>
				<th>Sous-total</th>
			</tr>
			<tr>
				<?php 
				foreach ($_SESSION["basket"] as $key => $product) 
				{
				?>
					<td><?= $product["proName"] ?></td>
					<td><?= $product["proPrice"] ?></td>
					<td><?= $product["quantity"] ?></td>
					<td><?= $product["subtotal"] ?></td>
				<?php
				}
				?>
			</tr>
			<?php
			if ($delivery[0]["delFee"] != NULL) 
			{
			?>
			<tr>
				<td><?=$delivery[0]["delMethod"]?></td>
				<td></td>
				<td></td>
				<td><?=$delivery[0]["delFee"]?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td></td>
				<td></td>
				<td><?= $_SESSION["totalPrice"] ?></td>
			</tr>
			<?php
			}
			if ($payment[0]["payFee"] != NULL) 
			{
			?>
			<tr>
				<td><?=$payment[0]["payMethod"]?></td>
				<td></td>
				<td></td>
				<td><?=$payment[0]["payFee"]?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
</div>