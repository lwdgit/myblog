<?php
function gologin()
{
echo "<script>window.location.href='login.php';</script>";
session_unset();
}

if(isset($_SESSION))
{
		if(isset($_SESSION['uid'])&&isset($_SESSION['shell']))
		{
		$sql="select * from admin where id='$_SESSION[uid]'";
		$query=$db->query($sql);
				if(is_array($row=mysql_fetch_array($query)))
				{
						if(md5($row['name'].$row['pwd']."myblog")==$_SESSION['shell']);
						else {
						gologin();
						}
				}
				else{
				gologin();
				}
		}
		else
		{
		gologin();
		}
}
else{
gologin();
}
?>