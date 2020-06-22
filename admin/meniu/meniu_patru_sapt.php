<?php
session_start();
include "db.php";
include "utils.php";

function meniu_zi($tabel, $ziua, $tip, $next_day, $ss)
{
	$azi = date("w");
	//echo $azi;
	if ($w == 6 || $w == 0) //daca este sambata sau duminica
	{
		$w = 10;
	}
	$nr["luni"] = 1;
	$nr["marti"] = 2;
	$nr["miercuri"] = 3;
	$nr["joi"] = 4;
	$nr["vineri"] = 5;
	$nr["sambata"] = 6;
	$nr["duminica"] = 0;

	$zi["luni"] = 'l';
	$zi["marti"] = 'm';
	$zi["miercuri"] = 'mi';
	$zi["joi"] = 'j';
	$zi["vineri"] = 'v';
	$zi["sambata"] = 's';
	$zi["duminica"] = 'd';
	$t = strtoupper($tip);
	if ($next_day>=$nr[$ziua] || $ss == 1)
	{
		$disabled = 'disabled="disabled"';
	}
	else
	{
		$disabled = '';
	}
	
	$color = "#fffddf";
	$query = 'Select * from '.$tabel.' where (tip="'.$tip.'" or tip="'.strtoupper($tip).'") and ziua="'.$ziua.'"';
	//echo $query;
	$result = @mysql_query($query);// or die (mysql_error());
	if ($row = mysql_fetch_array($result))
	{
		$src_rec = 'rec.gif';
		$src_roll = 'roll_ye.gif';
		$src_buc = 'buc.gif';
		
		if (strcmp($row["fitness"],'1') == 0)
		{
			$color = '#FDDDA4';
		}
		elseif($tip=='m')
		{
			$color = '#39a961';
		}
		elseif($tip=='q')
		{
			$color = '#fff04e';
		}
		elseif (strcmp($row["lacto_vegetarian"],'1') == 0)
		{
			$color = '#DCE89D';
		}
		else if($tip=='z')
		{
			$color = '#bdcfd8';
		}
		else
		{
					//yellow
		}
		
		if (strcmp($row["recomanda"],'1') != 0)

		{

			if (strcmp($row["nou"],'1') != 0)
			{
				$rec = '';
			}
			else
			{
				$rec = '<img src="images/nou.gif" height="20" align="absbottom" />';
			}		



		}
		else
		{

			if (strcmp($row["nou"],'1') != 0)
			{
				$rec = '<img src="images/'.$src_rec.'" height="20" align="absbottom" />';
			}
			else
			{
				$rec = '<img src="images/'.$src_rec.'" height="20" align="absbottom" />&nbsp;<img src="images/nou.gif" height="20" align="absbottom" />';
			}

		}
		
		if (strcmp($row["buc"],'1') == 0){
			$rec .= '&nbsp;<img src="images/'.$src_buc.'" height="20" align="absbottom" />';
		}

		$pp = $row["pret"];
		$p =  sprintf("%.2f",$pp);
		$nm = str_replace(',',', ',$row["nume"]);
		$nm=str_replace('*-',"'",$nm);
		// pentru post culorile....
		if (strcmp($row["tip"],'P') == 0)
		{
			$src_roll='roll_gri.jpg';
			$string = '
			<td width="142" bgcolor="#c4c3c8">

			<table  width="142" cellspacing="0"  cellpadding="0" bgcolor="'.$color.'">
					<tr height="47" >
						<td width="142" bgcolor="#c4c3c8" align="center" colspan="2">
							<span class="negru_mic_meniu">'.$nm.'</span>
						</td>
					</tr>
					<tr height="23" valign="middle">
						<td width="60" bgcolor="#c4c3c8" align="left">
							&nbsp;
							'.$rec;
							if (strcmp($row["poza"],'') !=0)
							{
								$string .= '
								<img style="position:absolute" src="images/'.$src_roll.'" height="20" align="absbottom" onmouseover="popImg(true, '."'poze/".$row["poza"]."'".', this);" onmouseout="popImg(false);" />';
							}
					$string .= '
						</td>
						<td width="72" bgcolor="#c4c3c8" align="right" valign="middle">
							<span class="negru_mic_meniu">
							<b>'.$p.'</b>
							<input type="text" class="pret_textbox" '.$disabled.' name="buc'.$t.$zi[$ziua].'" value="'.$_SESSION["vbuc".strtoupper($tip).$zi[$ziua]].'" /> &nbsp;
							</span>
						</td>
					</tr>
				</table>
			</td>
					';
		}
		elseif (strcmp($row["tip"],'O') == 0)
		{
			$src_roll='roll_blue.jpg';
			$string = '
			<td width="142" bgcolor="#bcdfcb">

			<table  width="142" cellspacing="0"  cellpadding="0" bgcolor="'.$color.'">
					<tr height="47" >
						<td width="142" bgcolor="#bcdfcb" align="center" colspan="2">
							<span class="negru_mic_meniu">'.$nm.'</span>
						</td>
					</tr>
					<tr height="23" valign="middle">
						<td width="60" bgcolor="#bcdfcb" align="left">
							&nbsp;
							'.$rec;
							if (strcmp($row["poza"],'') !=0)
							{
								$string .= '
								<img style="position:absolute" src="images/'.$src_roll.'" height="20" align="absbottom" onmouseover="popImg(true, '."'poze/".$row["poza"]."'".', this);" onmouseout="popImg(false);" />';
							}
					$string .= '
						</td>
						<td width="72" bgcolor="#bcdfcb" align="right" valign="middle">
							<span class="negru_mic_meniu">
							<b>'.$p.'</b>
							<input type="text" class="pret_textbox" '.$disabled.' name="buc'.$t.$zi[$ziua].'" value="'.$_SESSION["vbuc".strtoupper($tip).$zi[$ziua]].'" /> &nbsp;
							</span>
						</td>
					</tr>
				</table>
			</td>
					';
		}
		elseif (strcmp($row["tip"],'M') == 0)
		{
			$string = '
			<td width="142" bgcolor="'.$color.'">		
				<table  width="142" cellspacing="0"  cellpadding="0" bgcolor="'.$color.'">
					<tr height="47" >
						<td width="142" bgcolor="'.$color.'" align="center" colspan="2">
							<span class="negru_mic_meniu" style="color:#f3efc6;">'.$nm.'</span>
						</td>
					</tr>
					<tr height="23" valign="middle">
						<td width="60" bgcolor="'.$color.'" align="left">                      
							&nbsp;
							'.$rec;
							if (strcmp($row["poza"],'') !=0)
							{
								$string .= ' 
								<img style="position:absolute" src="images/'.$src_roll.'" width="20" height="20" align="absbottom" onmouseover="popImg(true, '."'poze/".$row["poza"]."'".', this);" onmouseout="popImg(false);" />';
							}
					$string .= '			
						</td>
						<td width="72" bgcolor="'.$color.'" align="right" valign="middle">                      
							<span class="negru_mic_meniu" style="color:#f3efc6;">
							<b>'.$p.'</b>
							<input type="text" class="pret_textbox" '.$disabled.' name="buc'.$t.$zi[$ziua].'" value="'.$_SESSION["buc".strtoupper($tip).$zi[$ziua]].'" /> &nbsp;
							</span>
						</td>
					</tr>
				</table>
			</td>				
					';	
		}
		else {
		$string = '
			<td width="142" bgcolor="'.$color.'">		
				<table  width="142" cellspacing="0"  cellpadding="0" bgcolor="'.$color.'">
					<tr height="47" >
						<td width="142" bgcolor="'.$color.'" align="center" colspan="2">
							<span class="negru_mic_meniu">'.$nm.'</span>
						</td>
					</tr>
					<tr height="23" valign="middle">
						<td width="60" bgcolor="'.$color.'" align="left">                      
							&nbsp;
							'.$rec;
							if (strcmp($row["poza"],'') !=0)
							{
								$string .= ' 
								<img style="position:absolute" src="images/'.$src_roll.'" width="20" height="20" align="absbottom" onmouseover="popImg(true, '."'poze/".$row["poza"]."'".', this);" onmouseout="popImg(false);" />';
							}
					$string .= '			
						</td>
						<td width="72" bgcolor="'.$color.'" align="right" valign="middle">                      
							<span class="negru_mic_meniu">
							<b>'.$p.'</b>
							<input type="text" class="pret_textbox" '.$disabled.' name="buc'.$t.$zi[$ziua].'" value="'.$_SESSION["buc".strtoupper($tip).$zi[$ziua]].'" /> &nbsp;
							</span>
						</td>
					</tr>
				</table>
			</td>				
					';	
			}
		return $string;												
	}
	else
	{
		return '<td width="142" bgcolor="#fffddf"></td>
		';
	}
}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta content="Quick,Lunch,Meniu,Quick Lunch,Meniuri,Nunti,Botezuri" http-equiv="keywords" />
<title>Quick Lunch | Servim cald | Cattering | Meniuri pentru nunti si botezuri</title>
<link rel="stylesheet" type="text/css" href="text.css" />

