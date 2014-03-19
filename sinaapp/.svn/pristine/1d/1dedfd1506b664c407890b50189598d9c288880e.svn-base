<?php
$articleid=-1;
$title='';
$content='';
$mark='相册|';
//print_r($_GET);
if(isset($_GET['articleid'])&&isset($_GET['ablum_id']))
{
$articleid=$_GET['articleid'];
$ablumid=$_GET['ablum_id'];
include('../mysql.class.php');
$db->connect();
$sql="select * from articles where id='$articleid'";
$query=$db->query($sql);
while($row=mysql_fetch_array($query))
$article=$row;
$title=$article['title'];
$content=$article['content'];
$mark=$article['mark'];
$sql="select * from photos where ablumid='$ablumid'";
$query=$db->query($sql);
  while($row=mysql_fetch_array($query)){
  $ablum[]=$row;
}
}

?>

<style type="text/css">
#img_res{
  width: 530px;
}
#imglist{
width:600px;
}
#img_res li.completed {
background: whitesmoke;
padding: 10px 10px 17px;
height: 95px;
}
#img_res li {
position: relative;
border: 1px solid #E6E6E6;
height: 35px;
margin: 0 0 10px;
vertical-align: middle;
}
#img_res ol, ul, li {
list-style: none;
}

#img_res li .picInfo {
background: url(image/progress_bar.png) no-repeat;
height: 35px;
}

#img_res li .move {
width: 9px;
position: relative;
float: left;
height: 80px;
margin-right: 10px;
}
#img_res li .thumb {
display: block;
width: 70px;
overflow: hidden;
height: 70px;
margin: 0 6px 0 0;
float: left;
border: 5px solid skyblue;
}
#img_res li.completed .desc {
border: 1px solid #E6E6E6;
float: left;
font-size: 12px;
color: #999;
width: 400px;
height: 71px;
resize: none;
padding: 3px 7px;
}
#img_res li .del {
background: url(image/sprite_post.png?20120307) no-repeat;
width: 14px;
height: 14px;
background-position: -41px -46px;
display: block;
right: 10px;
top: 10px;
position: absolute;
z-index: 2;
}
</style>
<script type="text/javascript" src="../plugins/upload/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../plugins/upload/jquery.uploadify-3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugins/upload/uploadify.css"/>
<script type="text/javascript">
var img_id_upload=new Array();//初始化数组，存储已经上传的图片名
var init_img_list=new Array();//初始加载的图片名
var imginfo;
var img_i=0;

var af="<li id='imglist";
var bf="' class='completed ' style='opacity: 1; top: 0px; z-index: 0; '><div  class='picInfo' style='background-position: -574px 0px; '><span class='thumb' style=''><img src='";
var cf="' width='80' height='80'></span><textarea class='desc' name='text' id='text";
var df="'>";
var ef="</textarea><a class='del' href=\"javascript:del('";
var ff="\');\" title='删除' ></a></div></li>";
init_img_list=<?php if(isset($ablum))echo json_encode($ablum);else echo null;?>

function init_push(arr)
{
  for(index in arr)
  {
    if(arr[index]==undefined)break;
    addImg(arr[index]['path'],arr[index]['info']);
  }
}
function addImg(img,text)
{
      img_id_upload[img_i]=img;
      a=af+img_i+bf+img_id_upload[img_i]+cf+img_i+df+text+ef+img_i+ff;
      $("#img_res").prepend(a);   
      img_i+=1;
}
function getWebImg()
{
  if($('#webImgSrc').val()!="")
  {
      addImg($('#webImgSrc').val());
      $('#webImgSrc').val("");
  }
}

function store(arr) {
imginfo='';
for(index in arr)
{
if(arr[index]=='')continue;
     txtdid="#text"+index;
　  imginfo+=arr[index]+"::"+$(txtdid).val()+"|";
}
return imginfo.substring(0,imginfo.length-1);
}

