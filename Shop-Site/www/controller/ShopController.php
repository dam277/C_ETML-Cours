<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'classes/ShopRepository.php';

class ShopController extends Controller {

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() {

        $action = $_GET['action'] . "Action";

        // return $this->$page();

        /* TODO :
        $this-°view = file_get_contents('view/page/' . $controller . '/' . $action . '.html');
        */

        return call_user_func(array($this, $action));
    }

    /**
     * Display List Action
     *
     * @return string
     */
    private function listAction() {

        $shopRepository = new ShopRepository();

        $counter = 0;
        /*******************************/
        // Set watermark
        /*******************************/
        $images = glob("resources/image/*.png");
        var_dump($images);
        foreach ($images as $key => $imageSource)
        {
            var_dump($imageSource);
            // Get dimensions
            list($width, $height) = getimagesize($imageSource);
            // Set image
            $image_p = imagecreatetruecolor($width, $height);
            $image = imagecreatefrompng($imageSource);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);

            // Set style
            $red = imagecolorallocate($image_p, 255, 0, 0);
            $font = 'C://Windows/Fonts/Arial.ttf';
            $font_size = 10;
            // Set watermark
            imagettftext($image_p, $font_size, 40, 100, $height, $red, $font, "COPYRIGHT DL");
            // Save as Php/{counter}->value.jpg
            imagepng($image_p, "resources/image/watermark/".$counter.".jpg");
            $products[] = "resources/image/watermark/".$counter.".jpg";
            $counter++;
        }

        $products = $shopRepository->findAll();
        $view = file_get_contents('view/page/shop/list.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Detail Action
     *
     * @return string
     */
    private function detailAction() {

        $shopRepository = new ShopRepository();
        $product = $shopRepository->findOne($_GET['id']);

        $view = file_get_contents('view/page/shop/detail.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;

    }
}