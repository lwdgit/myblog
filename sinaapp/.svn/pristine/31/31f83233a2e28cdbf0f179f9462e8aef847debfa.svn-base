<?php
$articleid=-1;
$title='';
$content='';
$mark='相册|';
//print_r($_GET);
if(isset($_GET['articleid']))
{
$articleid=$_GET['articleid'];
include('../mysql.class.php');
$db->connect();
$sql="select * from articles where id='$articleid'";
$query=$db->query($sql);
while($row=mysql_fetch_array($query))
$article=$row;
$title=$article['title'];
$content=$article['content'];
$mark=$article['mark'];
}
?>
<script src="../plugins/ckeditor/ckeditor.js"></script>
<script src="../plugins/ckeditor/adapters/jquery.js"></script>
  <div class="form-container">
 	<form name="editor"  id="editor_form" method="post" action="javascript:post('postdata.php','#editor_form','#article_res');" >
    <div class="title input-group">
         <span class="input-group-addon">标题:</span>
         <input type="text"  class="form-control" name="article_title" id="title"  placeholder="在此输入你的标题" value='<? echo $title;?>'/>
	</div>
		<textarea name="article_content" id="editor" style="width:100%;height:350px;"><? echo $content;
		?></textarea>
		<br />
	<input type="hidden" name="catagory" id="" value="1"> 
	<input type="hidden" name="article_id" id="" value="<? echo $articleid;?>"> 
	<input type="hidden" name="article_author" id="article_author" value="admin"> 
	<div class="title input-group">
	<span class="input-group-addon">标签:</span>
	<input type="text" class="form-control" name="article_mark" id=""  value="<? echo $mark;?>"/>
</div>
	<button type="submit" class="btn btn-default">提交内容</button>
  </form>
</div>
<div id="article_res"></div>
<script type="text/javascript">
$('textarea#editor').ckeditor();
</script>