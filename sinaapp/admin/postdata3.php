<?php
include '../init.php';
include 'check2.php';
function convertToUTF($content)
{
$encode  = mb_detect_encoding($content , array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
if($encode != 'UTF-8')
{
    $content = mb_convert_encoding($content,'UTF-8',array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
}
return $content;
}
 function DeleteHtml($str){
  $str=trim($str);//清除字符串两边的空格
  $str=strip_tags($str,"");//利用php自带的函数清除html格式
  $str=preg_replace("/\t/","",$str);//使用正则表达式匹配需要替换的内容，如空格和换行，并将替换为空
  $str=preg_replace("/\r\n/","",$str);
  $str=preg_replace("/\r/","",$str);
  $str=preg_replace("/\n/","",$str);
  $str=preg_replace("/ /","",$str);
  $str=preg_replace("/ /","",$str);//匹配html中的空格
  return trim($str);//返回字符串
 }
function compress_html($string) { 
$string = str_replace("\r\n", '', $string); //清除换行符 
$string = str_replace("\n", '', $string); //清除换行符 
$string = str_replace("\t", '', $string); //清除制表符 
$pattern = array ( 
"/> *([^ ]*) *</", //去掉注释标记 
"/[\s]+/", 
"/<!--[^!]*-->/", 
"/\" /", 
"/ \"/", 
"'/\*[^*]*\*/'" 
); 
$replace = array ( 
">\\1<", 
" ", 
"", 
"\"", 
"\"", 
"" 
); 
return preg_replace($pattern, $replace, $string); 
}

$db->connect();
if(!check_login($db)){
echo '<script>alert("you not login!");</script>';
return;
}
else if (!empty($_POST))
{
$artitle_title=isset($_POST['tl'])?convertToUTF($_POST['tl']):'无标题';
$artitle_title=preg_replace('%[ \n\t\r|<|>|?|\\\\|/|||"|\'|,|*]%i', "",$artitle_title);
$article_content=addslashes(convertToUTF($_POST['bs']));
$article_author='网络';
$article_cover='images/article_cover.png';
$article_mark=isset($_POST['nb'])?convertToUTF($_POST['nb']):'网络';
$article_src=isset($_POST['src'])?$_POST['src']:'';

if(isset($_GET['word'])&&$_GET['word']=='1')
{
//$word_title=preg_replace('%[ \n\t\r|<|>|?|\\\\|/|||"|\'|,|*]%i', "", convertToUTF($artitle_title));
$word_content='<h2 style="text-align:center;">'.$artitle_title.'</h2>'.convertToUTF($_POST['bs']).'<br>link:<a href="'.$article_src.'">'.$article_src.'<a>';
include '../plugins/save_word.php';
}
else
{
$sql="INSERT INTO articles (catagory, title, content, time, author,cover,mark,src) VALUES ('1','$artitle_title','$article_content',now(),'$article_author','$article_cover','$article_mark','$article_src')";

$db->connect();
$res=$db->query($sql);
if($res)
echo '<script>alert("success save!");</script>';
else echo '<script>alert("'.$res.'");</script>'; 
}
}
else '<script>alert("no data!");</script>';
?>
