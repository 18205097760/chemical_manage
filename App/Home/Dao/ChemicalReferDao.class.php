<?php
namespace Home \ Dao;
use Think \ Model;
use Home \ Model \ ChemicalRefer;
class ChemicalReferDao extends Model {
	protected $tableName = 'chemical_refer';
	private $joinStr = 'refer_db on chemical_refer.refer_id=chemical_refer.refer_id';
	private $model;
	function __construct() {
		parent :: __construct();
		$this->model = M('chemical_refer');
	}

	public function queryList($condition = "") {
		$result = array ();
		$data = $this->model->where($condition)->join($this->joinStr)->select();
		if ($data) {
			$len = count($data);
			for ($i = 0; $i < $len; $i++) {
				$chRefer = new ChemicalRefer();
				$chRefer->chemical_id = $data[$i]['chemical_id'];
				$chRefer->refer_id = $data[$i]['refer_id'];
				$chRefer->refer_content = $data[$i]['refer_content'];
				array_push($result, $chRefer);
			}
		}
		return $result;
	}
	public function queryListByChId($chId) {
		$condition['chemical_id'] = $chId;
		return $this->queryList($condition);
	}
	public function insertSingle($chRefer) {
		$result = false;
		if ($chRefer) {
			$data['chemical_id'] = $chRefer->chemical_id;
			$data['refer_id'] = $chRefer->refer_id;
			$this->model->add($data);
			$result = true;
		}
		return $result;
	}
	public function deleteById($chId, $referId) {
		$condition = "chemical_id=" + $chId +" and refer_id=" + $referId;
		return $this->delete($condition);
	}
	public function delete($condition = "") {
		$result = $this->model->where($condition)->delete();
		return $result;
	}
}
?>