<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="zh_CN" xml:lang="zh_CN">
<!--
 * Created on 2015-4-3
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
-->
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>化学品管理系统 </title>
   <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
 </head>
 <body>
 <div class="page-header" align="center">
		<h1>化学品管理系统</h1>
 </div>
<div align="center" style="padding: 100px 100px 10px;">
  <div>
    <form method="get" action="http://www.basechem.org/search" class="bs-example bs-example-form" role="form">
	  <div class="col-lg-6">
            <div class="input-group input-group-xs">
               <input type="text" class="form-control" id="search_key" placeholder="化学品的中文名、英文名或CAS号" >
               <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                     搜索
                  </button>
               </span>
           </div>
       </div>
    </form>
  </div>
</div>
 </body>
</html>