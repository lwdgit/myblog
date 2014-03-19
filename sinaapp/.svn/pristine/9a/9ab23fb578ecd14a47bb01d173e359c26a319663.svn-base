<?php
 require_once("init.php");
$url=parse_url($_SERVER["REQUEST_URI"]);
if(isset($url['query']))
{
parse_str($url['query'],$id);
if(isset($id['getcomment']))
{
$article_id=$id['getcomment'];
}
else if(isset($id['article']))
{
$article_id=$id['article'];
}
}
if(isset($_POST['articleid']))
{
$article_id=$_POST['articleid'];
$db->connect();
$sql="INSERT INTO comments (name,content,datetime,replyfor) VALUES ( '$_POST[commentor]', '$_POST[comment]', now(), '$_POST[articleid]')";
$query=$db->query($sql);
}
if(isset($article_id))
{

$db->connect();
$sql="select * from comments where replyfor ='$article_id' order by datetime asc";
$query=$db->query($sql);
  while($row=mysql_fetch_array($query)){
  $comment1[]=$row;
}
if(isset($comment1))
$smarty->assign("comment",$comment1);
$smarty->assign("articleid",$article_id);
}
//$smarty->display('article_reply.html'); 
?>