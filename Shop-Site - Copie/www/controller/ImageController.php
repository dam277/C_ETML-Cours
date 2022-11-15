<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

$image = htmlspecialchars($_GET['image']);
$imagePath = '../resources/image/';
if (substr($image, strpos($image, '.') + 1, 3) == 'png') {
    $im=imagecreatefrompng($imagePath . $image);
    
    if(!$im)
    {
        echo 'erreur';
    }
    else
    {
        header('Content-type: img/png');
        $color = imagecolorallocate($im, 255, 0, 0);
        $font = 'C://Windows/Fonts/Arial.ttf';
        $font_size = 6;
        imagestring($im, 5, 15, 30, 'Watermark', $color);
        imagepng($im);
    }
}
elseif(substr($image, strpos($image, '.') + 1, 3) == 'jpg'){
    $im=imagecreatefromjpeg($imagePath . $image);
    
    if(!$im)
    {
        echo 'erreur';
    }
    else
    {
        header('Content-type: img/jpg');
        $color = imagecolorallocate($im, 255, 0, 0);
        $font = 'C://Windows/Fonts/Arial.ttf';
        $font_size = 6;
        imagestring($im, 5, 15, 30, 'Watermark', $color);
        imagejpeg($im);
    }
}
?>