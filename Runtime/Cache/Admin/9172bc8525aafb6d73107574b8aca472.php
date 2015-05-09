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

.first-page {
	min-height: 541px;
}

.first-page img {
	vertical-align: middle;
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
	overflow: visible;
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

.right-side i {
	
}

.right-side li {
	margin-bottom: 10px;
}

.right-side .form-control {
	width: 50%;
	margin-top: 5px;
}

#base-info .form-control {
	width: 100%;
}

#reference .form-control {
	width: 100%;
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
					<img src="/chemical_manage/Public/Bootstrap/imgs/a.png"
						alt="Nanjing University" style="height: 55px">
				</div>
				<div class="col-xs-0 col-sm-2 col-md-2"></div>

				<div class="logo col-xs-4 col-sm-4 col-md-5">

					<form class="" role="search" style="margin-top: 15px;"
						action="/chemical_manage/index.php/Admin/chemical/search">
						<div class="input-group">
							<input type="text" class="form-control input-sm"
								class="form-control" placeholder="中文名/英文名/CAS号" name="kwd"> <span
								class="input-group-btn">
								<button class="btn btn-primary" onclick="this.form.submit()">搜索</button>

							</span>
						</div>
					</form>
				</div>

				<div class="col-xs-2 col-sm-2 col-md-2">
					<button class="btn btn-primary" style="margin-top: 15px;"
						onclick="window.location.href='HTTP://www.baidu.com'">新增条目</button>

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
				<form action="/chemical_manage/index.php/Admin/chemical/update?id=<?php echo($detail->id)?>" enctype="multipart/form-data"
					method="post">
					<div class="row info-i" id="base-info">
						<div class="col-md-6">
							<input type="file" name="photo" class="form-control input-sm">
						</div>
						<div class="col-md-6">
							<h4>
								<i>中文名:</i>
							</h4>
							<input type="text" class="form-control input-sm" name="name_zh"
								value="<?php echo($detail->name_zh)?>" required>
							<h4>
								<i>英文名:</i>
							</h4>
							<input type="text" class="form-control input-sm" name="name_en"
								value="<?php echo($detail->name_en)?>" required>
							<h4>
								<i>分子式:</i>
							</h4>
							<input type="text" class="form-control input-sm"
								name="molecular_formula"
								value="<?php echo($detail->molecular_formula)?>">
							<h4>
								<i>分子量:</i>
							</h4>
							<input type="text" class="form-control input-sm" name="mol_wt"
								value="<?php echo($detail->mol_wt)?>">
							<h4>
								<i>CAS</i>
							</h4>
							<input type="text" class="form-control input-sm" name="cas"
								value="<?php echo($detail->cas)?>" required>
							<h4>
								<i>危险等级：</i>
							</h4>
							<div class="radio">
								<label><input type="radio" name="classify" id="optionsRadios1"
									value="1" <?php if($detail->classify==1) echo("checked")?>
									required>重点环境管理危险化学品</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="classify" id="optionsRadios1"
									value="2" <?php if($detail->classify==2) echo("checked")?>>一般危险化学品</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="classify" id="optionsRadios1"
									value="3" <?php if($detail->classify==3) echo("checked")?>>非危险化学品</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="classify" id="optionsRadios1"
									value="option1">暂无危险等级</label>
							</div>

						</div>
					</div>

					<div class="info-i" id="wuhua-info">
						<h3>物化性质</h3>
						<div class="row">
							<div class="col-13-24">
								<ul>
									<li><i>外观与性状：</i><input type="text"
										class="form-control input-sm" name="appearance"
										value="<?php echo($detail->appearance)?>"></li>

									<li><i>熔点（℃）</i><input type="text"
										class="form-control input-sm" name="fusion_p"
										value="<?php echo($detail->fusion_p)?>"></li>

									<li><i>沸点（℃）</i><input type="text"
										class="form-control input-sm" name="boiling_p"
										value="<?php echo($detail->boiling_p)?>"></li>

									<li><i>相对密度</i>
										<ul>
											<li><i>水</i><input type="text" class="form-control input-sm"
												name="relative_density_water"
												value="<?php echo($detail->relative_density_water)?>"></li>

											<li><i>空气</i><input type="text" class="form-control input-sm"
												name="relative_density_air"
												value="<?php echo($detail->relative_density_air)?>"></li>
										</ul>
									
									<li><i>饱和蒸气压（kPa）</i><input type="text"
										class="form-control input-sm" name="saturated_vapor_pressure"
										value="<?php echo($detail->saturated_vapor_pressure)?>"></li>
									<li><i>溶解性</i><input type="text" class="form-control input-sm"
										name="solubleness" value="<?php echo($detail->solubleness)?>"></li>
									<li><i>燃烧性</i><input type="text" class="form-control input-sm"
										name="combustibility"
										value="<?php echo($detail->combustibility)?>"></li>
									<li><i>闪点（℃）</i><input type="text"
										class="form-control input-sm" name="flash_point"
										value="<?php echo($detail->flash_point)?>"></li>
									<li><i>爆炸极限（v%或g/m3）</i><input type="text"
										class="form-control input-sm" name="explosion_limit"
										value="<?php echo($detail->explosion_limit)?>"></li>
									<li><i>稳定性</i><input type="text" class="form-control input-sm"
										name="stability" value="<?php echo($detail->stability)?>"></li>
									<li><i>灭火剂</i><input type="text" class="form-control input-sm"
										name="extinguishant"
										value="<?php echo($detail->extinguishant)?>"></li>
									<li><i>禁忌物</i><input type="text" class="form-control input-sm"
										name="taboo" value="<?php echo($detail->taboo)?>"></li>
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
													<li><i>急性毒性LC50/EC50（mg/L）</i><input type="text"
														class="form-control input-sm" name="eco1"
														value="<?php echo($detail->eco1)?>"></li>

													<li><i>黑头呆鱼急性预测LC50（mg/L）</i><input type="text"
														class="form-control input-sm" name="eco2"
														value="<?php echo($detail->eco2)?>"></li>
												</ul></li>

											<li><i>慢性水生生物毒性</i>
												<ul>
													<li><i>慢性（≥28天）NOEC或ECx（mg/L）</i><input type="text"
														class="form-control input-sm" name="eco3"
														value="<?php echo($detail->eco3)?>"></li>

													<li><i>慢性预测</i><input type="text"
														class="form-control input-sm" name="eco4"
														value="<?php echo($detail->eco4)?>"></li>
												</ul>
										
										</ul></li>

									<li><i>持久性和降解性</i>
										<ul>
											<li><i>快速生物降解性</i>
												<ul>
													<li><i>实测</i><input type="text"
														class="form-control input-sm" name="eco5"
														value="<?php echo($detail->eco5)?>"></li>

													<li><i>预测</i><input type="text"
														class="form-control input-sm" name="eco6"
														value="<?php echo($detail->eco6)?>"></li>
												</ul></li>
										</ul>
								
								</ul>


								<li><i>生物累积性</i>
									<ul>
										<li><i>BCF</i>
											<ul>
												<li><i>鱼类测量值</i><input type="text"
													class="form-control input-sm" name="eco7"
													value="<?php echo($detail->eco7)?>"></li>

												<li><i>预测值</i><input type="text"
													class="form-control input-sm" name="eco8"
													value="<?php echo($detail->eco8)?>"></li>
											</ul></li>

										<li><i>lgKow</i>
											<ul>
												<li><i>测量值：</i><input type="text"
													class="form-control input-sm" name="eco9"
													value="<?php echo($detail->eco9)?>"></li>
												<li><i>预测值：</i><input type="text"
													class="form-control input-sm" name="eco10"
													value="<?php echo($detail->eco10)?>"></li>
											</ul>
									
									</ul></li>


							</div>
						</div>
					</div>

					<div class="info-i" id="health-info">
						<h3>健康效应</h3>
						<div class="row">
							<div class="col-13-24">
								<ul>
									<li><i>急性毒性</i><input type="text" class="form-control input-sm"
										name="acute_toxicity"
										value="<?php echo($detail->acute_toxicity)?>"></li>
									<li><i>皮肤腐蚀或刺激</i><input type="text"
										class="form-control input-sm"
										name="skin_corrosion_stimulation"
										value="<?php echo($detail->skin_corrosion_stimulation)?>"></li>
									<li><i>眼损伤或刺激 </i><input type="text"
										class="form-control input-sm" name="eye_injury_stimulation"
										value="<?php echo($detail->eye_injury_stimulation)?>"></li>
									<li><i>呼吸或皮肤过敏</i><input type="text"
										class="form-control input-sm" name="sensitization"
										value="<?php echo($detail->sensitization)?>"></li>
									<li><i>生殖细胞致突变性</i><input type="text"
										class="form-control input-sm" name="mutagenicity"
										value="<?php echo($detail->mutagenicity)?>"></li>
									<li><i>致癌性</i><input type="text" class="form-control input-sm"
										name="carcinogenicity"
										value="<?php echo($detail->carcinogenicity)?>"></li>
									<li><i>生殖毒性</i><input type="text" class="form-control input-sm"
										name="reproductive_toxicity"
										value="<?php echo($detail->reproductive_toxicity)?>"></li>
									<li><i>特异性靶器官系统毒性</i><input type="text"
										class="form-control input-sm" name="systemic_toxicity"
										value="<?php echo($detail->systemic_toxicity)?>"></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="info-i" id="deal-info">
						<h3>泄漏处置</h3>
						<div class="row">
							<div class="col-13-24">
								<ul>
									<li><i>泄露处置：</i><input type="text"
										class="form-control input-sm" name="spill_response"
										value="<?php echo($detail->spill_response)?>"></li>

								</ul>
							</div>
						</div>
					</div>

					<div class="info-i" id="reference">
						<h3>参考数据库</h3>
						<p>各链接请用‘ ; ’分隔开(例如：[1] http://www.chem960.com;[2]
							http://www.epa.govt.nz)</p>
						<div class="row">
							<div class="col-13-24">
								<textarea style="margin: 0 20px" class="form-control" rows="3"
									name="reference" ><?php echo($detail->reference)?></textarea>
							</div>
						</div>
						<div style="margin-top: 60px; padding-left: 40%;">
							<button type="submit" class="btn btn-primary">&nbsp;完成&nbsp;</button>
							&nbsp;&nbsp;
							<button type="button" class="btn btn-danger"
								onclick="window.location.href='/chemical_manage/index.php/Admin/chemical/index'">&nbsp;取消&nbsp;</button>
						</div>
					</div>
				</form>
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