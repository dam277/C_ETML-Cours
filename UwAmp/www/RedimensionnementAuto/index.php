<?php
//Exemple tiré du site : https://www.php.net/manual/fr/function.imagecopyresampled.php

// Obtenir tous les fichiers
$images = glob('Poissons/*.jpg');

var_dump($images);

// Content type
header('Content-Type: image/jpeg');

foreach ($images as $key => $image)
{
    // Calcul des nouvelles dimensions
    list($width, $height) = getimagesize($image);
    $new_width = 100;
    $new_height = 500;

    // Redimensionnement
    $image_p = imagecreatetruecolor($new_width, $new_height);
    $newImage = imagecreatefromjpeg($image);
    imagecopyresampled($image_p, $newImage, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
}

// Affichage
foreach ($images as $key => $image)
{
?>
    <img src="<?= $image ?>" alt="image">
<?php
}

?>

