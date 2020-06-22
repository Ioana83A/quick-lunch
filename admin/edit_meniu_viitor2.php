<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	
	$tip=$_POST['tip'];
	$zi=$_POST['zi'];
	$nume=$_POST['nume'];
	$nume=str_replace("'",'*-',$nume);
	$pret=$_POST['pret'];
	$type=$_POST['type'];
	if ($type)
	{
		foreach ($type as $t)
		{
			
			if (strcmp($t,"vegetarian")==0)
			{
				$type2="vegetarian";
			}
			if (strcmp($t,"fitness")==0)
			{
				$type3="fitness";
			}
			if (strcmp($t,"recomandare")==0)
			{
				$type1="recomandare";
			}
			if (strcmp($t,"nou")==0)
			{
				$type4="nou";
			}
			if (strcmp($t,"buc")==0)
			{
				$type5="buc";
			}
		}
	}
	
	if (strcmp($type1,"recomandare")==0)
	{
		$query="update meniu_viitor2 set recomanda=1 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('1'.mysql_error());
	}
	else
	{
		$query="update meniu_viitor2 set recomanda=0 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('11'.mysql_error());
	}
	
	if (strcmp($type2,"vegetarian")==0)
	{
		$query="update meniu_viitor2 set lacto_vegetarian=1 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('2'.mysql_error());
	}
	else
	{
		$query="update meniu_viitor2 set lacto_vegetarian=0 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('22'.mysql_error());
	}
	
	if (strcmp($type3,"fitness")==0)
	{
		$query="update meniu_viitor2 set fitness=1 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('3'.mysql_error());
	}
	else
	{
		$query="update meniu_viitor2 set fitness=0 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('33'.mysql_error());
	}
	
	if (strcmp($type4,"nou")==0)
	{
		$query="update meniu_viitor2 set nou=1 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('3'.mysql_error());
	}
	else
	{
		$query="update meniu_viitor2 set nou=0 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('33'.mysql_error());
	}
	if (strcmp($type5,"buc")==0)
	{
		$query="update meniu_viitor2 set buc=1 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die(mysql_error());
	}
	else
	{
		$query="update meniu_viitor2 set buc=0 where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die(mysql_error());
	}
	
	
		$query="update meniu_viitor2 set pret=$pret where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('4'.mysql_error());
	
		$query="update meniu_viitor2 set nume='$nume' where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die('5'.mysql_error());
		
		
		$content_dir = '../poze/'; 
		
		$ok1=1;
		
		$poza=$_FILES['poza']['tmp_name'];
		if ($poza==="")
			$ok1--;	
		if($ok1==1)
		{
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
			$name_file = rand(1,1000).$_FILES['poza']['name'];
			if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
		
			
			$poza=$name_file;
			
			$query="update meniu_viitor2 set poza='$poza' where ziua=\"$zi\" and tip=\"$tip\"";
			$result=@mysql_query($query) or die('6'.mysql_error());
		}
		
		
?>
<table align="center" width="800" bgcolor="#ecf3d4">
    	
        <tr>
        	<td align="center" class="text2">
            	Modificare reusita!<br />
                <a href="tip_menu2.php?zi=<?php echo $zi; ?>"><i>Adauga alt tip de meniu pe saptamana viitoare pe ziua de <?php echo $zi; ?></i></a>
            </td>
        </tr>
         
        
</table>
<br />
	
</body>
</html>
