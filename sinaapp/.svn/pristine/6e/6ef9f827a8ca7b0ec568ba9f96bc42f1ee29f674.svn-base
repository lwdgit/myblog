<?php
require_once('init.php');
$db->connect();
$page_size=5;
$sql="SELECT * FROM  `articles` where catagory=2";
$query=$db->query($sql);
$num= mysql_num_rows($query);

parse_str($var,$str);
if(isset($str))
if($str['page']&&$str['page']>0&&$str['page']<=$num)
$page=$str['page'];
else $page=1;
$start=($page-1)*$page_size;
$total_page=ceil($num/$page_size);

$sql="select * from (select articles.*,catagory.images,count(comments.replyfor) as count from (articles) 
left join catagory on articles.catagory=catagory.id 
left join comments on articles.id=comments.replyfor 
GROUP BY articles.id 
order by articles.id desc)as b where catagory=2 limit $start,$page_size";
$query=$db->query($sql);
  while($row=mysql_fetch_array($query)){
  $article[]=$row;
}
if(isset($article))
$smarty->assign("article",$article);
$smarty->assign("total_page",$total_page);
$smarty->assign("cur_page",$page);
$smarty->display('photo_list.html');
?>