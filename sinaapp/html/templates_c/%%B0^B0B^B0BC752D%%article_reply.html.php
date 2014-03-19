<?php /* Smarty version 2.6.27, created on 2014-03-17 16:13:36
         compiled from article_reply.html */ ?>
<ul class="article_reply">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['comment']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
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
	<li id="replylist<?php echo $this->_sections['i']['index']+1; ?>
">
	<span class="cmrn clearfix">
<?php echo $this->_tpl_vars['comment'][$this->_sections['i']['index']]['name']; ?>
 (<?php echo $this->_sections['i']['index']+1; ?>
楼):  
	</span>
	<span class="cmcontent"><?php echo $this->_tpl_vars['comment'][$this->_sections['i']['index']]['content']; ?>

	</span>
	<a href="javascript:void(0);" onclick="replyfor($(this).parent(),'<?php echo $this->_sections['i']['index']+1; ?>
');" class="rep">回复</a>
	</li>
<?php endfor; endif; ?>
</ul>