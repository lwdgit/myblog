<?php
include '../plugins/word.class.php';
$word=new word;
$word->start();
date_default_timezone_set('PRC');//中国时区
$D=date("YmdHis");//时间戳
$fileName="test".$D.".doc";
$wordname="saestor://file/tmp_word/".$fileName;
echo $_GET['u'];
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
	<div align="center"><a href="<?php echo 'http://wenblog-file.stor.sinaapp.com/tmp_word/'.$fileName ; ?>" target=_blank class="unnamed1">点此下载</a> 
</div>
</body>
</html>
