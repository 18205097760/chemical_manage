<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh_CN" xml:lang="zh_CN">
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>化学品管理系统 </title>
  <link href="/chemical_manage/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="/chemical_manage/Bootstrap/css/user.css" rel="stylesheet">
   <script src="/chemical_manage/Bootstrap/js/jquery.min.js"></script>
   <script src="/chemical_manage/Bootstrap/js/bootstrap.min.js"></script>
 </head>
 <body>
 <div class="header">
	   <div class="intro clearfix">
		  <h1 class="logo"><a href="/chemical_manage/index.php/Admin/index.php" title="化学品数据">化学品数据</a></h1>
	   </div>
	   <div class="nav">
		  <ul class="clearfix">
			<li class=""><a href="/chemical_manage/index.php/Admin/index.php"><b>首页</b></a></li>
			<li class="current"><a href="/chemical_manage/index.php/Admin/chemicalSearch.php"><b>化学品</b></a></li>
		  </ul>
	   </div>
 </div>
   <!-- 搜索区域 -->
   <?php  $chBasic=$_SESSION["cd_chBasic"]; $chRefers=$_SESSION["cd_chRefers"]; $ecoInfo=$_SESSION["cd_ecoInfo"]; $hlEff=$_SESSION["cd_hlEff"]; $lkDis=$_SESSION["cd_lkDis"]; $mtAt=$_SESSION["cd_mtAt"]; ?>
 <div class="search" align="center">
   <form method="get" action="/chemical_manage/index.php/Admin/Test/search" class="bs-example bs-example-form" role="form">
	    <div class="col-lg-6">
           <div class="input-group input-group-lg" >
              <input type="text" class="form-control" id="search_key" name="search_key" placeholder="化学品的中文名、英文名或CAS号">
              <span class="input-group-btn">
                   <button class="btn btn-default" type="submit">搜索</button>
              </span>
           </div>
        </div>
    </form>
  </div>
  <div class="center">
  <!-- 首屏区域 -->
  <?php  if($chBasic!=null){ ?>
	<div class="grid-wrap clearfix">
		<div class="grid-main">
			<div class="d-title clearfix">
				<h1><?php echo ($chBasic->name_cn); ?></h1>
			</div>
			<div class="d-content">
				<!-- 概要介绍 -->
				<div class="d-summary clearfix">
					<div id="banner">
						<div id="banner_bg"></div>
						<div id="banner_info"></div>
					    <ul>
					       <li class="on">1</li>
	    				</ul>
						<div class="summary-img slides_container" id="banner_list">
							<a href="http://images.basechem.org/struct/2010-08/649cfa4087821477b7662d1372f7a2dd.gif" target="_blank" class="img-wrap">
	        					<img src="http://images.basechem.org/struct/2010-08/649cfa4087821477b7662d1372f7a2dd.gif" alt="<?php echo ($chBasic->name_cn); ?>结构式"   alt="" width="270" height="200" />
	        				</a>
	    			    </div>
					</div>
					<ul class="summary-text">
						<li class="clearfix"><b>中文名称：</b><span><?php echo ($chBasic->name_cn); ?></span></li>
						<li class="clearfix"><b>英文名称：</b><span><?php echo ($chBasic->name_en); ?></span></li>
						<li class="clearfix"><b>CAS：</b><span><?php echo ($chBasic->cas_no); ?></span></li>
						<!--
						<li class="clearfix"><b>分&nbsp;子&nbsp;式：</b>C<sub>12</sub>H<sub>8</sub>Cl<sub>2</sub>O<sub>5</sub>S<sub>2</sub></li>
						-->
						<li class="clearfix"><b>分&nbsp;子&nbsp;式：</b><?php echo ($chBasic->molec_formu); ?></li>
						<li class="clearfix"><b>分&nbsp;子&nbsp;量：</b><?php echo ($chBasic->molec_num); ?></li>
						<li class="clearfix"><b>危险级别：</b><?php echo ($chBasic->danger_descrip); ?></li>
					</ul>
				</div>
    <?php  } ?>
  <!-- 目录 -->
  <div class="d-catlog catlog-toggle" id="J_CatlogToggle">
   <h2>目录</h2>
   <ol>
     <li><a href="#matAttr">物化性质</a></li>
     <li><a href="#ecoInfo">生态学信息</a></li>
     <li><a href="#healthEffect">健康效应</a></li>
     <li><a href="#leakDisposal">泄露处置</a></li>
     <li><a href="#referDb">参考数据库</a></li>
    </ol>
  </div>
  <!-- 物化性质 -->
  <?php  if($mtAt!=null){ ?>
  <div class="d-section">
    <div class="section-title clearfix">
	   <a name="matAttr"></a>
	   <h2>物化性质</h2>
	</div>
	<div class="section-content">
		<p><b>外观与性状：</b><?php echo ($mtAt->appear_shape); ?></p>
		<p><b>熔点（℃）：</b><?php echo ($mtAt->melt_point); ?></p>
		<p><b>沸点（℃）：</b><?php echo ($mtAt->boil_point); ?></p>
		<p><b>相对密度(g/mL)，水＝1：</b><?php echo ($mtAt->density_water); ?></p>
		<p><b>相对密度(g/mL)，空气＝1：</b><?php echo ($mtAt->density_air); ?></p>
		<p><b>饱和蒸气压（kPa）：</b><?php echo ($mtAt->sat_vap_press); ?></p>
		<p><b>溶解性：</b><?php echo ($mtAt->solubility); ?></p>
		<p><b>燃烧性：</b><?php echo ($mtAt->combustion); ?></p>
		<p><b>闪点（℃）：</b><?php echo ($mtAt->flash_point); ?></p>
		<p><b>爆炸极限（v%或g/m3）：</b><?php echo ($mtAt->explo_limit); ?></p>
		<p><b>稳定性：</b><?php echo ($mtAt->stability); ?></p>
		<p><b>灭火剂：</b><?php echo ($mtAt->fire_exti_agent); ?></p>
		<p><b>禁忌物：</b><?php echo ($mtAt->contr_dicat); ?></p>
	</div>
  </div>
  <?php  } ?>
  <!-- 生态学信息 -->
  <?php  if($ecoInfo!=null){ ?>
  <div class="d-section">
    <div class="section-title clearfix">
	   <a name="ecoInfo"></a>
	   <h2>生态学信息</h2>
	</div>
	<div class="section-content">
		<p><b>生态毒性，急性水生生物毒性，急性毒性LC50/EC50（mg/L）：</b><?php echo ($ecoInfo->acute_toxicity); ?></p>
		<p><b>生态毒性，急性水生生物毒性，黑头呆鱼急性预测LC50（mg/L）：</b><?php echo ($ecoInfo->acute_predict); ?></p>
		<p><b>生态毒性，慢性水生生物毒性，慢性（≥28天）NOEC或ECx（mg/L）：</b><?php echo ($ecoInfo->chronic_toxicity); ?></p>
		<p><b>生态毒性，慢性水生生物毒性，慢性预测：</b><?php echo ($ecoInfo->chronic_predict); ?></p>
		<p><b>持久性和降解性，快速生物降解性，实测：</b><?php echo ($ecoInfo->degra_test); ?></p>
		<p><b>持久性和降解性，快速生物降解性，预测：</b><?php echo ($ecoInfo->degra_predict); ?></p>
		<p><b>生物累积性，BCF，鱼类测量值：</b><?php echo ($ecoInfo->cum_bcf_test); ?></p>
		<p><b>生物累积性，BCF，预测值：</b><?php echo ($ecoInfo->cum_bcf_predict); ?></p>
		<p><b>生物累积性，lgKow，测量值：</b><?php echo ($ecoInfo->cum_lgkow_test); ?></p>
		<p><b>生物累积性，lgKow，预测值：</b><?php echo ($ecoInfo->cum_lgkow_predict); ?></p>
	</div>
  </div>
  <?php  } ?>
  <!-- 健康效应 -->
  <?php  if($hlEff!=null){ ?>
  <div class="d-section">
    <div class="section-title clearfix">
	   <a name="healthEffect"></a>
	   <h2>健康效应</h2>
	</div>
	<div class="section-content">
		<p><b>急性毒性：</b><?php echo ($hlEff->acute_toxicity); ?></p>
		<p><b>皮肤腐蚀或刺激：</b><?php echo ($hlEff->skin_corr); ?></p>
		<p><b>眼损伤或刺激 ：</b><?php echo ($hlEff->eye_damage); ?></p>
		<p><b>呼吸或皮肤过敏：</b><?php echo ($hlEff->breath_allergy); ?></p>
		<p><b>生殖细胞致突变性：</b><?php echo ($hlEff->cell_muta); ?></p>
		<p><b>致癌性：</b><?php echo ($hlEff->carcino); ?></p>
		<p><b>生殖毒性：</b><?php echo ($hlEff->reprodu_toxicity); ?></p>
		<p><b>特异性靶器官系统毒性：</b><?php echo ($hlEff->specific_target_organ_toxicity); ?></p>
	</div>
  </div>
  <?php  } ?>
  <!-- 泄露处置 -->
  <?php  if($lkDis!=null){ ?>
  <div class="d-section">
    <div class="section-title clearfix">
	   <a name="leakDisposal"></a>
	   <h2>泄露处置</h2>
	</div>
	<div class="section-content">
		<p><?php echo ($lkDis->disposal_descrip); ?></p>
	</div>
  </div>
  <?php  } ?>
  <!-- 参考数据库 -->
  <?php  if($chRefers!=null){ $len=count($chRefers); ?>
  <div class="d-section">
    <div class="section-title clearfix">
	   <a name="referDb"></a>
	   <h2>参考数据库</h2>
	</div>
	<div class="section-content">
	   <?php
 for($i=0;$i<$len;$i++){ $chRefer=$chRefers[$i]; ?>
		<p><a href="<?php echo ($chRefer->refer_content); ?>"><?php echo ($chRefer->refer_content); ?></a></p>
	   <?php
 } ?>
	</div>
  </div>
  <?php  } ?>
  </div>
  <?php  $_SESSION["cd_chBasic"]=null; $_SESSION["cd_chRefers"]=null; $_SESSION["cd_ecoInfo"]=null; $_SESSION["cd_hlEff"]=null; $_SESSION["cd_lkDis"]=null; $_SESSION["cd_mtAt"]=null; $_SESSION["cd_reDb"]=null; ?> 
 </body>
</html>