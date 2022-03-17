<?php
//Génération de l'instance de la DB ===========================================================
include_once("database.php");
$database = new database();

//Check si un utilisateur est connecté ===========================================================
include("accessDenied.php");

// //Récupération des données de l'enseignant
//Envoie des requettes SQL pour trouver l'enseignant aisi que sa section
$teacher = [];
$teacher = $database->getOneTeacher($_GET['idTeacher']);
$section = $database->getOneSection($teacher['fkSection']);

//Récupération depuis les tableaux
$teaFirstname = $teacher["teaFirstname"];
$teaName = $teacher["teaName"];
$teaGender = $teacher["teaGender"];
$teaNickname = $teacher["teaNickname"];
$teaOrigine = $teacher["teaOrigine"];

//Section
$secName = $section["secName"];
$idSection = $section["idSection"];

?>

<!-- HTML ------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en" onload="check(<?= $teaGender ?>);">

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
        <h2>Modifier un enseignant</h2>
        <!-- Formulaire de création d'un enseignant -->
        <form action="checks/modifyTeacherCheck.php?idTeacher=<?= $_GET["idTeacher"] ?>" method="post">
            <!-- Radio boutons -->
            <p>
                <input type="radio" name="teaGender[]" id="man" value="m"> Homme
                <input type="radio" name="teaGender[]" id="woman" value="w"> Femme
                <input type="radio" name="teaGender[]" id="other" value="o"> Autre
            </p>

            <!-- Nom -->
            <p>
                <label for="name">Nom : </label>
                <input type="text" name="teaName" id="name" value=<?= $teaName ?>>
            </p>

            <!-- Prénom -->
            <p>
                <label for="firstname">Prénom : </label>
                <input type="text" name="teaFirstname" id="firstname" value=<?= $teaFirstname ?>>
            </p>

            <!-- Surnom -->
            <p>
                <label for="nickname">Surnom : </label>
                <input type="text" name="teaNickname" id="nickname" value=<?= $teaNickname ?>>
            </p>

            <!-- Origine -->
            <p>
                <label for="origine">Origine : </label>
                <textarea name="teaOrigine" id="origine" cols="30" rows="5" ><?= $teaOrigine ?></textarea>
            </p>

            <!-- Section -->
            <p>
                <select name="fkSection" id="section">
                    <option value="<?= $idSection ?>"><?= $secName ?></option>
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

            <!-- Bouton modifier -->
            <p>
                <input type="submit" value="Modifier">
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

<!-- Div permettant de stocker une variable, afin de l'utiliser depuis le JS -->
<div id="gender" style="display: none;"><?= $teaGender ?></div>

<!-- Appel du script JS -->
<script src="../js/modifyTeacher.js"> </script>

</html>


