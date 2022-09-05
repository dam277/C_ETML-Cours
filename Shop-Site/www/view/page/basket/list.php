<div class="container">

	<h2>Votre panier</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<?php
		if (!is_null($products)) 
		{
			?>
			<table class="col-lg-64 col-md-24 col-sm-12 col-xs-12 table table-striped">
				<tr>
					<th>Description</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Sous-total</th>
				</tr>
			<?php
			foreach ($products as $product) 
			{
				?>
				<tr>
					<td><?= $product['proName'] ?></td>
					<td><?= "CHF " . $product['proPrice'] ?></td>
					<td><?= $product['proQuantity']?></td>
					<td><?= "CHF " . $product['subtotal'] ?></td>
				</tr>
				<?php
			}
			?>
				<tr>
					<td>Total</td>
					<td></td>
					<td></td>
					<td><?= "CHF " ?></td>
				</tr>
			</table>
			<?php
		}
		else
		{
			echo 'Le panier est actuellement vide.';
		}
		?>
	</div>
	
</div>