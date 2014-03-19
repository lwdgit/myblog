<?php
require 'libs/Smarty.class.php';
$smarty = new Smarty();//设置各个目录的路径，这里是安装的重点
$smarty->template_dir ="html/templates";
if(!defined('SAE_TMP_PATH'))$smarty->compile_dir ="html/templates_c";
else $smarty->compile_dir =SAE_TMP_PATH;
$smarty->config_dir = "html/configs";
$smarty->cache_dir ="html/cache";
//smarty模板有高速缓存的功能，如果这里是true的话即打开caching，但是会造成网页不立即更新的问题，当然也可以通过其他的办法解决
$smarty->caching = false;
$smarty->left_delimiter = "{#"; //重新定义边界，因为默认边界“{}“符，在html页面中嵌入js脚本文件编写代码段时使用的就是”{}“符，自定义边界符还可以是<{ }>, {/ /} 等
$smarty->right_delimiter = "#}";

?>
 