<?php
ResizeImages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
?>

    <div class="flex-container">
        <?php DisplayImages(); ?>
    </div>

<?php
?>

</body>
</html>

<!-- ========= -->
<!-- FUNCTIONS -->
<!-- ========= -->

<?php
/**
 * Resize all the images on the folder
 * 
 */
function ResizeImages()
{
    // Get all the files
    $images = glob('Poissons/*.jpg');
    
    $counter = 0;
    /*******************************/
    // Get the images and resize them
    /*******************************/
    foreach ($images as $key => $image)
    {
        // Get the dimensions
        list($width, $height) = getimagesize($image);

        // Set new dimensions
        $new_width = 400;
        $new_height = 300;

        // new dimensions
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $newImage = imagecreatefromjpeg($image);
        imagecopyresampled($image_p, $newImage, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        // Save as Php/{counter}->value.jpg
        imagejpeg($image_p, "ImagesResize/".$counter.".jpg");

        $counter++;
    }
}

/**
 * Display all the images on the folder
 * 
 */
function DisplayImages()
{
    $resizedImages = glob("ImagesResize/*.jpg");
    foreach ($resizedImages as $key => $image)
    {
    ?>
        <img src="<?= $image ?>" class="" alt="image">
    <?php
    }
}

?>