<?php
	include("db.php");
	ignore_user_abort(TRUE);
	ini_set('max_execution_time',1200);

	require 'classes/class.phpmailer.php';

	//if ((date('D')=='Thu') or(date('D')=='Fri'))
	{ 

?>




<?php




	$sql_poze="SELECT * from `poze_prima_pag` ORDER BY `id` ";
	$result_poze=mysql_query($sql_poze) or die (mysql_error());
	$farfurii="";
	$poze="";
	while($row_poze=mysql_fetch_assoc($result_poze))
	{
		if($row_poze["poza"]!=NULL || $row_poze["poza"]!="")
		{
				if($poze==NULL || $poze=="")
				{
					$farfurii='
					<table border="0" cellpadding="0" cellspacing="0" align="center" style="width:558px;height:367px;background:url(http://www.quick-lunch.ro/admin/images/back_farfurie1.jpg) no-repeat;">
					 
						<tr style="width:558px;height:367px;">
						  <td style="width:20px;text-align:left;"></td>
						  <td style="width:382px;text-align:left;min-height:368px;" align="left" class="crop">
							<a href="http://www.quick-lunch.ro/meniu_curent2.php"><img src="http://www.quick-lunch.ro/'.$row_poze["poza"].'"	title="'.$row_poze["descriere"].'" alt="'.$row_poze["descriere"].'" /></a>
						  
						  </td>
						  <td style="padding:180px 11px 0px 0px;width:200px;text-align:left;min-height:368px;" valign="top" align="left">
							<span  class="galben_mic" style="font-family:Georgia, "Times New Roman", Times, serif;font-size:11px;color:#fffddf;font-style:normal;font-weight:normal;line-height:14px;text-decoration:none;letter-spacing:0px;">'.$row_poze["descriere"].'</span>

						  </td>
						  <td style="width:10px;text-align:left;"></td>



					</tr>
					</table>';
					$poze='"'.$row_poze["poza"].'"';
				}
				else
				{
					$farfurii.='
					<table border="0" cellpadding="0" cellspacing="0" align="center" style="width:558px;height:367px;background:url(http://www.quick-lunch.ro/admin/images/back_farfurie1.jpg) no-repeat;">
					 
						<tr style="width:558px;height:367px;">
						  <td style="width:20px;text-align:left;"></td>
						  
						  <td style="width:382px;text-align:left;min-height:368px;" align="left" class="crop">
							<a href="http://www.quick-lunch.ro/meniu_curent2.php"><img src="http://www.quick-lunch.ro/'.$row_poze["poza"].'"	title="'.$row_poze["descriere"].'" alt="'.$row_poze["descriere"].'" /></a>
						  
						  </td>
						  <td style="padding:180px 11px 0px 0px;width:200px;text-align:left;min-height:368px;" valign="top" align="left">
							   <span class="galben_mic" style="font-family:Georgia, "Times New Roman", Times, serif;font-size:11px;color:#fffddf;font-style:normal;font-weight:normal;line-height:14px;text-decoration:none;letter-spacing:0px;">'.$row_poze["descriere"].'</span>

						  </td>
						  <td style="width:10px;text-align:left;"></td>




					</tr>
					</table>';
					$poze=$poze.',"'.$row_poze["poza"].'"';
				}
		}
	}

           

			$mail = new PHPMailer(true); //New instance, with exceptions enabled
            $mail->CharSet = 'UTF-8';
			$body             = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Newsletter Quick-Lunch</title>

<style>



a:hover{text-decoration:none}

.verde{

font-family:Georgia, "Times New Roman", Times, serif;

font-size:18px;

color:#8bb903; 

font-style:normal;

font-weight:normal;

line-height:30px; 

text-decoration:none;

letter-spacing:0px;

}





.gri{

font-family:Georgia, "Times New Roman", Times, serif;

font-size:14px;

color:#808284; 

font-style:normal;

font-weight:normal;

line-height:22px; 

text-decoration:none;

letter-spacing:0px;

}
.verde{

font-family:Georgia, "Times New Roman", Times, serif;

font-size:16px;

color:#8bb903; 

font-style:normal;

font-weight:bold;

line-height:20px; 

text-decoration:none;

letter-spacing:0px;

}



.gri_mic{

font-family:Georgia, "Times New Roman", Times, serif;

font-size:11px;

color:#808284; 

font-style:normal;

font-weight:normal;

line-height:15px; 

text-decoration:none;

letter-spacing:0px;

}


.galben_mic{

font-family:Georgia, "Times New Roman", Times, serif;

font-size:11px;

color:#fffddf; 

font-style:normal;

font-weight:normal;

line-height:14px; 

text-decoration:none;

letter-spacing:0px;

}

.vrede_mic{

font-family:Georgia, "Times New Roman", Times, serif;

font-size:11px;

color:#8bb903; 

font-style:normal;

font-weight:normal;

line-height:15px; 

text-decoration:none;

letter-spacing:0px;

}



.gri_micutz{

font-family:Georgia, "Times New Roman", Times, serif;

font-size:8px;

color:#808284; 

font-style:normal;

font-weight:normal;

line-height:15px; 

text-decoration:none;

letter-spacing:2px;

}



.portocaliu{

font-family:Georgia, "Times New Roman", Times, serif;

font-size:12px;

color:#f7941d; 

font-style:normal;

font-weight:normal;

line-height:15px; 

text-decoration:none;

letter-spacing:0px;

}
.crop { width: 382px; height: 368px; overflow: hidden; }
.crop img { width: 382px; height: 266px; margin: -30px -96px 0 -20px; }


</style>

</head>



<body bgcolor="#ffffff" >



	<table width="558" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">

    	<tr style="width:558px;min-height:127px;">

        	<td valign="top" align="center" colspan="3">
            

            	<img src="http://www.quick-lunch.ro/admin/images/banner_news_new.jpg" width="558" height="127" border="0" align="center" />

            </td>

    	</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" align="center" style="width:558px;background:url(http://www.quick-lunch.ro/admin/images/back_table.jpg) repeat-y;">
 		<tr style="width:558px;min-height:300px;">
      		  <td style="width:20px;text-align:left;"></td>
              <td style="width:529px;padding:42px 20px 20px 20px;text-align:left;min-height:100px;" align="left" >
              		<span class="verde" style="font-family:Georgia, "Times New Roman", Times, serif;font-size:16px;color:#8bb903;font-style:normal;font-weight:bold;line-height:20px;text-decoration:none;letter-spacing:0px;">Nu uitati de comenzile pe saptamana viitoare!</span><br /><br />
                    <span class="gri" style="font-family:Georgia, "Times New Roman", Times, serif;font-size:14px;color:#808284;font-style:normal;font-weight:normal;line-height:22px;text-decoration:none;letter-spacing:0px;">	Astazi este vineri si vrem sa va reamintim sa nu uitati sa ne trimiteti comenzile dvs. pentru saptamana viitoare. Suntem aici pentru a le inregistra.

                            <br /><br />

                            O zi placuta!<br />

                            <i>Echipa <a href="http://www.quick-lunch.ro/meniu_curent2.php" style="color:#500050;text-decoration:none"> Quick-Lunch</a></i></span><br /><br /><br /><br />
                            
                            
                            <span class="verde" style="font-family:Georgia, "Times New Roman", Times, serif;font-size:16px;color:#8bb903;font-style:normal;font-weight:bold;line-height:20px;text-decoration:none;letter-spacing:0px;">Pentru saptamana urmatoare va recomandam:</span><br />
                             <span class="gri_mic" style="font-family:Georgia, "Times New Roman", Times, serif;font-size:11px;color:#808284;font-style:normal;font-weight:normal;line-height:15px;text-decoration:none;letter-spacing:0px;">(pozele sunt cu titlu de prezentare.)</span>
              
              </td>
              <td style="width:10px;text-align:left;"></td>
            

        

    	</tr>
        </table>
        
		<!--     ============== farfurii ========== -->
        
       '.$farfurii.'
        
        <!-- ====================end farfurii ======= --> 
    	</tr>
        </table>

        <table width="558" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
        <tr style="width:558px;min-height:50px;">

        	<td valign="top" align="center" colspan="3">
            

            	<span class="gri_micutz" style="font-family:Georgia, "Times New Roman", Times, serif;font-size:8px;color:#808284;font-style:normal;font-weight:normal;line-height:15px;text-decoration:none;letter-spacing:2px;">.........................................................................................................................................</span>

            </td>

    	</tr>
         
		<tr style="width:558px;height:50px;">
      		  <td style="width:20px;text-align:left;"></td>
              <td style="width:529px;text-align:left;" align="left"  valign="center">
              		<span class="gri_mic" style="font-family:Georgia, "Times New Roman", Times, serif;font-size:11px;color:#808284;font-style:normal;font-weight:normal;line-height:15px;text-decoration:none;letter-spacing:0px;">Primiti acest mesaj in urma abonarii dvs pe site-ul nostru sau printr-un site partener. Daca nu mai doriti

                                        sa primiti mesaje de la noi sau considerati ca abonarea dvs s-a produs din greseala,va rugam sa acceptati 

                                        scuzele noastre pentru neplacerile  provocate si sa va dezabonati</span> <a class="vrede_mic" href="http://quick-lunch.ro/admin/dezabonare.php">aici</a><span class="gri_mic">. 

                                        Va multumim.</span>
              
              </td>
              <td style="width:10px;text-align:left;"></td>           

        

    	</tr>
                   
	</table>
    </body>
    </html>';


	//Strip backslashes
			$mail1="comanda@quick-lunch.ro";
			$name="Quick-Lunch";
			$mail->IsSMTP();                           // tell the class to use SMTP
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Port       = 25;                    // set the SMTP server port
			$mail->Host       = "mail.quick-lunch.ro"; // SMTP server
			$mail->Username   = "comanda@quick-lunch.ro";     // SMTP server username
			$mail->Password   = "c0m@nd@qu1cklunch2012";            // SMTP server password

			$mail->IsSendmail();  // tell the class to use Sendmail

			$mail->AddReplyTo($mail1,$name);

			$mail->From       = $mail1;
			$mail->FromName   = $name;



			//$to = "ada@macpixel.ro";
			//$cc="fant0mita@yahoo.com";


		//	$to  = "fant0mita@yahoo.com";
				/*		$query="SELECT * FROM `newsletter1` WHERE  `email` LIKE '%@%' AND `email` NOT LIKE '%,%' AND `email` NOT LIKE '% %' AND `email` NOT LIKE '%.'  LIMIT 500";

						$result=@mysql_query($query) or die(mysql_error());

						$trimis_la=0;
						$nr = 0;

						while($row=mysql_fetch_array($result))

						{
						//set_time_limit(0);


						usleep(rand(50000,300000)); 
						//ignore_user_abort(1);
						    echo $trimis_la."). ";
							echo $email=$row['email'];
							echo "<br/>";




					//$pos = strrpos($email, "@");
					//$pos1 = strrpos($email, ",");
 // note: three equal signs
    // not found...

					if (filter_var($email, FILTER_VALIDATE_EMAIL)) {




						$to  = $email;


		//	$cc  = 'sales@bsateam.com ';
		//	$bcc='Administrator@bsateam.com';



						//$mail->AddAddress($to);

						//$mail->AddCC($cc);
						$mail->AddBCC($to);

						$trimis_la++;
						$nr++;

							if ($nr==10)

							{

								@sleep(2);

								$nr = 0;

							}

				}
		}// de la while
				//echo "1.Newsletter trimis la: ".$trimis_la." clienti <br/>";
				$mail->Subject  = "Newsletter Quick-Lunch";

				$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
				$mail->WordWrap   = 80; // set word wrap

				$mail->MsgHTML($body);

				$mail->IsHTML(true); // send as HTML
				$mail->Send();
				$mail->ClearAddresses();

				echo "2.Newsletter trimis la: ".$trimis_la." clienti";

*/

    echo $body;

	}

	?>
