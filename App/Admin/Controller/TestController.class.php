<?php
namespace Admin\Controller;

use Admin\Controller\BaseCotroller;
use Admin\Dao\ChemicalDao;
use Think\Model;

class TestController extends BaseController
{

    private $chemicalDao;

    public function _initialize(){
        parent::_initialize();
    }
    
    function __construct()
    {
        parent::__construct();
        $this->chemicalDao = new ChemicalDao();
    }

    function index()
    {
        $this->display("User:chemicalDetail");
        echo ("index");
        echo ("<br />");
        $model=$this->chemicalDao->querySingleById("1");
        echo($model->name_cn);
        echo("<br />");
        echo($model->name_en);
        echo("<br />");
        echo($model->cas_no);
    }

    function show()
    {
        echo ("show admin test!");
    }
}

?>