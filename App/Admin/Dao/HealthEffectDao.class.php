<?php
namespace Home \ Dao;
use Think \ Model;
use Home \ Model \ HealthEffect;
class HealthEffectDao extends Model {
	protected $tableName = 'health_effect';
	private $model;
	function __construct() {
		parent :: __construct();
		$this->model = M('chemicals');
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
	public function queryList($condition = "") {
		$result = array ();
		$data = $this->model->where($condition)->select();
		if ($data) {
			$len = count($data);
			for ($i = 0; $i < $len; $i++) {
				$heaEff = new HealthEffect();
				$heaEff->chemical_id = $data[$i]['chemical_id'];
				$heaEff->acute_toxicity = $data[$i]['acute_toxicity'];
				$heaEff->skin_corr = $data[$i]['skin_corr'];
				$heaEff->eye_damage = $data[$i]['eye_damage'];
				$heaEff->breath_allergy = $data[$i]['breath_allergy'];
				$heaEff->cell_muta = $data[$i]['cell_muta'];
				$heaEff->carcino = $data[$i]['carcino'];
				$heaEff->reprodu_toxicity = $data[$i]['reprodu_toxicity'];
				$heaEff->specific_target_organ_toxicity = $data[$i]['specific_target_organ_toxicity'];
				array_push($result, $heaEff);
			}
		}
		return $result;
	}
	public function insertSingle($heaEff) {
		$result = false;
		if ($heaEff) {
			$data['chemical_id'] = $heaEff->chemical_id;
			$data['acute_toxicity'] = $heaEff->acute_toxicity;
			$data['skin_corr'] = $heaEff->skin_corr;
			$data['eye_damage'] = $heaEff->eye_damage;
			$data['breath_allergy'] = $heaEff->breath_allergy;
			$data['cell_muta'] = $heaEff->cell_muta;
			$data['carcino'] = $heaEff->carcino;
			$data['reprodu_toxicity'] = $heaEff->reprodu_toxicity;
			$data['specific_target_organ_toxicity'] = $heaEff->specific_target_organ_toxicity;
			$this->model->add($data);
			$result =true;
		}
		return $result;
	}
	public function updateSingle($heaEff) {
		$result = -1;
		if ($heaEff) {
			$condition = "chemical_id=" + $heaEff->chemical_id;
			$data['acute_toxicity'] = $heaEff->acute_toxicity;
			$data['skin_corr'] = $heaEff->skin_corr;
			$data['eye_damage'] = $heaEff->eye_damage;
			$data['breath_allergy'] = $heaEff->breath_allergy;
			$data['cell_muta'] = $heaEff->cell_muta;
			$data['carcino'] = $heaEff->carcino;
			$data['reprodu_toxicity'] = $heaEff->reprodu_toxicity;
			$data['specific_target_organ_toxicity'] = $heaEff->specific_target_organ_toxicity;
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