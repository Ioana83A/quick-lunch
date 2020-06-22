<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	include("db.php");
	$sapt=date('W')+0;
	$query="select * from pdf where tip='pdf_curent'";
	$result=@mysql_query($query) or die(mysql_error());
	$row=@mysql_fetch_array($result);
	
	$content_dir = '../pdf/'; 
	
	$ok1=1;
	
	$pdf_curent=$_FILES['pdf_curent']['tmp_name'];
	if ($pdf_curent==="")
			$ok1--;	
	if($ok1==1)
	{
		@unlink("../pdf/".'sapt__'.$sapt.'.pdf');
   		$tmp_file = $_FILES['pdf_curent']['tmp_name'];
   		if( !is_uploaded_file($tmp_file) )
   		{
			echo '<td align="center" class="text2">';
   			exit("Fisierul nu poate fi gasit1");
			echo '</td>';
   		}
   		
		$name_file = 'sapt__'.$sapt.'.pdf';
		if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
		{
			echo '<td align="center" class="text2">';
     		exit("Nu se poate copia fisierul in $content_dir");
			echo '</td>';
   		}
		
			
		$pdf_curent=$name_file;
	}	
	
	if ($ok1==1)
	{
		$query1="update pdf set nume=\"$pdf_curent\" where tip='pdf_curent'";
		$result1=@mysql_query($query1) or die(mysql_error());
	}
	
	$query="select * from pdf where tip='pdf_viitor'";
	$result=@mysql_query($query) or die(mysql_error());
	$row1=@mysql_fetch_array($result);
	
	$ok2=1;
	$content_dir = '../pdf/'; 
	$pdf_viitor=$_FILES['pdf_viitor']['tmp_name'];
	if ($pdf_viitor=="")
			$ok2--;	
	if($ok2==1)
	{
			$sapt1=$sapt+1;
			@unlink("../pdf/".'sapt__'.$sapt1.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_viitor']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_viitor ='sapt__'.$sapt1.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_viitor) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
			$query4="update pdf set nume=\"$pdf_viitor\" where tip=\"pdf_viitor\"";
			$result4=@mysql_query($query4) or die(mysql_error());
			
	}
	
	
	$query="select * from pdf where tip='pdf_viitor2'";
	$result=@mysql_query($query) or die(mysql_error());
	$row2=@mysql_fetch_array($result);
		
	$ok3=1;
		
	$content_dir = '../pdf/'; 
	$pdf_viitor2=$_FILES['pdf_viitor2']['tmp_name'];
	if ($pdf_viitor2=="")
			$ok3--;	
	if($ok3==1)
	{
			$sapt2=$sapt+2;
			@unlink("../pdf/".'sapt__'.$sapt2.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_viitor2']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_viitor2 ='sapt__'.$sapt2.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_viitor2) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
			$query4="update pdf set nume=\"$pdf_viitor2\" where tip=\"pdf_viitor2\"";
			$result4=@mysql_query($query4) or die(mysql_error());
			
	}
	
	
		
	$ok4=1;
			
	$content_dir = '../pdf/'; 
	$pdf_viitor3=$_FILES['pdf_viitor3']['tmp_name'];
	if ($pdf_viitor3=="")
			$ok4--;	
	if($ok4==1)
	{
	
	
			
					$now = time();
					$time_azi = strtotime("+8 hours",$now);
					$time_next3 = strtotime("+3 week",$time_azi); 
					$sapt3=date('W', $time_next3);
				
			@unlink("../pdf/".'sapt__'.$sapt3.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_viitor3']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_viitor3 ='sapt__'.$sapt3.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_viitor3) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}					
	}
	
	
	$ok5=1;
			
	$content_dir = '../pdf/'; 
	$pdf_viitor3=$_FILES['pdf_viitor4']['tmp_name'];
	if ($pdf_viitor4=="")
			$ok5--;	
	if($ok5==1)
	{
	
	
			
					$now = time();
					$time_azi = strtotime("+8 hours",$now);
					$time_next4 = strtotime("+4 week",$time_azi); 
					$sapt4=date('W', $time_next4);
				
			@unlink("../pdf/".'sapt__'.$sapt4.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_viitor4']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_viitor4 ='sapt__'.$sapt4.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_viitor4) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}					
	}
	
	
	$ok6=1;
			
	$content_dir = '../pdf/'; 
	$pdf_viitor5=$_FILES['pdf_viitor5']['tmp_name'];
	if ($pdf_viitor5=="")
			$ok6--;	
	if($ok6==1)
	{
	
	
			
					$now = time();
					$time_azi = strtotime("+8 hours",$now);
					$time_next5 = strtotime("+5 week",$time_azi); 
					$sapt5=date('W', $time_next5);
				
			@unlink("../pdf/".'sapt__'.$sapt5.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_viitor5']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_viitor5 ='sapt__'.$sapt5.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_viitor5) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}					
	}
	// ----------------pdf copii------
	
	
	$sapt=date('W')+0;
	
	
	$content_dir = '../pdf_copii/'; 
	
	$ok1=1;
	
	$pdf_copii_curent=$_FILES['pdf_copii_curent']['tmp_name'];
	if ($pdf_copii_curent=="")
			$ok1--;	
	if($ok1==1)
	{
		@unlink("../pdf_copii/".'sapt__'.$sapt.'.pdf');
   		$tmp_file = $_FILES['pdf_copii_curent']['tmp_name'];
   		if( !is_uploaded_file($tmp_file) )
   		{
			echo '<td align="center" class="text2">';
   			exit("Fisierul nu poate fi gasit1");
			echo '</td>';
   		}
   		
		$name_file = 'sapt__'.$sapt.'.pdf';
		if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
		{
			echo '<td align="center" class="text2">';
     		exit("Nu se poate copia fisierul in $content_dir");
			echo '</td>';
   		}
		
			
		
	}	
	
	
	
	$ok2=1;
	$content_dir = '../pdf_copii/'; 
	$pdf_copii_viitor=$_FILES['pdf_copii_viitor']['tmp_name'];
	if ($pdf_copii_viitor=="")
			$ok2--;	
	if($ok2==1)
	{
			$sapt1=$sapt+1;
			@unlink("../pdf_copii/".'sapt__'.$sapt1.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_copii_viitor']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			$pdf_copii_viitor ='sapt__'.$sapt1.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_copii_viitor) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
			
			
	}
	
	
	
		
	$ok3=1;
		
	$content_dir = '../pdf_copii/'; 
	$pdf_copii_viitor2=$_FILES['pdf_copii_viitor2']['tmp_name'];
	if ($pdf_copii_viitor2=="")
			$ok3--;	
	if($ok3==1)
	{
			$sapt2=$sapt+2;
			@unlink("../pdf_copii/".'sapt__'.$sapt2.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_copii_viitor2']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_copii_viitor2 ='sapt__'.$sapt2.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_copii_viitor2) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
	}
	
	
	
	$ok4=1;
		
	$content_dir = '../pdf_copii/'; 
	$pdf_copii_viitor3=$_FILES['pdf_copii_viitor3']['tmp_name'];
	if ($pdf_copii_viitor3=="")
			$ok4--;	
	if($ok4==1)
	{
					$now = time();
					$time_azi = strtotime("+8 hours",$now);
					$time_next3 = strtotime("+3 week",$time_azi); 
					$sapt3=date('W', $time_next3);
			@unlink("../pdf_copii/".'sapt__'.$sapt3.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_copii_viitor3']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_copii_viitor3 ='sapt__'.$sapt3.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_copii_viitor3) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
	}
	
	
	
	
	$ok5=1;
		
	$content_dir = '../pdf_copii/'; 
	$pdf_copii_viitor4=$_FILES['pdf_copii_viitor4']['tmp_name'];
	if ($pdf_copii_viitor4=="")
			$ok5--;	
	if($ok5==1)
	{
					$now = time();
					$time_azi = strtotime("+8 hours",$now);
					$time_next4 = strtotime("+4 week",$time_azi); 
					$sapt4=date('W', $time_next4);
			@unlink("../pdf_copii/".'sapt__'.$sapt4.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_copii_viitor4']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_copii_viitor4 ='sapt__'.$sapt4.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_copii_viitor4) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
	}
	
	$ok6=1;
		
	$content_dir = '../pdf_copii/'; 
	$pdf_copii_viitor5=$_FILES['pdf_copii_viitor5']['tmp_name'];
	if ($pdf_copii_viitor5=="")
			$ok6--;	
	if($ok6==1)
	{
					$now = time();
					$time_azi = strtotime("+8 hours",$now);
					$time_next5 = strtotime("+5 week",$time_azi); 
					$sapt5=date('W', $time_next5);
			@unlink("../pdf_copii/".'sapt__'.$sapt5.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_copii_viitor5']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_copii_viitor5 ='sapt__'.$sapt5.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_copii_viitor5) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
	}
	// ----------------pdf gradinite------
	
	
	$sapt=date('W')+0;
	
	
	$content_dir = '../pdf_gradinite/'; 
	
	$ok1=1;
	
	$pdf_gradinite_curent=$_FILES['pdf_gradinite_curent']['tmp_name'];
	if ($pdf_gradinite_curent=="")
			$ok1--;	
	if($ok1==1)
	{
		@unlink("../pdf_gradinite/".'sapt__'.$sapt.'.pdf');
   		$tmp_file = $_FILES['pdf_gradinite_curent']['tmp_name'];
   		if( !is_uploaded_file($tmp_file) )
   		{
			echo '<td align="center" class="text2">';
   			exit("Fisierul nu poate fi gasit1");
			echo '</td>';
   		}
   		
		$name_file = 'sapt__'.$sapt.'.pdf';
		if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
		{
			echo '<td align="center" class="text2">';
     		exit("Nu se poate copia fisierul in $content_dir");
			echo '</td>';
   		}
		
			
		
	}	
	
	
	
	$ok2=1;
	$content_dir = '../pdf_gradinite/'; 
	$pdf_gradinite_viitor=$_FILES['pdf_gradinite_viitor']['tmp_name'];
	if ($pdf_gradinite_viitor=="")
			$ok2--;	
	if($ok2==1)
	{
			$sapt1=$sapt+1;
			@unlink("../pdf_gradinite/".'sapt__'.$sapt1.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_gradinite_viitor']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			$pdf_gradinite_viitor ='sapt__'.$sapt1.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_gradinite_viitor) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
			
			
	}
	
	
	
		
	$ok3=1;
		
	$content_dir = '../pdf_gradinite/'; 
	$pdf_gradinite_viitor2=$_FILES['pdf_gradinite_viitor2']['tmp_name'];
	if ($pdf_gradinite_viitor2=="")
			$ok3--;	
	if($ok3==1)
	{
			$sapt2=$sapt+2;
			@unlink("../pdf_gradinite/".'sapt__'.$sapt2.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_gradinite_viitor2']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_gradinite_viitor2 ='sapt__'.$sapt2.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_gradinite_viitor2) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
	}
	
	
	
	$ok4=1;
		
	$content_dir = '../pdf_gradinite/'; 
	$pdf_gradinite_viitor3=$_FILES['pdf_gradinite_viitor3']['tmp_name'];
	if ($pdf_gradinite_viitor3=="")
			$ok4--;	
	if($ok4==1)
	{
					$now = time();
					$time_azi = strtotime("+8 hours",$now);
					$time_next3 = strtotime("+3 week",$time_azi); 
					$sapt3=date('W', $time_next3);
			@unlink("../pdf_gradinite/".'sapt__'.$sapt3.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_gradinite_viitor3']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_gradinite_viitor3 ='sapt__'.$sapt3.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_gradinite_viitor3) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
	}
	
	
	
	
	$ok5=1;
		
	$content_dir = '../pdf_gradinite/'; 
	$pdf_gradinite_viitor4=$_FILES['pdf_gradinite_viitor4']['tmp_name'];
	if ($pdf_gradinite_viitor4=="")
			$ok5--;	
	if($ok5==1)
	{
					$now = time();
					$time_azi = strtotime("+8 hours",$now);
					$time_next4 = strtotime("+4 week",$time_azi); 
					$sapt4=date('W', $time_next4);
			@unlink("../pdf_gradinite/".'sapt__'.$sapt4.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_gradinite_viitor4']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_gradinite_viitor4 ='sapt__'.$sapt4.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_gradinite_viitor4) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
	}
	
	$ok6=1;
		
	$content_dir = '../pdf_gradinite/'; 
	$pdf_gradinite_viitor5=$_FILES['pdf_gradinite_viitor5']['tmp_name'];
	if ($pdf_gradinite_viitor5=="")
			$ok6--;	
	if($ok6==1)
	{
					$now = time();
					$time_azi = strtotime("+8 hours",$now);
					$time_next5 = strtotime("+5 week",$time_azi); 
					$sapt5=date('W', $time_next5);
			@unlink("../pdf_gradinite/".'sapt__'.$sapt5.'.pdf');
   		
		
			$tmp_file = $_FILES['pdf_gradinite_viitor5']['tmp_name'];
   			if( !is_uploaded_file($tmp_file) )
   			{
				echo '<td align="center" class="text2">';
   				exit("Fisierul nu poate fi gasit");
				echo '</td>';
   			}
   			
			
			$pdf_gradinite_viitor5 ='sapt__'.$sapt5.'.pdf';
			if( !move_uploaded_file($tmp_file, $content_dir . $pdf_gradinite_viitor5) )
			{
				echo '<td align="center" class="text2">';
     			exit("Nu se poate copia fisierul in $content_dir");
				echo '</td>';
   			}
			
	}
	
	
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