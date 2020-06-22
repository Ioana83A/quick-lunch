<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Quick-Lunch</title>

<link href="text.css" rel="stylesheet" type="text/css">

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<script type='text/javascript'>

function validare()
	{
		if (document.form1.email.value.length < 1) 
		{
			alert('Trebuie sa introduceti o adresa de e-mail!');
			return false;
		}
		var myString = document.form1.email.value;
		if ((myString.indexOf(".") < 2) || (myString.indexOf("@") < 0) || (myString.lastIndexOf(".") < myString.indexOf("@"))) 
		{
			alert('1Va rugam introduceti o adresa de e-mail valida!');
			return false;
		}	
		
		alert('V-ati inscris la newletter!');
	}	
	function validare1()	
	{
		if (document.form2.mail.value.length < 1) 
		{
			alert('Trebuie sa introduceti o adresa de e-mail!');
			return false;
		}
		var myString1 = document.form2.mail.value;
		if ((myString1.indexOf(".") < 2) || (myString1.indexOf("@") < 0) || (myString1.lastIndexOf(".") < myString1.indexOf("@"))) 
		{
			alert('Va rugam introduceti o adresa de e-mail valida!');
			return false;
		}	
		alert('Recomandare trimisa!');
	}


function verif1()	
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
	
	
	

function verif()	
	{
		if (document.trimitevform.nume.value.length < 1) 
		{
			alert('Nu v-ati introdus numele!');
			return false;
		}

	
		if (document.trimitevform.email.value.length < 1) 
		{
			alert('Trebuie sa introduceti o adresa de e-mail!');
			return false;
		}
		var myString1 = document.trimitevform.email.value;
		if ((myString1.indexOf(".") < 2) || (myString1.indexOf("@") < 0) || (myString1.lastIndexOf(".") < myString1.indexOf("@"))) 
		{
			alert('Va rugam introduceti o adresa de e-mail valida!');
			return false;
		}	
		
		
		if (document.trimitevform.telefon.value.length < 1) 
		{
			alert('Nu ati introdus numarul de telefon!');
			return false;
		}
		
		if (document.trimitevform.cv.value.length < 1) 
		{
			alert('Nu ati introdus CV-ul!');
			return false;
		}
		
		alert('CV trimis!');
	}

</SCRIPT>

</head>



<body background="images/bg_verde.jpg" topmargin="0">

<?php
	include("db.php");
	$query1="select * from meniu_curent where recomanda=1";
	$result1=@mysql_query($query1) or die('1'.mysql_error());
	
	$query2="select * from meniu_viitor where recomanda=1";
	$result2=@mysql_query($query2) or die('2'.mysql_error());
	
	$query3="select * from reteta_saptamanii order by id desc";
	$result3=@mysql_query($query3) or die('3'.mysql_error());
	$reteta=@mysql_fetch_array($result3);
