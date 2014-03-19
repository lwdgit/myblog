<?php /* Smarty version 2.6.27, created on 2014-03-17 16:13:36
         compiled from article.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'article.html', 20, false),array('modifier', 'truncate_utf', 'article.html', 33, false),)), $this); ?>
<link rel="stylesheet" type="text/css" href="css/article.css" media="all" />
<script>
$(document).ready(function () {
			a=$("#commentor<?php echo $this->_tpl_vars['article']['id']; ?>
");
		 	b=$("#AddrMessage").val()+"网友";
			a.val(b); 
});
</script>
  		<div class="article_content clearfix">
		<div class="middle">
			<div class="title"><?php echo $this->_tpl_vars['article']['title']; ?>
</div>
			<div class="time"><?php echo $this->_tpl_vars['article']['time']; ?>
</div>
			<div class="content" style="clear:both;">
			<?php echo $this->_tpl_vars['article']['content']; ?>

		  
			</div>
<div class="other">
<div class="bq">
<ul>
<?php $this->assign('arr', ((is_array($_tmp="|")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['article']['mark']) : explode($_tmp, $this->_tpl_vars['article']['mark']))); ?>
<?php $_from = $this->_tpl_vars['arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li><?php echo $this->_tpl_vars['item']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<div class="opt">
<a href="javascript:void(0);">喜欢(<b id="hot<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo $this->_tpl_vars['article']['hot']; ?>
</b>)</a>
<a href="#">转载</a>
<a href="javascript:void(0);">推荐</a>
<a class="like" href="javascript:favor('<?php echo $this->_tpl_vars['article']['id']; ?>
')" title="喜欢"></a>
</div>
<?php if ($this->_tpl_vars['article']['src'] != ''): ?>
<div class="src">转自：<a href="<?php echo $this->_tpl_vars['article']['src']; ?>
" target="_black"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['src'])) ? $this->_run_mod_handler('truncate_utf', true, $_tmp, 42, "..") : smarty_modifier_truncate_utf($_tmp, 42, "..")); ?>
</a></div>
<?php endif; ?>
<?php if ($this->_tpl_vars['isLogin'] == 'true'): ?>
<div class="edit"><a href="admin/?do=article_edit&id=<?php echo $this->_tpl_vars['article']['id']; ?>
" target="_black">编辑</a></div>
<?php endif; ?>
</div>
</div>
<div class="bottom"></div>
</div>
	
	
<div class="comment_content clearfix">
<div class="middle">
<div class="content">
<div class="replybox" id="replybox">
<form id="replyform<?php echo $this->_tpl_vars['article']['id']; ?>
" action="javascript:void(0);">
<div class="inputn">
昵称:
</div>
<input type="text" name="commentor" id="commentor<?php echo $this->_tpl_vars['article']['id']; ?>
" class="innern">
<div class="inputn">
内容:
</div>
<div class="box">
<textarea name="comment" class="innerm"></textarea>
</div>

<input type="hidden" name="articleid" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
<button id="sub" class="clearfix" onclick="javascript:commentsub('#replyform<?php echo $this->_tpl_vars['articleid']; ?>
','#areplylist','article_reply.php');">提交</button>
</form>
</div>
<div style="clear:both"></div>
<div id="areplylist">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "article_reply.html", 'smarty_include_vars' => array('comment' => $this->_tpl_vars['comment'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
</div>
</div>		
	

