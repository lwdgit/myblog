<?php
include 'conf.php';
$pp=$_POST;
function convertToUTF($content)
{
$encode  = mb_detect_encoding($content , array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
if($encode != 'UTF-8')
{
    $content = mb_convert_encoding($content,'UTF-8',array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
}
return $content;
}


function get_word($string, $length, $dot = '..',$charset='utf-8') { 
if(strlen($string) <= $length) { 
return $string; 
} 
$string = str_replace(array('　',' ', '&', '"', '<', '>'), array('','','&', '"', '<', '>'), $string); 
$strcut = ''; 
if(strtolower($charset) == 'utf-8') { 
$n = $tn = $noc = 0; 
while($n < strlen($string)) { 
$t = ord($string[$n]); 
if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) { 
$tn = 1; $n++; $noc++; 
} elseif(194 <= $t && $t <= 223) { 
$tn = 2; $n += 2; $noc += 2; 
} elseif(224 <= $t && $t < 239) { 
$tn = 3; $n += 3; $noc += 2; 
} elseif(240 <= $t && $t <= 247) { 
$tn = 4; $n += 4; $noc += 2; 
} elseif(248 <= $t && $t <= 251) { 
$tn = 5; $n += 5; $noc += 2; 
} elseif($t == 252 || $t == 253) { 
$tn = 6; $n += 6; $noc += 2; 
} else { 
$n++; 
} 
if($noc >= $length) { 
break; 
} 
} 
if($noc > $length) { 
$n -= $tn; 
} 
$strcut = substr($string, 0, $n); 
} else { 
for($i = 0; $i < $length; $i++) { 
$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i]; 
} 
} 
return $strcut.$dot; 
} 
?>

<html><head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>剪报工具</title>

    <link type="text/css" rel="stylesheet" href="<? echo $plugin_path;?>web-clipper.css">
    <script type="text/javascript" src="<? echo $plugin_path;?>crossDomain.js"></script>
    <script language="javascript">
        function preSubmit () {
            document.getElementById("sb").disabled = true;
            document.getElementById("cancelbtn").disabled = true;
            var v = document.getElementById("tl");
            if (v != null && v.value == "") {
                v.value = "<? echo $pp['tl'];?>";
            }
            //document.getElementById("content").style.display = "none";
            document.getElementById("loadingview").style.display = "block";

            croDomain.postMessage('remove', '<? echo $pp['src'];?>');
            return true;
         }
</script>
<script type="text/javascript">
        setTimeout(function () {
            croDomain.postMessage('resize_fullpage','<? echo $plugin_path;?>note-web-sprite.png');
        }, 101);
        setTimeout(function () {
            croDomain.postMessage('creat', '<? echo $plugin_path;?>note-web-sprite.png');
        }, 202);
</script>
</head>
<body style="border:0px;padding:0px;margin:0px">
<div id="ydNoteWebClipper">
    <div id="ydNoteWebClipper-New">
            <div class="ydnwc-dialog-hd ydnwc-dialog-hd-closable">
                <span class="ydnwc-dialog-title">我的剪报工具
                </span>
                <a href="#" id="close" class="ydnwc-dialog-close"></a>
            </div>

            <div class="ydnwc-dialog-bd" id="content"><input type="hidden" name="src" id="src1" value='<? echo $pp['src'];?>'>
                <?php
                if(isset($pp['confirm'])&&$pp['confirm']=='true')
                    include('sav.php');
                else include('form.php');
                ?>
            </div>
        <script type="text/javascript">
                <!--
                    setTimeout(function(){try{var us=document.getElementById("tl");us.focus();us.select();}catch(e){}},100);
                -->
         </script>

    </div>


    <!-- loading -->
    <div id="loadingview" name="loadingview" class="ydnwc-dialog-loading" style="display:none">正在加载中，请稍后…</div>
    </div>
</div>
    <script type="text/javascript" src="<? echo $plugin_path;?>close.js"></script>
</body></html>