<script type='text/javascript'>

</SCRIPT>

</head>
<?php
	$now = time();
	$time = strtotime("+8 hours",$now);
	$today = date("w",$time);
	$ora_locala = date("H",$time);
	$ora2 = date("H:i:s",$time);	
	$azi = $today;
//	echo 'Ora curenta este: '.$ora;
	//$azi = 4;
	
	if (strcmp($azi,'0') == 0 )
	{
		$azi = 7; //daca e duminica punem nr 7
	}
	
	$day[1] = 'LUNI';
	$day[2] = 'MARTI';
	$day[3] = 'MIERCURI';
	$day[4] = 'JOI';
	$day[5] = 'VINERI';
	$day[6] = 'SAMBATA';
	$day[7] = 'DUMINICA';
	$zile = '';

	if ($azi<4)
	{
		if ($ora_locala>=15)
		{	
			$next_day = $azi+1; //poate comanda pentru zile incapand cu next_day
			$ss = 0;
		}
		else
		{
			$next_day = $azi;
			$ss = 0;
		}
	}
	elseif ($azi == 4) //e joi
	{
		if ($ora_locala>=15) // e joi dupa-masa poate comanda numai pt sapt viitoare inclusiv luni
		{	
			$next_day = 0; 
			$ss = 1;
		}
		else
		{
			$next_day = 4;
			$ss = 0;
		}		
	}
	elseif ($azi == 5) //e vineri
	{
		if ($ora_locala>=15) // e vineri dupa-masa poate comanda numai pt sapt viitoare fara luni
		{	
			$next_day = 1; 
			$ss = 1;
		}
		else
		{
			$next_day = 0;
			$ss = 1;
		}		
	}
	else //e sambata sau duminica, poate comanda pt saptamana viitoare, in afara de luni;
	{
		$next_day = 1; 
		$ss = 1;	
	}
	
	for ($i = $next_day+1; $i<=4; $i++)
	{
		$zile .= $day[$i].', ';
	}	
	if ($next_day<5)
	{
		$zile .= $day[5];
	}
	
	if (strcmp($ss,0) == 0)
	{
		$alert = 'Astazi este '.$day[$azi].' ora '.$ora2.'. Se poate comanda pentru '.$zile.' din saptamana curenta si pentru saptamana viitoare.';
	}
	else
	{
		$alert = 'Astazi este '.$day[$azi].' ora '.$ora2.'. Se poate comanda numai pentru zilele de '.$zile.' din saptamana viitoare.';
	}
	
