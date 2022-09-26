<div class="container">

	<h2>Choisir un moyen de paiement</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<form method="post" action="index.php?controller=purchase&action=confirmPayment" >
			<ul>
				<?php
				foreach ($payments as $key => $payment) 
				{
				?>
				<li>
					<input type="radio" name="payment" value="<?= $payment["idPayment"]; ?>" id="<?= $payment["idPayment"]; ?>">
					<label for="<?= $payment["idPayment"]; ?>"><?= isset($payment["payFee"]) ?  $payment["payMethod"] . " ( + CHF " . $payment["payFee"] . ")" :  $payment["payMethod"] ?></label>
				</li>
				<?php
				}
				?>
			</ul>
			<input type="submit" value="Suivant">
		</form>
		<div>
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
</div>