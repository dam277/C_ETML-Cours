<?php
$images = glob("ImagesResize/*.jpg");
echo json_encode($images);
?>