<?php
/**
 * Damien Loup
 * 152-Multimedia
 * Test significatif
 * Date: 25.11.2022
 * Get the datas from the database
 */

 // Get database
include_once "DataBaseQuery.php";
$database = new DataBaseQuery();

// Get datas
$vignette = array();
$vignette = $database->allBiscuits();

// Encode to json form
echo json_encode($vignette);
?>