?>
<body background="images/bg_verde.jpg" topmargin="0" >

<table width="878" border="0" cellpadding="0" cellspacing="0" align="center">
	
    
     
	<tr height="25">
    	<td width="23" bgcolor="#91c102">
        </td>
    	<td width="833" bgcolor="#ffffff" align="left" valign="middle" >
          	<span class="verde_mic"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
             <b>Meniul de peste patru saptamani(doar vizualizare- nefunctional)</b> 
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;</span>
           	<a class="gri_mic" href="meniu_saptamana_viitoare.php"></a>
        </td>
    	<td width="23" bgcolor="#91c102">
        </td>            
    </tr>
	<tr height="25">
    	<td width="23" bgcolor="#91c102">
        </td>
    	<td width="833" bgcolor="#ffffff" align="left" valign="middle" >
        	<span class="gri_mic">&nbsp;&nbsp; &nbsp; </span>
        </td>
    	<td width="23" bgcolor="#91c102">
        </td>            
    </tr>                              
    <tr >
    	<td width="23" bgcolor="#91c102">
        </td>
    	<td width="833" bgcolor="#ffffff" align="center" >
        	<table width="810" bgcolor="#8BB903">
            	<tr height="25" valign="middle">
	             	<td width="100" bgcolor="#8BB903" align="center">
                     <span class="alb_sapt">
                    	<?php
							/*$acum = time();
							$time_azi = strtotime("+8 hours",$now);
							$zi_c = date("w",$time_azi);
							if ($zi_c == 0) 
							{
								$zi_c == 7;
							}
							$dif = $zi_c-1;
							$dif2 = 5-$zi_c;
							$in_saptamanii = date("d",strtotime("-".$dif." days",$time_azi));
							$sf_saptamanii = date("d.m.y",strtotime("+".$dif2." days",$time_azi));
							echo $in_saptamanii.' - '.$sf_saptamanii;
							$saptamana_curenta = date("W");
							//echo $saptamana_curenta;*/
							
							
							
							$acum = time();
							$time_azi = strtotime("+8 hours",$now);
							$time_next = strtotime("+4 week",$time_azi);
							$zi_c = date("w",$time_next);
							if ($zi_c == 0)
							{
								$zi_c = 7;

							}
							$dif = $zi_c-1;
							$dif2 = 5-$zi_c;
							$in_saptamanii = date("j",strtotime("-".$dif." days",$time_next));
							//$sf_saptamanii = date("d.m.y",strtotime("+".$dif2." days",$time_next));
							$sf_saptamanii1 = date("j",strtotime("+".$dif2." days",$time_next));
							$sf_saptamanii2 = date("F",strtotime("+".$dif2." days",$time_next));
							$sf_saptamanii3 = date("o",strtotime("+".$dif2." days",$time_next));
							if (strcmp($sf_saptamanii2,'January')==0)
							{
								$sf_saptamanii2='ian';
							}
							elseif (strcmp($sf_saptamanii2,'February')==0)
							{
								$sf_saptamanii2='feb';
							}
							elseif (strcmp($sf_saptamanii2,'March')==0)
							{
								$sf_saptamanii2='martie';
							}
							elseif (strcmp($sf_saptamanii2,'April')==0)
							{
								$sf_saptamanii2='aprilie';
							}
							elseif (strcmp($sf_saptamanii2,'May')==0)
							{
								$sf_saptamanii2='mai';
							}
							elseif (strcmp($sf_saptamanii2,'June')==0)
							{
								$sf_saptamanii2='iun';
							}
							elseif (strcmp($sf_saptamanii2,'July')==0)
							{
								$sf_saptamanii2='iul';

							}
							elseif (strcmp($sf_saptamanii2,'August')==0)
							{
								$sf_saptamanii2='aug';
							}
							elseif (strcmp($sf_saptamanii2,'September')==0)
							{
								$sf_saptamanii2='sept';

							}
							elseif (strcmp($sf_saptamanii2,'October')==0)
							{
								$sf_saptamanii2='oct';
							}
							elseif (strcmp($sf_saptamanii2,'November')==0)
							{
								$sf_saptamanii2='nove';
							}
							elseif (strcmp($sf_saptamanii2,'December')==0)
							{
								$sf_saptamanii2='dec';
							}
							$sf_saptamanii=$sf_saptamanii1.' '.$sf_saptamanii2.' '.$sf_saptamanii3;
							echo $in_saptamanii.' - '.$sf_saptamanii;
                            //echo "5 - 9 ian 2009";
							$saptamana_next = date("W");
							//echo $saptamana_curenta;



						
						?>
                        </span>                       
                    </td>
                    <td width="142" bgcolor="#8BB903" align="center">
                   		<span class="alb">luni</span>
                    </td>
                    <td width="142" bgcolor="#8BB903" align="center">
	                    <span class="alb">marti</span>
                    </td>
                    <td width="142" bgcolor="#8BB903" align="center">
                    	<span class="alb">miercuri</span>
                    </td>
                    <td width="142" bgcolor="#8BB903" align="center">
                    	<span class="alb">joi</span>
                    </td>
                    <td width="142" bgcolor="#8BB903" align="center">
                    	<span class="alb">vineri</span>
                    </td>                                                                                
                </tr>
            </table>
		</td>
    	<td width="23" bgcolor="#91c102">
        </td>
    </tr> 
	<tr height="1" >
    	<td width="23" bgcolor="#91c102">
        </td>
    	<td width="833" bgcolor="#ffffff" align="center" >
		</td>
    	<td width="23" bgcolor="#91c102">
        </td>
    </tr>          
	<tr >
    	<td width="23" bgcolor="#91c102">
        </td>
    	<td width="833" bgcolor="#ffffff" align="center" >
            <table width="810" cellspacing="1" cellpadding="0" bgcolor="#928D79" align="center">
                <tr >
                
                     <td width="50" bgcolor="#fffddf" align="center" rowspan="5">
                       <img src="images/ciorba.jpg" height="61" width="47" align="absmiddle" />
                       <span class="gri_mic_meniu">supe/ ciorbe</span>
                   </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">A1</font><br />
                        <span class="gri_mic_meniu">fara<br />carne</span>
						<!--<span class="puncte_weekend">1 punct</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','a',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr>
                <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">A1M</font><br />
                        <span class="gri_mic_meniu">fara<br />carne</span>
						<!--<span class="puncte_weekend">1 punct</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','aa',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','aa',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','aa',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','aa',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','aa',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr>
                <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">A2</font><br />
                        <span class="gri_mic_meniu">fara<br />carne</span>
						<!--<span class="puncte_weekend">1 punct</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','v',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','v',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','v',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','v',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','v',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr>
                <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">A2M</font><br />
                        <span class="gri_mic_meniu">fara<br />carne</span>
						<!--<span class="puncte_weekend">1 punct</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','ab',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','ab',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','ab',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','ab',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','ab',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
               <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">B</font><br />
                        <span class="gri_mic_meniu">cu<br />carne</span>
						<!--<span class="puncte_weekend">2 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','b',$next_day, $ss);
                           echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','b',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr >
                    <td width="50" bgcolor="#fffddf" align="center" rowspan="15">
                       <img src="images/fel_doi.jpg" height="44" width="47" align="absmiddle" />
                       <span class="gri_mic_meniu">felul doi</span>
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">C</font><br />
                       <span class="gri_mic_meniu">tocanite<br />manca-<br />ruri</span>
						<!--<span class="puncte_weekend">4 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','c',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">D1</font><br />
                        <span class="gri_mic_meniu">paste</span>
					<!--<span class="puncte_weekend">3 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','da',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','da',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','da',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','da',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','da',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">D2</font><br />
                        <span class="gri_mic_meniu">vegetari-<br/>ene</span>
					<!--<span class="puncte_weekend">3 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','db',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','db',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','db',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','db',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','db',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
        
                <tr >
                   <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">D3</font><br />
                        <span class="gri_mic_meniu">vegetari-<br/>ene</span>
						<!--<span class="puncte_weekend">4 puncte</span>-->
                   </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','e',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_viitor4",'marti','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','e',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                 <tr >
                   <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">E</font><br />
                        <span class="gri_mic_meniu">gratare</span>
						<!--<span class="puncte_weekend">4 puncte</span>-->
                   </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','ag',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_viitor4",'marti','ag',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','ag',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','ag',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','ag',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
               <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">F</font><br />
                        <span class="gri_mic_meniu">fitness</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                   </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','f',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','f',$next_day, $ss);
                           echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','f',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','f',$next_day, $ss);
                           echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','f',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G1</font><br />
                        <span class="gri_mic_meniu">paneuri</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                    </td>
                       <?php
                            $s = meniu_zi("meniu_viitor4",'luni','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','g',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G1M</font><br />
                        <span class="gri_mic_meniu">paneuri</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                    </td>
                       <?php
                            $s = meniu_zi("meniu_viitor4",'luni','ac',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','ac',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','ac',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','ac',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','ac',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
               <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G2</font><br />
                        <span class="gri_mic_meniu">paneuri</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                   </td>
                       <?php
                            $s = meniu_zi("meniu_viitor4",'luni','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','s',$next_day, $ss);
                            echo $s;
                        ?>
               </tr>
                <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G2M</font><br />
                        <span class="gri_mic_meniu">paneuri</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                    </td>
                       <?php
                            $s = meniu_zi("meniu_viitor4",'luni','ad',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','ad',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','ad',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','ad',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','ad',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
               <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G3</font><br />
                        <span class="gri_mic_meniu">paneuri</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                    </td>
                       <?php
                            $s = meniu_zi("meniu_viitor4",'luni','t',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','t',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','t',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','t',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','t',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                 <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G3M</font><br />
                        <span class="gri_mic_meniu">paneuri</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                    </td>
                       <?php
                            $s = meniu_zi("meniu_viitor4",'luni','ae',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','ae',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','ae',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','ae',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','ae',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
               <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G4</font><br />
                        <span class="gri_mic_meniu">paneuri</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                   </td>
                       <?php
                            $s = meniu_zi("meniu_viitor4",'luni','y',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','y',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','y',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','y',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','y',$next_day, $ss);
                            echo $s;
                        ?>
               </tr>
                <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G4M</font><br />
                        <span class="gri_mic_meniu">paneuri</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                    </td>
                       <?php
                            $s = meniu_zi("meniu_viitor4",'luni','af',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','af',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','af',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','af',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','af',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">H</font><br />
                        <span class="gri_mic_meniu">speciali-<br />t	ati</span>
						<!--<span class="puncte_weekend">6 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','h',$next_day, $ss);
                            echo $s;
                       ?>
                </tr>
                <tr >
                    <td width="50" bgcolor="#fffddf" align="center" rowspan="2">
                       <img src="images/desert.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">I1</font><br />
                        <span class="gri_mic_meniu">desert</span>
						<!--<span class="puncte_weekend">2 puncte</span>-->
                  </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','i',$next_day, $ss);
                            echo $s;
                       ?>
                </tr>
                <tr>
                 <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">I2</font><br />
                        <span class="gri_mic_meniu">desert</span>
						<!--<span class="puncte_weekend">2 puncte</span>-->
                  </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','x',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','x',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','x',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','x',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','x',$next_day, $ss);
                            echo $s;
                       ?>
                </tr>
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center">
                       <img src="images/muraturi.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">J1</font><br />
                        <span class="gri_mic_meniu">mura-<br />turi</span>
					<!--<span class="puncte_weekend">1 punct</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','j',$next_day, $ss);
                            echo $s;
                          $s = meniu_zi("meniu_viitor4",'vineri','j',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr>
                 <td width="50" bgcolor="#fffddf" align="center">
                       <img src="images/peste.png" height="26" width="47" align="absmiddle" />
                 </td>
                 <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">J2</font><br />
                        <span class="gri_mic_meniu">peste</span>
						<!--<span class="puncte_weekend">2 puncte</span>-->
                  </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','z',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','z',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','z',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','z',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','z',$next_day, $ss);
                            echo $s;
                       ?>
                </tr>
				   <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/salate.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">K</font><br />
                        <span class="gri_mic_meniu">Salate</span>
					<!--<span class="puncte_weekend">3 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','k',$next_day, $ss);
                            echo $s;
                       ?>
                </tr>
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/mancare-post.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">N</font><br />
                        <span class="gri_mic_meniu">Meniu dietetic</span>
					<!--<span class="puncte_weekend">3 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','o',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','o',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','o',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_viitor4",'joi','o',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_viitor4",'vineri','o',$next_day, $ss);
                           echo $s;
                        ?>
               </tr>
                <tr>
                   <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/mancare-post2.jpg" height="44" width="47" align="absmiddle" />
                    </td>
		            <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">P</font><br />
                        <span class="gri_mic_meniu">M&acirc;ncare post</span>
						<!--<span class="puncte_weekend">3 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','p',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','p',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','p',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','p',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','p',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
          
               
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/chifle.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">L</font><br />
                        <span class="gri_mic_meniu">chifle</span>
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','l',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                 <!-- Oferta bucatarului -->
                		<tr>
                   <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/U.jpg" height="44" width="47" align="absmiddle" />
                    </td>
		            <td width="50" bgcolor="#fffddf" align="center">
                       <font class="gri_mare_meniu">U</font><br />
                       <span class="gri_mic_meniu">Oferta bucata-<br />rului</span>
				<!--<span class="puncte_weekend">3 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','u',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','u',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_viitor4",'miercuri','u',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','u',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','u',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <!-- ________________ -->
               <!-- Oferta speciala -->
                		<tr>
                   <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/V.jpg" height="44" width="47" align="absmiddle" />
                    </td>
		            <td width="50" bgcolor="#fffddf" align="center">
                       <font class="gri_mare_meniu">V</font><br />
                       <span class="gri_mic_meniu">Meniu special</span>
				<!--<span class="puncte_weekend">3 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','r',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','r',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_viitor4",'miercuri','r',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','r',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','r',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <!-- ________________ -->
                 <!-- meniu office -->
                		<tr>
                   <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/Q.jpg" height="44" width="47" align="absmiddle" />
                    </td>
		            <td width="50" bgcolor="#fffddf" align="center">
                       <font class="gri_mare_meniu">Q</font><br />
                       <span class="gri_mic_meniu">Meniu office</span>
				<!--<span class="puncte_weekend">3 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','q',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','q',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_viitor4",'miercuri','q',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','q',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','q',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <!-- ________________ -->
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/meniu_.jpg" height="44" width="47" align="absmiddle" />
                   </td>
                   <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">MM</font><br />
                        <span class="gri_mic_meniu">meniu mediu</span>
						<!--<span class="puncte_weekend">7 puncte</span>-->
                    </td>
                       <?php
                            $s = meniu_zi("meniu_viitor4",'luni','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','m',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/ME.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">ME</font><br />
                        <span class="gri_mic_meniu">meniu economic</span>
						<!--<span class="puncte_weekend">5 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor4",'luni','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'marti','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'miercuri','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'joi','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor4",'vineri','n',$next_day, $ss);
                            echo $s;
                       ?>
                </tr>
  			</table>
	   	<td width="23" bgcolor="#91c102">
        </td>       
    </tr>
    <tr height="200">
	   	<td width="23" bgcolor="#91c102">
        </td>
    	<td width="833" bgcolor="#ffffff" align="center" valign="top">
        	<table width="816" align="center" bgcolor="#fffddf" cellpadding="0" cellspacing="0">
            	<tr height="5">
                	<td colspan="3">
                    </td>                 
                </tr>
            	<tr height="27">
                	<td width="495" bgcolor="#8BB903" valign="middle" colspan="2">
                    	<span class="alb">&nbsp;</span>
                    </td>
                    <td width="24" bgcolor="#FFFFFF">
                    </td>
                    <td width="275" bgcolor="#8bb903">
	                    <span class="alb">&nbsp; &nbsp;Legenda</span>
                    </td>
                </tr>
                <tr height="261" id="error">
                	<td width="495" bgcolor="#fffddf" valign="top">&nbsp;
                    	
                    </td>
                    <td width="22" bgcolor="#fffddf" valign="bottom">&nbsp;</td>
                    <td width="24" bgcolor="#FFFFFF" valign="bottom">&nbsp;</td>
              <td width="275">
	                    <table width="275" height="211" align="center" cellspacing="0" cellpadding="0" border="0">
                        	<tr height="1">
                            	<td width="10">
                                </td>
                                <td width="84">
                                </td>
                                <td width="181">
                                </td>
                            </tr>
                        	<tr valign="top" height="82" >
                            	<td width="10" bgcolor="#fffddf">
                                </td>
                            	<td width="265" align="left" colspan="2">
                                	<span class="gri_mic">
                                    <br />
	                                    Pentru a va fi mai usor sa gasiti exact ce va doriti in meniul 
                                        nostru saptamanal, am marcat diferentiat mancarurile lacto-vegetariene, 
                                        cele fitness (la care am adaugat si numarul de calorii per portie)  
                                    </span>
                                </td>                                
                            </tr>
                            <tr height="178" valign="bottom">
                            	<td width="94" colspan="2">&nbsp;</td>
                              <td width="181" valign="top" align="right">
	                            <center><span class="gri_mic">si recomandarile noastre. &nbsp; &nbsp; &nbsp; &nbsp;<br />
								Pofta buna! &nbsp; &nbsp;</span></center><br /><Br />
                                <span class="verde_italic">
                               
							   	<table>
									<tr>
										<td>
											Lacto-vegetarian 
										</td>
										<td>
											<img src="images/l-v.jpg" align="absmiddle"  />
										</td>
									</tr>
									<tr>
										<td>
											Fitness 
										</td>
										<td>
											<img src="images/fitness.jpg" align="absmiddle"  />
										</td>
									</tr>
									<tr>
										<td>
											Dietetic 
										</td>
										<td>
											<img src="images/dietetic.jpg" align="absmiddle" />
										</td>
									</tr>
                                    <tr>
										<td>
											M&acirc;nc&aring;ruri de post 
										</td>
										<td>
											<img src="images/gri-de-post.jpg" align="absmiddle" />
										</td>
									</tr>
									<tr>
										<td>
											Recomandare
										</td>
										<td>
											<img src="images/reg_legenda.gif" align="absmiddle" />
										</td>
									</tr>
									<tr>
										<td>
											Nou in meniu
										</td>
										<td>
											<img src="images/nou_legenda.gif" align="absmiddle" />
										</td>
									</tr>
									<tr>
										<td>
											Recomandarea<br /> bucatarului
										</td>
										<td>
											<img src="images/buc_legenda.gif" align="absmiddle" />
										</td>
									</tr>
								</table>
							   
                                </span>
                                </td>                                 
                            </tr>                            
                        </table>
                    </td>               
                </tr>
            </table>
        </td>
    	<td width="23" bgcolor="#91c102">
        </td>
        </form>
    </tr>
    
</table>  
<?php

?>

</body>
</html>