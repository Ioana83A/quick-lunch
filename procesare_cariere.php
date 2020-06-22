<?php
	//session_start();
	include "db.php";
	//include "utils.php";
?>

<?php
	echo $nume=utf8_encode($_POST['nume']);
	echo $email=$_POST['email'];
	echo $telefon=$_POST['telefon'];
	echo $mesaj=utf8_encode($_POST['mesaj']);
	echo $content_dir = 'cv/'; 

	
	
			
	
	
			$tmp_file1 = $_FILES['cv']['tmp_name'];
   			if( !is_uploaded_file($tmp_file1) )
   			{
				echo '<td width="543" bgcolor="#fffddf" valign="top" align="left">';
                                            
   				exit('<span class="portocaliu_mic">Fisierul nu poate fi gasit</span></td>');
				
   			}
   			$type_file1 = $_FILES['cv']['type'];
  			if( !strstr($type_file1, 'application/msword') && !strstr($type_file1, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') && !strstr($type_file1, 'text/plain') && !strstr($type_file1, 'pdf') )
			{
				echo '<td width="543" bgcolor="#fffddf" valign="top" align="left">';
                                            
   				exit('<span class="portocaliu_mic">Fisierul nu are nici una din extensiile dorite</span></td>');
    		}
			$name_file1 =$nume[0].$telefon[6].$mesaj[1].$_FILES['cv']['name'];
			if( !move_uploaded_file($tmp_file1, $content_dir . $name_file1) )
			{
				echo '<td width="543" bgcolor="#fffddf" valign="top" align="left">';
                                            
   				exit('<span class="portocaliu_mic">Fisierul nu a putut fi copiat. Incercati din nou.</span></td>');
   			}
		
			
			$cv=$name_file1;
	
	$cerere="insert into cv(nume, email, telefon, mesaj, cv) values ('$nume', '$email', '$telefon', '$mesaj','$cv')";
	$rezultat=@mysql_query($cerere) or die(mysql_error());
	echo '<META http-equiv="refresh" content="0;URL=cariere.php">';
?>
											