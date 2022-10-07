<?php
//Exemple tiré du site : https://www.php.net/manual/fr/function.imagecopyresampled.php

// Get all the files
$images = glob('Poissons/*.jpg');

const BIGGERSIDE = 600;
const SMALLERSIDE = 500;

$counter = 0;
/*******************************/
// Get the images and resize them
/*******************************/
foreach ($images as $key => $image)
{
    // Get the dimensions
    list($width, $height) = getimagesize($image);

    // Check if the width is bigger or smaller than height
    if($width > $height)
    {
        $new_width = BIGGERSIDE;
        $new_height = SMALLERSIDE;
    }
    else if($width < $height)
    {
        $new_width = SMALLERSIDE;
        $new_height = BIGGERSIDE;
    }

    // new dimensions
    $image_p = imagecreatetruecolor($new_width, $new_height);
    $newImage = imagecreatefromjpeg($image);
    imagecopyresampled($image_p, $newImage, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // Save as Php/{counter}->value.jpg
    imagejpeg($image_p, "Php/".$counter.".jpg");

    $counter++;
}

$resizedImages = glob("Php/*.jpg");

$counter = 0;
/*******************************/
// Set watermark
/*******************************/
foreach ($resizedImages as $key => $imageSource)
{
    // Get dimensions
    list($width, $height) = getimagesize($imageSource);

    // Set image
    $image_p = imagecreatetruecolor($width, $height);
    $image = imagecreatefromjpeg($imageSource);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);

    // Set style
    $red = imagecolorallocate($image_p, 255, 0, 0);
    $font = 'C://Windows/Fonts/Arial.ttf';
    $font_size = 60;

    // Set watermark
    imagettftext($image_p, $font_size, 40, 100, $height, $red, $font, "COPYRIGHT DL");

    // Save as Php/{counter}->value.jpg
    imagejpeg($image_p, "Php/".$counter.".jpg");

    $counter++;
}

/*******************************/
// Display images
/*******************************/
foreach ($resizedImages as $key => $image)
{
?>
    <img src="<?= $image ?>" alt="image">
<?php
}

?>

