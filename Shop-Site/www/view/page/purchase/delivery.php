<div class="container">

	<h2>Choisir un moyen de livraison</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<form action="index.php?controller=purchase&action=confirmDelivery">
			<ul>
				<?php
				foreach ($methods as $key => $method) 
				{
				?>
				<li>
					<input type="radio" name="method" id="<?= $method["idDelivery"]; ?>">
					<label for="<?= $method["idDelivery"]; ?>"><?= isset($method["delFee"]) ?  $method["delMethod"] . " ( + CHF " . $method["delFee"] . ")" :  $method["delMethod"] ?></label>
				</li>
				<?php
				}
				?>
			</ul>
			<input type="submit" value="Suivant">
		</form>
		<?php
		// Check if errors
		if (isset($errors)) 
		{
			// Display errors
			foreach ($errors as $error) 
			{
				echo $error . "<br>";
			}
		}
		?>
	</div>
</div>