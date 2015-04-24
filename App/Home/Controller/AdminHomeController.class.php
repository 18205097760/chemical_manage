<?php
namespace Home \ Controller;
use Think \ Controller;
class AdminHomeController extends Controller {
	function __construct() {
		parent :: __construct();
	}
	public function index() {
		$this->display("Admin:adminHome");
	}
}
?>