<div class="container">

	<h2>Adresse d'envoi</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<form method="post" action="index.php?controller=purchase&action=confirmAdress" >
			<ul class="list-unstyled">
				<li>
					<input type="text" name="adress[title]" id="title" value="" placeholder="Titre (H/F)" pattern="[H||F]{1}" required>
				</li>
				<li>
					<input type="text" name="adress[surname]" id="surname" placeholder="Nom" pattern="[A-Z][a-zA-Z]+" required>
					<input type="text" name="adress[name]" id="name" placeholder="Prénom" pattern="[A-Z][-a-zA-Z]+" required>
				</li>
				<li>
					<input type="text" name="adress[street]" id="street" placeholder="Rue" pattern="[.||-|| ||'||a-zA-Z]+" required>
					<input type="number" name="adress[streetNumber]" id="streeNumber" placeholder="N°" pattern="[0-9]+" required>
				</li>
				<li>
					<input type="number" name="adress[npa]" id="npa" placeholder="NPA" pattern="[0-9]{4}" required>
					<input type="text" name="adress[locality]" id="locality" placeholder="Localité" pattern="[A-Z][-a-zA-Z]+" required>
				</li>
				<li>
					<input type="mail" name="adress[mailAdress]" id="mailAdress" placeholder="Adresse mail" required>
					<input type="tel" name="adress[phone]" id="tel" placeholder="Téléphone (021-123-12-12)" pattern="([0-9]{3}-){2}[0-9]{2}-[0-9]{2}" required>
				</li>
			</ul>
			<input type="submit" value="Suivant">
		</form>
	</div>
</div>