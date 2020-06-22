<?php
	$dbConn = @mysql_connect('localhost','root','') or die(mysql_error());
	@mysql_select_db('quick_new') or die(mysql_error());
	$sql = "SET NAMES 'utf8'";
	mysql_query($sql, $dbConn);
?>