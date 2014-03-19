<style type="text/css">
#edbg {
position: fixed;
z-index: 100;
top: 0px;
left: 0px;
height: 100%;
width: 100%;
background-color: black;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=75)";
filter: alpha(opacity=75);
-moz-opacity: 0.75;
opacity: 0.75;
display:none;
}

.editor
{
margin:100px auto;
width:400px;
height:300px;
background-color:#FFF;
opacity: 1;
}
.editor #title{
margin-left:10px;
color:#44d;
width:200px;
}
.editor .close {
position: relative;
left: 366px;
top: 0;
width: 30px;
height: 20px;
background-color: #333;
cursor: pointer;
color: white;
padding-left: 4px;
float: left;
}
.a{
margin: 35px 0 0 60px;
}
.b
{
position: relative;
top: 20px;
left: 150px;
}
#i{
width: 200px;
margin-left: 5px;
outline-style: none;
}
</style>

<div id="edbg">
<div class="editor">
<span id="title"></span>
<span class="close" onclick="javascript:$('#edbg').css('display','none');">关闭</span>

<form id="fm" action="javascript:ovid(0)">
<div class="a">音乐名称:<input type="text"  name="name" id="i" /></div>
<div class="a">音乐网址:<input type="text" name="url" id="i" /></div>
<div class="a">背景图片:<input type="text" name="img" id="i" /></div>
<input type="hidden" name="info" id="i" />
<input type="hidden" name="edit_id"  />
<div class="b">
<input type="submit"  onclick="submitext('#fm','.main','music_m.php');" name="ok"  value="确认"/>
<input type="button"  name="cancel"  onclick="javascript:$('#edbg').css('display','none');" value="取消"/>
</div>
</form>
</div>
</div>