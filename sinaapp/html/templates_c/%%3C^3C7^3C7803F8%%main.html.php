<?php /* Smarty version 2.6.27, created on 2014-03-19 08:12:19
         compiled from main.html */ ?>

<div class="menu" >
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['article']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<?php if ($this->_tpl_vars['article'][$this->_sections['i']['index']]['catagory'] == 1): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "article_list_c.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['article'][$this->_sections['i']['index']]['catagory'] == 2): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "photo_list_c.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
无该分类
<?php endif; ?>
<?php endfor; endif; ?>
</div>
<div id="ablum"></div>

<div class="nav_bar" id="nav_bar">
<ul class="pagination">	
<li><a href="javascript:return false;">当前是：第<?php echo $this->_tpl_vars['cur_page']; ?>
页 共<?php echo $this->_tpl_vars['total_page']; ?>
页</a></li>
<?php if ($this->_tpl_vars['cur_page'] > 1): ?>
<li><a href="?catalog=main&page=1" title="首页"><<</a></li> 
<li><a href="?catalog=main&page=<?php echo $this->_tpl_vars['cur_page']-1; ?>
" title="上一页"><</a></li>  
<?php endif; ?>
<?php if ($this->_tpl_vars['cur_page'] < $this->_tpl_vars['total_page']): ?>
<li><a href="?catalog=main&page=<?php echo $this->_tpl_vars['cur_page']+1; ?>
" title="下一页">></a></li> 
<li><a href="?catalog=main&page=<?php echo $this->_tpl_vars['total_page']; ?>
" title="尾页">>></a></li>
<?php endif; ?>
</ul>
</div>