?>
<table width="878" border="0" cellpadding="0" cellspacing="0" align="center">

	<tr height="187">

    	<td width="878"  align="center" colspan="3">

    	<?php

		echo'

         <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="878" height="187">

            <param name="movie" value="banner_noutati.swf" />

            <param name="quality" value="high" />

            <embed src="banner_home.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="878" height="187"></embed>

  	    </object>    

		';?>

		   </td>

        

  </tr>

    

    <tr height="364" bgcolor="#fffddf">

    	<td width="23" bgcolor="#91c102" valign="top" align="left">

        </td>

    	<td width="833" bgcolor="#ffffff" align="center" >

        	<table width="833" border="0" cellpadding="0" cellspacing="0" align="center">

            	<tr height="364" >

                	<td width="9" bgcolor="#FFFFFF" valign="top" align="left">

                    </td>

                    <td width="543" bgcolor="#fffddf" valign="top">

                    	<table width="543" border="0" cellpadding="0" cellspacing="0" align="left" >

                        	<tr height="11">

                            	<td width="543" align="left" bgcolor="#FFFFFF">

                                	

                                </td>

                            </tr>

                            <tr>

                            	<td width="543" align="left" bgcolor="#FFFddF">

                                	<table width="543" border="0" cellpadding="0" cellspacing="0" align="left" >

                                        <tr height="25">
                                        	<td width="10" bgcolor="#FFFddF">
                                            </td>

                                            <td width="260" align="left" bgcolor="#8bb903">

                                                <span class="titlu_galben">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reteta saptamanii</span>

                               				</td>
                                            <td width="10" bgcolor="#FFFddF">
                                            </td>

                                             <td width="263" align="left" bgcolor="#fffddf">

                                                

                               				</td>

                                		</tr>
										<?php
											$cerere="select * from reteta_saptamanii order by id desc";
											$rezultat=@mysql_query($cerere) or die(mysql_error());
											$linie=mysql_fetch_array($rezultat);
										?>
                                        

                                        <tr height="40">

                                        	<td width="10" bgcolor="#FFFddF">
                                            </td>
                                            <td width="260" align="left"  valign="middle" bgcolor="#fffddf">

                                            	<span class="verde_mic"><b><?php echo utf8_decode($linie['nume_reteta']); ?></b></span><br />

                                               

                                            </td>
                                             <td width="10" bgcolor="#FFFddF">
                                            </td>

                                            <td width="263" align="left"  valign="middle" bgcolor="#fffddf">
                                            </td>

                                      	</tr>
                                        
                                        <tr height="300">
                                        	<td width="10" bgcolor="#FFFddF">
                                            </td>
											<td width="260"  align="left" valign="top">
                                            	<span class="portocaliu_mic">ingrediente/4 portii<br /></span>
                                            	<span class="gri_mic"><?php 
												$ingrediente=str_replace('"','\"',$linie['ingrediente']);
												$ingrediente= str_replace(chr(13),'<br />',$ingrediente);
												echo utf8_decode($ingrediente); ?></span><br /><br />
                                                <span class="gri_mic"><?php 
												$text_reteta=str_replace('"','\"',$linie['text_reteta']);
												$text_reteta= str_replace(chr(13),'<br />',$text_reteta);
												echo utf8_decode($text_reteta); ?></span>
                                            </td>
                                            </td>
                                            <td width="10" bgcolor="#FFFddF">
                                            </td>

                                            <td width="263" align="left"  valign="top" bgcolor="#fffddf">
												<table width="233" border="0" cellpadding="0" cellspacing="0" align="center">
                                                    <tr height="30">
                                                    	<td width="60">
                                                        </td>
                                                        <td align="right" width="123" valign="middle"><span class="verde_mic"><b><i>Timp de preparare:</i></b></span>
                                                        </td>
                                                        <td align="left" width="50"  valign="top"><span class="portocaliu_mij">&nbsp;<?php echo $reteta['timp_preparare']; ?>'</span>
                                                        </td>
                                                    </tr>
                                                    <tr height="30">
                                                    	<td width="60">
                                                        </td>
                                                        <td align="right" width="123" valign="middle"><span class="verde_mic"><b><i>Dificultate:</i></b></span>
                                                        </td>
                                                        <td align="left" width="50" valign="top" >
                                                        <img src="images/dific<?php echo $reteta['dificultate']; ?>.jpg" width="50" height="23" border="0" align="left" />
                                                        </td>
                                                    </tr>
                                                    <tr height="30">
                                                    	<td width="60">
                                                        </td>
                                                        <td align="right" width="123"  valign="middle"><span class="verde_mic"><b><i>KCalorii/portie:</i></b></span>
                                                        </td>
                                                        <td align="left" width="50" valign="top"><span class="portocaliu_mij">&nbsp;<?php echo $reteta['calorii']; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr height="10">
                                                    	<td width="233" colspan="3">
                                                        
                                                    </tr>
                                                    <tr height="30">
                                                    	<td width="233" colspan="3"><img src="../poze/<?php echo $linie['poza_reteta']; ?>" width="230" height="162" border="0" />
                                                        </td>
                                                        
                                                    </tr>
                                                    
                                                </table>
                                            </td>

                                      	</tr>

                                	</table>

                                </td>

                            </tr>
							<tr>

                            	<td width="543" align="left" bgcolor="#FFFddF">

                                	<table width="543" border="0" cellpadding="0" cellspacing="0" align="left" >

                                        <tr height="25">
                                        	<td width="10" bgcolor="#FFFddF">
                                            </td>

                                            <td width="260" align="left" bgcolor="#8bb903">

                                                <span class="titlu_galben">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pentru evenimente speciale</span>

                               				</td>
                                            <td width="10" bgcolor="#FFFddF">
                                            </td>

                                             <td width="263" align="left" bgcolor="#fffddf">

                                                

                               				</td>

                                		</tr>

                                        

                                        <tr height="40">

                                        	<td width="10" bgcolor="#FFFddF">
                                            </td>
                                            <td width="260" align="left"  valign="middle" bgcolor="#fffddf">

                                            	<span class="verde_mic"><b>Bufet suedez</b></span><br />

                                               

                                            </td>
                                             <td width="10" bgcolor="#FFFddF">
                                            </td>

                                            <td width="263" align="left"  valign="middle" bgcolor="#fffddf">

                                            	<span class="verde_mic"><b>Meniuri pentru nunti si botezuri</b></span><br />

                                               

                                            </td>

                                      	</tr>
                                        
                                       <tr height="40">

                                        	<td width="10" bgcolor="#FFFddF">
                                            </td>
                                            <td width="260" align="left" valign="top" bgcolor="#fffddf">

                                            	<span class="gri_mic">Oferim meniuri diverse de bufet suedez, 
                                                                        pentru evenimente festivein cadrul 
                                                                        companiilor, sau evenimente personale,la 
                                                                        sediul firmei sau la domiciliu.( aici cred ca 
                                                                        mai trebe text, sa scrie sefu)Lorem ipsum
                                                                        dolor sit amet, consectetur adipisicing elit,
                                                                        sed do eiusmod tempor incididunt ut l
                                                                        abore et dolore magnaLorem ipsum
                                                                        dolor sit amet. Lorem ipsum dolor sit 
                                                                        amet, consectetur adipisicing elit, sed do
                                                                         eiusmod tempor incididunt ut labore et 
                                                                        dolore mag </span><br />

                                               

                                            </td>
                                             <td width="10" bgcolor="#FFFddF">
                                            </td>

                                            <td width="263" align="left"  valign="top" bgcolor="#fffddf">

                                            	<span class="gri_mic"> O nunta sau un botez este un prilej de mare 
                                                                        bucurie. Nu lasati problemele legate de aprovizionare, conceperea meniului, pregatirea mesei sa va umbreasca clipele de fericire.
                                                                              Dumneavoastra veniti cu musafirii si noi aducem mancarea!
                                                                              Econimisiti timp si bani apeland la serviciile 
                                                                        noastre.    
                                                                             Bucatarii nostri, specialisti în realizarea 
                                                                        meniurilor pentru nunti, botezuri, banchete, sau orice alte ocazii speciale, va pun la dispozitie o gama larga de meniuri, de combinatii de gusturi si ingrediente.
                                                                        Pe langa oferta deja existenta, realizam la cerere orice meniu personalizat stabilind impreuna, în functie de bugetul pe care il aveti alocat 
                                                                        evenimentului, solutia cea mai buna pentru un meniu care sa incante musafirii dumneavoastra. </span><br />

                                               

                                            </td>

                                      	</tr>
                                        <tr height="20">

                                        	<td width="10" bgcolor="#FFFddF">
                                            </td>
                                            <td width="260" align="left" valign="top" bgcolor="#fffddf">

                                            

                                               

                                            </td>
                                             <td width="10" bgcolor="#FFFddF">
                                            </td>
											<td width="263" align="left"  valign="top" bgcolor="#fffddf">
											</td>

                                      	</tr>
										<tr height="40">

                                        	<td width="10" bgcolor="#FFFddF">
                                            </td>
                                            <td width="260" align="left" valign="top" bgcolor="#fffddf">
											<img src="images/servicii1.jpg" width="240" height="144" border="0" align="left" />
 											</td>
                                             <td width="10" bgcolor="#FFFddF">
                                            </td>

                                            <td width="263" align="left"  valign="top" bgcolor="#fffddf">
											<img src="images/servicii2.jpg" width="240" height="144" border="0" align="left" />
                                            </td>

                                      	</tr>
                                	</table>

                                </td>

                            </tr>
                           

                            
                               

                            <tr height="15">

                            	<td width="543" align="left">

                                	

                                </td>

                            </tr>

                            

                               

                        </table>

                    </td>

                    

                    <td bgcolor="#ffffff" width="281" valign="top">

                    	<table width="281" border="0" align="center" cellpadding="0" cellspacing="0"> 

                    		<tr >

                            	<td  background="images/galbui.jpg" valign="top">

                                	<table width="250" align="center" cellpadding="0" height="83" cellspacing="0">

                                    	

                                    	<tr>

                                        	<form name="form1" onsubmit="return validare();" action="recomanda.php" method="post">
                                        	<td  colspan="3" align="center" valign="bottom" >
                                                <span class="portocaliu_mic"><b><i>Newsletter</i></b></span>
                                            </td>
                                        </tr>
                                        <tr >
                                        	<td align="right">
                                				<span class="gri_mic">e-mail &nbsp;</span><input type="text" class="newsletter" name="email" />
                                            </td>
                                            <td width="5" align="left">
                                            </td>
                                            <td width="27" align="left">    
                                                <input type="image" src="images/go.jpg" border="0" align="left" width="14" height="14"  name="go1" value="1"  />
                                    		</td>
                                            </form>
                                         </tr>
                                         <tr>
                                         	<td align="center" colspan="3"  valign="bottom" >
                                                <span class="portocaliu_mic"><b><i>Recomanda</i></b></span>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<form name="form2" onsubmit="return validare1();" action="recomanda.php" method="post">
                                        	<td align="right">
                                				<span class="gri_mic">e-mail &nbsp;</span><input type="text" class="newsletter" name="mail" />
                                            </td>
                                            <td width="5" align="left">
                                            </td>
                                            <td width="27" align="left">    
                                                <input type="image" src="images/go.jpg" border="0" align="left" width="14" height="14"  name="go2" value="2" />
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

                                              <?php
                                                $query1="select * from meniu_curent where recomanda=1";
                                                $result1=@mysql_query($query1) or die('1'.mysql_error());
                                               
                                                $query2="select * from meniu_viitor where recomanda=1";
                                                $result2=@mysql_query($query2) or die('2'.mysql_error());
                                                
                                                $query3="select * from reteta_saptamanii";
                                                $result3=@mysql_query($query3) or die('3'.mysql_error());
                                                $reteta=@mysql_fetch_array($result3);
                                            ?>                                            
											<?php
												$sapt = $_POST["s"];
												if (strcmp($s,"next") == 0)
												{
													while($recomandare_sapt=@mysql_fetch_array($result2))
													{
														$nume=$recomandare_sapt['nume'];
														$numele=explode("(",$nume);
														echo '<span class="alb_mic">'.$numele[0].' -</span><span class="galben_mic">'.$recomandare_sapt['pret'].'<br /></span>';
													}												
													$sapt = '<a class="galben_mic" href="recomandari_clienti.php">[vezi saptamana curenta]</a>';
												}
												else
												{
													while($recomandare_sapt=@mysql_fetch_array($result1))
													{
														$nume=$recomandare_sapt['nume'];
														$numele=explode("(",$nume);
														echo '<span class="alb_mic">'.$numele[0].' -</span><span class="galben_mic">'.$recomandare_sapt['pret'].'<br /></span>';
													}
													$sapt = '<a class="galben_mic" href="recomandari_clienti.php?s=next">[vezi saptamana viitoare]</a>';
												}
                                             ?>
                                            

                                            </td>

                                        </tr>

                                        

                                        <tr >

                                        	<td width="40" valign="top" >

                                            

                                            </td>

                                        	<td valign="top" align="left">

                                            	<?php
                                            		echo $sapt;
												?>

                                               

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

                                	<table width="258" border="0" cellpadding="0" cellspacing="0" align="center"   bgcolor="#fffddf">

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

                                                            <span class="verde_mic"><i>Maria...</i><br /></span>

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

                                                            <span class="verde_mic"><i>Ionica</i><br /></span>

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

                                                            <span class="verde_mic"><i>Costel</i><br /></span>

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

                                        <tr height="7">

                                            <td bgcolor="#ffffff" width="258"></td>

                                        </tr> 

                                        <tr height="67">

                                            <td bgcolor="#ffffff" width="258"><img src="images/furculita.jpg" width="258" height="67" border="0" align="left" />

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

                                <td valign="middle" align="center"><a href="servicii.php"><img src="images/butoane/servicii2.jpg" width="71" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="meniu.php"><img src="images/butoane/meniu1.jpg" width="69" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="cum_comand.php"><img src="images/butoane/cum1.jpg" width="110" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="retete.php"><img src="images/butoane/retete1.jpg" width="72" height="23" align="left" border="0" /></a>

                                </td>

                                <td valign="middle" align="center"><a href="recomandari_clienti.php"><img src="images/butoane/recomandari1.jpg" width="140" height="23" align="left" border="0" /></a>

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

                

        <tr height="20">

    	<td  bgcolor="#90c103" width="23">

        

        </td>

    	<td  valign="top">

        	<table cellpadding="0" cellspacing="0" border="0" align="left" width="833">

                <tr>

                	<td>

                    </td>

                	<td>

                        <table width="202" cellpadding="0" cellspacing="0" align="right" border="0">

                            <tr height="24">

                                <td border="0" align="center" bgcolor="#fffddf" valign="middle" width="180">

                                    <a class="gri_mic" href="http://www.macpixel.ro">Design & Concept by</a><a class="verde_mic" href="http://www.macpixel.ro"> MacPixel</a>

                            

                                 </td>

                                 <td border="0" align="right" bgcolor="#fffddf" valign="middle" width="22">

                                   <img src="images/macpixel.jpg" border="0" height="21" align="left" width="20">

                            

                                </td>

                            </tr>

                        </table>

                   </td>

               </tr>

            </table>             

        </td>

        <td width="22"  bgcolor="#90c103">

        </td>

	</tr> 

</table>            

</body>

</html>

