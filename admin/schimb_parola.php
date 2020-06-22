<?php
	include("templates/template.php");
		
		include("db.php");
		$password=$_POST['password'];
		$password1=$_POST['password1'];
		$pass1=md5($password1);
		$pass=md5($password);
		$user=$_SESSION['username'];
		$query="select * from admin where password=\"$pass\" and username='$user'";
		$result=@mysql_query($query) or die(mysql_error());
		$num=mysql_num_rows($result);
		if ($num==0)
		{
			echo '<META HTTP-EQUIV="Refresh"    CONTENT="0; URL=register.php?action=1">';
			exit();
		}
		else
		{
			$cerere="update admin set password=\"$pass1\" where username='$user'";
			$rezultat=@mysql_query($cerere) or die(mysql_error());
			//echo 'Parola schimbata!';
			//echo '<META HTTP-EQUIV="Refresh"    CONTENT="0; URL=index.php">';
			//exit();
		}
	?>
    <br />
<table align="center" bgcolor="#FFFFFF" width="800">
	<tr>
    	<td align="center" class="titlu">
        	Parola a fost schimbata!
        </td>
    </tr>
</table>
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

