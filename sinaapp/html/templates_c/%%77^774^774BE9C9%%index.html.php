<?php /* Smarty version 2.6.27, created on 2014-03-19 08:12:19
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'index.html', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "myblog.conf"), $this);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/photo.css"  />
 <link rel="stylesheet" href="css/animate.css" type="text/css">
   <script src="js/jquery-1.8.min.js" type="text/javascript"></script> 
       <?php if ($this->_tpl_vars['debug'] != 'on'): ?>
          <script src="js/right_band.js" type="text/javascript"></script> 
       <?php endif; ?>
<script src="js/ajax.js" type="text/javascript">
</script> 

  <title><?php echo $this->_config[0]['vars']['titile']; ?>
</title>
</head>
<body>
  <div class="init clearfix">
    <div class="container">

      <div class="head">
        <div class="logo"></div>

        <div class="banner">
          <div id="nav" class="nav">
            <ul>
              <li id="1" class="active">
                  <a href="/" title="首页">首页</a>
              </li>
			        <li id="2">
                <a href="?catalog=article_list" title="博文">博文</a>
              </li>

              <li id="3">
                <a href="?catalog=photo_list" title="照片">照片</a>
              </li>
		          <li id="4">
                <a href="?catalog=about" title="关于">关于</a>
              </li>			  
            </ul>
          </div>

          <div class="search">
			  <input type='hidden' name="AddrMessage" id="AddrMessage" value="来自星星的路人甲">
            <form action="return false;">
              <input type="text" name="in" placeholder="请输入你想查询的内容" id="" class="i"> <input type="submit" name=
              "se" class="s" value="">
            </form>
          </div>
        </div>
      </div>

      <div class="main" id="blog_main">
        <div id="left">
		<div id="ajaxcontent">
		 <!--  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> -->
		 <?php 
		  include("init.php");
          include("controller.php");
		  ?>
		 </div>
        </div>

        <div id="animate"></div>

     <div class="right">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar.html", 'smarty_include_vars' => array('flashurl' => $this->_tpl_vars['flashurl'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div> 
      </div>

      <div style="display:none" id="gotopbtn" class="to_top">
        <a title="返回顶部" href="javascript:void(0);"></a>
      </div>

      <div class="clear"></div>

      <div class="footer">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
    </div>
  </div>
</body>
</html>