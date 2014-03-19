<?php
require_once('../mysql.class.php');
include('function.php');
$db->connect();
if(isset($_GET['del_article_id']))
{
$sql="delete from articles where id='$_GET[del_article_id]'";
$db->query($sql);
unset($_GET['del_article_id']);
} 

$page_size=10;
$sql="SELECT * FROM  `articles` where catagory=1";
$query=$db->query($sql);
$num= mysql_num_rows($query);

/*parse_str($var,$str);
if(isset($str))
if($str['page']&&$str['page']>0&&$str['page']<=$num)
$page=$str['page'];*/
$page=isset($_GET['page'])?$_GET['page']:1;
if(isset($page)&&$page>0&&$page<$num);
else $page=1;
$start=($page-1)*$page_size;
$total_page=ceil($num/$page_size);

$sql="select * from (select articles.*,catagory.images,count(comments.replyfor) as count from (articles) 
left join catagory on articles.catagory=catagory.id 
left join comments on articles.id=comments.replyfor 
GROUP BY articles.id 
order by articles.id desc)as b where catagory=1 limit $start,$page_size";
$query=$db->query($sql);
$i=1;
?>


<script type="text/javascript">
function edit_article(id)
{
$.get('article_edit.php',{articleid:id},function (resultData){
$('#main').html(resultData);
},'text');
}
function add_article()
{
$.get('article_edit.php','',function (resultData){
$('#main').html(resultData);
},'text');
}
function del_article(id)
{
if(confirm("确实要删除吗？")==1)
$.get('article_m.php',{del_article_id:id},function (resultData){
$('#main').html(resultData);
},'text');
}
function getList(pageid)
{
$.get('article_m.php',{page:pageid},function (resultData){
$('#main').html(resultData);
},'text');
}

</script>
<div id="editor-column">
<div class="postbox">
<h3 class="hndle">
                        <span >文章列表</span>
                        <span id="edit-playlist-actions">
                            <input id="add-new-art" name="add-new-art" type="button"  title="新建一篇文章" value="新建"  onclick="add_article();">
                        </span>
</h3>

				<div class="inside" style="overflow: hidden; ">
				<div id="article-list" class="list-group">

	               <ul>
						<?php
						  while($row=mysql_fetch_array($query)){
						?>
							<li class="list-group-item">
							<span class="index"><? echo $i++; ?></span>
							<span class="reditor">
							<span class="title"><? echo mb_substr($row['title'],0,30,'utf-8');?>		
							</span>								
							<a href="javascript:;" onclick="edit_article('<? echo $row['id'];?>');">编辑</a>
							<a href="javascript:;" onclick="del_article('<? echo $row['id'];?>');">删除</a>
							</span>
							</li>								
						<? }?>					
					</ul>
				</div>	
				<div class="nav_bar" id="nav_bar">
				<ul class="pagination" style=" margin-left: 3px; ">	
					<?php
					echo '<li><a href="javascript:return false;">当前是：第'.$page.'页 共'.$total_page.'页</a></li>';
					if($page>1)
					{
					echo "<li><a href=\"javascript:getList('1');return false;\" title=\"首页\"><<</a></li>"
					."<li><a href=\"javascript:getList('".($page-1)."');return false;\" title=\"上一页\"><</a></li>";
					}
					if($page<$total_page)
					echo '<li><a href="javascript:getList(\''.($page+1).'\');return false;" title="下一页">></a></li>'
					.'<li><a href="javascript:getList(\''.$total_page.'\');return false;" title="尾页">>></a></li>';
					?>
				</ul>
			</div>		
			</div>

</div>
</div>
