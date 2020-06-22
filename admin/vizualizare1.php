<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Formular de comanda</title>

<link href="text.css" rel="stylesheet" type="text/css">

</head>



<body bgcolor="#CCCCCC">

<table width="683" align="center" bgcolor="#FFFFFF" cellpadding="0" cellspacing="10">

	<tr height="88" bgcolor="#FFFFFF">

   		<td width="30">

        	

        </td>

    	<td width="238" align="center">

        	<img src="images/sigla.jpg" width="228" height="88" border="0" align="left" />

            

        </td>

        

        <td width="415" align="center" valign="middle"> <span class="portocaliu_formular">Formular<br /></span><span class="portocaliu_comanda">de comanda</span>

        </td>

    </tr>

    <tr height="2" bgcolor="#FFFFFF">
    </tr>

    <?php

		include("db.php");

		include("functie.php");

		$data=$_GET['data'];

		$id=$_GET['id'];

		$query="select * from comanda1 where data=\"$data\" and id=$id";

		$result=@mysql_query($query) or die('1'.mysql_error());

			

		$date=@mysql_fetch_array($result);

		$query1="select * from prod_comanda1 where comanda_id=$id";
		$result1=@mysql_query($query1) or die('1'.mysql_error());
		
		
		$date1=@mysql_fetch_array($result1);

		

		

	?>

    <tr  bgcolor="#FFFFFF">

   		

        <td width="30">

        	

        </td>

    	<td  colspan="2" width="653">

        	<table width="538" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="#FFFFFF">

            	<tr>

                	<td width="148" align="right" ><span class="negru_mic"><b>

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
								 echo date("W", mktime(0, 0, 0, $month, $day, $year));
								 
								 $E1 = 'D3';
	                             $E2 = 'E'; 
							}

							else

							{

								 echo date("W", mktime(0, 0, 0, $month, $day, $year))+1;	
							     
								 $E1 = 'D3';
	                             $E2 = 'E'; 

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

            	<tr bgcolor="#8bb903" height="22">

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

                 

                 <tr bgcolor="#fffcd6" height="5">

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
									$s=afisare1('luni','A',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','A',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','A',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','A',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','A',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">A1M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare1('luni','AA',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','AA',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','AA',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','AA',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','AA',$id,$s);
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
									$s=afisare1('luni','v',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','v',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','v',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','v',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','v',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">A2M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare1('luni','AB',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','AB',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','AB',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','AB',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','AB',$id,$s);
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
                                	$s=afisare1('luni','B',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare1('marti','B',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare1('miercuri','B',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare1('joi','B',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare1('vineri','B',$id,$s);
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
                                	$s=afisare1('luni','C',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','C',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','C',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php	
                                	$s=afisare1('joi','C',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','C',$id,$s);
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
                                	$s=afisare1('luni','DA',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','DA',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','DA',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','DA',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','DA',$id,$s);
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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('luni','DB',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','DB',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','DB',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','DB',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','DB',$id,$s);
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
                                
                            <tr height="10">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1"><?php echo $E1;?></span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('luni','E',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','E',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','E',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','E',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','E',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1"><?php echo $E2;?></span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('luni','AG',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','AG',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','AG',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','AG',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','AG',$id,$s);
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
                                	$s=afisare1('luni','F',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','F',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','F',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','F',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','F',$id,$s);
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
                                	$s=afisare1('luni','G',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','G',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','G',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','G',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','G',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">G1M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare1('luni','AC',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','AC',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','AC',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','AC',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','AC',$id,$s);
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
                                	$s=afisare1('luni','S',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','S',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','S',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','S',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','S',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">G2M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare1('luni','AD',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','AD',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','AD',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','AD',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','AD',$id,$s);
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
    						   <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">G3</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('luni','T',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','T',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','T',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','T',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','T',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">G3M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare1('luni','AE',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','AE',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','AE',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','AE',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','AE',$id,$s);
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
    						   <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">G4</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('luni','Y',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','Y',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','Y',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','Y',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','Y',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">G4M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	
								<?php
									$s=0;
									$s=afisare1('luni','AF',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','AF',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','AF',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','AF',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','AF',$id,$s);
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
                                	$s=afisare1('luni','H',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','H',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','H',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','H',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','H',$id,$s);
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
                                	$s=afisare1('luni','I',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','I',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','I',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','I',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','I',$id,$s);
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
									$s=afisare1('luni','X',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','X',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','X',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','X',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','X',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">J1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
                                <?php
                                	$s=afisare1('luni','J',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
                                 <?php
                                	$s=afisare1('marti','J',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> <?php
                                	$s=afisare1('miercuri','J',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> <?php
                                	$s=afisare1('joi','J',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> 
								<?php
                                	$s=afisare1('vineri','J',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">J2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
                                <?php
                                	$s=afisare1('luni','Z',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
                                 <?php
                                	$s=afisare1('marti','Z',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> <?php
                                	$s=afisare1('miercuri','Z',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> <?php
                                	$s=afisare1('joi','Z',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> 
								<?php
                                	$s=afisare1('vineri','Z',$id,$s);
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
                                	$s=afisare1('luni','k',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','k',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','k',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','k',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','k',$id,$s);
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
                                	$s=afisare1('luni','o',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','o',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','o',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','o',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','o',$id,$s);
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
							                 	$s=afisare1('luni','p',$id,$s);
								?></span>
                               </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
							              	$s=afisare1('marti','p',$id,$s);
								?></span>
                                </td>
                               <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
						                   	$s=afisare1('miercuri','p',$id,$s);
								?></span>
                               </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
						                 	$s=afisare1('joi','p',$id,$s);
								?></span>
                                </td>
                               <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
					                      	$s=afisare1('vineri','p',$id,$s);

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
                                	$s=afisare1('luni','L',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','L',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','L',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','L',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','L',$id,$s);
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
									$s=afisare1('luni','U',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','U',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','U',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','U',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','U',$id,$s);
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
									$s=afisare1('luni','R',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','R',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','R',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','R',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','R',$id,$s);
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
									$s=afisare1('luni','Q',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
								<?php
									$s=afisare1('marti','Q',$id,$s);
								?>
                                </span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('miercuri','Q',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('joi','Q',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
									$s=afisare1('vineri','Q',$id,$s);
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri1">MM</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('luni','M',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','M',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','M',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','M',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','M',$id,$s);
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
                                	$s=afisare1('luni','N',$id,$s);
								?></span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('marti','N',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('miercuri','N',$id,$s);
								?></span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('joi','N',$id,$s);
								?></span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"><?php
                                	$s=afisare1('vineri','N',$id,$s);
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

                        	<tr height="3">

                                <td  colspan="5" bgcolor="#ffffff" align="right" valign="middle">

                                </td>

                            </tr>

                            <tr height="20">

                                <td width="100" bgcolor="#ffffff" align="right" valign="middle"><span class="negru_mic">Cod agent:</span>

                                </td>

                                <td width="115" bgcolor="#ffffff" align="left" valign="middle"><input type="text" class="negru_mic" name="cod" />

                                </td>

                                <td width="171" bgcolor="#ffffff" align="center" valign="middle">

                                </td>

                                <td width="139" bgcolor="#ffffff" align="right" valign="middle"><span class="negru_mic">Total de plata:</span>

                                </td>

                                <td width="109" bgcolor="#ffffff" align="left" valign="middle"><span class="negru"><b><?php total1($id,$day,$month,$year); ?></b></span><span class="negru_mic"> RON</span>

                                </td>

                             </tr>

                            

                             <tr height="20">

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

                             </tr>

                             

                              

                             

                             <tr height="1">

                                <td  colspan="5" bgcolor="#ffffff" align="right" valign="middle">

                                </td>

                            </tr>  

                        </table>    

                    </td>

                </tr>            

            </table><br />

			<input type="button" name="printeaza" value="Printeaza" onclick="javascript: window.print()" />

        </td>    	

    </tr>

    

</table>

</body>

</html>

