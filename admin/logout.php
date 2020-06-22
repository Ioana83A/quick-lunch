<?php
    session_start();
	if (!isset($_SESSION['username']))
    {
	header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['HTTP_SELF'])."/admin/index.php");
	exit();
    }
    else
    {
	$_SESSION=array();
	session_destroy();
	setcookie('PHPSESSID','',time()-300,'/','','0');
    }	
	$page_title="Logged out";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link REL="STYLESHEET" TYPE="text/css" HREF="css/style.css" Title="TOCStyle">

</head>
<body bgcolor="#90c103" >
<?php
   
	echo "<table bgcolor='#ecf3d4' width='400' align='center'><th colspan='2'>";        
    echo "<center><font color='#006C36'>You are now logged out</font></center></th>";
	echo '<tr><td  width="60%"><span class="text3"><a href="index.php">Logheaza-te cu un alt user</a></span></td>';
	echo '<td width="40%"><span class="text3"><a href="../meniu.php">Du-te la website</a></span>';
    echo "</td></tr></table>";    
?>
</body>
</html>