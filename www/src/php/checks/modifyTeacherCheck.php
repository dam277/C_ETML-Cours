<?php 
//Génération de l'instance de la DB ===========================================================
include_once("../Database.php");
$database = new Database();

$validateData = true;   //Verifie si il y a des erreurs

//RECUPERATION DES DONNEES ===========================================================
$id = $_GET["idTeacher"];
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
//Check erreurs textbox
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

//AFFICHAGE DES ERREURS ===========================================================
foreach($errors as $error)
{
    echo $error;
    echo '<br>';
}

//REGEX ===========================================================

//Redirection ===========================================================
if($validateData == true)
{
    //Prepare execute query
    $_POST['teaGender'] = $teaGender[0];
    $_POST['fkSection'] = $fkSection;
    $database->modifyTeacher($id, $_POST);
    header("location: ../../../index.php");
}
else
{
    //Renvoyer à la page de création6
    header("location: ../modifyTeacher.php");
}

?>