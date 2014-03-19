<?php
require_once('init.php');
$db->connect();
$page_size=5;
$sql="SELECT * FROM  `articles`";
$query=$db->query($sql);
$num= mysql_num_rows($query);

if(isset($var))
{
parse_str($var,$str);
if(isset($str))
if(isset($str['page'])&&$str['page']>0&&$str['page']<=$num)
$page=$_GET['page'];
}
else $page=1;
$start=($page-1)*$page_size;
$total_page=ceil($num/$page_size);


$sql="select articles.*,catagory.images,count(comments.replyfor) as count from (articles) 
left join catagory on articles.catagory=catagory.id 
left join comments on articles.id=comments.replyfor 
GROUP BY articles.id 
order by articles.id desc limit $start,$page_size";

$query=$db->query($sql);
  while($row=mysql_fetch_array($query)){
  $article[]=$row;
}
$smarty->assign("total_page",$total_page);
$smarty->assign("cur_page",$page);
if(isset($article))
$smarty->assign("article",$article);
$smarty->display('main.html'); 
?>