<?php
namespace Home\Controller;

class LogoutController extends BaseController
{
    
    function index(){
        unset($_SESSION['user']);
        $this->redirect("/Home");
    }
}

?>