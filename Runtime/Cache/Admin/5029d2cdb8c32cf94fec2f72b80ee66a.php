<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<title>Detail</title>

<!-- Bootstrap -->
<link href="/chemical_manage/Public/Bootstrap/css/bootstrap.min.css"
	rel="stylesheet">

<!-- Out -->
<link href="/chemical_manage/Public/Bootstrap/css/style.css" rel="stylesheet">

<style>
body {
	background-color: #FFF;
	font-family: "微软雅黑", "Microsoft Yahei", Arial, Helvetica, sans-serif,
		"宋体";
	font-size: 14px;
	color: #515151;
}

.a {
	color: #2C3E50;
	text-decoration: none;
}

.container h1,.container h3,.container h3 {
	font-family: 楷体, "Microsoft YaHei", 微软雅黑, "MicrosoftJhengHei", 华文细黑,
		STHeiti, MingLiu;
	color: #fff;
}

.center-wrapper {
	position: relative;
	top: 0;
	width: 100%;
	height: 100%;
	padding: 0 160px;
}

.main-content {
	position: relative;
	width: 100%;
	overflow: hidden;
}

.left-side {
	position: fixed;
	top: 0;
	width: 191px;
	height: 100%;
	border-right: #e6e6e6 3px solid;
	background: #fff;
	z-index: 2;
}

.tinynav {
	position: absolute;
	top: 180px;
	right: -13px;
	text-align: right;
}

.tinynav ul {
	list-style: none;
}

.tinynav li {
	cursor: pointer;
	list-style: none;
}

.tinynav a,.nav>li>a {
	display: block;
	color: #999;
	font-size: 14px;
	line-height: 36px;
	padding-right: 40px;
	text-decoration: none;
}

.tinynav a:hover,.nav>li>a:hover {
	color: #00A7EA;
	background-color: transparent;
}

.tinynav .active {
	background-position: right center;
	background-repeat: no-repeat;
	background-image: url(images/circle_blue.png);
	background-image: -webkit-image-set(url(/chemical_manage/Public/Bootstrap/imgs/circle_blue.png) 1x
		, url(/chemical_manage/Public/Bootstrap/imgs/circle_blue@2x.png) 2x);
}

.tinynav .active a {
	font-size: 24px;
	color: #00A7EA;
	line-height: 46px;
}

.right-side {
	margin-left: 190px;
	padding: 45px 0 0 106px;
	width: 846px;
	position: relative;
}

.info-i {
	width: 740px;
	padding: 45px 0;
	border-bottom: #DDD 1px solid;
}

.info-i img {
	max-width: 100%;
}
</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target="#my-navbar" data-offset="160">
	<div class="navbar" style="margin-bottom: 0;" id="top">
		<div class="container">
			<div class="row">
				<div class="logo col-xs-6 col-sm-4 col-md-3">
					<a href="/chemical_manage/index.php/Admin/chemical/search"><img
						src="/chemical_manage/Public/Bootstrap/imgs/a.png"
						alt="Nanjing University" style="height: 55px"></a>
				</div>
				<div class="col-xs-0 col-sm-2 col-md-2"></div>

				<div class="logo col-xs-4 col-sm-4 col-md-5">

					<form class="" role="search" style="margin-top: 15px;"
						action="/chemical_manage/index.php/Admin/chemical/search">
						<div class="input-group">
							<input type="text" class="form-control"
								placeholder="中文名/英文名/CAS号" name="kwd"> <span
								class="input-group-btn">
								<button class="btn btn-primary" onclick="this.form.submit()">搜索</button>

							</span>
						</div>
					</form>
				</div>

				<div class="col-xs-2 col-sm-2 col-md-2">
					<button class="btn btn-primary" style="margin-top: 15px;"
						onclick="window.location.href='/chemical_manage/index.php/Admin/chemical/add'">新增条目</button>

				</div>
			</div>
		</div>
	</div>

	<div class="center-wrapper">
		<div class="main-content">
			<div class="hidden-xs hidden-sm left-side">
				<div class="tinynav" id="my-navbar">
					<ul class="nav" role="tablist">
						<li class="active"><a href="#base-info">基本信息</a></li>
						<li><a href="#wuhua-info">物化性质</a></li>
						<li><a href="#shengtai-info">生态学信息</a></li>
						<li><a href="#health-info">健康效应</a></li>
						<li><a href="#deal-info">泄漏处置</a></li>
						<li><a href="#reference">参考数据库</a></li>
					</ul>
				</div>
			</div>
