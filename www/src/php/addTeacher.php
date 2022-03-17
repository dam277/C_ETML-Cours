<?php
//Génération de l'instance de la DB ===========================================================
include_once("Database.php");
$database = new Database();

//Check si un utilisateur est connecté ===========================================================
include("accessDenied.php");
?>

<!-- HTML ------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../ressources/css/nickname.css">
    <title>Ajouter un enseignant</title>
</head>

<body>
    <!-- HEADER ------------------------------------------------------------------------------------------------------------------->
    <header>
        <?php
        //Include the header
        include("includes/header.php");
        ?>
    </header>
    <!-- MAIN ------------------------------------------------------------------------------------------------------------------->
    <main>
        <h2>Ajout d'un enseignant</h2>
        <!-- Formulaire de création d'un enseignant -->
        <form action="checks/addTeacherCheck.php" method="post">
            <!-- Radio boutons -->
            <p>
                <input type="radio" name="teaGender[]" id="man" value="m"> Homme
                <input type="radio" name="teaGender[]" id="woman" value="w"> Femme
                <input type="radio" name="teaGender[]" id="other" value="o"> Autre
            </p>

            <!-- Nom -->
            <p>
                <label for="name">Nom : </label>
                <input type="text" name="teaName" id="name">
            </p>

            <!-- Prénom -->
            <p>
                <label for="firstname">Prénom : </label>
                <input type="text" name="teaFirstname" id="firstname">
            </p>

            <!-- Surnom -->
            <p>
                <label for="nickname">Surnom : </label>
                <input type="text" name="teaNickname" id="nickname">
            </p>

            <!-- Origine -->
            <p>
                <label for="origine">Origine : </label>
                <textarea name="teaOrigine" id="origine" cols="30" rows="5"></textarea>
            </p>

            <!-- Section -->
            <p>
                <select name="fkSection" id="section">
                    <option value="Section">Section</option>
                    <?php
                    //Affichage de toutes les sections existantes
                    foreach($database->getAllSection() as $section => $value)
                    {
                    ?>
                        <option value="<?= $value["idSection"]?>"><?= $value["secName"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </p>

            <!-- Bouton ajouter -->
            <p>
                <input type="submit" value="Ajouter">
                <a href="addTeacher.php">
                    <input type="button" value="Effacer">
                </a>
            </p>
        </form>

        <!-- Retour à la page d'accueil -->
        <a href="../../index.php">
            <p id="return">Retour à la page d'accueil</p>
        </a>
    </main>
    <!-- FOOTER ------------------------------------------------------------------------------------------------------------------->
    <footer>
        <?php
        //Include the footer
        include("includes/footer.php");
        ?>
    </footer>
</body>

</html>