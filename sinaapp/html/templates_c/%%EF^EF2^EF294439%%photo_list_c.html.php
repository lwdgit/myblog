<?php /* Smarty version 2.6.27, created on 2014-03-17 16:13:32
         compiled from photo_list_c.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate_utf', 'photo_list_c.html', 8, false),array('modifier', 'date_format', 'photo_list_c.html', 11, false),array('modifier', 'explode', 'photo_list_c.html', 14, false),)), $this); ?>
<div class="catagory" style="background: url('<?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['images']; ?>
') no-repeat;">
</div>
<div class="article_list">
  <div class="article_listt">
 <a class="view" href="javascript:void(0);" ></a>
  </div>
<div class="article_listm">
			<div id="title" class="title"   ><?php echo ((is_array($_tmp=$this->_tpl_vars['article'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('truncate_utf', true, $_tmp, 20, "..") : smarty_modifier_truncate_utf($_tmp, 20, "..")); ?>

			</div>
			<div id="photolistid" style="display:none"><?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['ablumid']; ?>
</div>
			<div class="time"><?php echo ((is_array($_tmp=$this->_tpl_vars['article'][$this->_sections['i']['index']]['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
 </div>
		<div class="content">
<div id="smallimglist" class="photolist" style="display: block; ">
<?php $this->assign('arr', ((is_array($_tmp="|")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['article'][$this->_sections['i']['index']]['other']) : explode($_tmp, $this->_tpl_vars['article'][$this->_sections['i']['index']]['other']))); ?>
<?php $_from = $this->_tpl_vars['arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['foo']['iteration']++;
?>
  <?php if (($this->_foreach['foo']['iteration']-1) < 6): ?> 
<img id="<?php echo ($this->_foreach['foo']['iteration']-1); ?>
" width="80" height="80" src="<?php echo $this->_tpl_vars['item']; ?>
" >
<?php else: ?>
<?php echo "<div style='width: 10px;'>...</div>"; ?>
  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>


</div>
<div class="desc">
<?php echo ((is_array($_tmp=$this->_tpl_vars['article'][$this->_sections['i']['index']]['content'])) ? $this->_run_mod_handler('truncate_utf', true, $_tmp, 120, "...") : smarty_modifier_truncate_utf($_tmp, 120, "...")); ?>

</div>
</div>

<div class="other">
<div class="bq">
<ul>
<?php $this->assign('arr', ((is_array($_tmp="|")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['article'][$this->_sections['i']['index']]['mark']) : explode($_tmp, $this->_tpl_vars['article'][$this->_sections['i']['index']]['mark']))); ?>
<?php $_from = $this->_tpl_vars['arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<li><?php echo $this->_tpl_vars['item']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<div class="opt">
<a href="javascript:void(0);" onclick="comment('#article<?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['id']; ?>
');" >评论(<b id="comment<?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['count']; ?>
</b>)</a>
<a href="#">转载</a>
<a href="javascript:void(0);">推荐</a>
<a href="javascript:void(0);">喜欢(<b id="hot<?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['hot']; ?>
</b>)</a>
<a class="like" href="javascript:favor('<?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['id']; ?>
')" title="喜欢"></a>
</div>
</div>
	</div>
	<div class="comment" id="article<?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['id']; ?>
">	
	</div>
	<div class="article_listb"></div>
</div>
<script type="text/javascript">
 $("#smallimglist img").click(function()
{
data=$(this).parent().parent().parent();
$.get('ablum.php',{curpage:$(this).attr('id'),ablumid:data.find('#photolistid').text(),
title:data.find('#title').text()
},function (resultData){
$('#ablum').html(resultData);
},'text');
});

</script>