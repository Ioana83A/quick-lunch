<?php
include("../templates/template.php");
	include("../templates/template3.php");
echo '<br />';
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
	if (($next_day>=$nr[$ziua] && $ss == 1))
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
		if (strcmp($row["fitness"],'1') == 0)
		{
			$color = '#FDDDA4';
			$src_rec = 'rec_red.jpg';
			$src_roll = 'roll_red.jpg';
		}
		elseif (strcmp($row["lacto_vegetarian"],'1') == 0)
		{
			$color = '#DCE89D';
			$src_rec = 'rec_green.jpg';
			$src_roll = 'roll_green.jpg';
		}
		else
		{	
			$src_rec = 'rec_ye.jpg';
			$src_roll = 'roll_ye.jpg';
		}
		if (strcmp($row["recomanda"],'1') != 0)
		{
			$rec = '';
		}
		else
		{
			$rec = '<img src="images/'.$src_rec.'" width="20" height="20" align="absbottom" />';
		}
		$pp = $row["pret"];
		$p =  sprintf("%.2f",$pp);
		$nm = str_replace(',',', ',$row["nume"]);
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
							<input type="text" class="pret_textbox" '.$disabled.' name="buc'.$t.$zi[$ziua].'" value="'.$_SESSION["vbuc".strtoupper($tip).$zi[$ziua]].'" /> &nbsp;
							</span>
						</td>
					</tr>
				</table>
			</td>				
					';	
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
function get(eid) {
	var d = document;
	var r = d.getElementById(eid);
	return r;
}

function popImg(open, nume, iref) 
{
	if (open)
	{
		// top for popup image 10 pixels
		// below corresponding thumb
		var top = (iref.offsetHeight + iref.offsetTop) + 'px';
		// left for popup image is aligned
		// with left of thumbnail
		var left = iref.offsetLeft + 'px';
		// use same source file for popup
		// as thumbnail
		var img = '<img src="' + nume + '" border="5" style="border-color:#a0cb02"  width="200" />';
		var d = document;
		// if popup hasn't yet been added,
		// create and append to body
		if (null == get('popImg')) 
		{
			var pop = d.createElement('DIV');
			pop.id = 'popImg';
			pop.style.position = 'absolute';
			d.body.appendChild(pop);
		}
		// get reference to popup image
		// container div
		var pop = get('popImg');
		// set image element into div
		pop.innerHTML = img;
		// position relative to thumbnail
		pop.style.top = top;
		pop.style.left = left;
		// show the div and its image
		pop.style.display = 'block';
	}
	else 
	{
	// since request was for close,
	// (open==false), hide the div -
	// don't destroy it, since it can
	// be recycled cheaper
	var pop = get('popImg');
	pop.style.display = 'none';
	}
}



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
	
	

?>
<body background="images/bg_verde.jpg" topmargin="0"  >

