<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */
include_once 'classes/DeliveryRepository.php';
include_once 'classes/PaymentRepository.php';
include_once 'classes/OrderRepository.php';
include_once 'classes/OrderProductRepository.php';
include_once 'classes/ShopRepository.php';

class PurchaseController extends Controller
{
    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() 
    {

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
    private function deliveryAction() 
    {
        $deliveryRepository = new DeliveryRepository();
        $methods = $deliveryRepository->findAll();

        $view = file_get_contents('view/page/purchase/delivery.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Confirm delivery sended
     *
     * @return string
     */
    private function confirmDeliveryAction()
    {
        $deliveryRepository = new DeliveryRepository();
        $methods = $deliveryRepository->findAll();

        // Errors
        $errors = array();

        // Set errors
        $error = "L'un des champs n'a pas été renseigné";
        if (!isset($_POST["method"])) 
        {
            $errors[] = $error;
            // Get the view
            $view = file_get_contents('view/page/purchase/delivery.php');
        }
        else
        {
            // Get the method id in the session
            $_SESSION["method"]= $_POST["method"];
            // Redirect to the payment page
            header("location: index.php?controller=purchase&action=payment");
        }

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display List Action
     *
     * @return string
     */
    private function paymentAction() 
    {
        $paymentRepository = new PaymentRepository();
        $payments = $paymentRepository->findAll();

        $view = file_get_contents('view/page/purchase/payment.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    private function confirmPaymentAction()
    {
        $paymentRepository = new PaymentRepository();
        $payments = $paymentRepository->findAll();

        // Errors
        $errors = array();

        // Set errors
        $error = "L'un des champs n'a pas été renseigné";
        if (!isset($_POST["payment"])) 
        {
            $errors[] = $error;
            // Get the view
            $view = file_get_contents('view/page/purchase/payment.php');
        }
        else
        {
            // Get the method id in the session
            $_SESSION["payment"]= $_POST["payment"];
            // Redirect to the payment page
            header("location: index.php?controller=purchase&action=adress");
        }

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display List Action
     *
     * @return string
     */
    private function adressAction() 
    {
        $view = file_get_contents('view/page/purchase/adress.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    private function confirmAdressAction()
    {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        // Errors
        $errors = array();

        // Set errors
        $error = "L'un des champs n'a pas été renseigné";
        if (!isset($_POST["adress"])) 
        {
            $errors[] = $error;
            // Get the view
            $view = file_get_contents('view/page/purchase/adress.php');
        }
        else
        {
            // Get the method id in the session
            $_SESSION["adress"]= $_POST["adress"];

            // Redirect to the summary page
            header("location: index.php?controller=purchase&action=summary");
        }

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display List Action
     *
     * @return string
     */
    private function summaryAction() 
    {
        // Get the repositories
        $paymentRepository = new PaymentRepository();
        $deliveryRepository = new DeliveryRepository();

        // Get all the method did by user
        $payment = $paymentRepository->findOne($_SESSION["payment"]);
        $delivery = $deliveryRepository->findOne($_SESSION["method"]);

        $tempTotal = 0;
        //get the total before adds
        foreach ($_SESSION["basket"] as $key => $product) 
        {
            $tempTotal += $product["subtotal"];
        }

        // Get total before adding delivery
        $_SESSION["totalPrice"] = $tempTotal;

        // Get the total price after delivery added
        if ($delivery[0]["delType"] == "CHF") 
        {
            $_SESSION["totalPrice"] += $delivery[0]["delFee"];
        }
        else if($delivery[0]["delType"] == "%")
        {
            $delPrice = $_SESSION["totalPrice"] * $delivery[0]["delFee"] / 100;
            $_SESSION["totalPrice"] += $delPrice;
        }

        $_SESSION["finalTotalPrice"] = $_SESSION["totalPrice"];
        // Get the final total price after payment added
        if ($payment[0]["payType"] == "CHF") 
        {
            $_SESSION["finalTotalPrice"] += $payment[0]["payFee"];
        }
        else if($payment[0]["payType"] == "%")
        {
            $payPrice = $_SESSION["finalTotalPrice"] * $payment[0]["payFee"] / 100;
            $_SESSION["finalTotalPrice"] += $payPrice;
        }    

        $view = file_get_contents('view/page/purchase/summary.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display the confirmation
     *
     * @return string
     */
    private function confirmationAction() 
    {
        if ($_SESSION != null) 
        {
            // Get the repositories
            $orderRepository = new OrderRepository();
            $orderProductRepository = new OrderProductRepository();
            $paymentRepository = new PaymentRepository();
            $deliveryRepository = new DeliveryRepository();
            $shopRepository = new ShopRepository();

            // Number of order
            $orderNumber = rand(0, 9999999);

            // Insert order
            $orderRepository->insert($orderNumber, $_SESSION["finalTotalPrice"], $_SESSION["totalPrice"], 0, "En attente", $_SESSION["adress"]["title"], $_SESSION["adress"]["name"], $_SESSION["adress"]["surname"], $_SESSION["adress"]["street"], $_SESSION["adress"]["streetNumber"], $_SESSION["adress"]["npa"], $_SESSION["adress"]["locality"], $_SESSION["adress"]["mailAdress"], $_SESSION["adress"]["phone"], $_SESSION["method"], $_SESSION["payment"]);

            // Get order
            $order = $orderRepository->findOneByOrderNumber($orderNumber);

            // Get all the method did by user
            $payment = $paymentRepository->findOne($order[0]["fkPayment"]);
            $delivery = $deliveryRepository->findOne($order[0]["fkDelivery"]);

            if($payment[0]["payType"] == "%")
            {
                $payPrice = $order[0]["ordSubtotal"] * $payment[0]["payFee"] / 100;
            }

            $products = array();
            // Insert order product
            foreach ($_SESSION["basket"] as $key => $product) 
            {
                $products[] = $product;
                $orderProductRepository->insert($order[0]["idOrder"], $product["idProduct"], $product["quantity"]);
                $shopRepository->substract($product["idProduct"], $product["quantity"]);
            }            

            // Reset all
            unset($_SESSION["basket"]);
            unset($_SESSION["totalPrice"]);
            unset($_SESSION["method"]);
            unset($_SESSION["payment"]);
            unset($_SESSION["adress"]);
            unset($_SESSION["finalTotalPrice"]);

            // Get view
            $view = file_get_contents('view/page/purchase/confirmation.php');

            ob_start();
            eval('?>' . $view);
            $content = ob_get_clean();

            return $content;
        }
        else
        {
            header("location: index.php");
        }
    }
}



?>