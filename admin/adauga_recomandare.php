<?php
	include("templates/template.php");
	include("templates/template2.php");
		
	$nume=utf8_encode($_POST['nume_recomandare']);
	$nume = str_replace(chr(13),'<br>',$nume);
	$nume=str_replace('"','***---',$nume);
		
	$pret=utf8_encode($_POST['pret_recomandare']);	
	
	
		$query1="insert into recomandarile_saptamanii(nume_recomandare, pret_recomandare) values(\"$nume\",\"$pret\")";
		$result1=@mysql_query($query1) or die(mysql_error());

	
	
?>
<br />
	<table bgcolor="#FFFFFF" align="center" width="800">
    <tr>
    	<td align="center" class="text2">
        	Ati adaugat o recomandare a saptamanii
            
        </td>
    </tr>
    </table>
</body>
</html>