function del(id)
{
$('#imglist'+id).remove();
img_id_upload.splice(id,1,'');
res=store(img_id_upload);
$('#imglist').val(res);
}

function getinfo()
{
res=store(img_id_upload);
$('#imglist').val(res);
}

function store_array(arr,imglist) {
file=$(imglist);
for(var key in arr) { // 这个是关键
if(typeof(arr[key]) == 'array' || typeof(arr[key]) == 'object') {// 递归调用
store_array(arr[key]);
} else {
file.val(arr[key]+''+'|'+file.val());	 
}
}
s=file.val();
file.val(s.substring(0,s.length-1));
}

function senddata(form)
{
getinfo();
post('photo_data.php',form,'#article_res');
}

$(function() {

    $('#file_upload').uploadify({
    	'auto'     : true,//关闭自动上传
    	'removeTimeout' : 0,//文件队列上传完成1秒后删除
        'swf'      : '../../plugins/upload/uploadify.swf',
        'uploader' : 'uploadify.php',
        'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
		'buttonText' : '选择图片',//设置按钮文本
        'multi'    : true,//允许同时上传多张图片
        'uploadLimit' : 200,//一次最多只允许上传200张图片
        'fileTypeDesc' : 'Image Files',//只允许上传图像
        'fileTypeExts' : '*.gif; *.jpg; *.png',//限制允许上传的图片后缀
        'fileSizeLimit' : '20000KB',//限制上传的图片不得超过20000KB 
        'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
              if(data.indexOf("saestor:")==0)
              {               
                data=data.replace(/(saestor:\/\/)([^/]*)/gi,'http://wenblog-$2.stor.sinaapp.com');
              }
               img_id_upload[img_i]=data;
            a=af+img_i+bf+data+cf+img_i+df+ef+img_i+ff;
			$("#img_res").prepend(a);		
			 img_i+=1;
        },
        'onQueueComplete' : function(queueData) {//上传队列全部完成后执行的回调函数
           // if(img_id_upload.length>0)
           //alert('成功上传的文件有：'+encodeURIComponent(img_id_upload));		   
        }  
    });
	init_push(init_img_list);
});

</script>
<script src="../plugins/ckeditor/ckeditor.js"></script>
<script src="../plugins/ckeditor/adapters/jquery.js"></script>
  <div class="form-container">
  <form action="javascript:senddata('#editor_form');" method="post" id="editor_form" name="editor_form">

    <div class="title input-group">
    <span class="input-group-addon">标题:</span>
    <input type="text" class="form-control" name="article_title" id="title" placeholder="在此输入你的标题" value="<? echo $title;?>"/>
    </div>
	

<ul class="nav nav-pills input-group">
  <li style="margin-top:5px;"><input class="btn btn-primary"  type="file" name="file_upload" id="file_upload" /></li>
  <li class="navbar-form"><div class="form-group">
    <input type="text" style="width: 400px;margin-left: 40px;" id="webImgSrc" class="form-control" placeholder="在此输入网络图片地址添加网络图片">
  </div>
  <button class="btn btn-default" onclick="javascript:getWebImg();return false;">保存</button></li>
</ul>


<div id="img_res"></div>
		<textarea id="editor" name="article_content" style="width:100%;height:250px;"><? echo $content;?></textarea>
	<input type="hidden" name="catagory" id="" value="2"> 
	<input type="hidden" name="article_author" id="article_author" value="admin"> 
  <div class="title input-group">
  <span class="input-group-addon">标签:</span>
  <input type="text" class="form-control" name="article_mark" id=""  value="<? echo $mark;?>|"/>
</div>
<input type="hidden" value="" name="imglist" id="imglist" />
<button type="submit" class="btn btn-default">提交内容</button>
  </form>
</div>
<div id="article_res"></div>
<script type="text/javascript">
$('textarea#editor').ckeditor();
</script>




