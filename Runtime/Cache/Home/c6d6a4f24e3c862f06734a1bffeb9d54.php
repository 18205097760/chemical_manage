<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/chemical_manage/Public/Bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Out -->
	<link href="/chemical_manage/Public/Bootstrap/css/style.css" rel="stylesheet">
    
    <style>
    .a{
		color:#2C3E50;
		text-decoration: none;
		}
		.container h1, .container h3{
			font-family:楷体,"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;
			color: #fff;
			}
			
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar">
    	<div class="container">
            <div class="navbar-header">
                <div class="fb-header-logo-container navbar-brand" style="padding-top:0">
                    <img src="/chemical_manage/Public/Bootstrap/imgs/a.png" alt="Nanjing University" style="height:55px">
                </div>
                <!-- 
                <div class="navbar-collapse collapse pull-right">
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation" class="active"><a href="">首页</a></li>
                        <li role="presentation"><a href="">产品列表</a></li>
                        <li><a>&nbsp;</a></li>
                        <li role="presentation"><a href="">登录</a></li>
                        <li role="presentation"><a href="">注册</a></li>
                    </ul>
                </div>
                 -->
             </div>
          </div>
      </div>
      
      <div class="container">
            <div class="head_text col-md-12">
                <h1>
                    南京大学环境学院化学化工用品展示
                </h1>

                <h3 class="col-sm-10 col-sm-push-1">
                    提供最新最全的环院化学化工用品查询
                </h3>
            </div>

            <div id="forms_container" class="form_cont col-lg-4 col-sm-4 col-xs-12 pull-right" style="padding-top:30px;">
            	<form action="/chemical_manage/index.php/Home/login" method="post">
                <label><h3>用户登录</h3></label>
                <?php if($_SESSION['loginError']){ echo("<p style=\"color: RED\">用户名或密码错误</p>"); }?>
                <input type="text" class="form-control" id="name" name="name" placeholder="用户ID" style="margin-bottom:18px" required>
                <input type="password" class="form-control" id="password" name="password" placeholder="密码" required>
                <input type="submit" class="fbtn blue" />
               <!--  <button id="submit" class="fbtn blue" onClick="location.href='../index.php/Admin/login'">登录</button> -->
                </form>
                  <button id="reg" class="btn-danger fbtn" style="background-color:transparent" onClick="location.href='http://www.flash8.net'">注册新用户</button>
			</div>
</form>
            <div id="video" class="col-sm-7">
                <div id="placeholder">
                    <img src="/chemical_manage/Public/Bootstrap/imgs/a.gif" alt="Nanjing University" style="height:330px">
                </div>
            </div>
          </div> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/chemical_manage/Public/Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>