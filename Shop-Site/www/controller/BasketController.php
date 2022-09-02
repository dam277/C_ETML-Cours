<?php

include_once 'classes/ShopRepository.php';

class BasketController extends Controller {

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display()
    {
        $action = $_GET['action'] . "Action";

        return call_user_func(array($this, $action));
    }

    /**
     * Display List Action
     *
     * @return string
     */
    private function listAction() {

        $products = $_SESSION["basket"];

        $view = file_get_contents('view/page/basket/list.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Add a new product to the basket
     *
     */
    private function addAction()
    {
        $shopRepository = new ShopRepository();
        $_SESSION["basket"][]= $shopRepository->findOne($_GET["idProduct"]);
    }
}
?>