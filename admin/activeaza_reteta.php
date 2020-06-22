<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$id=$_POST['id_reteta'];
	
	$quer="update reteta_saptamanii set activ=0";
	$res=@mysql_query($quer) or die(mysql_error());
	//$row=mysql_fetch_array($res);
	
	//$nume=$row['nume_reteta'];
		
	$query="update reteta_saptamanii set activ=1 where id=\"$id\"";
	$result=@mysql_query($query) or die(mysql_error());	
?>
<br />
	<table bgcolor="#FFFFFF" align="center" width="800">
    <tr>
    	<td align="center" class="text2">
        	Ati selectat reteta <?php echo $nume; ?> ca fiind reteta saptamanii
        </td>
    </tr>
    </table>
</body>
</html>