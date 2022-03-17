<?php
//Génération de l'instance de la DB ===========================================================
include_once("Database.php");
$database = new Database();

//Check si un utilisateur est connecté ===========================================================
if(!isset($_COOKIE["session"]))
{
    header("location: errors/error403.php");
}
else
{
    $user = $database->IsConnect($_COOKIE["session"]);

    //Check si l'utilisateur à les droits
    if($user["useAdministrator"] != 1)
    {
        header("location: errors/error403.php");
    }
}
?>