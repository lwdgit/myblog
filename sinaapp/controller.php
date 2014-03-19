<?php
$url=$_SERVER['QUERY_STRING'];
$PORT=$_SERVER['SERVER_PORT']=80?'':":".$_SERVER['SERVER_PORT'];
$BASE_URL="http://".$_SERVER['HTTP_HOST'].$PORT."/";
if($url==""){require("main.php");return;}
parse_str($url,$str);
if(isset($str))
{
	if(isset($str['catalog']))
	{
		if($str['catalog']=="main")
		{
			$var="page=".(isset($_GET['page'])?$_GET['page']:1);
			require("main.php");
		}
		else if($str['catalog']=="article_list")
		{
			$var="page=".(isset($_GET['page'])?$_GET['page']:1);
			require("article_list.php");
		}
		else if($str['catalog']=="photo_list")
		{
			$var="page=".(isset($_GET['page'])?$_GET['page']:1);
			require("photo_list.php");
		}
		else if ($str['catalog']=="article")
		 {
			 if(isset($str['articleid']))
			{
				if(isset($str['show']))
					if($str['show']==1)
					{
						$var="articleid=".$str['articleid']."&show=1";
						include "article.php";
					}
			}
		}
        else if($str['catalog']=="music")
        {
            require("music.php");
        }
        else if($str['catalog']=="about")
        {
            require("about.php");
        }
	}
	else if(isset($str['url']))
	{
		echo "<script>if(confirm('该链接指向站外，是否继续?'))window.location.href='".$str['url']."';</script>";
	}
	else
	{
		require("main.php");
	}
	if(isset($var))$var=null;	
}
else echo "error,not find this page!";
?>