<?php
$detail = $_SESSION['detail']; ?>
			<div class="right-side">
				<div class="row info-i" id="base-info">
					<div class="col-md-6">
						<img
							src="/chemical_manage/index.php/Admin/img.php?image_id=<?php echo( $detail->id);?>">
					</div>
					<div class="col-md-6">
						<button class="btn btn-primary"
							onclick="window.location.href='/chemical_manage/index.php/Admin/chemical/update?id=<?php echo($detail->id)?>'">编辑此条目</button>
						<button class="btn btn-danger" onclick="check()">删除此条目</button>
						<script type="text/javascript">
        function check(){
            var c=confirm("确认删除该条目？");
            if(c){
                window.location.href="/chemical_manage/index.php/Admin/chemical/delete?id=<?php echo($detail->id)?>";
                }
        }
    </script>
						<h4>
							<i>中文名</i>：<?php
 if (! (is_null($detail->name_zh) || ($detail->name_zh === ""))) { echo ($detail->name_zh); } else { echo ("无"); } ?></h4>
						<h4>
							<i>英文名</i>：<?php
 if (! (is_null($detail->name_en) || ($detail->name_en === ""))) { echo ($detail->name_en); } else { echo ("无"); } ?></h4>
						<h4>
							<i>分子式</i>：<?php
 if (! (is_null($detail->molecular_formula) || ($detail->molecular_formula === ""))) { echo ($detail->molecular_formula); } else { echo ("无"); } ?></h4>
						<h4>
							<i>分子量</i>：<?php
 if (! (is_null($detail->mol_wt) || ($detail->mol_wt === ""))) { echo ($detail->mol_wt); } else { echo ("无"); } ?></h4>
						<h4>
							<i>CAS</i>：<?php
 if (! (is_null($detail->cas) || ($detail->cas === ""))) { echo ($detail->cas); } else { echo ("无"); } ?></h4>
						<h4>
							<i>危险等级</i>：<?php
 switch ($detail->classify) { case 1: echo ("重点环境管理危险化学品"); break; case 2: echo ("一般危险化学品"); break; case 3: echo ("非危险化学品"); break; default: echo ("暂无危险等级"); } ?></h4>

					</div>
				</div>

				<div class="info-i" id="wuhua-info">
					<h3>物化性质</h3>
					<div class="row">
						<div class="col-13-24">
							<ul>
								<li><i>外观与性状</i>
									<p><?php
 if (! (is_null($detail->appearance) || ($detail->appearance === ""))) { echo ($detail->appearance); } else { echo ("无"); } ?></p></li>
								<li><i>熔点（℃）</i>
									<p><?php
 if (! (is_null($detail->fusion_p) || ($detail->fusion_p === ""))) { echo ($detail->fusion_p); } else { echo ("无"); } ?></p></li>
								<li><i>沸点（℃）</i>
									<p><?php
 if (! (is_null($detail->boiling_p) || ($detail->boiling_p === ""))) { echo ($detail->boiling_p); } else { echo ("无"); } ?></p></li>
								<li><i>相对密度</i>
									<ul>
										<li><i>水</i>
											<p><?php
 if (! (is_null($detail->relative_density_water) || ($detail->relative_density_water === ""))) { echo ($detail->relative_density_water); } else { echo ("无"); } ?></p></li>
										<li><i>空气</i>
											<p><?php
 if (! (is_null($detail->relative_density_air) || ($detail->relative_density_air === ""))) { echo ($detail->relative_density_air); } else { echo ("无"); } ?></p></li>
									</ul>
								
								<li><i>饱和蒸气压（kPa）</i>
									<p><?php
 if (! (is_null($detail->saturated_vapor_pressure) || ($detail->saturated_vapor_pressure === ""))) { echo ($detail->saturated_vapor_pressure); } else { echo ("无"); } ?></p></li>
								<li><i>溶解性</i>
									<p><?php
 if (! (is_null($detail->sulubleness) || ($detail->sulubleness === ""))) { echo ($detail->sulubleness); } else { echo ("无"); } ?></p></li>
								<li><i>燃烧性</i>
									<p><?php
 if (! (is_null($detail->combustibility) || ($detail->combustibility === ""))) { echo ($detail->combustibility); } else { echo ("无"); } ?></p></li>
								<li><i>闪点（℃）</i>
									<p><?php
 if (! (is_null($detail->flash_point) || ($detail->flash_point === ""))) { echo ($detail->flash_point); } else { echo ("无"); } ?></p></li>
								<li><i>爆炸极限（v%或g/m3）</i>
									<p><?php
 if (! (is_null($detail->explosion_limit) || ($detail->explosion_limit === ""))) { echo ($detail->explosion_limit); } else { echo ("无"); } ?></p></li>
								<li><i>稳定性</i>
									<p><?php
 if (! (is_null($detail->stability) || ($detail->stability === ""))) { echo ($detail->stability); } else { echo ("无"); } ?></p></li>
								<li><i>灭火剂</i>
									<p><?php
 if (! (is_null($detail->extinguishant) || ($detail->extinguishant === ""))) { echo ($detail->extinguishant); } else { echo ("无"); } ?></p></li>
								<li><i>禁忌物</i>
									<p><?php
 if (! (is_null($detail->taboo) || ($detail->taboo === ""))) { echo ($detail->taboo); } else { echo ("无"); } ?></p></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="info-i" id="shengtai-info">
					<h3>生态学信息</h3>
					<div class="row">
						<div class="col-13-24">
							<ul>
								<li><i>生态毒性</i>
									<ul>
										<li><i>急性水生生物毒性</i>
											<ul>
												<li><i>急性毒性LC50/EC50（mg/L）</i>
													<p><?php
 if (! (is_null($detail->eco1) || ($detail->eco1 === ""))) { echo ($detail->eco1); } else { echo ("无"); } ?></p></li>

												<li><i>黑头呆鱼急性预测LC50（mg/L）</i>
													<p><?php
 if (! (is_null($detail->eco2) || ($detail->eco2 === ""))) { echo ($detail->eco2); } else { echo ("无"); } ?></p></li>
											</ul></li>

										<li><i>慢性水生生物毒性</i>
											<ul>
												<li><i>慢性（≥28天）NOEC或ECx（mg/L）</i>
													<p><?php
 if (! (is_null($detail->eco3) || ($detail->eco3 === ""))) { echo ($detail->eco3); } else { echo ("无"); } ?></p></li>

												<li><i>慢性预测</i>
													<p><?php
 if (! (is_null($detail->eco4) || ($detail->eco4 === ""))) { echo ($detail->eco4); } else { echo ("无"); } ?></p></li>
											</ul>
									
									</ul></li>

								<li><i>持久性和降解性</i>
									<ul>
										<li><i>快速生物降解性</i>
											<ul>
												<li><i>实测</i>
													<p><?php
 if (! (is_null($detail->eco5) || ($detail->eco5 === ""))) { echo ($detail->eco5); } else { echo ("无"); } ?></p></li>

												<li><i>预测</i>
													<p><?php
 if (! (is_null($detail->eco6) || ($detail->eco6 === ""))) { echo ($detail->eco6); } else { echo ("无"); } ?></p></li>
											</ul></li>
									</ul>
								
								<li><i>生物累积性</i>
									<ul>
										<li><i>BCF</i>
											<ul>
												<li><i>鱼类测量值</i>
													<p><?php
 if (! (is_null($detail->eco7) || ($detail->eco7 === ""))) { echo ($detail->eco7); } else { echo ("无"); } ?></p></li>

												<li><i>预测值</i>
													<p><?php
 if (! (is_null($detail->eco8) || ($detail->eco8 === ""))) { echo ($detail->eco8); } else { echo ("无"); } ?></p></li>
											</ul></li>

										<li><i>lgKow</i>
											<ul>
												<li><i>测量值</i>
													<p><?php
 if (! (is_null($detail->eco9) || ($detail->eco9 === ""))) { echo ($detail->eco9); } else { echo ("无"); } ?></p></li>

												<li><i>预测值</i>
													<p><?php
 if (! (is_null($detail->eco10) || ($detail->eco10 === ""))) { echo ($detail->eco10); } else { echo ("无"); } ?></p></li>
											</ul>
									
									</ul></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="info-i" id="health-info">
					<h3>健康效应</h3>
					<div class="row">
						<div class="col-13-24">
							<ul>
								<li><i>急性毒性</i>
									<p><?php
 if (! (is_null($detail->acute_toxicity) || ($detail->acute_toxicity === ""))) { echo ($detail->acute_toxicity); } else { echo ("无"); } ?></p></li>
								<li><i>皮肤腐蚀或刺激</i>
									<p><?php
 if (! (is_null($detail->skin_corrosion_stimulation) || ($detail->skin_corrosion_stimulation === ""))) { echo ($detail->skin_corrosion_stimulation); } else { echo ("无"); } ?></p></li>
								<li><i>眼损伤或刺激 </i>
									<p><?php
 if (! (is_null($detail->eye_injury_stimulation) || ($detail->eye_injury_stimulation === ""))) { echo ($detail->eye_injury_stimulation); } else { echo ("无"); } ?></p></li>
								<li><i>呼吸或皮肤过敏</i>
									<p><?php
 if (! (is_null($detail->sensitization) || ($detail->sensitization === ""))) { echo ($detail->sensitization); } else { echo ("无"); } ?></p></li>
								<li><i>生殖细胞致突变性</i>
									<p><?php
 if (! (is_null($detail->mutagenicity) || ($detail->mutagenicity === ""))) { echo ($detail->mutagenicity); } else { echo ("无"); } ?></p></li>
								<li><i>致癌性</i>
									<p><?php
 if (! (is_null($detail->carcinogenicity) || ($detail->carcinogenicity === ""))) { echo ($detail->carcinogenicity); } else { echo ("无"); } ?></p></li>
								<li><i>生殖毒性</i>
									<p><?php
 if (! (is_null($detail->reproductive_toxicity) || ($detail->reproductive_toxicity === ""))) { echo ($detail->reproductive_toxicity); } else { echo ("无"); } ?></p></li>
								<li><i>特异性靶器官系统毒性</i>
									<p><?php
 if (! (is_null($detail->systemic_toxicity) || ($detail->systemic_toxicity === ""))) { echo ($detail->systemic_toxicity); } else { echo ("无"); } ?></p></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="info-i" id="deal-info">
					<h3>泄漏处置</h3>
					<div class="row">
						<div class="col-13-24">
							<ul>
								<li><i><?php
 if (! (is_null($detail->spill_response) || ($detail->spill_response === ""))) { echo ($detail->spill_response); } else { echo ("无"); } ?></i></li>

							</ul>
						</div>
					</div>
				</div>

				<div class="info-i" id="reference">
					<h3>参考数据库</h3>
					<div class="row">
						<div class="col-13-24">
							<ul>
							<?php
 $ref = $detail->reference; if (! (is_null($ref) || ($ref === ""))) { $arr = explode(";", $ref); foreach ($arr as $item) { $url = explode("]", $item)[count($item)]; echo ("<li><i><a href=\"" . $url . "\">" . $url . "</a></i></li>"); } } ?>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script>
    	$('main-content').scrollspy({ target: '#my-navbar' });
    </script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/chemical_manage/Public/Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>