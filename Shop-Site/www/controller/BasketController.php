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
        $isAtMax = false;

        // Check if basket is set
        if (isset($_SESSION["basket"])) 
        {
            // Check if the product added is on the basket 
            foreach ($_SESSION["basket"] as $key => $basketProduct) 
            {
                // Check products id
                if ($basketProduct["idProduct"] == $product[0]["idProduct"]) 
                {
                    // Check if the quantity of products in basket are lower than the product stock
                    if ($basketProduct["quantity"] < $product[0]["proQuantity"])
                    {
                        $_SESSION["basket"][$key]["quantity"]++;
                        $_SESSION["basket"][$key]["subtotal"] = $product[0]["proPrice"] * $_SESSION["basket"][$key]["quantity"];
                        $isNotInBasket = false;  
                    }
                    else
                    {
                        $isAtMax = true;
                    }
                }
            }
        }

        // Check if the product is currently in the basket
        if ($isNotInBasket && $isAtMax == false) 
        {
            $_SESSION["basket"][] = array
            (
                "idProduct" => $product[0]["idProduct"],
                "proName" => $product[0]["proName"],
                "proPrice" => $product[0]["proPrice"],
                "proQuantity" => $product[0]["proQuantity"],
                "subtotal" => $product[0]["proPrice"],
                "quantity" => 1
                //"proDescription" => $product[0]["proDescription"],
                //"proImage" => $product[0]["proImage"],
                //"proLike" => $product[0]["proLike"],
                //"fkCategory" => $product[0]["fkCategory"],
                //"idCategory" => $product[0]["idCategory"],
                //"catName" => $product[0]["catName"],
            );
        }

        // Set the total
        $this->SetTotal();

        // redirect
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
        // Check if we receive a post or not
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            // Check if the quantity is set
            if (isset($_POST["quantity"]) && $_POST["quantity"] != "") 
            {
                // Check all the session
                foreach ($_SESSION["basket"] as $key => $product) 
                {
                    // Check if the ids are the same
                    if ($product["idProduct"] == $_GET["idProduct"]) 
                    {
                        // Set the quantity
                        $_SESSION["basket"][$key]["quantity"] = $_POST["quantity"];
                        $_SESSION["basket"][$key]["subtotal"] = $product["proPrice"] * $_SESSION["basket"][$key]["quantity"];
                        $this->SetTotal();
                        $this->redirectBasket();
                    }
                }
            }
        }
        else
        {
            // Get the product
            $idProduct = $_GET["idProduct"];

            // Set product
            $product = array();

            // Search the right product in the basket
            foreach ($_SESSION["basket"] as $key => $productToModify) 
            {
                if ($productToModify["idProduct"] == $idProduct) 
                {
                    $product = $_SESSION["basket"][$key];
                }
            }

            // Get the view
            $view = file_get_contents('view/page/basket/modify.php');

            // Replace variables
            ob_start();
            eval('?>' . $view);
            $content = ob_get_clean();

            return $content;
        }
    }

    /**
     * Set the total price of the basket
     *
     */
    private function SetTotal()
    {
        // Set total
        $total = 0;
        foreach ($_SESSION["basket"] as $product) 
        {
            $total += $product["subtotal"];
        }

        // Put the total on the basket
        $_SESSION["totalPrice"] = $total;
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