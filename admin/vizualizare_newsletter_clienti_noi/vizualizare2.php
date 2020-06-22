<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<title>Formular de comanda</title>
<link href="text.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#CCCCCC">
<table align="center" id="princtable" cellpadding="0" cellspacing="5">
	<tr bgcolor="#FFFFFF">
   		<td width="30">
        </td>
        <td colspan="2" align="center" valign="middle"> <span class="portocaliu_formular">Formular de comanda</span>
        </td>
    </tr>
    <?php
		include("db.php");
		include("functie.php");
		$data=$_GET['data'];
		$id=$_GET['id'];
		$query="select * from comanda where data=\"$data\" and id=$id";
		$result=@mysql_query($query) or die('1'.mysql_error());		
		$date=@mysql_fetch_array($result);
		$query1="select * from prod_comanda where comanda_id=$id";
		$result1=@mysql_query($query1) or die('1'.mysql_error());
		$date1=@mysql_fetch_array($result1);
	?>
    <tr  bgcolor="#FFFFFF">
        <td width="30">
        </td>
    	<td  colspan="2" width="653">
        	<table width="538" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="#FFFFFF">
            	<tr>
                	<td width="148" align="right" ><span class="negru_mic" style="height:12px"><b>
                    					Saptamana:<br />
                                        ID comanda:<br />
                                        Cod partener:<br />
                                        Firma:<br />
                                        Persoana de contact:<br />
                                        Adresa:<br />
                                        Telefon:<br />
                                        E-mail:<br />
                    				</b></span>
                    </td>
                    <td width="5">
                    </td>
                     <td width="1" bgcolor="#919191">
                    </td>
                    <td width="5">
                    </td>
                    <td width="419"><span class="negru_mic">
                    	<?php 				

							$param=explode('-',$data);
							$year=$param[0];
							$month=$param[1];
							$day=$param[2];
							if (strcmp($date1['tip'],'c')==0) 
							{

                                                               //if ((strcmp(date('D'),'Sat')==0) or (strcmp(date('D'),'Sun')==0))

                                                              //{

								       							//echo date('W')+1;

                                                              //}

                                                              //else

                                                              //{

                                                                      //echo date('W');
																	  
																	  if ((date('W', time()+3600*8)+0<52) && (date('W', time()+3600*8)+0>1))  
																		{
																			echo date("W", mktime(0, 0, 0, $month, $day, $year))+0;
																		}
																	  else echo "2";

																	  

                                                              //}

															  $litera='P';
															  $lit='O';
															  $lit1='K';
															   $litera1='P';												  



							}
							else
							{
								if (date('W', time()+3600*8)+1==52)  
								{
									echo "2";
								}
								else  echo date("W", mktime(0, 0, 0, $month, $day, $year))+1;
								//echo '2';
								 $litera='K';
								 $litera1='N';
								 $lit='K';
								 $lit1='O';
							}

					?><br />

                        <?php echo $id; ?>- 
                        <?php
							list($an, $luna, $zi) = explode("-", $data);
							echo $zi.'/'.$luna.'/'.$an;
                        ?><br />
                        <?php
							if (strcmp($date['cod_client'],0)==0)
							{
								echo '-';
							}
							else
							{
								echo $date['cod_client'];
							}
						?>
                        <br />
                        <?php echo $date['firma']; ?><br />
                        <?php echo $date['nume']; ?><br />
                        <?php echo $date['adresa']; ?><br />
                        <?php echo $date['telefon']; ?><br />
                        <?php
							if (strcmp($date['email'],"")==0)
							{
								echo '-';
							}
							else
							{
								echo $date['email'];
							}
						?><br /> 
                    	</span>
                    </td> 
        		</tr>
            </table>
        </td>
    </tr>
    <tr bgcolor="#FFFFFF">
   		<td colspan="3" valign="top" align="center" >
        	<table width="638" border="0" cellpadding="0" cellspacing="0" bgcolor="#FF0000">
            	<tr bgcolor="#8bb903" height="20">
                	<td width="40">
                    </td>
                    <td width="80" align="center" valign="middle"><span class="titlu_galben">Luni</span>
                    </td>
                    <td width="85" align="center" valign="middle"><span class="titlu_galben">Marti</span>
                    </td>
                    <td width="84" align="center" valign="middle"><span class="titlu_galben">Miercuri</span>
                    </td>
                    <td width="84" align="center" valign="middle"><span class="titlu_galben">Joi</span>
                    </td>
                    <td width="83" align="center" valign="middle"><span class="titlu_galben">Vineri</span>
                    </td>
                    <td width="74" align="center" valign="middle"><span class="titlu_galben">Total</span>
                    </td>
                    <td width="108" align="center" valign="middle"><span class="titlu_galben">Observatii</span>
                    </td>
                 </tr> 
                 <tr bgcolor="#fffcd6" height="2">
                	<td width="638" colspan="8">
                    </td>
                 </tr>   
                 <tr bgcolor="#fffcd6">
                	<td width="638" colspan="8">
                    	<table width="638" border="0" cellpadding="0" cellspacing="0" align="center">
                        	<tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">A1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare('luni','A',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare('marti','A',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('miercuri','A',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('joi','A',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('vineri','A',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">A2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare('luni','v',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare('marti','v',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('miercuri','v',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('joi','v',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('vineri','v',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr> 
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">B</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare('luni','B',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare('marti','B',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare('miercuri','B',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare('joi','B',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare('vineri','B',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>       
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">C</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare('luni','C',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','C',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','C',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare('joi','C',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','C',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr> 
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>   
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">D1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','D',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','D',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','D',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','D',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','D',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>    
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr> 
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">D2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare('luni','W',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare('marti','W',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('miercuri','W',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('joi','W',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('vineri','W',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">E</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','E',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','E',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','E',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','E',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','E',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                           
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">F</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','F',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','F',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','F',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','F',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','F',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>   
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">G1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','G',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','G',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','G',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','G',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','G',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
 							<tr height="10">
    						   <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">G2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','S',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','S',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','S',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','S',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','S',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">H</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','H',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','H',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','H',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','H',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','H',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">I1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','I',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','I',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','I',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','I',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','I',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
								<tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>  
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">I2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare('luni','X',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare('marti','X',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('miercuri','X',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('joi','X',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('vineri','X',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">J</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
                                <?php
                                	$s=afisare('luni','J',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
                                 <?php
                                	$s=afisare('marti','J',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> <?php
                                	$s=afisare('miercuri','J',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> <?php
                                	$s=afisare('joi','J',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> 
								<?php
                                	$s=afisare('vineri','J',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">K</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	<?php
                                	$s=afisare('luni','k',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','k',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','k',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','k',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','k',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">N</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	<?php
                                	$s=afisare('luni','o',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','o',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','o',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','o',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','o',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr> 
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
						<tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">P</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	<?php
							                 	$s=afisare('luni','p',$id,$s);
								?></span>
                               </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
							              	$s=afisare('marti','p',$id,$s);
								?></span>
                                </td>
                               <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
						                   	$s=afisare('miercuri','p',$id,$s);
								?></span>
                               </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
						                 	$s=afisare('joi','p',$id,$s);
								?></span>
                                </td>
                               <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
					                      	$s=afisare('vineri','p',$id,$s);

								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                               </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  	
                            
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">L</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','L',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','L',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','L',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','L',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','L',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">U</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare('luni','U',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare('marti','U',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('miercuri','U',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('joi','U',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('vineri','U',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">V</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare('luni','R',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare('marti','R',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('miercuri','R',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('joi','R',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('vineri','R',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">Q</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare('luni','Q',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare('marti','Q',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('miercuri','Q',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('joi','Q',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare('vineri','Q',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','M',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','M',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','M',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','M',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','M',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
							<tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
							 <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">ME</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('luni','N',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('marti','N',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('miercuri','N',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('joi','N',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare('vineri','N',$id,$s);
								?></span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>
                            <tr height="2">
                             	<td colspan="8" align="center"><span class="negru_mic_vizualizare">............................................................................................................................................................</span>
								</td>
                            </tr>
                        </table>
                    </td>
                 </tr>
                 <tr bgcolor="#918e7b" >



                	<td width="638" colspan="8">
                    	<table width="638" border="0" bgcolor="#FFFFFF" cellpadding="0" cellspacing="4" align="center">
                        	<tr height="2">
                                <td  colspan="5" bgcolor="#ffffff" align="right" valign="middle">
                                </td>
                            </tr>
                            <tr height="10">
                                <td width="100" bgcolor="#ffffff" align="right" valign="middle"><span class="negru_mic">Cod agent:</span>
                                </td>
                                <td width="115" bgcolor="#ffffff" align="left" valign="middle"><input type="text" class="negru_mic" name="cod" />
                                </td>
                                <td width="171" bgcolor="#ffffff" align="center" valign="middle">
                                </td>
                                <td width="139" bgcolor="#ffffff" align="right" valign="middle"><span class="negru_mic">Total de plata:</span>
                                </td>
                                <td width="109" bgcolor="#ffffff" align="left" valign="middle"><span class="negru"><b><?php total($id,$day,$month,$year); ?></b></span><span class="negru_mic"> RON</span> 
                                </td>
                             </tr>
                             <tr height="10">
                                <td width="100" bgcolor="#ffffff" align="right" valign="middle"><span class="negru_mic">Distribuitor</span>
                                </td>
                                <td width="115" bgcolor="#ffffff" align="left" valign="middle"><input type="text" class="negru_mic" name="cod" />
                                </td>
                                <td width="171" bgcolor="#ffffff" align="center" valign="middle">
                                </td>
                                <td width="139" bgcolor="#ffffff" align="right" valign="middle"><span class="negru_mic">Comanda</span>
                                </td>
                                <td width="109" bgcolor="#ffffff" align="left" valign="middle">confirmata
                                </td>
                             </tr>                         <!--

                             



                             <tr height="1">



                                <td  colspan="5" bgcolor="#ffffff" align="right" valign="middle">



                                </td>



                            </tr>  -->

                        </table>   
                    </td>
                </tr> 
            </table>
			<input type="button" name="printeaza" value="Printeaza" onclick="javascript: window.print()" />
        </td>  
    </tr>

</table>
</body>
</html>



