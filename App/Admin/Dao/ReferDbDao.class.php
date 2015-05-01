<?php
namespace Home \ Dao;
use Think \ Model;
use Home \ Model \ ReferDb;
class ReferDbDao extends Model {
	protected $tableName = 'refer_db';
	private $model;
	function __construct() {
		parent :: __construct();
		$this->model = M('chemicals');
	}
	public function querySingleById($referId) {
		$result = null;
		$conditon['refer_id'] = $referId;
		$res = $this->queryList($condition);
		if (count($res) != 0) {
			$result = $res[0];
		}
		return $result;
	}
	public function queryList($condition = "") {
		$result = array ();
		$data = $this->model->where($condition)->select();
		if ($data) {
			$len = count($data);
			for ($i = 0; $i < $len; $i++) {
				$referDb = new ReferDb();
				$referDb->refer_id = $data[$i]['refer_id'];
				$referDb->refer_content = $data[$i]['refer_content'];
				array_push($result, $referDb);
			}
		}
		return $result;
	}

	public function insertSingle($referDb) {
		$result = 0;
		if ($referDb) {
			$data['refer_content'] = $referDb->refer_content;
			$result=$this->model->add($data);
		}
		return $result;
	}
	public function updateSingle($referDb) {
		$result = -1;
		if ($referDb) {
			$condition = "refer_id=" + $referDb->refer_id;
			$data['refer_content'] = $referDb->refer_content;
			$result = $this->model->where($condition)->save($data);
		}
		return $result;
	}
	public function deleteById($referId) {
		$conditon['refer_id'] = $referId;
		return $this->delete($condition);
	}
	public function delete($condition = "") {
		$result = $this->model->where($condition)->delete();
		return $result;
	}
}
?>