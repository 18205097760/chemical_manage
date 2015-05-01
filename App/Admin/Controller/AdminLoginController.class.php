<?php
namespace Home \ Controller;
use Think \ Controller;
use Home \ Dao \ DangerLevelDao;
class AdminLoginController extends Controller {
	function __construct() {
		parent :: __construct();
	}
	public function index() {
		$this->display("Admin:adminLogin");
	}
	public function checkLogin($username,$password){
		if($_SESSION["username"]==null){
			
		}else if($_SESSION["username"]==$username){
			$this->display("Admin:adminHome");
		}else{
			
		}
	}
	public function logFail(){
		
	}
}
?>