<?php
namespace Home \ Controller;
use Think \ Controller;
use Home \ Dao \ ChemicalBasicDao;
use Home\ Controller\ChemicalDetailController;
class ChemicalSearchController extends Controller {
	private static $chBasicDao;
	private static $pageNum;
	private static $cControl;
	function __construct() {
		parent :: __construct();
		$this->chBasicDao = new ChemicalBasicDao();
		$this->pageNum = 20;
		$this->cControl=new ChemicalDetailController();
	}
	public function index() {
		$this->search();
	}
	public function search($search_key = "", $page = 0) {
		$total = $this->chBasicDao->queryTotalItem();
		$pageSize = 0;
		if ($total == 0) {
			$pageSize = 1;
		} else {
			$pageSize = ceil($total / $this->pageNum);
		}
		//$this->show($pageSize, "utf8");
		$_SESSION["cs_search_key"]=$search_key;
		$_SESSION["cs_total"]=$total;
		$_SESSION["cs_pageSize"] = $pageSize;
		if ($page > 0) {
			$_SESSION["cs_currPage"] = $page;
			$page--;
		} else if ($page <= 0) {
			$page = 0;
			$_SESSION["cs_currPage"] = 1;
		}
		$_SESSION["cs_chBasics"] = $this->chBasicDao->queryListByKwd($search_key, $page * $this->pageNum, $this->pageNum);
		$this->display("User:chemicalSearch");
	}
	public function getDetail($chId=0){
		$this->cControl->searchDetail($chId);
	}
}
?>