<div class="container">

	<h2>Contact</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<form action="controller/ContactController.php" method="post">
			<div>
				<label for="email">email</label>
				<input type="email" name="email" id="email" placeholder="Votre email">
			</div>
			<div style="display: flex; flex-direction: row;">
				<div>
					<label for="objet">produit</label>
					<input type="radio" name="objet" id="" value="produit" checked>
				</div>
				<div style="margin-left: 10px;">
					<label for="objet">facture</label>
					<input type="radio" name="objet" id="" value="facture">
				</div>
			</div>
			<div>
				<label for="text">text</label>
				<textarea name="text" id="text" cols="30" rows="10" placeholder="Votre text"></textarea>
			</div>
			<input type="submit" value="Envoyer">
		</form>
		<?php if(isset($_SESSION['capcha'])){ ?>
			<div id="secret" style="display: flex; flex-direction: row;">
				<?php
					$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
					$result = ''; 
					for ($i=0; $i < 16; $i++) {
						$result .= $characters[mt_rand(0, 61)];
					}
					$_SESSION['capcha'] = $result;
				?>
				<p><?= $result?></p>
				<div id="capcha" style="display: flex; flex-direction: row;">
					<input id="userCapcha" type="text" name="capcha" placeholder="Entrez la suite de caractère affiché à côté">
					<button onclick="DisplayEmail('<?=$_SESSION['capcha']?>');">Afficher email</button>
				</div>
			</div>
		<?php } ?>
	</div>
<script>
const secret = document.getElementById("secret");   // Secret email
const email = "email.efew@gmail.com";               // Email
const userCapcha = document.getElementById("userCapcha"); // Input text

function DisplayEmail(session) 
{   
    if (session === userCapcha.value) 
    {
        // Display email
        let emailParagraph = "<p>" + email + "</p>"
        secret.innerHTML = emailParagraph;
    }
}
</script>