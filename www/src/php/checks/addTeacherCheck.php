<?php 
//Génération de l'instance de la DB ===========================================================
include_once("../Database.php");
$database = new Database();

$validateData = true;   //Verifie si il y a des erreurs

//RECUPERATION DES DONNEES ===========================================================
$teaGender = $_POST["teaGender"] ?? "";
$teaName = $_POST["teaName"] ?? "";
$teaFirstname = $_POST["teaFirstname"] ?? "";
$teaNickname = $_POST["teaNickname"] ?? "";
$teaOrigine = $_POST["teaOrigine"] ?? "";
$fkSection = $_POST["fkSection"] ?? "";

//SANITIZE ===========================================================
$_POST = filter_input_array
(
    INPUT_POST,
    [
        'teaName' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'teaFirstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'teaNickname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'teaOrigine' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ]
);

//ERREURS ===========================================================
const EMPTY_TEXTBOX_ERROR = '[ERREUR] - La case était vide -- Veuillez renseigner ce champ';
const REGEX_ERROR = '[ERREUR] - Le texte rentré n`est pas valide';

//Tableau d'erreurs
$errors = [];
$errors['teaGender'] = '';
$errors['teaName'] = '';
$errors['teaFirstname'] = '';
$errors['teaNickname'] = '';
$errors['teaOrigine'] = '';
$errors['fkSection'] = '';

//EMPTY CHECK ===========================================================
//Check erreurs textBox
foreach($_POST as $key => $value)
{
    if(empty($value))
    {
        $errors[$key] = EMPTY_TEXTBOX_ERROR;
        $validateData = false;
    }
}

//Check radioButtons
if(empty($teaGender))
{
    $errors["teaGender"] = EMPTY_TEXTBOX_ERROR;
    $validateData = false;
}

//Check section
if($fkSection == "Section")
{
    $errors["fkSection"] = EMPTY_TEXTBOX_ERROR;
    $validateData = false;
}

//REGEX ===========================================================
//pattern
$namesPattern = "/^[A-Z][a-z]+(-|| )[A-z]*$/";

//FirstName
if(!preg_match($namesPattern, $teaFirstname))
{
    $errors[$key] = REGEX_ERROR;
    $validateData = false;
}
//Name
if(!preg_match($namesPattern, $teaName))
{
    $errors[$key] = REGEX_ERROR;
    $validateData = false;
}
//NickName
if(!preg_match($namesPattern, $teaNickname))
{
    $errors[$key] = REGEX_ERROR;
    $validateData = false;
}

//Display errors ===========================================================
foreach($errors as $error)
{
    echo $error;
    echo '<br>';
}

//Redirection ===========================================================
if($validateData == true)
{
    //Prepare execute query
    $_POST['teaGender'] = $teaGender[0];
    $_POST['fkSection'] = $fkSection;
    $database->addTeacher($_POST);

    //Renvoyer à la page de création
    header("location: ../../../index.php");
}
else
{
    //Renvoyer à la page d'accueil
    header("location: ../addTeacher.php");
}

?>