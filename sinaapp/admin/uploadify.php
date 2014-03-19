<?php
if(!defined('SAE_TMP_PATH'))
$path = "../uploads/images/ablum/";	
else $path="saestor://uploads/images/ablum/";
if (!empty($_FILES)) {
	
	//得到上传的临时文件流
	$tempFile = $_FILES['Filedata']['tmp_name'];
	
	//允许的文件后缀
	$fileTypes = array('jpg','jpeg','gif','png'); 
	
	//得到文件原名
	$fileName = iconv("UTF-8","GB2312",$_FILES["Filedata"]["name"]);
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	//接受动态传值
	$files=isset($_POST['typeCode'])?$_POST['typeCode']:'';
	
	//最后保存服务器地址
	if(!defined('SAE_TMP_PATH')&&!is_dir($path))
	   mkdir($path);
	   //对filename进行处理
	$fileName = time()."-".preg_replace('/([\x80-\xff]*)/i','',$fileName);
	if (move_uploaded_file($tempFile, $path.$fileName)){
		echo $path.$fileName;
	}else{
		echo "";
	}
	
	
	
/* 	if (in_array($fileParts['extension'],$fileTypes)) {
		copy($tempFile,$targetFile);
		echo $_FILES['Filedata']['name'];//上传成功后返回给前端的数据
		file_put_contents($_POST['id'].'.txt','上传成功了！');
	} else {
		echo '不支持的文件类型';
	} */
}
?>