<?php
namespace Home\Controller;

class IndexController extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->display("Index:index");
    }
}
?>