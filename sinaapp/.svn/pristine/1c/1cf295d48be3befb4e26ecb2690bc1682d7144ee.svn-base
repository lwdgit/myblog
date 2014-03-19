<?php
include 'conf.php';
$sendurl=$main_host."/admin/postdata2.php";

  function do_post_request($url, $post_data, $optional_headers = null)
  {
	$ch = curl_init();     
	curl_setopt($ch, CURLOPT_POST, 1);    
	curl_setopt($ch, CURLOPT_HEADER, 0);    
	curl_setopt($ch, CURLOPT_URL,$url);    //为了支持cookie 
	curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');    
	curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($post_data));   
	$res=curl_exec($ch);
	if(curl_errno($ch))
	{
	    echo 'Curl error: '. curl_error($ch);
	}
	curl_close($ch);
	return $res;
 }
$p=$_POST;
$p['bs']=htmlspecialchars_decode($p['bs']);
if(do_post_request($sendurl,$_POST)=='success')
	echo "<div style=\"width: 120px;margin: 80px auto;\"><a id=\"close1\" href=\"".$main_host."\" target=\"_black\">保存成功！点此浏览</a></div>";
else echo "<div style=\"width: 120px;margin: 80px auto;\">保存失败！请重试</div>";

?>