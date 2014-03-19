<?php
session_start();
if(isset($_SESSION))session_unset();
$a=rand(1,50);
$b=rand(1,50);
$sum=$a+$b;
$_SESSION['sum']=$sum;
if(!isset($_SESSION['error']))
$_SESSION['error']=0;
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<script src="../js/jquery-1.8.min.js" type="text/javascript">
</script>
<style type="text/css">
input{
background:transparent;
color: #CCC;
outline:0;
border:0
}
</style>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript">
 function init()
 {
b=-1;
len=1;
c="";
flag=0;
id='';
times=0;
ent=0;
postdata='';
i=0;
a="welcome to the blog manage system<br><form id='lf' action='sub.php' method='POST'>please input your name:<input type='text' name='name' id='name' size='10'  autocomplete='off' /><br>please input your password:<input type='password' id='password' name='password' autocomplete='off'/><br>please input:<? echo $a.'+'.$b.'='?><input type='text' id='check' name='check' autocomplete='off'/></form>";
 }

</script>
<title>我的轻博客--后台管理系统</title>
</head>
<body style="background-color:black;color:white">
<p id="pcontainer"></p>
<p id="t"></p>

</body>
</html>
