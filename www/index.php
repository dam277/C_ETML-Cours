<?php

//Créer une instance de la base de données
include_once("src/php/Database.php");
$Database = new Database();

//Check si la requête était un get 
if (isset($_GET["idSession"])) 
{
    if ($_GET["idSession"] == "false")
    {
        //Detruit le cookie
        setcookie("session", null, time() + 30 * 24 * 3600);
    } 
    else 
    {
        //Création du cookie de session
        $session = $_GET["idSession"];
        setcookie("session", $session, time() + 30 * 24 * 3600);
    }

    //Rechargement de la page
    header("location: index.php");
}

//Crée le user avec l'id de la session
if (isset($_COOKIE["session"])) 
{
    $user = $Database->IsConnect($_COOKIE["session"]);
}
else
{
    $user = null;
}

///Check utilisateur
echo "Check user : ";
echo "<pre>";
var_dump($user);
echo "</pre>";
?>

<!-- HTML ------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surnom des enseignants</title>
    <link rel="stylesheet" href="ressources/css/nickname.css">
</head>

<body>
    <!-- HEADER ------------------------------------------------------------------------------------------------------------------->
    <header>
        <?php
        //Include the header
        include("src/php/includes/header.php");
        ?>
        <?php
        //Check si un utilisateur est connecté
        if (isset($user)) {
            //Se déconnecter
        ?>
            <form action="src/php/login.php" method="POST">
                <?= $user["useLogin"]; ?>
                <input type="submit" value="Se déconnecter">
            </form>
        <?php
        } else {
            //Se connecter
        ?>
            <form action="src/php/login.php" method="POST">
                <input type="text" name="useLogin" id="login" placeholder="Login">
                <input type="text" name="usePassword" id="password" placeholder="Mot de passe">
                <input type="submit" value="Se connecter">
            </form>
        <?php
        }
        ?>

    </header>
    <!-- MAIN ------------------------------------------------------------------------------------------------------------------->
    <main>
        <h2>Liste des enseignants</h2>
        <table>
            <thead>
                <tr>
                    <td>Nom</td>
                    <td>Surnom</td>
                    <td>Options</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($Database->getAllTeachers() as $key => $value) 
                {
                ?>
                    <tr>
                        <td> <?= $value["teaFirstname"] . " " . $value["teaName"]; ?></td>
                        <td> <?= $value["teaNickname"]; ?> </td>
                        <td>
                            <?php
                            //Si l'utilisateur est connecter checker sont niveau de "puissance"
                            if ($user) 
                            {
                                //Si il est egal à 1 lui donner les droits sinon pas
                                if ($user["useAdministrator"] == 1) 
                                {
                            ?>
                                    <!-- DELETE -->
                                    <img src="ressources/images/delete.png" alt="Effacer l'enseignant" onclick="deleteTeacher(<?= $value["idTeacher"] ?>)" />
                                    |
                                    <!-- MODIFIE -->
                                    <a href="src/php/modifyTeacher.php?idTeacher=<?= $value["idTeacher"] ?>">
                                        <img src="ressources/images/modify.png" alt="Modifier l'enseignant" />
                                    </a>
                                    |
                                    <!-- DETAILS -->
                                    <a href="src/php/detail.php?idTeacher=<?= $value["idTeacher"] ?>">
                                        <img src="ressources/images/search.png" alt="Informations sur l'enseignant" />
                                    </a>
                                <?php
                                } 
                                else 
                                {
                                ?>
                                    <!-- DETAILS -->
                                    <a href="src/php/detail.php?idTeacher=<?= $value["idTeacher"] ?>">
                                        <img src="ressources/images/search.png" alt="Informations sur l'enseignant" />
                                    </a>
                            <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <?php
                    //Si l'utilisateur est connecter checker sont niveau de "puissance"
                    if ($user) 
                    {
                        //Si il est egal à 1 lui donner les droits sinon pas
                        if ($user["useAdministrator"] == 1)
                        {
                    ?>
                            <!-- AJOUTER UN NOUVEL ENSEIGNANT -->
                            <td>Ajouter un nouvel enseignant</td>
                            <td></td>
                            <td></td>
                            <!-- BOUTON AJOUTER -->
                            <td>
                                <a href="src/php/addTeacher.php">
                                    <img src="ressources/images/add.png" alt="Ajouter un enseignant" />
                                </a>
                            </td>
                    <?php
                        }
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </main>
    <!-- FOOTER ------------------------------------------------------------------------------------------------------------------->
    <footer>
        <?php
        //Include the header
        include("src/php/includes/footer.php");
        ?>
    </footer>
</body>

</html>

<script src="src/js/deleteTeacher.js"></script>