<?php
	include("templates/template.php");
	include("templates/template2.php");
		
	$nume=utf8_encode($_POST['nume_noutate']);
	$nume = str_replace(chr(13),'<br>',$nume);
	$nume=str_replace('"','***---',$nume);
		
	$text=utf8_encode($_POST['text_noutate']);
	$text = str_replace(chr(13),'<br>',$text);
	$text=str_replace('"','***---',$text);
	
	
		$query1="insert into noutati(nume_noutate, text_noutate) values(\"$nume\",\"$text\")";
		$result1=@mysql_query($query1) or die(mysql_error());

	
	
?>
<br />
	<table bgcolor="#FFFFFF" align="center" width="800">
    <tr>
    	<td align="center" class="text2">
        	Ati adaugat o noutate
            
        </td>
    </tr>
    </table>
</body>
</html>