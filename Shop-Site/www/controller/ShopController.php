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
        $products = $shopRepository->findAll();

        // Set counter
        $counter = 0;
        foreach ($products as $key => $product) 
        {
            // Set variables
            $products[$counter]["proInitalPrice"] = $product["proPrice"];

            // Get the sale
            $sale = explode("-", $product["proSale"]);
            $salePrice = (int) $sale[0];

            // Check which is the method
            if (str_contains($product["proSale"], "CHF")) 
            {
                $products[$counter]["proPrice"] -= $salePrice;
            }
            else if(str_contains($product["proSale"], "%"))
            {
                $products[$counter]["proPrice"] -= $product["proPrice"] * $salePrice / 100;
            }

            $counter++;
        }

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
        
        // Set instantPay
		$_SESSION["instantPay"] = false;
        
        // Set variables
        $product[0]["proInitalPrice"] = $product[0]["proPrice"];

        // Get the sale
        $sale = explode("-", $product[0]["proSale"]);
        $salePrice = (int) $sale[0];

        // Check which is the method
        if (str_contains($product[0]["proSale"], "CHF")) 
        {
            $product[0]["proPrice"] -= $salePrice;
        }
        else if(str_contains($product[0]["proSale"], "%"))
        {
            $percentPrice = $product[0]["proPrice"] * $salePrice / 100;
            $product[0]["proPrice"] -= $product[0]["proPrice"] * $salePrice / 100;
        }
        
        $view = file_get_contents('view/page/shop/detail.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;

    }
}