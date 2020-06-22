<?php
function linie_zi($tabel, $ziua, $tip)
{
	$azi = date("w");
	$t = strtoupper($tip);
	$query = 'Select * from '.$tabel.' where (tip="'.$tip.'" or tip="'.strtoupper($tip).'") and ziua="'.$ziua.'"';
	$result = mysql_query($query) or die (mysql_error());
	$fitness = 0;
	$lacto_veg = 0;
	$rec = 0;
	if ($row = mysql_fetch_array($result))
	{
		if (strcmp($row["fitness"],'1') == 0)
		{
			$fitness = 1;
		}
		elseif (strcmp($row["lacto_vegetarian"],'1') == 0)
		{
			$lacto_veg = 1;
		}

		if (strcmp($row["recomanda"],'1') == 0)
		{
			$rec = 1;
		}
		if ($tip == R)
		{
			$tip = E2;
		}
		if ($tip == S)
		{
			$tip = G2;
		}

		$pp = $row["pret"];
		$p =  sprintf("%.2f",$pp);
		$nm = str_replace(',',', ',$row["nume"]);
		$string = '<dish idx="'.$tip.'" pret="'.$p.'" fitness="'.$fitness.'" lacto_vegetarian="'.$lacto_veg.'" recomandare="'.$rec.'">'.$nm.'</dish>
					';
		//echo $string;
		return $string;												
	}
	else
	{
		return '';
	}
}
?>



<?php

	include 'db.php';
	$fis_xml = fopen("meniu_c.xml","w");
	/*construire xml;*/

	/*construire data de inceput si de sfarsit a saptamanii curente*/
	$acum = time();
	$time_azi = strtotime("+8 hours",$acum);
	$zi_c = date("w",$time_azi);
	if ($zi_c == 0) 
	{
		$zi_c = 7;
		//$time_azi = strtotime("-1 day",$acum);								
	}
	$dif = $zi_c-1;
	$dif2 = 5-$zi_c;
	$in_saptamanii = date("d.m.y",strtotime("-".$dif." days",$time_azi));
	$sf_saptamanii = date("d.m.y",strtotime("+".$dif2." days",$time_azi));
	/* sfarsit construire data*/
	
	/*inceput parcurgere tabel*/
	$xml = '
	<meniu>
		<week start="'.$in_saptamanii.'" end="'.$sf_saptamanii.'">
			<day name="luni">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_curent", "luni", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>
			<day name="marti">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_curent", "marti", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>	
			<day name="miercuri">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_curent", "miercuri", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>
			<day name="joi">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_curent", "joi", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>
			<day name="vineri">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_curent", "vineri", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>
		</week>
	</meniu>';													
	fwrite($fis_xml,$xml);
	fclose($fis_xml);
	/*sfarsit construire fisier pe saptamana curenta*/
	


	$fis_xml = fopen("meniu_v.xml","w");
	/*construire xml;*/	
	/*construire data de inceput si de sfarsit a saptamanii viitoare*/
	$now = time();
	$time_azi = strtotime("+8 hours",$now);
	$time_next = strtotime("+1 week",$time_azi);
	$zi_c = date("w",$time_next);
	if ($zi_c == 0) 
	{
		$zi_c = 7;
	}
	$dif = $zi_c-1;
	$dif2 = 5-$zi_c;
	$in_saptamanii = date("d.m.y",strtotime("-".$dif." days",$time_next));
	$sf_saptamanii = date("d.m.y",strtotime("+".$dif2." days",$time_next));
	/* sfarsit construire data*/
	
	/*inceput parcurgere tabel*/
	$xml = '
	<meniu>
		<week start="'.$in_saptamanii.'" end="'.$sf_saptamanii.'">
			<day name="luni">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_viitor", "luni", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>
			<day name="marti">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_viitor", "marti", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>	
			<day name="miercuri">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_viitor", "miercuri", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>
			<day name="joi">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_viitor", "joi", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>
			<day name="vineri">';
	for ($i = 'A'; $i<='S'; $i++)
	{
		$linie = linie_zi("meniu_viitor", "vineri", $i);
		$xml .= $linie;
	}
	$xml .= '
			</day>
		</week>
	</meniu>';													
	fwrite($fis_xml,$xml);
	fclose($fis_xml);	
?>