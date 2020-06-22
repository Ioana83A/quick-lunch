<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$id=$_POST['id'];
	$text=utf8_encode($_POST['text_noutate']);
	$text = str_replace(chr(13),'<br>',$text);
	$text=str_replace('"','***---',$text);
	$nume_noutate=utf8_encode($_POST['nume_noutate']);
	$nume_noutate = str_replace(chr(13),'<br />',$nume_noutate);
	$nume_noutate=str_replace('"','***---',$nume_noutate);
	
	$query2="update noutati set text_noutate=\"$text\" where id=$id";
	$result2=@mysql_query($query2) or die('1'.mysql_error());
		
	$query3="update noutati set nume_noutate=\"$nume_noutate\" where id=$id";
	$result3=@mysql_query($query3) or die('2'.mysql_error());	
	
	
?>
<br />
	<table bgcolor="#FFFFFF" align="center" width="800">
    <tr>
    	<td align="center" class="text2">
        	Ati modificat o noutate
        </td>
    </tr>
    </table>
</body>
</html>