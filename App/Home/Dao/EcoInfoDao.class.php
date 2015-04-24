<?php
namespace Home \ Dao;
use Think \ Model;
use Home \ Model \ EcoInfo;
class EcoInfoDao extends Model {
	protected $tableName = 'eco_info';
	private $model;
	function __construct() {
		parent :: __construct();
		$this->model = M('eco_info');
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
				$ecoInfo = new EcoInfo();
				$ecoInfo->chemical_id = $data[$i]['chemical_id'];
				$ecoInfo->acute_toxicity = $data[$i]['acute_toxicity'];
				$ecoInfo->acute_predict = $data[$i]['acute_predict'];
				$ecoInfo->chronic_toxicity = $data[$i]['chronic_toxicity'];
				$ecoInfo->chronic_predict = $data[$i]['chronic_predict'];
				$ecoInfo->degra_test = $data[$i]['degra_test'];
				$ecoInfo->degra_predict = $data[$i]['degra_predict'];
				$ecoInfo->cum_bcf_test = $data[$i]['cum_bcf_test'];
				$ecoInfo->cum_bcf_predict = $data[$i]['cum_bcf_predict'];
				$ecoInfo->cum_lgkow_test = $data[$i]['cum_lgkow_test'];
				$ecoInfo->cum_lgkow_predict = $data[$i]['cum_lgkow_predict'];
				array_push($result, $ecoInfo);
			}
		}
		return $result;
	}
	public function insertSingle($ecoInfo) {
		$result = false;
		if ($ecoInfo) {
			$data['chemical_id'] = $ecoInfo->chemical_id;
			$data['acute_toxicity'] = $ecoInfo->acute_toxicity;
			$data['acute_predict'] = $ecoInfo->acute_predict;
			$data['chronic_toxicity'] = $ecoInfo->chronic_toxicity;
			$data['chronic_predict'] = $ecoInfo->chronic_predict;
			$data['degra_test'] = $ecoInfo->degra_test;
			$data['degra_predict'] = $ecoInfo->degra_predict;
			$data['cum_bcf_test'] = $ecoInfo->cum_bcf_test;
			$data['cum_bcf_predict'] = $ecoInfo->cum_bcf_predict;
			$data['cum_lgkow_test'] = $ecoInfo->cum_lgkow_test;
			$data['cum_lgkow_predict'] = $ecoInfo->cum_lgkow_predict;
			$this->model->add($data);
			$result =true;
		}
		return $result;
	}
	public function updateSingle($ecoInfo) {
		$result = -1;
		if ($ecoInfo) {
			$condition = "chemical_id=" + $ecoInfo->chemical_id;
			$data['acute_toxicity'] = $ecoInfo->acute_toxicity;
			$data['acute_predict'] = $ecoInfo->acute_predict;
			$data['chronic_toxicity'] = $ecoInfo->chronic_toxicity;
			$data['chronic_predict'] = $ecoInfo->chronic_predict;
			$data['degra_test'] = $ecoInfo->degra_test;
			$data['degra_predict'] = $ecoInfo->degra_predict;
			$data['cum_bcf_test'] = $ecoInfo->cum_bcf_test;
			$data['cum_bcf_predict'] = $ecoInfo->cum_bcf_predict;
			$data['cum_lgkow_test'] = $ecoInfo->cum_lgkow_test;
			$data['cum_lgkow_predict'] = $ecoInfo->cum_lgkow_predict;
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