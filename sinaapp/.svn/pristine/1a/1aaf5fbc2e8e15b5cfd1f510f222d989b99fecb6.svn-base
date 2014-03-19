<?php
require_once('init.php');

$url=parse_url($_SERVER["REQUEST_URI"]);//
parse_str($url['query'],$id);
if(isset($id['show'])&&$id['articleid'])
{                   
 $db->connect();
$sql="select * from articles where  id='$id[articleid]'";
$query=$db->query($sql);
  while($row=mysql_fetch_array($query)){
  $article=$row;
}
 require_once("reply.php");
if(isset($article))
{
$smarty->assign("article",$article);
include 'admin/check2.php';
if(check_login($db))
	$smarty->assign("isLogin","true");
}
$smarty->display("article.html");
}
else if(isset($id['hot']))
{
 $db->connect();
 $sql="update  articles set hot=hot+1 where  id='$id[articleid]' and 1=1";
 $db->query($sql);
}
else echo "查看的文章的不存在!<script>history.back(-1);</script>";
?>