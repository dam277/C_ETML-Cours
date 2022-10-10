<div class="container">

	<h2>Paiement par carte de crédit</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
        <!-- list of the people informations -->
        <ul class="list-unstyled">
			<li>
				Facturer à :
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

        <p>
            Total à payer : <?= $_SESSION["finalTotalPrice"] ?> CHF
        </p>

        <a href="index.php?controller=purchase&action=confirmation">
			<input type="button" value="Payer maintenant">
		</a>
        
	</div>
</div>