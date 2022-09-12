<div class="container">

	<h2>Modifier le produit</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<form action="index.php?controller=basket&action=modify&idProduct=<?= $product["idProduct"] ?>" method="POST">
			<h3><?= $product["proName"]; ?></h3>
			<br>
			<label for="quantity">Quantité</label><br>
			<input type="number" id="quantity" name="quantity" placeHolder="Nbr produit" min="1" max=<?= $product["proQuantity"]; ?> value=<?= $product["quantity"]; ?>>
			<p>Maximum : <?= $product["proQuantity"]; ?></p>

			<input type="submit" value="Modifier">
		</form>
	</div>
</div>