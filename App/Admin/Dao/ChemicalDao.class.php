<?php
namespace Admin\Dao;

use Think\Model;
use Admin\Model\Chemical;
class ChemicalDao extends Model
{
    protected $tableName="chemicals";
    private $model;
    
    function __construct(){
        parent::__construct();
        $this->model=M("chemicals");
    }
    
    public function querySingleById($id){
        $result = null;
        $condition['id'] = $id;
        $res = $this->queryList($condition);
        if (count($res) != 0) {
            $result = $res[0];
        }
        return $result;
    }
    
    public function queryList($condition = "", $start = 0, $num = 0) {
        $result = array ();
        if ($num > 0) {
            $data = $this->model->where($condition)->limit($start, $num)->select();
        } else {
            $data = $this->model->where($condition)->select();
        }
    
        if ($data) {
            $len = count($data);
            for ($i = 0; $i < $len; $i++) {
                $chBasic = new Chemical();
                $chBasic->id = $data[$i]['id'];
                $chBasic->name_cn = $data[$i]['name_zh'];
                $chBasic->name_en = $data[$i]['name_en'];
                $chBasic->cas_no = $data[$i]['CAS_registry_number'];
                array_push($result, $chBasic);
            }
        }
        return $result;
    }
}

?>