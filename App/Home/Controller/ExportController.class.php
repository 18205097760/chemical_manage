<?php
namespace Home\Controller;

use Think\Controller;
use Home\Dao\ChemicalDao;

class ExportController extends Controller
{
 
    private $chemicalDao;
    function __construct(){
        parent::__construct();
        $this->chemicalDao=new ChemicalDao();
        require_once 'output.php';
    }
    
    function index(){
        if(isset($_GET['kwd'])){
            $data=$this->chemicalDao->queryListByKwd($_GET['kwd']);
            output($data);
        }
    }
}

?>