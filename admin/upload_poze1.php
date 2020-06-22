<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	include("db.php");
	
	$descriere_1=$_POST['descriere_1'];
	$descriere_2=$_POST['descriere_2'];
	$descriere_3=$_POST['descriere_3'];
	$descriere_4=$_POST['descriere_4'];
	$descriere_5=$_POST['descriere_5'];
	$content_dir = '../poze_rulare/';
			$poza1="";
			$poza2="";
			$poza3="";
			$poza4="";
			$poza5="";
			$timestamp = time();
    //POZA1
	 		$tmp_file1 = $_FILES['pic_mont_1']['tmp_name'];
			if($tmp_file1)
			{
					if( !is_uploaded_file($tmp_file1) )
					{
						echo '<td align="center" class="text2">';
						exit("Fisierul nu poate fi gasit1");
						echo '</td>';
						
						
					}
					
					$type_file1 = $_FILES['pic_mont_1']['type'];
					if( !strstr($type_file1, 'image/gif') && !strstr($type_file1, 'image/jpeg') && !strstr($type_file1, 'image/png') && !strstr($type_file1, 'image/pjpeg') )
					{
						echo '<td align="center" class="text2">';
						exit("Extensia nu este buna");
						echo '</td>';
						
						
					}
					$size_file1 = $_FILES['pic_mont_1']['size'];
					if( $size_file1> 512000)
					{
						echo '<td align="center" class="text2">';
						exit("Fisierul este prea mare");
						echo '</td>';
					}
					$name_file1 = $timestamp.$_FILES['pic_mont_1']['name'];
					if( !move_uploaded_file($tmp_file1, $content_dir . $name_file1) )
					{
						echo '<td align="center" class="text2">Fisierul nu a putu fi uploadat. Incearca din nou</td>';
						
					}
					else
					{
						$poza1="poze_rulare/".$name_file1;
					}
			}
			
			
	//POZA2
	$tmp_file2 = $_FILES['pic_mont_2']['tmp_name'];
	if($tmp_file2)
			{
			
   			if( !is_uploaded_file($tmp_file2) )
   			{
				echo '<td align="center" class="text2">';
						exit("Fisierul nu poate fi gasit1");
						echo '</td>';
						
				
   			}
   			$type_file2 = $_FILES['pic_mont_2']['type'];
  			if( !strstr($type_file2, 'image/gif') && !strstr($type_file2, 'image/jpeg') && !strstr($type_file2, 'image/png') && !strstr($type_file2, 'image/pjpeg') )
			{
				echo '<td align="center" class="text2">';
						exit("Extensia nu este buna");
						echo '</td>';
						
    		}
			$size_file2 = $_FILES['pic_mont_2']['size'];
  			if( $size_file2> 512000)
			{
					echo '<td align="center" class="text2">';
						exit("Fisierul este prea mare");
						echo '</td>';
    		}
			$name_file2 = $timestamp.$_FILES['pic_mont_2']['name'];
			if( !move_uploaded_file($tmp_file2, $content_dir . $name_file2) )
			{
				echo '<td align="center" class="text2">Fisierul nu a putu fi uploadat. Incearca din nou</td>';
   			}
			else
			{
				$poza2="poze_rulare/".$name_file2;
			}
		}
	//POZA3
	$tmp_file3 = $_FILES['pic_mont_3']['tmp_name'];
	if($tmp_file3)
			{
			
   			if( !is_uploaded_file($tmp_file3) )
   			{
				echo '<td align="center" class="text2">';
						exit("Fisierul nu poate fi gasit1");
						echo '</td>';
						
				
   			}
   			$type_file3 = $_FILES['pic_mont_3']['type'];
  			if( !strstr($type_file3, 'image/gif') && !strstr($type_file3, 'image/jpeg') && !strstr($type_file3, 'image/png') && !strstr($type_file3, 'image/pjpeg') )
			{
				echo '<td align="center" class="text2">';
						exit("Extensia nu este buna");
						echo '</td>';
						
    		}
			$size_file3 = $_FILES['pic_mont_3']['size'];
  			if( $size_file3> 512000)
			{
				echo '<td align="center" class="text2">';
						exit("Fisierul este prea mare");
						echo '</td>';
    		}
			$name_file3 = $timestamp.$_FILES['pic_mont_3']['name'];
			if( !move_uploaded_file($tmp_file3, $content_dir . $name_file3) )
			{
				echo '<td align="center" class="text2">Fisierul nu a putu fi uploadat. Incearca din nou</td>';
   			}
			else
			{
				$poza3="poze_rulare/".$name_file3;
			}
		}
	//POZA4
	$tmp_file4 = $_FILES['pic_mont_4']['tmp_name'];
	if($tmp_file4)
			{
			
   			if( !is_uploaded_file($tmp_file4) )
   			{
				echo '<td align="center" class="text2">';
						exit("Fisierul nu poate fi gasit1");
						echo '</td>';
						
				
   			}
   			$type_file4 = $_FILES['pic_mont_4']['type'];
  			if( !strstr($type_file4, 'image/gif') && !strstr($type_file4, 'image/jpeg') && !strstr($type_file4, 'image/png') && !strstr($type_file4, 'image/pjpeg') )
			{
				echo '<td align="center" class="text2">';
						exit("Extensia nu este buna");
						echo '</td>';
						
    		}
			$size_file4 = $_FILES['pic_mont_4']['size'];
  			if( $size_file4> 512000)
			{
				echo '<td align="center" class="text2">';
						exit("Fisierul este prea mare");
						echo '</td>';
    		}
			$name_file4 = $timestamp.$_FILES['pic_mont_4']['name'];
			if( !move_uploaded_file($tmp_file4, $content_dir . $name_file4) )
			{
				echo '<td align="center" class="text2">Fisierul nu a putu fi uploadat. Incearca din nou</td>';
   			}
			else
			{
				$poza4="poze_rulare/".$name_file4;
			}
		}
		//POZA5
	$tmp_file5 = $_FILES['pic_mont_5']['tmp_name'];
	if($tmp_file5)
			{
			
   			if( !is_uploaded_file($tmp_file5) )
   			{
				echo '<td align="center" class="text2">';
						exit("Fisierul nu poate fi gasit1");
						echo '</td>';
						
				
   			}
   			$type_file5 = $_FILES['pic_mont_5']['type'];
  			if( !strstr($type_file5, 'image/gif') && !strstr($type_file5, 'image/jpeg') && !strstr($type_file5, 'image/png') && !strstr($type_file5, 'image/pjpeg') )
			{
				echo '<td align="center" class="text2">';
						exit("Extensia nu este buna");
						echo '</td>';
						
    		}
			$size_file5 = $_FILES['pic_mont_5']['size'];
  			if( $size_file5> 512000)
			{
				echo '<td align="center" class="text2">';
						exit("Fisierul este prea mare");
						echo '</td>';
						
    		}
			$name_file5 = $timestamp.$_FILES['pic_mont_5']['name'];
			if( !move_uploaded_file($tmp_file5, $content_dir . $name_file5) )
			{
				echo '<td align="center" class="text2">Fisierul nu a putu fi uploadat. Incearca din nou</td>';
   			}
			else
			{
				$poza5="poze_rulare/".$name_file5;
			}
		}
	
	
	
	$query_update = "UPDATE `poze_prima_pag` SET `poza`='';";
     $result_update = mysql_query($query_update);
	 
	 $query_update1 = "UPDATE `poze_prima_pag` SET `poza`='$poza1',`descriere`='$descriere_1' WHERE `id`='1';";
     $result_update1 = mysql_query($query_update1);
	 
	 $query_update2 = "UPDATE `poze_prima_pag` SET `poza`='$poza2',`descriere`='$descriere_2' WHERE `id`='2';";
     $result_update2 = mysql_query($query_update2);
	 
	 $query_update3 = "UPDATE `poze_prima_pag` SET `poza`='$poza3',`descriere`='$descriere_3' WHERE `id`='3';";
     $result_update3 = mysql_query($query_update3);
	 
	 $query_update4 = "UPDATE `poze_prima_pag` SET `poza`='$poza4',`descriere`='$descriere_4' WHERE `id`='4';";
     $result_update4 = mysql_query($query_update4);
	 
	 $query_update5 = "UPDATE `poze_prima_pag` SET `poza`='$poza5',`descriere`='$descriere_5' WHERE `id`='5';";
     $result_update5 = mysql_query($query_update5);
	
	
?>
<br />
	<table bgcolor="#FFFFFF" align="center" width="800">
    <tr>
    	<td align="center" class="text2">
        	Operatie reusita!
        </td>
    </tr>
    </table>
</body>
</html>