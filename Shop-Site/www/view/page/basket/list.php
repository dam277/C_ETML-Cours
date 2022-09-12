<div class="container">

	<h2>Votre panier</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<?php
		// Check if the products are set
		if (isset($products) && count($products) > 0) 
		{
			?>
			<table class="col-lg-64 col-md-24 col-sm-12 col-xs-12 table table-striped">
				<tr>
					<th>Description</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Sous-total</th>
					<th></th>
					<th></th>
				</tr>
			<?php
			// Display products
			foreach ($products as $product) 
			{
				?>
				<tr>
					<td><?= $product['proName'] ?></td>
					<td><?= "CHF " . $product['proPrice'] ?></td>
					<td><?= $product['quantity']?></td>
					<td><?= "CHF " . $product['subtotal'] ?></td>
					<td>
						<a href="index.php?controller=basket&action=modify&idProduct=<?= $product["idProduct"] ?>">/</a>
					</td>
					<td>
						<a href="index.php?controller=basket&action=delete&idProduct=<?= $product["idProduct"] ?>">X</a>
					</td>
				</tr>
				<?php
			}

			// Check if the total price is set
			if (isset($totalPrice) && $totalPrice > 0) 
			{
			?>
				<tr>
					<td>Total</td>
					<td></td>
					<td></td>
					<td><?= "CHF " . $totalPrice ?></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<?php
			}
			?>
			<a href="index.php?controller=purchase&action=delivery">
				<input type="button" value="Passer la commande">
			</a>
			<?php
		}
		else
		{
			// Empty basket
			echo 'Le panier est actuellement vide.';
		}
		?>
	</div>
	
</div>