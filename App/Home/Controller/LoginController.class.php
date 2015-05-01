<?php
namespace Home\Controller;

use Think\Controller;
use Home\Dao\UserDao;
use Home\Model\User;

class LoginController extends Controller
{

    private $userDao;

    private $loginUrl;

    private $indexUrl;

    function __construct()
    {
        parent::__construct();
        $this->indexUrl = "/Home/index";
        $this->userDao = new UserDao();
    }

    function index()
    {
        if (isset($_SESSION['user'])) {
            $this->redirect($this->indexUrl, 2);
        } else 
            if (is_null($_POST['name']) || is_null($_POST['password'])) {
                unset($_SESSION['loginError']);
                $this->display("Login:login");
            } else {
                $name = $_POST['name'];
                $password = $_POST['password'];
                
                $user = $this->userDao->querySingleById($name);
                if ($user->password == $password) {
                    unset($_SESSION['loginError']);
                    $_SESSION['user'] = true;
                    $this->redirect($this->indexUrl, 2);
                } else {
                    $_SESSION['loginError'] = true;
                    $this->display("Login:login");
                }
            }
    }
}

?>