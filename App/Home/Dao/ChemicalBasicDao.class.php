<?php
namespace Home \ Dao;
use Think \ Model;
use Home \ Model \ ChemicalBasic;
class ChemicalBasicDao extends Model {
	protected $tableName = 'chemical_basic';
	private $joinStr = 'danger_level on chemical_basic.danger_level_id=danger_level.danger_level_id';
	private $model;

	function __construct() {
		parent :: __construct();
		$this->model = M('chemical_basic');
	}
	public function queryTotalItem() {
		$result = -1;
		$data = $this->model->field(array("count(*)"=>"total"))->select();
		if ($data) {
			$result=$data[0]["total"];
		}
		return $result;
	}
	public function querySingleById($chId) {
		$result = null;
		$condition['chemical_id'] = $chId;
		$res = $this->queryList($condition);
		if (count($res) != 0) {
			$result = $res[0];
		}
		return $result;
	}
	public function queryListByKwd($kwd, $start, $num) {
		$condition = "name_cn like %" + $kwd +"% or " + "name_en like %" + $kwd +"% or " + "cas_no like %" + $kwd +"% ";
		return $this->queryList($condition, $start, $num);
	}
	public function queryListByDangerLevelId($danLevelId, $start, $num) {
		$condition['chemical_basic.danger_level_id'] = $danLevelId;
		return $this->queryList($condition, $start, $num);
	}
	public function queryList($condition = "", $start = 0, $num = 0) {
		$result = array ();
		if ($num > 0) {
			$data = $this->model->where($condition)->join($this->joinStr)->limit($start, $num)->select();
		} else {
			$data = $this->model->where($condition)->join($this->joinStr)->select();
		}

		if ($data) {
			$len = count($data);
			for ($i = 0; $i < $len; $i++) {
				$chBasic = new ChemicalBasic();
				$chBasic->chemical_id = $data[$i]['chemical_id'];
				$chBasic->name_cn = $data[$i]['name_cn'];
				$chBasic->name_en = $data[$i]['name_en'];
				$chBasic->cas_no = $data[$i]['cas_no'];
				$chBasic->molec_formu = $data[$i]['molec_formu'];
				$chBasic->chemical_struct = $data[$i]['chemical_struct'];
				$chBasic->molec_num = $data[$i]['molec_num'];
				$chBasic->danger_level_id = $data[$i]['danger_level_id'];
				$chBasic->danger_descrip = $data[$i]['danger_descrip'];
				array_push($result, $chBasic);
			}
		}
		return $result;
	}
	public function insertSingle($chBasic) {
		$result = 0;
		if ($chBasic) {
			$data['name_cn'] = $chBasic->name_cn;
			$data['name_en'] = $chBasic->name_en;
			$data['cas_no'] = $chBasic->cas_no;
			$data['molec_formu'] = $chBasic->molec_formu;
			$data['chemical_struct'] = $chBasic->chemical_struct;
			$data['molec_num'] = $chBasic->molec_num;
			$data['danger_level_id'] = $chBasic->danger_level_id;
			$result = $this->model->add($data);
		}
		return $result;
	}
	public function updateSingle($chBasic) {
		$result = -1;
		if ($chBasic) {
			$condition = "chemical_id=" + $chBasic->chemical_id;
			$data['name_cn'] = $chBasic->name_cn;
			$data['name_en'] = $chBasic->name_en;
			$data['cas_no'] = $chBasic->cas_no;
			$data['molec_formu'] = $chBasic->molec_formu;
			$data['chemical_struct'] = $chBasic->chemical_struct;
			$data['molec_num'] = $chBasic->molec_num;
			$data['danger_level_id'] = $chBasic->danger_level_id;
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