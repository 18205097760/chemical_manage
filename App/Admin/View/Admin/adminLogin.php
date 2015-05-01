<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="zh_CN" xml:lang="zh_CN">
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>化学品管理系统 </title>
   <link href="__ROOT__/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="__ROOT__/Bootstrap/css/admin.css" rel="stylesheet">
   <script src="__ROOT__/Bootstrap/js/jquery.min.js"></script>
   <script src="__ROOT__/Bootstrap/js/bootstrap.min.js"></script>
 </head>
 <body>
 <div class="center" align="center" >
    <form action="__CONTROLLER__/checkLogin" method="post"  class="bs-example bs-example-form" role="form" >
       <div class="col-lg-6">
          <div class="input-group" >
             <label>用户名</label>
             <input type="text" class="form-control" id="username" name="username" placeholder="用户名" >
          </div>
          <div class="input-group" >
             <label>密码</label>
             <input type="text" class="form-control" id="password" name="password" placeholder="用户名" >
          </div>
          <div class="input-group-btn">
             <button class="btn btn-default" type="submit">登陆</button>
          </div>
      </div>
    </form>
 </div>
 </body>
</html>
