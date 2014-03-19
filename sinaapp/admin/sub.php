<?php
session_start();
require_once('../mysql.class.php');
if($_SESSION['error']>4){
echo "<br>error times too much!<br>please re-login wait sometime!<br>";}
else if(!empty($_POST))
{
 if(isset($_POST['check']))
{
if($_SESSION['sum']==$_POST['check'])
{
echo "<br>check ok!";
$sqname=str_replace(' ','',$_POST['name']);
$sql="select * from admin where name='$sqname'";
$query=$db->query($sql);
if(is_array($row=mysql_fetch_array($query)))
{
echo "<br>account ok!";
if(md5($_POST['password'])==$row['pwd'])
{
echo "<br>password ok<br>login pass!";
$_SESSION['uid']=$row['id'];
$_SESSION['shell']=md5($row['name'].$row['pwd']."myblog");
unset($_SESSION['error']);
unset($_SESSION['sum']);
}
else {echo "<br>password error!";$_SESSION['error']+=1;}
}
else {echo "<br>account error!";$_SESSION['error']+=1;}
}
else {echo "<br>check error!";$_SESSION['error']+=1;}
}
else {echo "<br>error:no check!";$_SESSION['error']+=1;}
}
else {echo "<br>error:unthorized access!";$_SESSION['error']+=1;}
?>