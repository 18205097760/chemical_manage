<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Dao\UserDao;
use Admin\Model\User;

class LoginController extends Controller
{

    private $userDao;

    private $loginUrl;

    private $indexUrl;

    

    function __construct()
    {
        parent::__construct();
        $this->indexUrl =__ROOT__."/index.php/Admin/index";
        $this->userDao = new UserDao();
    }

    function index()
    {
        if (isset($_SESSION['admin'])) {
            redirect($this->indexUrl);
        } else 
            if (is_null($_POST['name']) || is_null($_POST['password'])) {
                $this->display("Login:login");
            } else {
                $name = $_POST['name'];
                $password = $_POST['password'];
                
                $user = $this->userDao->querySingleById($name);
                if ($user->password == $password) {
                    $_SESSION['admin'] = true;
//                     if(isset($_SESSION['admin'])){
//                         echo("set session admin<br />");
//                         echo($this->indexUrl);
//                     }
                    redirect($this->indexUrl, 2);
                } else {
                    $_SESSION['loginError'] = true;
                    $this->display("Login:login");
                }
            }
    }
}

?>