<?php
namespace Admin\Controller;

use Admin\Dao\ChemicalDao;
use Think\Upload;
use Admin\Model\Chemical;

class ChemicalController extends BaseController
{

    private $dao;

    function __construct()
    {
        parent::__construct();
        $this->dao = new ChemicalDao();
    }

    function index()
    {
        $this->display("Index:index");
    }

    function search($kwd = "")
    {
        $data = $this->dao->queryListByKwd($kwd);
        $_SESSION['search'] = $data;
        $_SESSION['kwd'] = $kwd;
        $this->display("Search:result");
    }

    function detail($id = "")
    {
        $data = $this->dao->querySingleById($id);
        $_SESSION['detail'] = $data;
        $this->display("Search:detail");
    }

    function delete($id = "")
    {
        $result = $this->dao->deleteById($id);
        if ($result) {
            $this->success("删除成功", __ROOT__ . "/Admin/chemical/search?kwd=" . $_SESSION['kwd'], 2);
        } else {
            $this->error("刪除失敗", __ROOT__ . "/Admin/chemical/detail?id=" . $id, 2);
        }
    }

    function update($id = "")
    {
        if (! ($id === "")) {
            $chBasic = $this->dao->querySingleById($id);
            if (! is_null($chBasic)) {
                if (isset($_POST['cas'])) {
                    $this->upload();
                    $chemical = $this->loadData();
                    $chemical->id = $id;
                    if (isset($_POST['img'])) {
                        $chemical->chemical_structure = file_get_contents($_POST['img']);
                    } else {
                        $chemical->chemical_structure = $chBasic->chemical_structure;
                    }
                    $result = $this->dao->updateSingle($chemical);
                    if ($result) {
                        $this->success("修改成功", __ROOT__ . "/Admin/Chemical/detail?id=" . $id, 2);
                    } else {
                        $this->error("修改失败", __ROOT__ . "/Admin/Chemical/update?id=" . $id, 2);
                    }
                } else {
                    $_SESSION['chemical'] = $chBasic;
                    $this->display("Search:update");
                }
            }
        }
    }

    function add()
    {
        if (isset($_POST['cas'])) {
            $this->upload();
            $chBasic = $this->loadData();
            $chBasic->chemical_structure = file_get_contents($_POST['img']);
            $result = $this->dao->insertSingle($chBasic);
            if ($result) {
                $this->success("新增成功", __ROOT__ . "/Admin/Chemical/add", 2);
            } else {
                $this->error("新增失败", __ROOT__ . "/Admin/Chemical/add", 2);
            }
        } else {
            $this->display("Search:add");
        }
    }

    private function loadData()
    {
        $chBasic = new Chemical();
        $chBasic->name_zh = $_POST['name_zh'];
        $chBasic->name_en = $_POST['name_en'];
        $chBasic->molecular_formula = $_POST['molecular_formula'];
        $chBasic->chemical_structure = $_POST['img'];
        $chBasic->mol_wt = $_POST['mol_wt'];
        $chBasic->cas = $_POST['cas'];
        $chBasic->classify = $_POST['classify'];
        $chBasic->appearance = $_POST['appearance'];
        $chBasic->fusion_p = $_POST['fusion_p'];
        $chBasic->boiling_p = $_POST['boiling_p'];
        $chBasic->relative_density_water = $_POST['relative_density_water'];
        $chBasic->relative_density_air = $_POST['relative_density_air'];
        $chBasic->saturated_vapor_pressure = $_POST['saturated_vapor_pressure'];
        $chBasic->solubleness = $_POST['solubleness'];
        $chBasic->combustibility = $_POST['combustibility'];
        $chBasic->flash_point = $_POST['flash_point'];
        $chBasic->explosion_limit = $_POST['explosion_limit'];
        $chBasic->stability = $_POST['stability'];
        $chBasic->extinguishant = $_POST['extinguishant'];
        $chBasic->taboo = $_POST['taboo'];
        $chBasic->eco1 = $_POST['eco1'];
        $chBasic->eco2 = $_POST['eco2'];
        $chBasic->eco3 = $_POST['eco3'];
        $chBasic->eco4 = $_POST['eco4'];
        $chBasic->eco5 = $_POST['eco5'];
        $chBasic->eco6 = $_POST['eco6'];
        $chBasic->eco7 = $_POST['eco7'];
        $chBasic->eco8 = $_POST['eco8'];
        $chBasic->eco9 = $_POST['eco9'];
        $chBasic->eco10 = $_POST['eco10'];
        $chBasic->acute_toxicity = $_POST['acute_toxicity'];
        $chBasic->skin_corrosion_stimulation = $_POST['skin_corrosion_stimulation'];
        $chBasic->eye_injury_stimulation = $_POST['eye_injury_stimulation'];
        $chBasic->sensitization = $_POST['sensitization'];
        $chBasic->mutagenicity = $_POST['mutagenicity'];
        $chBasic->carcinogenicity = $_POST['carcinogenicity'];
        $chBasic->reproductive_toxicity = $_POST['reproductive_toxicity'];
        $chBasic->systemic_toxicity = $_POST['systemic_toxicity'];
        $chBasic->spill_response = $_POST['spill_response'];
        $chBasic->reference = $_POST['reference'];
        return $chBasic;
    }

    private function upload()
    {
        $upload = new Upload(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->exts = array(
            'jpg',
            'gif',
            'png',
            'jpeg'
        ); // 设置附件上传类型
        $upload->rootPath = 'Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
                                // 上传文件
        $info = $upload->upload();
        if (! $info) { // 上传错误提示错误信息
            unset($_POST['img']);
        } else { // 上传成功 获取上传文件信息
            foreach ($info as $file) {
                // header("content-type:png");
                $_POST['img'] = "Public/Uploads/" . $file['savepath'] . $file['savename'];
            }
        }
    }
}

?>