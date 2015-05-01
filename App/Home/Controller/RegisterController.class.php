<?php
namespace Home\Controller;

use Think\Controller;
use Home\Dao\UserDao;
use Home\Model\User;

class RegisterController extends Controller
{

    private $userDao;

    private $userModel;

    function __construct()
    {
        parent::__construct();
        $this->userDao = new UserDao();
        $this->userModel = new User();
    }

    public function index()
    {
        if ((isset($_POST['name'])) && (isset($_POST['password']))) {
            $user = $this->userDao->querySingleById($_POST['name']);
            if ($user != null) {
                $_SESSION['registerError'] = true;
                $this->error("该用户已存在！","../../Public/register.php",2);
            } else {
                unset($_SESSION['registerError']);
                $this->userModel->userid = $_POST['name'];
                $this->userModel->password = $_POST['password'];
                $this->userModel->type = "normal";
                $this->userDao->insertSingle($this->userModel);
                unset($_SESSION['loginError']);
                $this->success("注册成功", "../Home/Login");
            }
        } else {
            $_SESSION['registerError'] = true;
        }
    }
}

?>