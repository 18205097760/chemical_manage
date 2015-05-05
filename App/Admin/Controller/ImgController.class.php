<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Dao\ImgDao;

class ImgController extends Controller
{

    private $img;

    function __construct()
    {
        parent::__construct();
        $this->img = new ImgDao();
    }

    function index()
    {
        if (isset($_GET['image_id'])) {
            header("content-type:png");
            echo ($this->img->getImg($_GET['image_id']));
        }
    }
}

?>