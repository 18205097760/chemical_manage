<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<title>首页</title>

<!-- Bootstrap -->
<link href="__ROOT__/Public/Bootstrap/css/bootstrap.min.css"
	rel="stylesheet">

<!-- Out -->
<link href="__ROOT__/Public/Bootstrap/css/style.css" rel="stylesheet">

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
					<img src="__ROOT__/Public/Bootstrap/imgs/a.png"
						alt="Nanjing University" style="height: 55px">
				</div>
				<div class="col-xs-0 col-sm-2 col-md-5"></div>
				<div class="logo col-xs-6 col-sm-5 col-md-4"></div>
			</div>
		</div>
	</div>

	<div class="container">

		<div class="head_text col-md-4 col-md-offset-4"
			style="margin-top: 60px; margin-bottom: 40px;">
			<h3>输入搜索条件</h3>
		</div>
		<div class="head_text col-md-5 col-md-offset-3">
			<form class="" role="search" style="margin-top: 15px;"
				action="__ROOT__/index.php/Admin/chemical/search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="中文名/英文名/CAS号"
						name="kwd"> <span class="input-group-btn"> <button class="btn btn-primary" onclick="this.form.submit()">
									搜索</button>
					</span>
				</div>
			</form>
		</div>

		<div class="col-xs-2 col-sm-2 col-md-2">
			<button class="btn btn-primary" style="margin-top: 15px;"
				onclick="window.location.href='__ROOT__/index.php/Admin/chemical/add'">新增条目</button>

		</div>
		<!--<div class="list-container col-md-12" style="margin-top:30px;">
            	
        

            </div>-->

	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="__ROOT__/Public/Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>