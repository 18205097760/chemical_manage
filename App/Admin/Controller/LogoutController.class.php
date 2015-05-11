<?php
namespace Admin\Controller;

class LogoutController extends BaseController
{
    
    function index(){
        unset($_SESSION['admin']);
        $this->redirect("/Admin");
    }
}

?>