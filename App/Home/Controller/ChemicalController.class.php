<?php
namespace Home\Controller;

use Think\Controller;
use Home\Dao\ChemicalDao;

class ChemicalController extends Controller
{

    private $dao;

    function __construct()
    {
        parent::__construct();
        $this->dao = new ChemicalDao();
    }

    function index()
    {
        $this->display("Index:index");
    }

    function search($kwd = "")
    {
        $data = $this->dao->queryListByKwd($kwd);
        $_SESSION['search'] = $data;
        $this->display("Search:result");
    }
    
    function detail($id=""){
        $data=$this->dao->querySingleById($id);
        $_SESSION['detail']=$data;
        $this->display("Search:detail");
    }
}

?>