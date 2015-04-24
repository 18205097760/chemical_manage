<?php
namespace Home \ Controller;
use Think \ Controller;
use Home \ Controller \ ChemicalSearchController;
use Home \ Dao \ ChemicalBasicDao;
use Home \ Dao \ DangerLevelDao;
class IndexController extends Controller {
	private static $chBasicDao;
	private static $danLevelDao;
	private static $displayNum;
	private static $cControl;
	function __construct() {
		parent :: __construct();
		$this->chBasicDao = new ChemicalBasicDao();
		$this->danLevelDao = new DangerLevelDao();
		$this->displayNum = 10;
		$this->cControl=new ChemicalSearchController();
	}
	public function index() {
		//$this->redirect('../Bootstrap/index');
		$_SESSION["index_chBasics_danLevel"]=$this->getChBasicByDangerLevel();
		$this->display("Index:index");
	}
	public function search($search_key = "") {
		$this->cControl->search($search_key);
	}
	private function getChBasicByDangerLevel() {
		$result = array ();
		$danLevels = $this->danLevelDao->queryIDs();
		$lSize = count($danLevels);
		for ($i = 0; $i < $lSize; $i++) {
			$danLevel = $danLevels[$i];
			$list = $this->chBasicDao->queryListByDangerLevelId($danLevel,0, $this->displayNum);
			if (count($list) != 0) {
				$result['' + $danLevel] = $list;
			}
		}
		return $result;
	}
}
?>