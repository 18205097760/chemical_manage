<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    
    private $loginUrl;

    public function _initialize()
    {
        $loginUrl=__ROOT__."/index.php/Admin/Login";
        if (!isset($_SESSION['admin'])) {
            redirect($loginUrl);
        }
    }

    public function __construct()
    {
        parent::__construct();
    }

}

?>