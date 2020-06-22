<?php	
	include("templates/template.php");
	include("templates/template2.php");
	
	
	$zi=$_GET['zi'];
	$tip=$_GET['tip'];
	
	$query1="select * from meniu_viitor where ziua=\"$zi\" and tip=\"$tip\"";
	$result1=@mysql_query($query1) or die(mysql_error());
	$row=mysql_fetch_array($result1);
	
	@unlink('../poze/'.$row['poza']);
	
	
	$query="update meniu_viitor set poza='' where ziua=\"$zi\" and tip=\"$tip\"";
	$result=@mysql_query($query) or die(mysql_error());
	
	
?>
<br />
<table align="center" bgcolor="#FFFFFF" width="800">
	<tr>
    	<td align="center" class="text2">
        	Ati sters poza!
        </td>
    </tr>
</table>

</body>
</html>