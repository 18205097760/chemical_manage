<?php
namespace Home\Controller;

use Home\Dao\ChemicalDao;

class ChemicalController extends BaseController
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
        $_SESSION['kwd'] = $kwd;
        $this->display("Search:result");
    }

    function detail($id = "")
    {
        if (! ($id === "")) {
            $data = $this->dao->querySingleById($id);
            $_SESSION['detail'] = $data;
            $this->display("Search:detail");
        }
    }

}

?>