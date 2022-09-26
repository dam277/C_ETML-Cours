<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */
include_once 'classes/DeliveryRepository.php';
include_once 'classes/PaymentRepository.php';

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

        var_dump($payment);
        $view = file_get_contents('view/page/purchase/summary.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}



?>