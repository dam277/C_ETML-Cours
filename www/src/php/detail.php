<?php
//Génération de l'instance de la DB
include_once("Database.php");
$Database = new Database();

//Check si un utilisateur est connecté
if(!isset($_COOKIE["session"]))
{
    header("location: errors/error403.php");
}
else
{
    $user = $Database->IsConnect($_COOKIE["session"]);
}

//Envoie des requettes SQL pour trouver l'enseignant ainsi que sa section
$teacher = [];
$teacher = $Database->getOneTeacher($_GET['idTeacher']);
$section = $Database->getOneSection($teacher['fkSection']);
?>

<!-- HTML ------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surnom des enseignants</title>
    <link rel="stylesheet" href="../../ressources/css/nickname.css">
</head>
<body>
    <!-- HEADER ------------------------------------------------------------------------------------------------------------------->
    <header>
        <?php
            //Include the header
            include("includes/header.php");
        ?>
    </header>
    <!-- Main ------------------------------------------------------------------------------------------------------------------->
    <main>
        <!-- Affichage des informations d'un enseignant -->
        <table>
            <tr>
                <td> 
                    <!-- Detail -->
                    <h2> Détail : <?= $teacher['teaFirstname'] . " " . $teacher['teaName']?> 
                        <?php
                        if($teacher['teaGender'] == "m")
                        {
                        ?>
                            <img src="../../ressources/images/genderMale.png" alt="Sexe masculin"/>
                        <?php
                        }
                        else if($teacher['teaGender'] == "w")
                        {
                        ?>
                            <img src="../../ressources/images/genderFemale.png" alt="Sexe féminin"/>
                        <?php
                        }
                        else
                        {
                        ?>
                            <img src="../../ressources/images/genderOther.png" alt="Sexe masculin"/>
                        <?php
                        }
                        ?>
                    </h2> 
                </td>
                <td> 
                    <!-- Section -->
                    <p><?= $section['secName'] ?></p> 
                </td>
                <td> 
                    <!-- Modification et Suppression -->
                    <?php
                    //Si il est egal à 1 lui donner les droits sinon pas
                    if ($user["useAdministrator"] == 1) 
                    {
                    ?>
                        <img src="../../ressources/images/delete.png" alt="Effacer l'enseignant" onclick="deleteTeacher(<?= $_GET["idTeacher"] ?>)"/> |
                        <a href="modifyTeacher.php?idTeacher=<?= $_GET["idTeacher"]?>">
                            <img src="../../ressources/images/modify.png" alt="Modifier l'enseignant"/>
                        </a>
                    <?php
                    }
                    ?>
                    
                </td>
            </tr>
        </table>
        <div style="text-align :center">
            <!-- Surnom --> 
            <p>Surnom : <?= $teacher['teaNickname']?></p>
            <!-- origine -->
            <p><?= $teacher['teaOrigine']?></p>
        </div>

        <!-- Retour à la page d'accueil -->
        <a href="../../index.php"><p id="return">Retour à la page d'accueil</p></a>
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

<script src="../js/deleteTeacher.js"></script>