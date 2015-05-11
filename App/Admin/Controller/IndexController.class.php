<?php
namespace Admin\Controller;

class IndexController extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->redirect("/Admin/chemical/search");
    }
}
?>