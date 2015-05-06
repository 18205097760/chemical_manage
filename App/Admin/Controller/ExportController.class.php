<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Dao\ChemicalDao;

class ExportController extends BaseController
{

    private $chemicalDao;


    function __construct()
    {
        parent::__construct();
        $this->chemicalDao = new ChemicalDao();
        require_once 'output.php';
    }

    function index()
    {
        if (isset($_GET['kwd'])) {
            $data = $this->chemicalDao->queryListByKwd($_GET['kwd']);
            output($data);
        }
    }
}

?>