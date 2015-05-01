<?php
namespace App\Home\Controller;

use Think\Controller;
class TestController extends Controller
{
    function  __construct(){
        parent::__construct();
    }
    
    function show(){
        echo("show test!");
    }
}

?>