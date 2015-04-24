<?php
namespace Home \ Dao;
use Think \ Model;
use Home \ Model \ LeakDisposal;
class LeakDisposalDao extends Model {
	protected $tableName = 'leak_disposal';
	private $model;
	function __construct() {
		parent :: __construct();
		$this->model = M('leak_disposal');
	}
	public function querySingleById($chId) {
		$result = null;
		$conditon['chemical_id'] = $chId;
		$res = $this->queryList($condition);
		if (count($res) != 0) {
			$result = $res[0];
		}
		return $result;
	}
	public function queryList($condition="") {
		$result = array ();
		$data = $this->model->where($condition)->select();
		if ($data) {
			$len = count($data);
			for ($i = 0; $i < $len; $i++) {
				$leakDis = new LeakDisposal();
				$leakDis->chemical_id = $data[$i]['chemical_id'];
				$leakDis->disposal_descrip = $data[$i]['disposal_descrip'];
				array_push($result, $leakDis);
			}
		}
		return $result;
	}
	public function insertSingle($leakDis) {
		$result = false;
		if ($leakDis) {
			$data['chemical_id'] = $leakDis->chemical_id;
			$data['disposal_descrip'] = $leakDis->disposal_descrip;
			$this->model->add($data);
			$result =true;
		}
		return $result;
	}
	public function updateSingle($leakDis) {
		$result = -1;
		if ($leakDis) {
			$condition = "chemical_id=" + $leakDis->chemical_id;
			$data['disposal_descrip'] = $leakDis->disposal_descrip;
			$result = $this->model->where($condition)->save($data);
		}
		return $result;
	}
	public function deleteById($chId) {
		$conditon['chemical_id'] = $chId;
		return $this->delete($condition);
	}
	public function delete($condition = "") {
		$result = $this->model->where($condition)->delete();
		return $result;
	}
}
?>