<?php
    session_start();
    if (isset($_POST['submit']))
    {
		require_once("db.php");
		
		$username=$_POST['username'];
		$password=$_POST['password'];
    
    
		if (empty($username))
		{
	    	$u=false;
    	    echo "You forgot to introduce your username";
		}
		else
		{
    	    $u=true;
			$username=$_POST['username'];
		}
					        
		if (empty($password))
		{
	    	$p=false;
    	    echo "<br />You forgot to introduce your password";
		}
		else
		{
    	    $p=true;
	    	$password=$_POST['password'];
		}
    
		if($u && $p)
		{
	    	$query="select id, username from admin where username='$username' and password=md5('$password')";
	    	$result=@mysql_query($query);
	   		$row=@mysql_fetch_array($result,MYSQL_NUM);
	
	   		if ($row)
	   		{
				session_start();
				$_SESSION['user_id']=$row[0];
				$_SESSION['username']=$row[1];
				header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['HTTP_SELF'])."/admin/loggedin.php");
				exit();
			}
	   		else
	    	{
				echo "<center><font color='#FF0000'>Username-ul sau parola nu sunt bune</font></center>";
	   		}
	
	   		 @mysql_close();
		}
		else
		{
	 	   echo "<br />Try again later";
		}
	
		$page_title="Login";
	//include('templates/header.inc');
    }	
?>	
<body bgcolor="#90c103">
<center>
<br /><br />
<h2 ><font color="#FF0000" ></font></h2>
<br /><br /><br /><br />
<table bgcolor="#FFFFFF" align="center" border="1" width="250" height="100">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" />
	<tr>
		<td align="left" ><font color="#000000"><b>Username</b></font><br /></td>
	</tr>
	<tr>
		<td><input type="text" name="username" size="40" maxlength="40" /><br /></td>
	</tr>	
	<tr>
		<td align="left" ><font color="#000000"><b>Password</b></font><br /></td>
	</tr>	
<tr>
		<td><input type="password" name="password" size="40" maxlength="40" /><br /></td>
</tr>		
<tr>
		<td><input type="submit" name="submit" value="Intra!" /></td>
</tr>		
	
</form>
</table>
</center>
</body>
</html>
