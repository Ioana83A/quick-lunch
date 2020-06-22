<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	
	$text_reteta=utf8_encode($_POST['text_reteta']);
	//$text_reteta=str_replace('"','\"',$text_reteta);
	$text_reteta= str_replace(chr(13),'<br />',$text_reteta);
	$nume_reteta=utf8_encode($_POST['nume_reteta']);
	$nume_reteta = str_replace(chr(13),'<br />',$nume_reteta);
	//$nume_reteta=str_replace('"','\"',$nume_reteta);
	
	$ingrediente=utf8_encode($_POST['ingrediente']);
	$ingrediente = str_replace(chr(13),'<br />',$ingrediente);
	//$ingrediente=str_replace('"','\"',$ingrediente);
	
	$timp_preparare=utf8_encode($_POST['timp_preparare']);
	$dificultate=utf8_encode($_POST['dificultate']);
	$calorii=utf8_encode($_POST['calorii']);
	
	$query="select poza_reteta from reteta_saptamanii";
	$result=@mysql_query($query) or die("aici".mysql_error());
	$row=@mysql_fetch_array($result);
	
	$content_dir = '../poze/'; 
	
	$ok1=1;
	
	$poza=$_FILES['poza']['tmp_name'];
	if ($poza==="")
			$ok1--;	
	if($ok1==1)
	{
		@unlink("../poze/".$row['0']);
   		$tmp_file = $_FILES['poza']['tmp_name'];
   		if( !is_uploaded_file($tmp_file) )
   		{
			echo '<td align="center" class="text2">';
   			exit("Fisierul nu poate fi gasit1");
			echo '</td>';
   		}
   		$type_file = $_FILES['poza']['type'];
  		if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
		{
			echo '<td align="center" class="text2">';
    	   	exit("Fisierul nu e o imagine");
			echo '</td>';
    	}
		$name_file = 'rete_sapt_'.$_FILES['poza']['name'];
		if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
		{
			echo '<td align="center" class="text2">';
     		exit("Nu se poate copia fisierul in $content_dir");
			echo '</td>';
   		}
		
			
		$poza=$name_file;
	}	
	$id=$_POST['id'];
	if ($ok1==1)
	{
		$query1="update reteta_saptamanii set poza_reteta=\"$poza\" where id=$id";
		$result1=@mysql_query($query1) or die(mysql_error());
	}

	$query2="update reteta_saptamanii set text_reteta=\"$text_reteta\", ingrediente=\"$ingrediente\" where id=$id";
	$result2=@mysql_query($query2) or die(mysql_error());
		
	$query3="update reteta_saptamanii set nume_reteta=\"$nume_reteta\" where id=$id";
	$result3=@mysql_query($query3) or die(mysql_error());	
	
	$query4="update reteta_saptamanii set timp_preparare=\"$timp_preparare\", calorii=\"$calorii\" where id=$id";
	$result4=@mysql_query($query4) or die(mysql_error());	
	
	if (strcmp($dificultate,"")!=0)
	{
		$query5="update reteta_saptamanii set dificultate=\"$dificultate\" where id=$id";
	$result5=@mysql_query($query5) or die(mysql_error());	
	}
?>
<br />
	<table bgcolor="#FFFFFF" align="center" width="800">
    <tr>
    	<td align="center" class="text2">
        	Ati modificat reteta saptamanii
        </td>
    </tr>
    </table>
</body>
</html>