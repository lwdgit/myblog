<?php /* Smarty version 2.6.27, created on 2014-03-17 16:13:32
         compiled from plugins/weibo.html */ ?>
<style type="text/css">

#tap span{
background-color: #F7F7F7;
padding: 0 27px;
cursor:pointer;
border-bottom: 1px solid #D1D1D1;
}
#tap span:hover{
background-color: #FFF;
}

#tap #sina{
border-right: 1px solid #D1D1D1;
}

#tap #click{
position: absolute;
width: 225px;
height: 30px;
cursor:pointer;
padding-top:10px;
right: 25px;
}


</style>
<script type="text/javascript">
 $(document).ready(function () {
$("#tap #qq").click(function(){
$("#tap #content").load("html/templates/plugins/qqwb.html");
});
$("#tap #sina").click(function(){
$("#tap #content").load("html/templates/plugins/sinawb.html");
});
$("#tap #click").click(function(){
window.open($('#weibo').attr('src'));
});

});
</script>
<div id="tap">
<span id="sina">新浪微博</span>
<span id="qq">腾迅微博</span>
<div id="click" title="新窗口查看"></div>
<div id="content"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "plugins/sinawb.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div>