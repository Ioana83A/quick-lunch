<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

<link href="text.css" rel="stylesheet" type="text/css">

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<script type='text/javascript'>

function verif()	
	{
		if (document.form_rec.nume.value.length < 1) 
		{
			alert('Nu v-ati introdus numele!');
			return false;
		}

	
		if (document.form_rec.email.value.length < 1) 
		{
			alert('Trebuie sa introduceti o adresa de e-mail!');
			return false;
		}
		var myString1 = document.form_rec.email.value;
		if ((myString1.indexOf(".") < 2) || (myString1.indexOf("@") < 0) || (myString1.lastIndexOf(".") < myString1.indexOf("@"))) 
		{
			alert('Va rugam introduceti o adresa de e-mail valida!');
			return false;
		}	
		
		if (document.form_rec.mesaj.value.length < 1) 
		{
			alert('Trebuie sa ne scrieti si un mesaj!');
			return false;
		}
		
		alert('Recomandarea a fost trimisa. Va multumim!');
	}
</SCRIPT>

</head>



<body background="images/bg_verde.jpg" topmargin="0">

<table width="878" border="0" cellpadding="0" cellspacing="0" align="center">

	<tr height="187">

    	<td width="878"  align="center" colspan="3">

    	<?php

		echo'

         <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="878" height="187">

            <param name="movie" value="banner_home.swf" />

            <param name="quality" value="high" />

            <embed src="banner_home.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="878" height="187"></embed>

  	    </object>    

		';?>

		   </td>

        

  </tr>

    

    <tr height="364" bgcolor="#fffddf">

    	<td width="23" bgcolor="#91c102">

        </td>

    	<td width="833" bgcolor="#ffffff" align="center" >

        	<table width="833" border="0" cellpadding="0" cellspacing="0" align="center">

            	<tr height="364" >

                	<td width="9">

                    </td>

                    <td width="543" bgcolor="#fffddf" valign="top">

                    	<table width="543" border="0" cellpadding="0" cellspacing="0" align="left" >

                        	<tr height="11">

                            	<td width="543" align="left" bgcolor="#FFFFFF">

                                	

                                </td>

                            </tr>

                            <tr height="25">

                            	<td width="543" align="left" bgcolor="#FFFddF">

                                	<table width="270" border="0" cellpadding="0" cellspacing="0" align="left" >

                                        <tr height="25">

                                            <td width="270" align="left" bgcolor="#8bb903">

                                                <span class="titlu_galben">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parerile clientilor nostri </span>

                               				</td>

                                		</tr>

                                	</table>

                                </td>

                            </tr>

                           

                            <tr height="5">

                            	<td width="543" align="left">

                                	

                                </td>

                            </tr>
                            <?php
								include("db.php");
							?>

                            <tr>

                            	<td width="543" align="left"  bgcolor="#fffddf">

                                	<table width="523" align="center" border="0" cellpadding="0" cellspacing="0">
                                    <?php
										$query="select * from comment where confirmat=1";
										$result=@mysql_query($query) or die(mysql_error());
										while($row=mysql_fetch_array($result))
										{
									?>

                                   	 <tr height="40">

                                        	<td width="520" align="left"  valign="middle" bgcolor="#fffddf">

                                            	<span class="verde_mic"><i><?php echo $row['nume']; ?> - <?php
												$data=explode('-',$row['data']);
												echo $data[2].'-'.$data[1].'-'.$data[0];
												 ?></i></span><br />

                                                <span class="gri_mic2">................................................................................................................................</span>

                                            	

                                            </td>

                                      	</tr>

                                    	<tr >

                                        	<td width="520" align="left" valign="top" bgcolor="#fffddf">

                                            	

                                            	<span class="gri_mic"> <?php 
												
												$mesaj=str_replace('\"','"',$_POST['mesaj']);
												$mesaj=utf8_decode($mesaj);
												$mesaj = str_replace('<br />',chr(13),$mesaj);
												echo $mesaj; ?>

                                            	</span>

                                            </td>

                                      	</tr>

                                        <?php
											}
										?>

                                        

                                    </table>

                                    

                                    

                            	</td>

                            </tr>    

                            <tr height="35">

                            	<td width="543" align="left">

                                	

                                </td>

                            </tr>

                            <tr>

                            	<td width="543" align="left" valign="top">

                                	<table width="520" align="center" cellpadding="0" cellspacing="3" border="0">

                                    	<tr height="24">

                                        	<form name="form_rec" action="recom.php" method="post" onsubmit="return verif();">

                                        	<td width="50" valign="middle" align="left"><span class="gri_mic">nume</span>

                                            </td>

                                            <td width="165" valign="middle"><input type="text" class="contact" name="nume" /></td>

                                            <td width="305" valign="middle" align="left"><span class="portocaliu_mic">*</span>

                                            </td>

                                        </tr>

                                        

                                        <tr height="24">

                                        	<td width="50" valign="middle" align="left"><span class="gri_mic">e-mail</span>

                                            </td>

                                            <td width="165" valign="middle"><input type="text" class="contact" name="email" /></td>

                                            <td width="305" valign="middle" align="left"><span class="portocaliu_mic">*</span><span class="gri_mic">(confidential)</span>

                                            </td>

                                        </tr>

                                        <tr height="130">

                                        	<td width="50" valign="middle" align="left"><span class="gri_mic">mesaj</span>

                                            </td>

                                            <td width="165" valign="middle"><textarea class="contact2" name="mesaj"></textarea></td>

                                            <td width="305" valign="middle" align="left">

                                            </td>

                                        </tr>

                                        <tr height="25">

                                        	<td width="50" valign="middle" align="left">

                                            </td>

                                            <td width="165" valign="middle" bgcolor="#fffddf">
                                            
                                            	<table width="165" cellpadding="0" cellspacing="0" align="left" >

                                                	<tr height="24">

                                                    	<td width="149" align="right" valign="middle"><span class="portocaliu_mic">Trimite&nbsp;</span>

                                                        </td>

                                                        <td width="14"  align="left" valign="middle"> <input type="image" src="images/go.jpg" width="14" height="17" border="0" align="left" />

                                                        </td>

                                                    </tr>    

                                               </table>
                                            
                                            
                                            </td>

                                            <td width="305" valign="middle" align="left">

                                            </td>
												</form>
                                        </tr>

                                         

                                            

                                       

                                        

                                    </table>

                                </td>

                            </tr>

                               

                        </table>

                    </td>

                    

                    <td bgcolor="#006600" width="281" valign="top">

                    	<table width="281" border="0" align="center" cellpadding="0" cellspacing="0"> 

                    		<tr >

                            	<td  background="images/galbui.jpg" valign="top">

                                	<table width="250" align="center" cellpadding="0" height="83" cellspacing="0">

                                    	

                                    	<tr>

                                        	<form name="form1">

                                        	<td  colspan="3" valign="top" align="center" valign="bottom" >

                                                <span class="portocaliu_mic"><b><i>Newsletter</i></b></span>

                                            </td>

                                        </tr>

                                        <tr >

                                        	<td align="right">

                                				<span class="gri_mic">e-mail &nbsp;</span><input type="text" class="newsletter" name="mail" />

                                            </td>

                                            <td width="5" align="left">

                                            </td>

                                            <td width="27" align="left">    

                                                <input type="image" src="images/go.jpg" border="0" align="left" width="14" height="14"  name="go" value="1"  />

                                    		</td>

                                            

                                         </tr>

                                         

                                         <tr>

                                         	<td valign="top" align="center" colspan="3"  valign="bottom" >

                                                <span class="portocaliu_mic"><b><i>Recomanda</i></b></span>

                                            </td>

                                        </tr>

                                        

                                        <tr>

                                        	<td align="right">

                                				<span class="gri_mic">e-mail &nbsp;</span><input type="text" class="newsletter" name="mail" />

                                            </td>

                                            <td width="5" align="left">

                                            </td>

                                            <td width="27" align="left">    

                                                <input type="image" src="images/go.jpg" border="0" align="left" width="14" height="14"  name="go" value="2" />

                                    		</td>

                                         </tr>

                                       	<tr height="2">

                                       		<td colspan="2">

                                        

                                       		</td>

                                           </form> 

                                       </tr>  

                                    </table>

                                </td>

                        	</tr>

                            <tr height="281">

                            	<td background="images/tabla.jpg" valign="top" align="center">

                                	<table width="281" cellpadding="0" cellspacing="0" align="left" border="0">

                                    	<tr height="50">

                                        	<td colspan="2">&nbsp;

                                             

                                            </td>

                                        </tr>

                                        <tr height="157">

                                        	<td width="40"  >

                                            

                                            </td>

                                        	<td valign="top" align="left" >

                                               <span class="alb_mic">	Ciulama de pui cu mamaliguta -</span><span class="galben_mic">8,5<br /></span>

                                               <span class="alb_mic"> Tocana de porc a la Timisoara <br />

                                               <span class="alb_mic">  (fasole pastai,smantana),orez innabusit - </span> <span class="galben_mic">7,9<br /></span>

                                               <span class="alb_mic"> Tochitura brasoveana din carne de porc - </span> <span class="galben_mic">8,3<br /></span>

                                               <span class="alb_mic"> Prajitura a la „Expres Meniu” - </span> <span class="galben_mic">3,5<br /></span>

                                               <span class="alb_mic"> Lapte de pasare - </span> <span class="galben_mic">3,3<br /></span>

                                               <span class="alb_mic">  Prajitura cu nuca - </span> <span class="galben_mic">3,3<br /></span>

                                               <span class="alb_mic"> Chec cu visine - </span> <span class="galben_mic">3,2<br /></span>

                                               <span class="alb_mic">  Budinca de orez cu mere si scortisoara - </span> <span class="galben_mic">3,2<br /></span>

                                            

                                            </td>

                                        </tr>

                                        

                                        <tr >

                                        	<td width="40" valign="top" >

                                            

                                            </td>

                                        	<td valign="top" align="left">

                                            	<a class="galben_mic" href="papa.html">[saptamana viitoare]</a>

                                               

                                           	</td>

                                        </tr>

                                    

                                    

                                    </table>

                                

                                	

                                

                                </td>

                            

                            </tr>

                             <tr height="8">

                                

                                <td width="281" background="images/alb_verde2.jpg" valign="top">

                                   

                                </td>

                                

                                

                            </tr>

                            

                            <tr >

                                

                                <td width="281" bgcolor="#FFFFFF" valign="top">

                                	<table width="259" border="0" cellpadding="0" cellspacing="0" align="center"   bgcolor="#fffddf">

                                        <tr height="26">

                                            <td bgcolor="#8bb903" width="258"><span class="titlu_galben">&nbsp;&nbsp;&nbsp;Noutati</span>

                                            </td>

                                        </tr>

                                        <tr height="308">

                                            <td width="258" valign="top">

                                                <table width="240" align="center" border="0" cellpadding="0" cellspacing="0" height="307">

                                                    <tr height="7">

                                                        <td>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="240"  bgcolor="#fffddf" valign="top" align="left">

                                                            <span class="verde_mic"><b>bufet suedez</b><br /></span>

                                                            <span class="gri_mic">

                                                                Oferim meniuri diverse de bufet suedez, 

                                                                pentru evenimente festivein cadrul 

                                                                companiilor, sau evenimente personale,la 

                                                                sediul firmei sau la domiciliu.</span><a href="m.html" class="verde_mic"> [...]   

                                                                            </span>

                                                       </td>

                                                    </tr>

                                                    

                                                    <tr height="7">

                                                        <td>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="240"  bgcolor="#fffddf" valign="top" align="left">

                                                            <span class="verde_mic"><b>meniu economic</b><br /></span>

                                                            <span class="gri_mic">

                                                                Oferim meniuri diverse de bufet suedez, 

                                                                pentru evenimente festivein cadrul 

                                                                companiilor, sau evenimente personale,la 

                                                                sediul firmei sau la domiciliu.</span><a href="m.html" class="verde_mic"> [...]   

                                                                            </span>

                                                       </td>

                                                    </tr>

                                                    

                                                    <tr height="7">

                                                        <td>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="240"  bgcolor="#fffddf" valign="top" align="left">

                                                            <span class="verde_mic"><b>nunti si botezuri</b><br /></span>

                                                            <span class="gri_mic">

                                                                Oferim meniuri diverse de bufet suedez, 

                                                                pentru evenimente festivein cadrul 

                                                                companiilor, sau evenimente personale,la 

                                                                sediul firmei sau la domiciliu.</span><a href="m.html" class="verde_mic"> [...]   

                                                                            </span>

                                                       </td>

                                                    </tr>

                                                    <tr height="18">

                                                        <td width="240"  bgcolor="#fffddf" valign="top" align="right">

                                                            <span class="verde_mic">[tot ce e nou]&nbsp;&nbsp;&nbsp;</span>

                                                            

                                                       </td>

                                                    </tr>

                                                </table>

                                            </td>

                                            

                                        </tr>    

                                    </table>

                                   

                                </td>

                                

                                

                            </tr>

                            

                    	</table>

                    </td>

                </tr>

                                

              </table>		

        </td>

        <td width="22"  background="images/dgg_tabla2.jpg">

        

        </td>

    </tr>

    

   

    <tr >

                	<td colspan="3" bgcolor="#90c103">

                   		<table width="833" bgcolor="#FFffff" align="center" cellpadding="0" cellspacing="0" >

                        	<tr height="20">

                            	<td width="833" colspan="10" valign="middle" align="center"><span class="gri_mic2">...........................................................................................................................................................................................................</span>

                                </td>

                            </tr>

                            <tr height="25">

                            	<td valign="middle" align="center"><a href="index.php"><img src="images/butoane/home1.jpg" width="70" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="despre_noi.php"><img src="images/butoane/despre1.jpg" width="85" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="servicii.php"><img src="images/butoane/servicii1.jpg" width="71" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="meniu.php"><img src="images/butoane/meniu1.jpg" width="69" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="cum_comand.php"><img src="images/butoane/cum1.jpg" width="110" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="retete.php"><img src="images/butoane/retete1.jpg" width="72" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="recomandari_clienti.php"><img src="images/butoane/recomandari2.jpg" width="140" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="noutati.php"><img src="images/butoane/noutati1.jpg" width="71" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="cariere.php"><img src="images/butoane/cariere1.jpg" width="69" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="contact.php"><img src="images/butoane/contact1.jpg" width="76" height="23" align="left" border="0" /></a>

                                </td>

                            </tr>

                        </table>

                    </td>

                </tr>

</table>            

</body>

</html>

