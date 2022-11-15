<div class="container">

	<h2>Se connecter</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<form method="post" action="index.php?controller=login&action=login">
				<div class="form-group">
					<label for="login">Login</label>
					<input name="login" type="text" class="form-control" id="login">
				</div>
				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input name="password" type="password" class="form-control" id="password">
				</div>
				<?php
					$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
					$result = ''; 
					for ($i=0; $i < 16; $i++) {
						$result .= $characters[mt_rand(0, 61)];
					}
					$_SESSION['CSRF'] = array($result => new DateTime('now'));
				?>
				<input type="hidden" name="CSRF" value=<?= $result ?>>
				<button type="submit" class="btn btn-default">Se connecter</button>
			</form>
		</div>
	</div>

