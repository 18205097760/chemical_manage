<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh_CN" xml:lang="zh_CN">
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>化学品管理系统</title>
   <link href="/ChemicalManage/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="/ChemicalManage/Bootstrap/css/user.css" rel="stylesheet">
   <script src="/ChemicalManage/Bootstrap/js/jquery.min.js"></script>
   <script src="/ChemicalManage/Bootstrap/js/bootstrap.min.js"></script>
 </head>
 <body>
 <div class="center">
    <div class="header">
	   <div class="intro clearfix">
		  <h1 class="logo"><a href="/ChemicalManage/index.php/Home/index.php" title="化学品数据">化学品数据</a></h1>
	   </div>
	   <div class="nav">
		  <ul class="clearfix">
			<li class="current"><a href="/ChemicalManage/index.php/Home/index.php"><b>首页</b></a></li>
			<li class=""><a href="/ChemicalManage/index.php/Home/chemicalSearch.php"><b>化学品</b></a></li>
		  </ul>
	   </div>
    </div>
    <!-- 搜索区域 -->
	<div class="search" align="center">
	   <form method="get" action="/ChemicalManage/index.php/Home/Index/search" class="bs-example bs-example-form" role="form">
	       <div class="col-lg-6">
               <div class="input-group input-group-lg" >
                  <input type="text" class="form-control" id="search_key" name="search_key" placeholder="化学品的中文名、英文名或CAS号" >
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">搜索</button>
                  </span>
               </div>
           </div>
       </form>
    </div>
    <?php  $chBasics_danLevel=$_SESSION["index_chBasics_danLevel"]; $_SESSION["index_chBasics_danLevel"]=null; ?>
    <!-- 化学品分类模块 -->
	<div class="grid-wrap clearfix" align="center" >
		<div class="grid-main product">
			<s class="tl"></s><s class="tr"></s>
			<div class="product-wrap">
			<ul class="product-rank clearfix">
				<li class="rank-item">
					<h3 class="clearfix"><b>重危化学品</b><a href="/hot/" class="more" onClick="_gaq.push(['_trackEvent', 'hot_chemical', 'more' ]);">更多</a></h3>
					<ol>
					<?php
 $hDans=$chBasics_danLevel['1']; $len=count($hDans); for($i=0;$i<$len;$i++){ $hDan=$hDans[$i]; ?>
						<li><a href="/ChemicalManage/index.php/Home/chemicalDetail.php/<?php echo ($hDan->chemical_id); ?>" target="_blank"><?php echo ($hDan->name_cn); ?></a></li>
					<?php  } ?>					
					</ol>
				</li>
				<li class="rank-item">
					<h3 class="clearfix"><b>危险化学品</b><a href="/popular/" class="more" onClick="_gaq.push(['_trackEvent', 'attention_chemical', 'more' ]);">更多</a></h3>
					<ol>
					<?php
 $lDans=$chBasics_danLevel['2']; $len=count($lDans); for($i=0;$i<$len;$i++){ $lDan=$lDans[$i]; ?>
						<li><a href="/ChemicalManage/index.php/Home/chemicalDetail.php/<?php echo ($lDan->chemical_id); ?>" target="_blank"><?php echo ($lDan->name_cn); ?></a></li>
					<?php  } ?>	
					</ol>
				</li>
				<li class="rank-item">
					<h3 class="clearfix"><b>非危化学品</b><a href="/common/" class="more" onClick="_gaq.push(['_trackEvent', 'common_chemical', 'more' ]);">更多</a></h3>
					<ol>
					<?php
 $nDans=$chBasics_danLevel['3']; $len=count($nDans); for($i=0;$i<$len;$i++){ $nDan=$nDans[$i]; ?>
						<li><a href="/ChemicalManage/index.php/Home/chemicalDetail.php/<?php echo ($nDan->chemical_id); ?>" target="_blank"><?php echo ($nDan->name_cn); ?></a></li>
					<?php  } ?>	
					</ol>
				</li>
			  </ul>
			</div>
			<s class="bl"></s><s class="br"></s>
		</div>
	</div>
	</div>
 </body>
</html>