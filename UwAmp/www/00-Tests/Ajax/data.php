<?php
$data = array(
   1 => array(
      "name"      => "Dupont",
      "firstname" => "Luc",
      "age"       => 24
   ),
   2 => array(
      "name"      => "Meyer",
      "firstname" => "Alexandre",
      "age"       => 32
   ),
   3 => array(
      "name"      => "Sauterel",
      "firstname" => "Kevin",
      "age"       => 17
   )
);

echo json_encode($data);
?>