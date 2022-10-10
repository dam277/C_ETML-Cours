<?php
class ProfileController extends Controller 
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
    private function listAction() 
    {
        $view = file_get_contents('view/page/profile/index.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}
?>