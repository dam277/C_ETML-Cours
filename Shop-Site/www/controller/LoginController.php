<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */
include_once 'classes/LoginRepository.php';

class LoginController extends Controller {

    /**
     * Dispatch current Action
     *
     * @return mixed
     */
    public function display() {

        $action = $_GET['action'] . "Action";

        return call_user_func(array($this, $action));
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function indexAction() {

        // CSRF
        $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $result = "";
        for ($i=0; $i < 20; $i++) 
        { 
            $result .= $characters[mt_rand(0, 61)];
        }
        $_SESSION["CSRF"] = array($result => date(DATE_RFC2822));

        $view = file_get_contents('view/page/login/index.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Login Action
     *
     * @return string
     */
    private function loginAction() {

        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $CSRF = htmlspecialchars($_POST["CSRF"]);

        $loginRepository = new LoginRepository();

        // Check CSRF
        foreach ($_SESSION["CSRF"] as $key => $value) 
        {
            if ($CSRF == $key) 
            {
                $result = $loginRepository->login($login, $password);                    
            }
            else
            {
                $result = false;
            }
        }

        $text = "Vous n'êtes pas connnecté ! ";

        if($result == true){
            $text = "Vous êtes connecté ! ";
        }

        $view = file_get_contents('view/page/login/confirm.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Diplay Logout Action
     * 
     * @return string
     */
    private function logoutAction() {
        $_SESSION['right'] = null;

        $view = file_get_contents('view/page/login/index.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;

    }

}