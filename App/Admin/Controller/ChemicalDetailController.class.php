<?php
namespace Admin \ Controller;
use Think \ Controller;
use Home \ Dao \ ChemicalBasicDao;
use Home \ Dao \ ChemicalReferDao;
use Home \ Dao \ EcoInfoDao;
use Home \ Dao \ HealthEffectDao;
use Home \ Dao \ LeakDisposalDao;
use Home \ Dao \ MaterialAttrDao;
class ChemicalDetailController extends Controller {
	private static $chBasicDao;
	private static $chReferDao;
	private static $ecoInfoDao;
	private static $hlEffDao;
	private static $lkDisDao;
	private static $mtAtDao;
	
	function __construct() {
		parent :: __construct();
		$this->chBasicDao=new ChemicalBasicDao();
		$this->chReferDao=new ChemicalReferDao();
		$this->ecoInfoDao=new EcoInfoDao();
		$this->hlEffDao=new HealthEffectDao();
		$this->lkDisDao=new LeakDisposalDao();
		$this->mtAtDao=new MaterialAttrDao();
	}
	public function index() {
		$this->display("User:chemicalDetail");
	}
	public function searchDetail($chId=0){
		$_SESSION["cd_chBasic"]=$this->chBasicDao->querySingleById($chId);
		$_SESSION["cd_chRefers"]=$this->chReferDao->queryListByChId($chId);
		$_SESSION["cd_ecoInfo"]=$this->ecoInfoDao->querySingleById($chId);
		$_SESSION["cd_hlEff"]=$this->hlEffDao->querySingleById($chId);
		$_SESSION["cd_lkDis"]=$this->lkDisDao->querySingleById($chId);
		$_SESSION["cd_mtAt"]=$this->mtAtDao->querySingleById($chId);
		$this->display("User:chemicalDetail");
	}
}
?>