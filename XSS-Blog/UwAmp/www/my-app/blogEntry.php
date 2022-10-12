<?php
include_once("database.php");

$database = new Database();
$informations = array();

foreach ($_POST as $key => $value) {
    
    $informations[$key] = htmlspecialchars($value);
    $database->insert($informations[$key]);
}

$messages = $database->GetData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    foreach ($messages as $key => $value) 
    {
        echo htmlspecialchars($value["mesText"]);
        echo "<br>";
    }
    ?>
</body>
</html>