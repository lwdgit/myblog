<?php
function cutstr($str,$cutleng)
{
$str = $str; //要截取的字符串
$cutleng = $cutleng; //要截取的长度
$strleng = strlen($str); //字符串长度
if($cutleng>$strleng)return $str;//字符串长度小于规定字数时,返回字符串本身
$notchinanum = 0; //初始不是汉字的字符数
for($i=0;$i<$cutleng;$i++)
{
if(ord(substr($str,$i,1))<=128)
{
$notchinanum++;
}
}
if(($cutleng%2==1)&&($notchinanum%2==0))
//如果要截取奇数个字符，所要截取长度范围内的字符必须含奇数个非汉字，否则截取的长度加一
{
$cutleng++;
}
if(($cutleng%2==0)&&($notchinanum%2==1))//如果要截取偶数个字符，所要截取长度范围内的字符必须含偶数个非汉字，否则截取的长度加一
{
$cutleng++;
}
$str = substr($str,0,$cutleng);
return $str."...";
}
?>