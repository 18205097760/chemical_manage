<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="zh_CN" xml:lang="zh_CN">
 <head>
 <meta charset="UTF-8" >
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>化学品管理系统 </title>
   <link href="__ROOT__/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="__ROOT__/Bootstrap/css/user.css" rel="stylesheet">
   <script src="__ROOT__/Bootstrap/js/jquery.min.js"></script>
   <script src="__ROOT__/Bootstrap/js/bootstrap.min.js"></script>
 </head>
 <body>
 <div class="header">
	   <div class="intro clearfix">
		  <h1 class="logo"><a href="__MODULE__/index.php" title="化学品数据">化学品数据</a></h1>
	   </div>
	   <div class="nav">
		  <ul class="clearfix">
			<li class=""><a href="__MODULE__/index.php"><b>首页</b></a></li>
			<li class="current"><a href="__MODULE__/chemicalSearch.php"><b>化学品</b></a></li>
		  </ul>
	   </div>
 </div>
   <!-- 搜索区域 -->
   <?php 
   $search_key=$_SESSION["cs_search_key"];
   $total=$_SESSION["cs_total"];
   $pageSize=$_SESSION["cs_pageSize"];
   $currPage=$_SESSION["cs_currPage"];
   $chBasics=$_SESSION["cs_chBasics"]; 
   ?>
 <div class="search" align="center">
   <form method="get" action="__CONTROLLER__/search" class="bs-example bs-example-form" role="form">
	    <div class="col-lg-6">
           <div class="input-group input-group-lg" >
              <input type="text" class="form-control" id="search_key" name="search_key" placeholder="化学品的中文名、英文名或CAS号" value="{$search_key}">
              <span class="input-group-btn">
                   <button class="btn btn-default" type="submit">搜索</button>
              </span>
           </div>
        </div>
    </form>
  </div>
 <div class="center">
	<div class="grid-wrap clearfix">
	    <div class="grid-main">
			<div class="l-toolbar clearfix">
				<span class="toolbar-tip">化学品数据搜索到<b>{$total}</b>种相关的化学品</span>
				<div class="toolbar-page clearfix">
					<ul class="l-pagenavi clearfix">
						<div class="multipage">
						    <?php
						    if($currPage==1){
						     ?>
                            <span class="nolink prexpage">上一页</span>
                            <?php 
                            }else{
                            ?>
                            <a href="__CONTROLLER__/search?search_key={$search_key}&page={$currPage-1}"><span class="prexpage">上一页</span></a>
                            <?php 
                            }
                            ?>
                            <span class="current">{$currPage}/{$pageSize}</span>
                            <?php 
                            if($currPage==$pageSize){
                            ?>
                            <span class="nolink nextpage">下一页</span>
                            <?php
                            }else{
                            ?>
                            <a href="__CONTROLLER__/search?search_key={$search_key}&page={$currPage+1}"><span class="nextpage">下一页 </span></a>
                            <?php 
                            }
                            ?>
                        </div>					
                   </ul>
				</div>
			</div>
			<div class="l-content">
				<ul class="l-normal clearfix">
				<?php
				$len=count($chBasics);
				for($i=0;$i<$len;$i++){
					$chBasic=$chBasics[$i];
					$img=imagepng($chBasic->chemical_struct);
				 ?>
				<li class="clearfix">
				  <a href="__CONTROLLER__/getDetail?chId={$chBasic->chemical_id}" class="img-wrap">
					 <img src="{$img}" alt="" width="104" height="74">
				  </a>
				  <div class="info-wrap">
					 <h2><a href="__CONTROLLER__/getDetail?chId={$chBasic->chemical_id}">{$chBasic->name_cn}&nbsp;&nbsp;&nbsp;&nbsp;{$chBasic->name_en}</a></h2>
					 <dl class="clearfix">
						<dt>分子式：</dt>
						<!--
						<dd>C<sub>12</sub>H<sub>8</sub>Cl<sub>2</sub>O<sub>5</sub>S<sub>2</sub></dd>
						-->
						<dd>{$chBasic->molec_formu}</dd>
						<dt>分子量：</dt>
						<dd>{$chBasic->molec_num}</dd>
						<dt>CAS号：</dt>
						<dd>{$chBasic->cas_no}</dd>
					 </dl>
				  </div>
				</li>
				<?php 
				}
				?>
				</ul>
			</div>
			<div class="l-page clearfix">
				<div class="l-pagenavi">
				<div class="multipage">
                           <?php
						    if($currPage==1){
						     ?>
                            <span class="nolink prexpage">上一页</span>
                            <?php 
                            }else{
                            ?>
                            <a href="__CONTROLLER__/search?search_key={$search_key}&page={$currPage-1}"><span class="prexpage">上一页</span></a>
                            <?php 
                            }
                            ?>
                            <span class="current">{$currPage}/{$pageSize}</span>
                            <?php 
                            if($currPage==$pageSize){
                            ?>
                            <span class="nolink nextpage">下一页</span>
                            <?php
                            }else{
                            ?>
                            <a href="__CONTROLLER__/search?search_key={$search_key}&page={$currPage+1}"><span class="nextpage">下一页 </span></a>
                            <?php 
                            }
                            ?>
                </div>
             </div>
  </div> 
  <?php 
   $_SESSION["cs_search_key"]=null;
   $_SESSION["cs_total"]=null;
   $_SESSION["cs_pageSize"]=null;
   $_SESSION["cs_currPage"]=null;
   $_SESSION["cs_chBasics"]=null; 
   ?>
 </body>
</html>
