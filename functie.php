<?php

function afisare($ziua,$tip,$id,$s)
{
		$query2="select * from prod_comanda where comanda_id=$id";
		$result2=@mysql_query($query2) or die('2'.mysql_error());
		while ($produse=@mysql_fetch_array($result2))
		{
			$meniu=$produse['meniu_id'];
			//$bucAluni=afisare('luni','A',$meniu,$produse['buc']);
				
			//echo 'aa'.$meniu;
		
			
			if (strcmp($produse['tip'],'c')==0) 
			{
				$query3="select * from meniu_curent where id=$meniu and ziua=\"$ziua\" and tip=\"$tip\"";
				$result3=@mysql_query($query3) or die('3'.mysql_error());
				$menu=@mysql_fetch_array($result3);
			}
			else
			{
				$query3="select * from meniu_viitor  where id=$meniu and ziua=\"$ziua\" and tip=\"$tip\"";
				$result3=@mysql_query($query3) or die('4'.mysql_error());
				$menu=@mysql_fetch_array($result3);
			}
			//echo $buc;
			$nr=@mysql_num_rows($result3);
			if ($nr>0)
			{
				echo $produse['buc'];
			}
			else
			{
				//echo '-';
			}
			
}		
	//echo $menu['pret'];	
	if ($produse['buc']!=0)
	{
		return $s += $produse['buc']*$menu['pret'];
	}	
}

function total($id)
{
	$query="select * from prod_comanda where id=$id";
	$result=@mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_array($result))
	{
		$nrbuc=$row['buc'];
		$meniu_id=$row['meniu_id'];
		if (strcmp($row['tip'],'c')==0) 
		{
			$query1="select * from meniu_curent where id=$meniu_id";
			$result1=@mysql_query($query1) or die(mysql_error());
		}
		else
		{
			$query1="select * from meniu_viitor where id=$meniu_id";
			$result1=@mysql_query($query1) or die(mysql_error());
		}	
		
		$linie=@mysql_fetch_array($result1);
		$suma+=$linie['pret']*$nrbuc;
	}
	echo $suma;
}		

function meniu_zi($tabel, $ziua, $tip)
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
	if ($azi>=$nr[$ziua])
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
			$src_roll = 'roll_ye';
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
								<img style="position:absolute" src="images/'.$src_roll.'" width="20" height="20" align="absbottom" onmouseover="popImg(true, '."'".$row["poza"]."'".', this);" onmouseout="popImg(false);" />';
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
		return $string;												
	}
	else
	{
		return '<td width="142" bgcolor="#fffddf"></td>
		';
	}
}	
?>