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
    private function listAction() 
    {
        // Set the products array if the basket is set
        if(isset($_SESSION["basket"]))
        {
            // Products array
            $products = array();
            $products = $_SESSION["basket"];
        }

        if(isset($_SESSION["totalPrice"]))
        {
            // total price
            $totalPrice = $_SESSION["totalPrice"];
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

        // Check if basket is set
        if (isset($_SESSION["basket"])) 
        {
            // Check if the product added is on the basket 
            foreach ($_SESSION["basket"] as $key => $basketProduct) 
            {
                if ($basketProduct["idProduct"] == $product[0]["idProduct"]) 
                {
                    $_SESSION["basket"][$key]["proQuantity"]++;
                    $_SESSION["basket"][$key]["subtotal"] = $product[0]["proPrice"] * $_SESSION["basket"][$key]["proQuantity"];
                    $isNotInBasket = false;   
                }
            }
        }


        // Check if the product is currently in the basket
        if ($isNotInBasket) 
        {
            $_SESSION["basket"][] = array
            (
                "idProduct" => $product[0]["idProduct"],
                "proName" => $product[0]["proName"],
                "proPrice" => $product[0]["proPrice"],
                "proQuantity" => 1,
                "subtotal" => $product[0]["proPrice"]
                //"proDescription" => $product[0]["proDescription"],
                //"proImage" => $product[0]["proImage"],
                //"proLike" => $product[0]["proLike"],
                //"fkCategory" => $product[0]["fkCategory"],
                //"idCategory" => $product[0]["idCategory"],
                //"catName" => $product[0]["catName"],
            );
        }

        // Set the total
        $total = 0;
        foreach ($_SESSION["basket"] as $product) 
        {
            $total += $product["subtotal"];
        }

        // Put the total on the basket
        $_SESSION["totalPrice"] = $total;

        $this->redirectBasket();
    }

    /**
     * Delete a product from the basket
     *
     */
    private function deleteAction()
    {
        // Check all the basket
        foreach ($_SESSION["basket"] as $key => $product) 
        {
            // Unset the array of the product
            if ($product["idProduct"] == $_GET["idProduct"]) 
            {
                $_SESSION["totalPrice"] -= $_SESSION["basket"][$key]["subtotal"];
                unset($_SESSION["basket"][$key]);
            }
        }
        $this->redirectBasket();
    }

    /**
     * Modify a product from the basket
     *
     */
    private function modifyAction()
    {
        // Get the view
        $view = file_get_contents('view/page/basket/modify.php');

        // Replace variables
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
        $this->redirectBasket();
    }

    /**
     * Redirect to the basket page
     *
     */
    private function redirectBasket()
    {
       header("Location: index.php?controller=basket&action=list");
    }
}



?>