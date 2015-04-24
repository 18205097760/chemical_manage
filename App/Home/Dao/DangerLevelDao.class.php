<?php
namespace Home \ Dao;
use Think \ Model;
use Home \ Model\DangerLevel;
class DangerLevelDao extends Model {
	protected $tableName = 'danger_level';
	private $model;
	function __construct() {
		parent :: __construct();
		$this->model = M('danger_level');
	}
	public function querySingleById($danLevelId){
		$result=null;
		$conditon['danger_level_id']=$danLevelId;
		$res = $this->queryList($condition);
		if (count($res) != 0) {
			$result = $res[0];
		}
		return $result;
	}
	public function queryList($condition=""){
		$result = array ();
		$data = $this->model->where($condition)->select();
		if ($data) {
			$len = count($data);
			for ($i = 0; $i < $len; $i++) {
				$danLev = new DangerLevel();
				$danLev->danger_level_id = $data[$i]['danger_level_id'];
				$danLev->danger_descrip = $data[$i]['danger_descrip'];
				array_push($result, $danLev);
			}
		}
		return $result;
	}
	public function queryIDs($condition=""){
		$result = array ();
		$data = $this->model->where($condition)->select();
		if ($data) {
			$len = count($data);
			for ($i = 0; $i < $len; $i++) {
				array_push($result, $data[$i]['danger_level_id']);
			}
		}
		return $result;
	}
	public function insertSingle($danLevel) {
		$result = 0;
		if ($danLevel) {
			$data['danger_descrip'] = $danLevel->danger_descrip;
			$result=$this->model->add($data);
		}
		return $result;
	}
	public function updateSingle($danLevel) {
		$result = -1;
		if ($danLevel) {
			$condition = "danger_level_id=" + $danLevel->danger_level_id;
			$data['danger_descrip'] = $danLevel->danger_descrip;
			$result = $this->model->where($condition)->save($data);
		}
		return $result;
	}
	public function deleteById($danLevelId) {
		$conditon['danger_level_id'] = $danLevelId;
		return $this->delete($condition);
	}
	public function delete($condition = "") {
		$result = $this->model->where($condition)->delete();
		return $result;
	}
}
?>