<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<title>化学品搜索结果</title>

<!-- Bootstrap -->
<link href="/chemical_manage/Public/Bootstrap/css/bootstrap.min.css"
	rel="stylesheet">

<!-- Out -->
<link href="/chemical_manage/Public/Bootstrap/css/style.css" rel="stylesheet">

<style>
.a {
	color: #2C3E50;
	text-decoration: none;
}

.container h1,.container h3,.container h4 {
	font-family: 楷体, "Microsoft YaHei", 微软雅黑, "MicrosoftJhengHei", 华文细黑,
		STHeiti, MingLiu;
	color: #fff;
}

.box {
	width: 100%;
	height: 0;
	padding-bottom: 66%;
	overflow: hidden;
	border-radius: 5px;
	background-color: #FFF;
	box-shadow: 0 4px 10px rgba(0, 0, 0, .35);
}

.list-container img {
	width: 100%;
	height: 100%;
	min-height:132px;
	vertical-align:middle;
}

.list-container h4 {
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
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
		<div class="row">
			<div class="logo col-xs-6 col-sm-5 col-md-3">
				<img src="/chemical_manage/Public/Bootstrap/imgs
				/a.png"
					alt="Nanjing University" style="height: 55px">
			</div>
			<div class="col-xs-0 col-sm-2 col-md-5"></div>
			<div class="logo col-xs-6 col-sm-5 col-md-4">
				<form class="" role="search" style="margin-top: 15px;"
					action="/chemical_manage/index.php/Home/chemical/search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="中文名/英文名/CAS号"
							name="kwd"> <span class="input-group-btn"> <input
							class="btn btn-primary" type="submit">Search！</input>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>

	<div class="container">
      		<?php
 $data = $_SESSION['search']; if (empty($data)) { echo "<div class=\"head_text\"><h3>无搜索结果</h3></div>"; } else { echo "<div class=\"head_text col-md-10\"><h3>搜索结果展示：</h3></div><div class=\"head_text col-md-2\">"; echo "<a href=\"/chemical_manage/index.php/Home/export?kwd=" . $_SESSION['kwd'] . "\" class=\"btn btn-primary btn-block\" style=\"margin-top:10px;\">导出结果</a></div>"; echo "<div class=\"list-container col-md-12\" style=\"margin-top:30px;\">"; $length = count($data); for ($x = 0; $x < $length; $x ++) { $img="/chemical_manage/index.php/Home/img.php?image_id=" . $data[$x]->id; echo "<div class=\"item-comtainer col-xs-6 col-sm-4 col-md-3\"><div class=\"box\"><img src=\"/chemical_manage/index.php/Home/img.php?image_id=" . $data[$x]->id . "\"></div>"; if (! is_null($data[$x]->name_zh)) { echo "<a href=\"/chemical_manage/index.php/Home/chemical/detail?id=".$data[$x]->id."\"><h4>" . $data[$x]->name_zh . "</h4></a>"; } else { echo "<a href=\"/chemical_manage/index.php/Home/chemical/detail?id=".$data[$x]->id."\"><h4>暂无中文名</h4></a>"; } if (! is_null($data[$x]->molecular_formula)) { echo "<h4>" . $data[$x]->molecular_formula . "</h4></div>"; } else { echo ("<h4>暂无分子式</h4></div>"); } } echo "</div>"; } ?>
            

	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/chemical_manage/Public/Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>