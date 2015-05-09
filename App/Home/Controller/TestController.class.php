<?php
namespace Home\Controller;

use Think\Controller;
use Think\Upload;
use Admin\Model\Chemical;

class TestController extends Controller
{

    private $upload;

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        echo ("<form action=\"Test/upload\" enctype=\"multipart/form-data\" method=\"post\" >
<input type=\"text\" name=\"name\" />
<input type=\"file\" name=\"photo\" />
<input type=\"submit\" value=\"提交\" >
</form>");
    }

    function show()
    {
        echo ("show test!");
    }

    function upload()
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
            $this->error($upload->getError());
        } else { // 上传成功 获取上传文件信息
            foreach ($info as $file) {
                // header("content-type:png");
                $path = "Public/Uploads/" . $file['savepath'] . $file['savename'];
                // echo ($path . "<br />");
                $img = file_get_contents($path);
                // $img = fopen($file['savepath'] . $file['savename'], 'a+');
                $dao = new \Admin\Dao\ChemicalDao();
                $chBasic = new Chemical();
                $chBasic->cas = "111";
                $chBasic->name_zh = "www";
                $chBasic->classify = 1;
                $chBasic->chemical_structure = $img;
                $chBasic->reference="http://baidu.com;http://sina.com";
                $result = $dao->insertSingle($chBasic);
                // header("content-type:png");
                // echo ($img);
            }
        }
        
        // // 导入上传类
        // $upload = new Upload();
        // // 设置上传文件大小
        // $upload->maxSize = 3292200;
        // // 设置上传文件类型
        // $upload->exts = explode(',', 'jpg,gif,png,jpeg');
        // // 设置附件上传目录
        // $upload->savePath = './Uploads/';
        // // 设置需要生成缩略图，仅对图像文件有效
        // $upload->thumb = true;
        // // 设置引用图片类库包路径
        // $upload->imageClassPath = '@.ORG.Image';
        // // 设置需要生成缩略图的文件后缀
        // $upload->thumbPrefix = 'm_,s_'; // 生产2张缩略图
        // // 设置缩略图最大宽度
        // $upload->thumbMaxWidth = '400,100';
        // // 设置缩略图最大高度
        // $upload->thumbMaxHeight = '400,100';
        // // 设置上传文件规则
        // $upload->saveRule = 'uniqid';
        // // 删除原图
        // $upload->thumbRemoveOrigin = true;
        // // 如果上传不成功
        // if (! $upload->upload()) {
        // // 捕获上传异常
        // $this->error($upload->getErrorMsg());
        // } else {
        // // 取得成功上传的文件信息
        // $uploadList = $upload->getUploadFileInfo();
        //
        // echo ($uploadList);
        // }
    }
}
?>