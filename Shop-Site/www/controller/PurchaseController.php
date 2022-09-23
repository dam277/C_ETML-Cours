<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */
include_once 'classes/DeliveryRepository.php';

class PurchaseController extends Controller
{
    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() {

        $action = $_GET['action'] . "Action";
        var_dump($action);
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
    private function deliveryAction() {

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
            // Get the view
            $view = file_get_contents('view/page/purchase/payment.php');
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
       
        $view = file_get_contents('view/page/purchase/payment.php');

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

    /**
     * Display List Action
     *
     * @return string
     */
    private function summaryAction() 
    {
        $view = file_get_contents('view/page/purchase/summary.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}



?>