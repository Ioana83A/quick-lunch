<?php
	include("templates/template.php");
	include("templates/template2.php");
	//include("templates/template3.php");
	
	include "db.php";
	
	$nume_reteta=utf8_encode($_POST['nume_reteta']);
	$nume_reteta=str_replace('"','\"',$nume_reteta);
	$nume_reteta=str_replace('a','a',$nume_reteta);
	
	$ingrediente=utf8_encode($_POST['ingrediente']);
	$ingrediente=str_replace('"','\"',$ingrediente);
	$ingrediente=str_replace('a','a',$ingrediente);
	
	$text_reteta=utf8_encode($_POST['text_reteta']);
	$text_reteta=str_replace('"','\"',$text_reteta);
	$text_reteta= str_replace(chr(13),'<br />',$text_reteta);
	$text_reteta=str_replace('a','a',$text_reteta);
	
	$timp_preparare=$_POST['timp_preparare'];
	$dificultate=$_POST['dificultate'];
	$calorii=$_POST['calorii'];
	if (strcmp($calorii,"")==0)
	{
		$calorii=0;
	}
	
	if (strcmp($dificultate,"")==0)
	{
		$dificultate=0;
	}
	
	if (strcmp($timp_preparare,"")==0)
	{
		$timp_preparare=0;
	}
	
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
	
	if ($ok1==1)
	{
		$query="insert into reteta_saptamanii(nume_reteta, ingrediente, text_reteta, timp_preparare, dificultate, calorii,poza_reteta) values ('$nume_reteta', '$ingrediente', '$text_reteta', $timp_preparare, $dificultate, $calorii, '$poza')";	
		$result=@mysql_query($query) or die('1'.mysql_error());
	}
	else
	{
	
		$query="insert into reteta_saptamanii(nume_reteta, ingrediente, text_reteta, timp_preparare, dificultate, calorii) values ('$nume_reteta', '$ingrediente', '$text_reteta', '$timp_preparare', $dificultate, '$calorii')";	
		$result=@mysql_query($query)or die('2'.mysql_error());
	}	
?>
<br />
	<table align="center" width="800" bgcolor="#FFFFFF">
    	
    	<tr>
        	<td colspan="2" align="center" class="text1">
            	Ati adaugat reteta pe saptamana curenta
            </td>
        </tr>
        
    </table>
    <br />
	
</body>
</html>
