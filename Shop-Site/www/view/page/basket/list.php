<div class="container">

	<h2>Votre panier</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<?php
		if ($products != '') 
		{
			foreach ($products as $product) {
				echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
				echo '<div class="boxProduct">';
				echo '<div class="nameProduct"><h4>' . $product['proName'] . '</h4></div>';
				echo '<div class="imageProduct"><img src="resources/image/' . $product['proImage'] . '"/></div>';
				echo '<div class="priceProduct">CHF ' . $product['proPrice'] . '</div>';
				echo '<a class="btn btn-default" href="index.php?controller=shop&action=detail&id=' . $product['idProduct'] . '">Détail</a>';
				echo '</div>';
				echo '</div>';
			}
		}
		else
		{
			echo 'Le panier est actuellement vide.';
		}
		?>
	</div>
</div>