<?php
include_once("Database.php");
$database = new Database();

//SANITIZE ---------------------------------------------------------------------------------------------
$_POST = filter_input_array
(
    INPUT_POST,
    [
        'useLogin' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'usePassword' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]
);

//RECUPERATION DES DONNEES ---------------------------------------------------------------------------------------------
$login = $_POST["useLogin"] ?? "";
$password = $_POST["usePassword"] ?? "";

//ERRORS ---------------------------------------------------------------------------------------------
const EMPTY_TEXTBOX_ERROR = '[ERREUR] - La case était vide -- Veuillez renseigner ce champ';                //Erreur de champ vide
const USER_NOT_FOUND_ERROR = '[ERREUR] - L`utilisateur n`a pas été trouvé !!';                              //Erreur utilisateur non trouvé

$validateData = true;           //Verifie si il y a des erreurs

//Table of errors
$errors = [];
$errors['login'] = '';
$errors['password'] = '';
$errors['user'] = '';

//EMPTY CHECK ---------------------------------------------------------------------------------------------
//Regarde si il y a des erreurs
if($_POST)
{
    foreach($_POST as $key => $value)
    {
        if(empty($value))
        {
            $errors[$key] = EMPTY_TEXTBOX_ERROR;
            $validateData = false;
        }
    }
}

//récupération du user ---------------------------------------------------------------------------------------------
$user = $database->GetUser($login, $password);

//Check si le user existe
if(empty($user))
{
    $errors["user"] = USER_NOT_FOUND_ERROR;
    $validateData = false;
}

//Redirection
if($validateData == true)
{
    //Créer la session et recevoir l'id de session
    $session = $database->CreateSession($user["idUser"]);
    
    //Renvoyer à la page d'accueil
    header("location: ../../../index.php?idSession=$session");
}
else
{
    //Display errors
    foreach($errors as $error)
    {
        echo $error;
        echo '<br>';
    }

    //Detruit la session dans la base de données
    $database->DeleteSession($_COOKIE["session"]);

    //Retourne à la page d'accueil
    header("location: ../../../index.php?idSession=false");
}

?>