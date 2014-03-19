<?php
include "xml/xmledit.php";

if(isset($_POST['edit_id']))
{
$xml=file_get_contents("../music/temp.xml");//读取XML文件
$data=XML_unserialize($xml);

$length=count($data['playlist']['trackList']['track']);
$id=$_POST['edit_id']-1;
$length=$length<$id+1?$id+1:$length;
$data['playlist']['trackList']['track'][$id]['annotation']=$_POST['name'];
$data['playlist']['trackList']['track'][$id]['location']=$_POST['url'];
$data['playlist']['trackList']['track'][$id]['info']=$_POST['info'];
$data['playlist']['trackList']['track'][$id]['image']=$_POST['img'];
$tracklist=$data['playlist']['trackList']['track'];
$xml = XML_serialize($data); 
file_put_contents("../music/temp.xml",$xml);  
} 
else if(isset($_POST['savechanges']))
{
$xml=file_get_contents("../music/temp.xml");
file_put_contents("../music/playlist.xml",$xml);  
$data=XML_unserialize($xml);
$tracklist=$data['playlist']['trackList']['track'];
$length=count($tracklist);
}
else if(isset($_POST['deleteid']))
{
$xml=file_get_contents("../music/temp.xml");
$data=XML_unserialize($xml);
$tracklist=$data['playlist']['trackList']['track'];
$length=count($tracklist);
if($length<3)
{
echo "<script>alert('列表数不能小于2');</script>"; 
}
else
{
echo $id=$_POST['deleteid']-1;
array_splice($data['playlist']['trackList']['track'],$id,1);
$xml = XML_serialize($data); 
file_put_contents("../music/temp.xml",$xml);  
$length=$length-1; 
}
$tracklist=$data['playlist']['trackList']['track'];
}
else
{
$xml=file_get_contents("../music/playlist.xml");//读取XML文件
file_put_contents("../music/temp.xml",$xml);  
$data=XML_unserialize($xml);
$tracklist=$data['playlist']['trackList']['track'];
$length=count($tracklist);
}
?>


<script type="text/javascript">

function edit_m(id,flag)
{
if(flag=='0')$("#title").text("你正在修改歌曲信息:");
else $("#title").text("你正在添加歌曲:");
$('#edbg').css('display','block');
$name="input[name=\"songsinfo["+id+"][annotation]\"]";
$url="input[name=\"songsinfo["+id+"][location]\"]";
$img="input[name=\"songsinfo["+id+"][image]\"]";
$('input[name="name"]').val($($name).val());
$('input[name="url"]').val($($url).val());
$('input[name="img"]').val($($img).val());
id++;
$('input[name="edit_id"]').val(id);
}

function delt_m(id)
{
$.post('music_m.php',{deleteid:id+1},function (resultData){
                   $('.main').html(resultData);
                },'text');
				return false;
}

function save_m()
{
$.post('music_m.php',{savechanges:'1'},function (resultData){
                   $('.main').html(resultData);
				   alert("保存成功!");
                },'text');
				return false;
}
</script>
<div id="editor-column">
<div class="postbox">
<h3 class="hndle">
                        <span style="color:blue;">playlist.xml</span>
</h3>
<div id="edit-playlist-actions">
                            <input id="add-new-song" name="add-new-song" type="button"  title="Add a New Song" value="新建" alt="#TB_inline?inlineId=dialogEditSongInfo" onclick="edit_m('<?echo $length;?>','1');">
                            <input id="save-current-playlist" name="save-current-playlist" type="button"  value="保存" onclick="save_m();">
                        </div>
<div class="inside">
                        <div id="songs-list" class="tabs-panel">
                            <div id="songs-order">
                                <ul>
<?php
for($li = 1; $li <= $length; $li++) {
    echo "<li>".$li."</li>";
	}
	$i=0;
	foreach ((array)$tracklist as $i => $vv) {
//	echo $i."<br>";
?>
								</ul>
                            </div>
                            <div id="songs-item">
                                <form method="post">
                                <ul class="ui-sortable">
                                        <li class="ui-state-default">
                                        <img width="32px" height="32px" src="<?echo $vv['image'];?>">
                                        <span class="song-title"><?echo $vv['annotation'];?></span>
                                        <span class="song-item-control"><a href="#" name="edit" onclick="edit_m('<?echo $i;?>','0');">编辑</a><a href="#" name="delete" onclick="delt_m(<?echo $i;?>);">删除</a></span>
                                        <br class="clear">
                                        <input type="hidden" name="songsinfo[<?echo $i;?>][annotation]" value="<?echo $vv['annotation'];?>">
                                        <input type="hidden" name="songsinfo[<?echo $i;?>][location]" value="<?echo $tracklist[$i]['location'];?>">
                                        <input type="hidden" name="songsinfo[<?echo $i;?>][image]" value="<?echo $vv['image'];?>">
                                        </li>
										<?}?>
                                         </ul>
                                    <input type="hidden" name="savechanges" value="0">
									<input type="hidden" name="list_count" value="<?echo $length;?>">
                                    <input type="hidden" name="current-edit-list" value="playlist.xml">
                               
							   </form>
                            </div>
                        </div>
						
                    </div>
</div>
</div>
<?php
include "music_edit.php";
?>
