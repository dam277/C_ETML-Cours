<?php
include_once "DataBaseQuery.php";
$database = new DataBaseQuery();

$aritcles = array();
$aritcles = $database->allArticles();

echo json_encode($aritcles);
?>