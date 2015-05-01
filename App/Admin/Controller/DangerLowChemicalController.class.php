<?php
namespace Home \ Controller;
use Think \ Controller;
class DangerLowChemicalController extends Controller {
	function __construct() {
		parent :: __construct();
	}
	public function index() {
		$this->display("Admin:adminChemical");
	}
}
?>