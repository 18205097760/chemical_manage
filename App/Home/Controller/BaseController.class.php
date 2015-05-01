<?php
namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
    
    private $loginUrl;

    public function _initialize()
    {
        $loginUrl="/Home/Login";
        if (!isset($_SESSION['user'])) {
            $this->redirect($loginUrl);
        }
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // echo("base");
    }
}

?>