<table width="878" border="0" cellpadding="0" cellspacing="0" align="center">
	
   
   
	<tr height="25">
    	<td width="23" bgcolor="#91c102">
        </td>
    	<td width="833" bgcolor="#ffffff" align="left" valign="middle" >
          	<span class="verde_mic"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
             <b>Meniu pe saptamana viitoare</b> 
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;</span>
           	<a class="verde_mic" href="meniu.php">[meniu pe saptamana curenta]</a>
        </td>
    	<td width="23" bgcolor="#91c102">
        </td>            
    </tr>     
    <tr height="25" >
    	<td width="23" bgcolor="#91c102">
        </td>
    	<td width="833" bgcolor="#ffffff" align="left" valign="middle" >
        	<span class="gri_mic">&nbsp;&nbsp; &nbsp; Completati in casute numarul de portii dorite</span>
        </td>
        <td width="23" bgcolor="#91c102">
        </td>
     </td>                              
     <tr >
    	<td width="23" bgcolor="#91c102">
        </td>
    	<td width="833" bgcolor="#ffffff" align="center" >
        	<table width="810" bgcolor="#8BB903">
            	<tr height="25" valign="middle">
	             	<td width="100" bgcolor="#8BB903" align="center">
                     <span class="alb_sapt">
                    	<?php
							$acum = time();
							$time_azi = strtotime("+8 hours",$now);
							$time_next = strtotime("+1 week",$time_azi);
							$zi_c = date("w",$time_next);
							if ($zi_c == 0) 
							{
								$zi_c = 7;
							}
							$dif = $zi_c-1;
							$dif2 = 5-$zi_c;
							$in_saptamanii = date("d",strtotime("-".$dif." days",$time_next));
							$sf_saptamanii = date("d.m.y",strtotime("+".$dif2." days",$time_next));
							echo $in_saptamanii.' - '.$sf_saptamanii;
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
                <form name="meniu_viitor_form" action="comanda_viitor.php" method="post" onsubmit="return validate(this);">
                    <td width="50" bgcolor="#fffddf" align="center" rowspan="2">
                       <img src="images/ciorba.jpg" height="61" width="47" align="absmiddle" />
                       <span class="gri_mic_meniu">supe/ ciorbe</span>
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">A</font><br />
                        <span class="gri_mic_meniu">fara<br />carne</span>
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','a',$next_day, $ss);
                            echo $s;
                        ?> 
                </tr>
                <tr >			           
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">B</font><br />
                        <span class="gri_mic_meniu">cu<br />carne</span>                        
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','b',$next_day, $ss);
                            echo $s;
                        ?> 
                </tr>
                <tr >
                    <td width="50" bgcolor="#fffddf" align="center" rowspan="8">
                       <img src="images/fel_doi.jpg" height="44" width="47" align="absmiddle" />
                       <span class="gri_mic_meniu">felul doi</span>
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">C</font><br />
                        <span class="gri_mic_meniu">tocanite</span>
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','c',$next_day, $ss);
                            echo $s;
                        ?> 
                </tr>
                <tr >			           
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">D</font><br />
                        <span class="gri_mic_meniu">paste</span>                        
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','d',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','d',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','d',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','d',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','d',$next_day, $ss);
                            echo $s;
                        ?>            
                </tr>    
                <tr >			           
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">E1</font><br />
                        <span class="gri_mic_meniu">manca-<br />ruri</span>                        
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','e',$next_day, $ss);
                            echo $s;
                        ?>            
                </tr>
                 <tr >			           
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">E2</font><br />
                        <span class="gri_mic_meniu">manca-<br />ruri</span>                        
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','r',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','r',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','r',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','r',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','r',$next_day, $ss);
                            echo $s;
                        ?>            
                </tr>
                <tr >			           
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">F</font><br />
                        <span class="gri_mic_meniu">fitness</span>                        
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','f',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','f',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','f',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','f',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','f',$next_day, $ss);
                            echo $s;
                        ?>            
                </tr>
               <tr >			           
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G1</font><br />
                        <span class="gri_mic_meniu">paneuri</span>                        
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','g',$next_day, $ss);
                            echo $s;
                        ?>            
                </tr>
                 <tr >			           
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">G2</font><br />
                        <span class="gri_mic_meniu">paneuri</span>                        
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','s',$next_day, $ss);
                            echo $s;
                        ?>            
                </tr>
                <tr >			           
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">H</font><br />
                        <span class="gri_mic_meniu">speciali-<br />tati</span>                        
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','h',$next_day, $ss);
                            echo $s;
                        ?>            
                </tr>
                <tr >
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/desert.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">I</font><br />
                        <span class="gri_mic_meniu">desert</span>
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','i',$next_day, $ss);
                            echo $s;
                        ?>                            
                </tr>     
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/muraturi.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">J</font><br />
                        <span class="gri_mic_meniu">mura-<br />turi</span>
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','j',$next_day, $ss);
                            echo $s;
                        ?>                            
                </tr>  
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/salate.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">K</font><br />
                        <span class="gri_mic_meniu">salate</span>
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','k',$next_day, $ss);
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
                            $s = meniu_zi("meniu_viitor",'luni','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','l',$next_day, $ss);
                            echo $s;
                        ?>                            
                </tr>
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/meniu_.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">M</font><br />
                        <span class="gri_mic_meniu">meniu</span>
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','m',$next_day, $ss);
                            echo $s;
                        ?>                            
                </tr> 
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/meniu_economic.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">ME</font><br />
                        <span class="gri_mic_meniu">meniu economic</span>
                    </td>
                        <?php
                            $s = meniu_zi("meniu_viitor",'luni','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'marti','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'miercuri','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'joi','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_viitor",'vineri','n',$next_day, $ss);
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
                    	<span class="alb">&nbsp;Comanda dumneavoastra</span>
                    </td>
                    <td width="24" bgcolor="#FFFFFF">
                    </td>
                    <td width="275" bgcolor="#8bb903">
	                    <span class="alb">&nbsp; &nbsp;Legenda</span>
                    </td>
                </tr>
                <tr height="261" id="error">
                	<td width="495" bgcolor="#fffddf" valign="top">
                    	<table width="495" bgcolor="#fffddf" cellspacing="0" cellpadding="0" border="0">
							<tr height="5">
                            	<td colspan="4">
                                </td>
                            </tr>
                        	<tr height="36" valign="middle">
                            	<td width="50" align="right">
                                	<span class="gri_mic">cod</span>
                                </td>
                                <td width="135" align="center" valign="middle">
                                	<input type="text" name="cod" value="<?php echo $_SESSION["vcod"];?>" class="date_textbox" />
                                </td>
                                <td width="120">
                                	<span class="gri_mic">transmis de catre Quick Lunch</span>
                                </td>
                                <td width="180">
                                	<input type="checkbox" name="client_nou" value="1" />
                                    <span class="gri_mic">client nou</span>                                
                                </td>
                            </tr>
                        	<tr height="26" valign="middle">
                            	<td width="50" align="right">
                                	<span class="gri_mic">firma</span>
                                </td>
                                <td width="135" align="center" valign="middle">
                                 	<input type="text" name="firma" value="<?php echo $_SESSION["vfirma"];?>" class="date_textbox" />
                                </td>
                                <td width="120">
                                	<span class="portocaliu_mic">*</span>
                                </td>
                                <td width="180">
                                </td>                                
                            </tr> 
                        	<tr height="26" valign="middle">
                            	<td width="50" align="right">
                                	<span class="gri_mic">nume</span>
                                </td>
                                <td width="135" align="center" valign="middle">
                                	<input type="text" name="nume" value="<?php echo $_SESSION["vnume_c"];?>" class="date_textbox" />
                                </td>
                                <td width="120">
                                	<span class="portocaliu_mic">*</span> <span class="gri_mic">persoana contact</span>
                                </td>
                                <td width="180">
                                </td>                                 
                            </tr> 
                        	<tr height="26" valign="middle">
                            	<td width="50" align="right">
                                	<span class="gri_mic">adresa</span>
                                </td>
                                <td width="135" align="center" valign="middle">
                                	<input type="text" name="adresa" value="<?php echo $_SESSION["vadresa"];?>" class="date_textbox" />
                                </td>
                                <td width="120">
                                	<span class="portocaliu_mic">*</span>
                                </td>
                                <td width="180" height="52" rowspan="2" align="center">&nbsp;</td>                                 
                          </tr> 
                        	<tr height="26" valign="middle">
                            	<td width="50" align="right">
                                	<span class="gri_mic">telefon</span>
                                </td>
                                <td width="135" align="center" valign="middle">
                                	<input type="text" name="telefon" value="<?php echo $_SESSION["vtelefon"];?>" class="date_textbox" />
                                </td>
                                <td width="120">
                                	<span class="portocaliu_mic">*</span>
                                </td>
	                        </tr>
                        	<tr height="26" valign="middle">
                            	<td width="50" align="right">
                                	<span class="gri_mic">e-mail</span>
                                </td>
                                <td width="135" align="center" valign="middle">
                                	<input type="text" name="email" value="<?php echo $_SESSION["vemail"];?>" class="date_textbox" />
                                </td>
                                <td width="120">
                                	
                                </td>
                                <td width="180" align="center">&nbsp;</td>  
                          </tr>    
                        	<tr height="40" valign="middle">
                            	<td width="50" align="right">                                	
                                </td>
                                <td width="135" align="center" valign="top">
                                	<span class="gri_mic">Campurile marcate cu <span class="portocaliu_mic"></span> sunt obligatorii</span>
                                </td>
                                <td width="120" valign="top">
                                	<span class="portocaliu_mic">*</span>
                                </td>
                                <td width="180" align="center" valign="top">
                                	                                    
                                </td>  
                            </tr>
                            <tr height="50" bgcolor="#fffddf">
                            	<td width="50" align="right">                                	
                                </td>
                                <td width="135" align="left" valign="middle">
                                	<input type="image" src="images/comanda.jpg" width="120" height="35" alt="Comanda" align="absmiddle" />
                                </td>
                                <td width="120" valign="top">
                                </td>
                                <td width="180" align="center" valign="top">
                                </td>                             	
                            </tr>                                                                                                                                         
 	                   </table>
                    </td>
                    <td width="22" bgcolor="#fffddf" valign="bottom">
                    	<img src="images/bucatar_01.jpg" width="22" height="187" align="absbottom" hspace="0" vspace="0" />
                    </td>
                    <td width="24" bgcolor="#FFFFFF" valign="bottom">
	                    <img src="images/bucatar_02.jpg" width="24" height="187" align="absbottom" hspace="0" vspace="0" />
                    </td>
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
                        	<tr valign="bottom" height="82" >
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
                            	<td width="94" colspan="2">
                                	<img src="images/bucatar_03.jpg" width="94" height="187" align="bottom" vspace="0" hspace="0" />
								</td>
                                <td width="181" valign="top" align="right">
                                <center><span class="gri_mic">si recomandarile noastre. &nbsp; &nbsp; &nbsp; &nbsp;<br />
								Pofta buna! &nbsp; &nbsp;</span></center><br /><Br />
                                <span class="verde_italic">
                                Lacto-vegetarian &nbsp;&nbsp;<img src="images/l-v.jpg" align="absmiddle" height="18" width="64" />&nbsp;&nbsp;<br /><br />
                               	Fitness &nbsp;&nbsp;<img src="images/fitness.jpg" align="absmiddle" height="16" width="64" />&nbsp;&nbsp;<br /><br />
                                Recomandare &nbsp;&nbsp;<img src="images/rec.jpg" align="absmiddle" height="20" width="64" />&nbsp;&nbsp;
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
     <tr >

                	<td colspan="3" bgcolor="#90c103">

                   		<table width="833" bgcolor="#FFffff" align="center" cellpadding="0" cellspacing="0" >

                        	<tr height="20">

                            	<td width="833" colspan="10" valign="middle" align="center"><span class="gri_mic2">...........................................................................................................................................................................................................</span>

                                </td>

                            </tr>

                            <tr height="25">
								<td valign="middle" align="center">&nbsp;</td>
                              <td valign="middle" align="center">&nbsp;</td>
                              <td valign="middle" align="center">&nbsp;</td>
                            <td valign="middle" align="center">&nbsp;</td>
                            <td valign="middle" align="center">&nbsp;</td>
                            <td valign="middle" align="center">&nbsp;</td>
                            <td valign="middle" align="center">&nbsp;</td>
                            <td valign="middle" align="center">&nbsp;</td>
                            <td valign="middle" align="center">&nbsp;</td>
                            <td valign="middle" align="center">&nbsp;</td>

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
                       
                   </td>
               </tr>
            </table>             
        </td>
        <td width="22"  bgcolor="#90c103">
       
        </td>
    </tr> 
</table>  
<?php

?>

</body>
</html>