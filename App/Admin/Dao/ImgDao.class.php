<?php
namespace Admin\Dao;

use Think\Model;

class ImgDao extends Model
{

    protected $tableName = "chemicals";
    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = M("chemicals");
    }

    function getImg($id)
    {
        if (isset($_GET['image_id'])) {
            $condition = " id='" . $_GET['image_id'] . "'";
            $data = $this->model->where($condition)->select();
            if ($data) {
                return $data[0]['chemical_structure'];
            }
        }
    }
}

?>