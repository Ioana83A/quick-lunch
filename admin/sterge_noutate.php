<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$id=$_GET['id'];
	
	$quer="select * from noutati where id=\"$id\"";
	$res=@mysql_query($quer) or die(mysql_error());
	$row=mysql_fetch_array($res);
	
	$nume=$row['nume_noutate'];
	
	$query="delete from noutati where id=\"$id\"";
	$result=@mysql_query($query) or die(mysql_error());	
?>
<br />
	<table bgcolor="#FFFFFF" align="center" width="800">
    <tr>
    	<td align="center" class="text2">
        	Ati sters noutatea <?php echo $nume; ?>
        </td>
    </tr>
    </table>
</body>
</html>