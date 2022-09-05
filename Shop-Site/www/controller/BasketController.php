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

        // Products array
        $products = array();
        
        // Set the products array if the basket is set
        if(isset($_SESSION["basket"]))
        {
            $products = $_SESSION["basket"];
        }

        // Get the view
        $view = file_get_contents('view/page/basket/list.php');

        // Replace variables
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
        // Setup basket repo and product added
        $shopRepository = new ShopRepository();
        $product = $shopRepository->findOne($_GET["idProduct"]);
        $isNotInBasket = true;

        echo '<pre>';
        var_dump($product);
        echo '</pre>';

        // Check if basket is set
        if (isset($_SESSION["basket"])) 
        {
            // Check if the product added is on the basket 
            foreach ($_SESSION["basket"] as $basketProduct) 
            {
                if ($basketProduct["idProduct"] == $product[0]["idProduct"]) 
                {
                    $_SESSION["basket"][$product[0]["idProduct"]]["proQuantity"]++;
                    $_SESSION["basket"][$product[0]["idProduct"]]["subtotal"] = $product[0]["proPrice"] * $_SESSION["basket"][$product[0]["idProduct"]]["proQuantity"];
                    $isNotInBasket = false;   
                }
            }
        }


        // Check if the product is currently in the basket
        if ($isNotInBasket) 
        {
            $_SESSION["basket"][$product[0]["idProduct"]] = array
            (
                "idProduct" => $product[0]["idProduct"],
                "proName" => $product[0]["proName"],
                "proDescription" => $product[0]["proDescription"],
                "proPrice" => $product[0]["proPrice"],
                "proQuantity" => 1,
                "proImage" => $product[0]["proImage"],
                "proLike" => $product[0]["proLike"],
                "fkCategory" => $product[0]["fkCategory"],
                "idCategory" => $product[0]["idCategory"],
                "catName" => $product[0]["catName"],
                "subtotal" => $product[0]["proPrice"]
            );
        }

        // // Set the total
        // $total = 0;
        // foreach ($_SESSION["basket"] as $product) 
        // {
        //     $total += $product["subtotal"];
        // }

        // $_SESSION["basket"] = array
        // (
        //     "total" => $total
        // );
    }
}
?>