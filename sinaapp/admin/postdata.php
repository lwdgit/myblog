<?php
include '../mysql.class.php';
include 'check2.php';
if(!check_login($db))gologin();

if (!empty($_POST))
{
$artitle_title=$_POST['article_title'];
$host=$_POST['host'];
$article_content=$_POST['article_content'];
$article_content = preg_replace('%(<img.+?src ?= ?[\'"])((?!http://)[^"]*)%m', '$1'.$host.'$2', $article_content);//转换图片src
$host='?url='.$host;
$article_content = preg_replace('/(<a.+?)_blank/m', '${1}_self', $article_content);//转换链接
$article_content = preg_replace('%(<a.+?href ?= ?[\'"])((?!http://)[^"]*)%m', '$1'.$host.'$2', $article_content);
$article_content=addslashes($article_content);//防止不能存入数据库

$article_author=$_POST['article_author'];
$article_cover=$_POST['article_cover'];
$article_mark=$_POST['article_mark'];
$article_src=isset($_POST['article_src'])?$_POST['article_src']:'';

if($_POST['article_id']!=-1)
{
$sql="UPDATE articles SET title='$artitle_title',content='$article_content',time=now(),cover='$article_cover',mark='$article_mark' WHERE id='$_POST[article_id]'";
}
else
{
$sql="INSERT INTO articles (catagory, title, content, time, author,cover,mark,src) VALUES ('1','$artitle_title','$article_content',now(),'$article_author','$article_cover','$article_mark','$article_src')";
}
$db->connect();
 $res=$db->query($sql);
if($res)
echo "<script>alert('成功');</script>";
else echo "<script>alert('失败');</script>"; 
}?>
