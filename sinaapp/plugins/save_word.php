<?php
include '../plugins/word.class.php';
$word=new word;
$word->start();
date_default_timezone_set('PRC');//中国时区
$D=date("YmdHis");//时间戳
$fileName=$D.".doc";
if(defined('SAE_TMP_PATH'))
$wordname="saestor://file/tmp_word/".$fileName;
else $wordname='../uploads/file/tmp_word/'.$fileName;
echo $word_content;
$word->save($wordname);//保存word并且结束.
ob_flush();//每次执行前刷新缓存
flush();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件下载</title>
</head>
<body>
	<script>window.location.href='<?php echo (defined('SAE_TMP_PATH')?("http://wenblog-file.stor.sinaapp.com/tmp_word/".$fileName):($wordname)) ; ?>';</script>
</body>
</html>