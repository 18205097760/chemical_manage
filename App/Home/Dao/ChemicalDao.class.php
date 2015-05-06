<?php
namespace Home\Dao;

use Think\Model;
use Home\Model\Chemical;

class ChemicalDao extends Model
{

    protected $tableName = 'chemicals';

    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = M('chemicals');
    }

    public function querySingleById($chId)
    {
        $result = null;
        $condition['chemical_id'] = $chId;
        $res = $this->queryList($condition);
        if (count($res) != 0) {
            $result = $res[0];
        }
        return $result;
    }

    public function queryListByKwd($kwd, $start = 0, $num = 0)
    {
        $condition = "name_zh like '%" . $kwd . "%' or " . "name_en like '%" . $kwd . "%' or " . "CAS_registry_number like '%" . $kwd . "%' ";
        return $this->queryList($condition, $start, $num);
    }

    public function queryList($condition = "", $start = 0, $num = 0)
    {
        $result = array();
        if ($num > 0) {
            $data = $this->model->where($condition)
                ->limit($start, $num)
                ->select();
        } else {
            $data = $this->model->where($condition)->select();
        }
        
        if ($data) {
            $len = count($data);
            for ($i = 0; $i < $len; $i ++) {
                $chBasic = new Chemical();
                $chBasic->id = $data[$i]['id'];
                $chBasic->name_zh = $data[$i]['name_zh'];
                $chBasic->name_en = $data[$i]['name_en'];
                $chBasic->molecular_formula = $data[$i]['molecular_formula'];
                // $chBasic->chemical_structure = $data[$i]['chemical_struct'];
                $chBasic->mol_wt = $data[$i]['molecular_weight'];
                $chBasic->cas = $data[$i]['cas_registry_number'];
                $chBasic->classify = $data[$i]['classification'];
                $chBasic->appearance = $data[$i]['appearance'];
                $chBasic->fusion_p = $data[$i]['fusion_point'];
                $chBasic->boiling_p = $data[$i]['boiling_point'];
                $chBasic->relative_density_water = $data[$i]['relative_density_water'];
                $chBasic->relative_density_air = $data[$i]['relative_density_air'];
                $chBasic->saturated_vapor_pressure = $data[$i]['saturated_vapor_pressure'];
                $chBasic->solubleness = $data[$i]['solubleness'];
                $chBasic->combustibility = $data[$i]['combustibility'];
                $chBasic->flash_point = $data[$i]['flashing_point'];
                $chBasic->explosion_limit = $data[$i]['explosion_limit'];
                $chBasic->stability = $data[$i]["stability"];
                $chBasic->extinguishant = $data[$i]["extinguishant"];
                $chBasic->taboo = $data[$i]["taboo"];
                $chBasic->eco1 = $data[$i]["ecology_col1"];
                $chBasic->eco2 = $data[$i]["ecology_col2"];
                $chBasic->eco3 = $data[$i]["ecology_col3"];
                $chBasic->eco4 = $data[$i]["ecology_col4"];
                $chBasic->eco5 = $data[$i]["ecology_col5"];
                $chBasic->eco6 = $data[$i]["ecology_col6"];
                $chBasic->eco7 = $data[$i]["ecology_col7"];
                $chBasic->eco8 = $data[$i]["ecology_col8"];
                $chBasic->eco9 = $data[$i]["ecology_col9"];
                $chBasic->eco10 = $data[$i]["ecology_col10"];
                $chBasic->acute_toxicity = $data[$i]["acute_toxicity"];
                $chBasic->skin_corrosion_stimulation = $data[$i]["skin_corrosion_stimulation"];
                $chBasic->eye_injury_stimulation = $data[$i]["eye_injury_stimulation"];
                $chBasic->sensitization = $data[$i]["sensitization"];
                $chBasic->mutagenicity = $data[$i]["mutagenicity"];
                $chBasic->carcinogenicity = $data[$i]["carcinogenicity"];
                $chBasic->reproductive_toxicity = $data[$i]["reproductive_toxicity"];
                $chBasic->systemic_toxicity = $data[$i]["systemic_toxicity"];
                $chBasic->spill_response = $data[$i]["spill_response"];
                $chBasic->reference = $data[$i]["reference"];
                
                array_push($result, $chBasic);
            }
        }
        return $result;
    }
}

?>