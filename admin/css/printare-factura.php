<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../admin/css/style.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2">

function fct( content)
    {
    	
        	content = content.replace(/#/g, "\"");
			content = content.replace(/@/g, "#");
			document.getElementById('id1').innerHTML = content;
			window.print();
			alert(document.getElementById('id2').innerHTML);
		
    }
</script>	
<title></title>



</head>



<body leftmargin="0" marginwidth="0" marginheight="0" topmargin="0">

<?php
	
	include("db.php");
	
	$id_comanda1=$_POST['id_comanda'];
	if (strcmp($id_comanda1,"")==0)
	{
		$id_comanda=$_GET['id_comanda'];
	}
	else
	{
		$id_comanda=$id_comanda1;
	}
		
	echo $query="select * from factura  where id_comanda=$id_comanda";
	$result=@mysql_query($query) or die('1'.mysql_error());
	$li=mysql_fetch_array($result);
	//$id_comanda=$li['id_comanda'];
	
	$saptamana=$li['saptamana'];
	$zi=$li['zi'];
	$luna=$li['luna'];
	$an=$li['an'];
	$saptamana_cur=date("W");
	
	$querya="select * from factura";
	$resulta=@mysql_query($querya) or die('1'.mysql_error());
	$idul=$li['id'];
	
	


	
							
	function twodecfloat($string)
	{
		//echo $string.'..strlen = '.strlen($string).'<br>';
		$pct = 0;$s = '';
		$s1 = '';
		$s1 = $string;
		for ($i = 0; $i<strlen($s1); $i++)
		{
			if ($pct>0)
			{
				$pct++;
			}
			if (strcmp(substr($s1,$i,1),'.') == 0)
			{
				$pct = 1;
			}
			//echo $s1[$i].' '.$pct;
			$s .= substr($s1,$i,1);
			if ($pct == 3)
			{
				break;
			}
			//echo $s.'<br>';
		}
		//echo '----------<br>';
		return $s;
	}	
	
	function tip_meniu($tip,$men_id,$sapt_cur,$sapt)
	{
			//echo $sapt_cur;
			//echo $sapt_cur;
			//echo $sapt;
			if ($sapt_cur==$sapt)
			{
				$query3="select * from meniu_curent where id='$men_id'";
				$result3=@mysql_query($query3) or die('5'.mysql_error());
			}
			elseif($sapt_cur<$sapt)
			{
				$query3="select * from meniu_viitor where id='$men_id'";
				$result3=@mysql_query($query3) or die('6'.mysql_error());
			}	
			else
			{
				$query3="select * from meniu_trecut where id='$men_id'";
				$result3=@mysql_query($query3) or die('6'.mysql_error());
			}
			
			$linie=mysql_fetch_array($result3);
			return $linie['nume'];
	}
	
	function aflare_pret($tip,$men_id,$sapt_cur,$sapt)
	{
			//echo $sapt;
			if ($sapt_cur==$sapt)
			{
				$query3="select * from meniu_curent where id='$men_id'";
				$result3=@mysql_query($query3) or die('5'.mysql_error());
			}
			elseif($sapt_cur<$sapt)
			{
				$query3="select * from meniu_viitor where id='$men_id'";
				$result3=@mysql_query($query3) or die('6'.mysql_error());
			}	
			else
			{
				$query3="select * from meniu_trecut where id='$men_id'";
				$result3=@mysql_query($query3) or die('6'.mysql_error());
			}
			
			$linie=mysql_fetch_array($result3);
			return $linie['pret'];
	}
	
	
	
	
	
	$query="select * from comanda_factura where id=$id_comanda";
	$result=@mysql_query($query) or die('10'.mysql_error());
	$row=mysql_fetch_array($result);
	
	$query1="select * from factura where id_comanda=$id_comanda";
	$result1=@mysql_query($query1) or die('101'.mysql_error());
	$row1=mysql_fetch_array($result1);
	
	$nr_f=$row1['nr_factura'];
	
	$querryc="select * from chitanta where nr_factura=$nr_f";
	$resultc=@mysql_query($querryc) or die('202'.mysql_error());
	$num_c=mysql_num_rows($resultc);
	$chit=0;

	$query12="select * from factura where nr_factura=$nr_f";
	$result12=@mysql_query($query12) or die('12'.mysql_error());
	$row12=mysql_fetch_array($result12);
?>

 <table width="605" align="left" border="1" cellpadding="5"  bordercolor="#000000" cellspacing="0" bgcolor="#000000">
            <tr>
                <td width="605" valign="top" bgcolor="#FFFFFF">
                    <table width="605" align="left" border="0"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                        <tr>
                            <td width="200" align="left" valign="top">
                                <span class="arial">
                                Furnizor: S.C. EXPRES CATERING S.R.L.
                                <br />Nr.inm.ORC: J35/3863/2005
                                <br />CF: RO 1818919
                                <br />Sediul: TIMISOARA, GHIRODA, STR. BRATES 48
                                <br />Judetul: TIMIS
                                <br />Cont: RO44 BUCU 5654 0248 2511 RO01
                                <br />Banca: ALPHA BANK
                                </span>
                            </td>
                            <td width="140" align="center" valign="bottom">
                            <span class="fact">F&nbsp;A&nbsp;C&nbsp;T&nbsp;U&nbsp;R&nbsp;A&nbsp;&nbsp;<BR />FISCALA&nbsp&nbsp</span>

                            </td>
                            <td width="200" align="left" valign="top">
                            	<span class="arial">
                                Cumparator: <?php echo $row12['cumparator']; ?>
                                <br />Nr.inm.ORC: <?php echo $row12['nr_inm']; ?>
                                <br />CF: <?php echo $row12['cf']; ?>
                                <br />Sediul: <?php echo $row12['sediu']; ?>
                                <br />Judetul: <?php echo $row12['judet']; ?>
                                <br />Cont: <?php echo $row12['cont']; ?>
                                <br />Banca: <?php echo $row12['banca']; ?>
                                </span>
                    
                            </td>
                      </tr>
                      <tr height="5">
                            <td width="605" align="center" valign="middle" colspan="3">
                      		</td>
                      </tr>      
                       
                       <tr height="40">
                            <td width="605" align="center" valign="middle" colspan="3">
                            	<table width="320" cellpadding="3" cellspacing="0" align="center" bordercolor="#000000" border="1" bgcolor="#ffffff">
                                	<tr height="20">
                                    	<td width="320" align="left" valign="middle" bgcolor="#FFFFFF"><span class="arial">Seria QL nr.factura <?php echo $row1['nr_factura']; ?></span>
                                        </td>
                                    </tr>
                                    <tr height="20">
                                    	<td width="320" align="left" valign="middle" bgcolor="#FFFFFF"><span class="arial">data <?php echo $row1['zi'].'-'.$row1['luna'].'-'.$row1['an']; ?></span>
                                        </td>
                                    </tr>
                                </table> 
                            </td>
                       </tr>
                       <tr height="5">
                            <td width="605" align="center" valign="middle" colspan="3">
                            	
                            </td>
                       </tr>
                       <tr>
                            <td width="605" align="center" valign="middle" colspan="3">
                            	<table width="605" cellpadding="2" cellspacing="0" border="1"  bordercolor="#000000" align="center" bgcolor="#000000">
                                	<tr >
                                    	<td width="32" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">nr.crt</span>
                                        </td>
                                        <td width="320" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">Denumirea produselor sau a serviciilor</span>
                                        </td>
                                        <td width="30" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">U.M.</span>
                                        </td>
                                        <td width="30" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">Cant</span>
                                        </td>
                                        <td width="75" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">Pretul unitar<br />(fara T.V.A.)<br />-lei-</span>
                                        </td>
                                        <td width="64" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">Valoarea<br />-lei-</span>
                                        </td>
                                        <td width="64" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">Valoarea<br />T.V.A.<br />-lei-</span>
                                        </td>
                                    </tr>
                                    <tr height="14">
                                    	<td width="32" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">0</span>
                                        </td>
                                        <td width="320" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">1</span>
                                        </td>
                                        <td width="30" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">2</span>
                                        </td>
                                        <td width="30" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">3</span>
                                        </td>
                                        <td width="75" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">4</span>
                                        </td>
                                        <td width="64" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">5(3x4)</span>
                                        </td>
                                        <td width="64" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">6</span>
                                        </td>
                                    </tr>
                                    <?php
										$i=1;
										$total=0;
										
										$min_id1=$_GET['id'];
										if (strcmp($min_id1,"")!=0)
										{
											$min_id=$min_id1;
										}
										
										/*$query21="select * from prod_comanda_factura where comanda_id=$id_comanda";
										$result21=@mysql_query($query21) or die('4'.mysql_error());
										$num=mysql_num_rows($result21);
										if ($num>10)
										{
											$next=1;
										}*/
										
											$query222="select * from prod_comanda_factura where comanda_id=$id_comanda order by id asc";
										$result222=@mysql_query($query222) or die('142'.mysql_error());
										
										$numarul =mysql_num_rows($result222);
										
										$next=0;
										
										if ($numarul>22)
										{
											$next=1;
										}
										
										$query2="select * from prod_comanda_factura where comanda_id=$id_comanda  order by id asc limit 22";
										$result2=@mysql_query($query2) or die('14'.mysql_error());
										
										
									
										
										
										while($row2=mysql_fetch_array($result2))
										{
											$meniu_id=$row2['meniu_id'];
											
								?>
                                    <tr height="14">
                                    	<td width="32" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial"><?php echo $i; ?></span>
                                        </td>
                                        <td width="320" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial"><?php echo tip_meniu($row2['tip'],$meniu_id,$saptamana_cur,$saptamana); ?></span>
                                        </td>
                                        <td width="30" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial">LEU</span>
                                        </td>
                                        <td width="30" bgcolor="#FFFFFF" valign="middle" align="center"><span class="arial"><?php echo $row2['buc']; ?></span>
                                        </td>
                                        <td width="75" bgcolor="#FFFFFF" valign="middle" align="center">
                                        	<span class="arial">
												<?php
                                                    $y=aflare_pret($row2['tip'],$meniu_id,$saptamana_cur,$saptamana);
                                                    $y1=$y/1.19;
                                                    $y2=$y1;
                                                    echo round($y1,2);
                                                ?>
                                            </span>
                                        </td>
                                        <td width="64" bgcolor="#FFFFFF" valign="middle" align="center">
                                        	<span class="arial">
                                            	<?php
													$total+=$row2['buc']*$y2;
													echo round($row2['buc']*$y1,2);
												?>
                                            </span>
                                        </td>
                                        <td width="64" bgcolor="#FFFFFF" valign="middle" align="center">
                                        	<span class="arial">
                                            	<?php
													$y=$row2['buc']*aflare_pret($row2['tip'],$meniu_id,$saptamana_cur,$saptamana);
													$y1=$y*0.19;
													echo $ss=round($y1,2);
													
													
												?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php
										$i++;
									}
								?>      
                                    
                                </table> 
                            </td>
                       </tr>
                        <tr height="26">
                           <td colspan="3" bgcolor="#FFFFFF" valign="middle" align="left">
                           <span class="arial">&nbsp;&nbsp;Plata se face cu <?php echo $row12['plata_cu']; ?></span>
                           </td>
                                        
                       </tr>
                        <tr >
                           <td colspan="3" width="605" bgcolor="#FFFFFF" valign="top" align="left">
                           		<table width="605"  border="1" bordercolor="#000000" cellpadding="2" cellspacing="0" align="left">
                            		<tr height="17">
                                    	<td width="140" rowspan="3" valign="top" align="left"><span class="arial">Semnatura si stampila furnizorului</span>
                                        </td>
                                    	<td width="195" rowspan="3" valign="top" align="left"><span class="arial">Delegat:Manga Ion Levente<br />Nr. pasaport:P10946844<br />Nr.auto:KIE443</span>
                                        </td>
                                        <td width="120" rowspan="2" align="left" valign="middle"><span class="arial">Valoare<br />din care accize:</span>
                                        </td>
                                        <td width="80" align="center" valign="middle"><span class="arial"><?php echo $z=round($total,2); ?></span>
                                        </td>
                                        <td width="80" align="center" valign="middle"><span class="arial"><?php echo  $z1=round($total*0.19,2); ?></span>
                                        </td>
                                        
                                    </tr>	
                                    <tr height="17">
                                    	<td width="80">&nbsp;
                                        </td>
                                        <td width="80" align="center" valign="middle"><span class="arial">X</span>
                                        </td>
                                        
                                    </tr>	
                                    <tr height="30">
                                    	<td width="120" align="left" valign="top"><span class="arial">Semnatura de primire:</span>
                                        </td>
                                        <td width="160" colspan="2" align="left" valign="middle"><span class="arial">Total de plata: <b>
										<?php 
											$m=$z+$z1;
											$qqqq="select * from factura where nr_factura=$nr_f";
											$rrrr=@mysql_query($qqqq) or die(mysql_error());
											$rrooww=@mysql_fetch_array($rrrr);
											//echo $rrooww['total'];
											//echo $m;
											echo $sum=round($m,1);
											$updatare="update factura set total_part=$sum where nr_factura=$nr_f";
											$updatare1=@mysql_query($updatare) or die('2223'.mysql_error()); 
										?>RON</b><br />(col.5+col.6)</span>
                                        </td>
                                        
                                    </tr>	
                            	</table>
                           </td>
                                        
                       </tr>
                       
                       <tr height="1">
                           <td colspan="3" width="605" bgcolor="#FFFFFF" valign="middle" align="center">
                           <div id="id1">
                           <input type="button" name="printeaza" value="Printeaza" onClick="fct('')" />
                           <br />
                           <?php
								if ($next)
								{
									echo '<a href="printare-facturare-next.php?id_comanda='.$id_comanda.'&num='.$numarul.'" class="arial" target="_blank">Factura urmatoare<a>';
								}
							?>
                           </div>
                           </td>
                                        
                       </tr>
                       
               
                    </table>
				</td>
           </tr>
           
            
</table>

</body>

</html>

