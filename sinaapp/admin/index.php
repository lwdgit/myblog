<?php
session_start();
include('../mysql.class.php');
include('check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="style/style.css">
<meta charset="UTF-8">
<title>后台管理</title>

<script src="../js/jquery-1.8.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/func.js"></script>
<link rel="stylesheet" href="../css/dist/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="../css/dist/css/bootstrap-theme.min.css">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="../css/dist/js/bootstrap.min.js"></script>


<script src="../plugins/ckeditor/ckeditor.js"></script>
<script src="../plugins/ckeditor/adapters/jquery.js"></script>
    
</head>
<body class="clearfix">
<div class="container-body">
<div class="banner">
<div class="logo"></div>
<div id="gomain"><a href="http://sae.sina.com.cn/?m=vermng&app_id=wenblog" target="_black">SAE</a></div>
<div id="gomain"><a href="../" target="_black">首页</a></div>
<div id="logout"><a href="login.php">登出</a></div>
</div>
<div class="mv">
<div class="leftbar list-group">
<ul>
<li class="list-group-item" onclick="javascript:SwitchOpt(this,'setting');">站点设置</li>
<li class="list-group-item" onclick="javascript:SwitchOpt(this,'user');">用户资料</li>
<li class="list-group-item active" onclick="javascript:SwitchOpt(this,'article_m');">文章管理</li>
<li class="list-group-item" onclick="javascript:SwitchOpt(this,'comment_m');">评论管理</li>
<li class="list-group-item" onclick="javascript:SwitchOpt(this,'photo_m');">相册管理</li>
<!-- <li class="list-group-item" onclick="javascript:SwitchOpt(this,'music_m');">
音乐管理</li> -->
<li class="list-group-item" onclick="javascript:SwitchOpt(this,'html_m');">自定义页面</li>
</ul>
</div>
<div class="forms">
<form name="ts" id="its" action="index.php"><input type="text"
name="user" value="hello"> <input type="text" name="url">
<input type="text" name="dtime"></form>
</div>
<div class="main" id='main'>
	<? include "article_m.php";?>
</div>
</div>
</div>

</body>
</html>
