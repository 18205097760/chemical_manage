<?php
namespace Home \ Dao;
use Think \ Model;
use Home \ Model \ MaterialAttr;
class MaterialAttrDao extends Model {
	protected $tableName = 'material_attr';
	private $model;
	function __construct() {
		parent :: __construct();
		$this->model = M('material_attr');
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
				$matAttr = new MaterialAttr();
				$matAttr->chemical_id = $data[$i]['chemical_id'];
				$matAttr->appear_shape = $data[$i]['appear_shape'];
				$matAttr->melt_point = $data[$i]['melt_point'];
				$matAttr->boil_point = $data[$i]['boil_point'];
				$matAttr->density_water = $data[$i]['density_water'];
				$matAttr->density_air = $data[$i]['density_air'];
				$matAttr->sat_vap_press = $data[$i]['sat_vap_press'];
				$matAttr->solubility = $data[$i]['solubility'];
				$matAttr->combustion = $data[$i]['combustion'];
				$matAttr->flash_point = $data[$i]['flash_point'];
				$matAttr->explo_limit = $data[$i]['explo_limit'];
				$matAttr->stability = $data[$i]['stability'];
				$matAttr->fire_exti_agent = $data[$i]['fire_exti_agent'];
				$matAttr->contr_dicat = $data[$i]['contr_dicat'];
				array_push($result, $matAttr);
			}
		}
		return $result;
	}
	public function insertSingle($matAttr) {
		$result = false;
		if ($matAttr) {
			$data['chemical_id'] = $matAttr->chemical_id;
			$data['appear_shape'] = $matAttr->appear_shape;
			$data['melt_point'] = $matAttr->melt_point;
			$data['boil_point'] = $matAttr->boil_point;
			$data['density_water'] = $matAttr->density_water;
			$data['density_air'] = $matAttr->density_air;
			$data['sat_vap_press'] = $matAttr->sat_vap_press;
			$data['solubility'] = $matAttr->solubility;
			$data['combustion'] = $matAttr->combustion;
			$data['flash_point'] = $matAttr->flash_point;
			$data['explo_limit'] = $matAttr->explo_limit;
			$data['stability'] = $matAttr->stability;
			$data['fire_exti_agent'] = $matAttr->fire_exti_agent;
			$data['contr_dicat'] = $matAttr->contr_dicat;
			$this->model->add($data);
			$result =true;
		}
		return $result;
	}
	public function updateSingle($matAttr) {
		$result = -1;
		if ($matAttr) {
			$condition = "chemical_id=" + $matAttr->chemical_id;
			$data['appear_shape'] = $matAttr->appear_shape;
			$data['melt_point'] = $matAttr->melt_point;
			$data['boil_point'] = $matAttr->boil_point;
			$data['density_water'] = $matAttr->density_water;
			$data['density_air'] = $matAttr->density_air;
			$data['sat_vap_press'] = $matAttr->sat_vap_press;
			$data['solubility'] = $matAttr->solubility;
			$data['combustion'] = $matAttr->combustion;
			$data['flash_point'] = $matAttr->flash_point;
			$data['explo_limit'] = $matAttr->explo_limit;
			$data['stability'] = $matAttr->stability;
			$data['fire_exti_agent'] = $matAttr->fire_exti_agent;
			$data['contr_dicat'] = $matAttr->contr_dicat;
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