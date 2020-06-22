
<?php
//session_start();

 //echo '<META http-equiv="refresh" content="0;URL=meniu_saptamana_viitoare.php"> ';

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
		elseif($tip=='t')
		{
			$color = '#fff67e';
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
		if (strcmp($row["tip"],'O') == 0)
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
								//$string .= '
								//<img style="position:absolute" src="images/'.$src_roll.'" height="20" align="absbottom" onmouseover="popImg(true, '."'poze/".$row["poza"]."'".', this);" onmouseout="popImg(false);" />';
								//$string .= '<a href="poze/"'.$row["poza"].'" title="'.$row["poza"].'" id="text_galerie"><img src="images/"'.$src_roll.'" height="20" alt="" /></a>';
								//$string .= '<a href="poze/"'.$row["poza"].'" rel="lightbox["'.$row["poza"].'"]"><img src="images/"'.$src_roll.'" height="20" alt="" /></a>';
									$string .= '
									<a href="poze/'.$row["poza"].'" rel="lightbox['.$row["poza"].']"><img style="position:absolute" src="images/'.$src_roll.'" height="20" align="absbottom"/></a>';
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
		elseif (strcmp($row["tip"],'P') == 0)    
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
								//$string .= '
								//<img style="position:absolute" src="images/'.$src_roll.'" width="20" height="20" align="absbottom" onmouseover="popImg(true, '."'poze/".$row["poza"]."'".', this);" onmouseout="popImg(false);" />';
								//$string .= '<a href="poze/"'.$row["poza"].'" title="pic1" id="text_galerie"><img src="images/"'.$src_roll.'" height="20" alt="" /></a>';
								//$string .= '<a href="poze/"'.$row["poza"].'" rel="lightbox["'.$row["poza"].'"]"><img src="images/"'.$src_roll.'" height="20" alt="" /></a>';
								$string .= '
								<a href="poze/'.$row["poza"].'" rel="lightbox['.$row["poza"].']"><img style="position:absolute" src="images/'.$src_roll.'" height="20" align="absbottom"/></a>';

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
								//$string .= '
								//<img style="position:absolute" src="images/'.$src_roll.'" width="20" height="20" align="absbottom" onmouseover="popImg(true, '."'poze/".$row["poza"]."'".', this);" onmouseout="popImg(false);" />';
								//$string .= '<a href="poze/"'.$row["poza"].'" title="pic1" id="text_galerie"><img src="images/"'.$src_roll.'" height="20" alt="" /></a>';
								//$string .= '<a href="poze/"'.$row["poza"].'" rel="lightbox["'.$row["poza"].'"]"><img src="images/"'.$src_roll.'" height="20" alt="" /></a>';
								$string .= '
								<a href="poze/'.$row["poza"].'" rel="lightbox['.$row["poza"].']"><img style="position:absolute" src="images/'.$src_roll.'" height="20" align="absbottom"/></a>';
							}
					$string .= '
						</td>
						<td width="72" bgcolor="'.$color.'" align="right" valign="middle">
					<span class="negru_mic_meniu"  style="color:#f3efc6;">
							<b>'.$p.'</b>
							<input type="text" class="pret_textbox" '.$disabled.' name="buc'.$t.$zi[$ziua].'" value="'.$_SESSION["vbuc".strtoupper($tip).$zi[$ziua]].'" /> &nbsp;
							</span>
						</td>
					</tr>
				</table>
			</td>
					';
		}
		else
		{
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
								//$string .= '
								//<img style="position:absolute" src="images/'.$src_roll.'" width="20" height="20" align="absbottom" onmouseover="popImg(true, '."'poze/".$row["poza"]."'".', this);" onmouseout="popImg(false);" />';
								//$string .= '<a href="poze/"'.$row["poza"].'" title="pic1" id="text_galerie"><img src="images/"'.$src_roll.'" height="20" alt="" /></a>';
								//$string .= '<a href="poze/"'.$row["poza"].'" rel="lightbox["'.$row["poza"].'"]"><img src="images/"'.$src_roll.'" height="20" alt="" /></a>';
								$string .= '
								<a href="poze/'.$row["poza"].'" rel="lightbox['.$row["poza"].']"><img style="position:absolute" src="images/'.$src_roll.'" height="20" align="absbottom"/></a>';
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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include "metataguri.php"; ?>
<title>Quick Lunch | Catering Timisoara | Livrare la domiciliu</title>

<link type="text/css" href="styles/style_meniu.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="styles/style_ie6.css" />

    
    
    <script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>


<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />



<script type="text/javascript" src="js/swap.js"></script>

<script type="text/javascript" >
		function scroll()
		{
		document.getElementById('mesaj').scrollTop=document.getElementById('mesaj').scrollHeight-document.getElementById('mesaj').clientHeight;
		}		
		
</script>

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
function validate_meniu(myform)
{
	if (myform.bucAl.value !='' && myform.bucAl.value != null)
	{
	return true;
	}
	if (myform.bucAm.value !='' && myform.bucAm.value != null)
	{
	return true;
	}
	if (myform.bucAmi.value !='' && myform.bucAmi.value != null)
	{
		return true;
	}
	if (myform.bucAj.value !='' && myform.bucAj.value != null)
	{
		return true;
	}
	if (myform.bucAv.value !='' && myform.bucAv.value != null)
	{
		return true;
	}
	if (myform.bucBl.value !='' && myform.bucBl.value != null)
	{
		return true;
	}
	if (myform.bucBm.value !='' && myform.bucBm.value != null)
	{
		return true;
	}
	if (myform.bucBmi.value !='' && myform.bucBmi.value != null)
	{
		return true;
	}
	if (myform.bucBj.value !='' && myform.bucBj.value != null)
	{
		return true;
	}
	if (myform.bucBv.value !='' && myform.bucBv.value != null)
	{
		return true;
	}
	if (myform.bucCl.value !='' && myform.bucCl.value != null)
	{
		return true;
	}
	if (myform.bucCm.value !='' && myform.bucCm.value != null)
	{
		return true;
	}
	if (myform.bucCmi.value !='' && myform.bucCmi.value != null)
	{
		return true;
	}
	if (myform.bucCj.value !='' && myform.bucCj.value != null)
	{
		return true;
	}
	if (myform.bucCv.value !='' && myform.bucCv.value != null)
	{
	return true;
	}
	if (myform.bucDl.value !='' && myform.bucDl.value != null)
	{
		return true;
	}
	if (myform.bucDm.value !='' && myform.bucDm.value != null)
	{
		return true;
	}
	if (myform.bucDmi.value !='' && myform.bucDmi.value != null)
	{
		return true;
	}
	if (myform.bucDj.value !='' && myform.bucDj.value != null)
	{
		return true;
	}
	if (myform.bucDv.value !='' && myform.bucDv.value != null)
	{
		return true;
	}
	if (myform.bucEl.value !='' && myform.bucEl.value != null)
	{
		return true;
	}
	if (myform.bucEm.value !='' && myform.bucEm.value != null)
	{
		return true;
	}
	if (myform.bucEmi.value !='' && myform.bucEmi.value != null)
	{
		return true;
	}
	if (myform.bucEj.value !='' && myform.bucEj.value != null)
	{
		return true;
	}
	if (myform.bucEv.value !='' && myform.bucEv.value != null)
	{
		return true;
	}
	if (myform.bucFl.value !='' && myform.bucFl.value != null)
	{
		return true;
	}
	if (myform.bucFm.value !='' && myform.bucFm.value != null)
	{
		return true;
	}
	if (myform.bucFmi.value !='' && myform.bucFmi.value != null)
	{
		return true;
	}
	if (myform.bucFj.value !='' && myform.bucFj.value != null)
	{
		return true;
	}
	if (myform.bucFv.value !='' && myform.bucFv.value != null)
	{
		return true;
	}
	if (myform.bucGl.value !='' && myform.bucGl.value != null)
	{
		return true;
	}
	if (myform.bucGm.value !='' && myform.bucGm.value != null)
	{
		return true;
	}
	if (myform.bucGmi.value !='' && myform.bucGmi.value != null)
	{
		return true;
	}
	if (myform.bucGj.value !='' && myform.bucGj.value != null)
	{
		return true;
	}
	if (myform.bucGv.value !='' && myform.bucGv.value != null)
	{
		return true;
	}
	if (myform.bucHl.value !='' && myform.bucHl.value != null)
	{
		return true;
	}
	if (myform.bucHm.value !='' && myform.bucHm.value != null)
	{
		return true;
	}
	if (myform.bucHmi.value !='' && myform.bucHmi.value != null)
	{
		return true;
	}
	if (myform.bucHj.value !='' && myform.bucHj.value != null)
	{
		return true;
	}
	if (myform.bucHv.value !='' && myform.bucHv.value != null)
	{
		return true;
	}
	if (myform.bucIl.value !='' && myform.bucIl.value != null)
	{
		return true;
	}
	if (myform.bucIm.value !='' && myform.bucIm.value != null)
	{
		return true;
	}
	if (myform.bucImi.value !='' && myform.bucImi.value != null)
	{
		return true;
	}
	if (myform.bucIj.value !='' && myform.bucIj.value != null)
	{
		return true;
	}
	if (myform.bucIv.value !='' && myform.bucIv.value != null)
	{
		return true;
	}
	if (myform.bucJl.value !='' && myform.bucJl.value != null)
	{
		return true;
	}
	if (myform.bucJm.value !='' && myform.bucJm.value != null)
	{
		return true;
	}
	if (myform.bucJmi.value !='' && myform.bucJmi.value != null)
	{
		return true;
	}
	if (myform.bucJj.value !='' && myform.bucJj.value != null)
	{
		return true;
	}
	if (myform.bucJv.value !='' && myform.bucJv.value != null)
	{
		return true;
	}
	if (myform.bucKl.value !='' && myform.bucKl.value != null)
	{
		return true;
	}
	if (myform.bucKm.value !='' && myform.bucKm.value != null)
	{
		return true;
	}
	if (myform.bucKmi.value !='' && myform.bucKmi.value != null)
	{
		return true;
	}
	if (myform.bucKj.value !='' && myform.bucKj.value != null)
	{
		return true;
	}
	if (myform.bucKv.value !='' && myform.bucKv.value != null)
	{
		return true;
	}
	if (myform.bucOl.value !='' && myform.bucOl.value != null)
	{
		return true;
	}
	if (myform.bucOm.value !='' && myform.bucOm.value != null)
	{
		return true;
	}
	if (myform.buOAmi.value !='' && myform.bucOmi.value != null)
	{
		return true;
	}
	if (myform.bucOj.value !='' && myform.bucOj.value != null)
	{
		return true;
	}
	if (myform.bucOv.value !='' && myform.bucOv.value != null)
	{
		return true;
	}
	if (myform.bucLl.value !='' && myform.bucLl.value != null)
	{
		return true;
	}
	if (myform.bucLm.value !='' && myform.bucLm.value != null)
	{
		return true;
	}
	if (myform.bucLmi.value !='' && myform.bucLmi.value != null)
	{
		return true;
	}
	if (myform.bucLj.value !='' && myform.bucLj.value != null)
	{
		return true;
	}
	if (myform.bucLv.value !='' && myform.bucLv.value != null)
	{
		return true;
	}
	if (myform.bucMl.value !='' && myform.bucMl.value != null)
	{
		return true;
	}
	if (myform.bucMm.value !='' && myform.bucMm.value != null)
	{
		return true;
	}
	if (myform.bucMmi.value !='' && myform.bucMmi.value != null)
	{
		return true;
	}
	if (myform.bucMj.value !='' && myform.bucMj.value != null)
	{
		return true;
	}
	if (myform.bucMv.value !='' && myform.bucMv.value != null)
	{
		return true;
	}
	if (myform.bucNl.value !='' && myform.bucNl.value != null)
	{
		return true;
	}
	if (myform.bucNm.value !='' && myform.bucNm.value != null)
	{
		return true;
	}
	if (myform.bucNmi.value !='' && myform.bucNmi.value != null)
	{
		return true;
	}
	if (myform.bucNj.value !='' && myform.bucNj.value != null)
	{
		return true;
	}
	if (myform.bucNv.value !='' && myform.bucNv.value != null)
	{
		return true;
	}
	if (myform.bucPl.value !='' && myform.bucPl.value != null)
	{
		return true;
	}
	if (myform.bucPm.value !='' && myform.bucPm.value != null)
	{
		return true;
	}
	if (myform.bucPmi.value !='' && myform.bucPmi.value != null)
	{
		return true;
	}
	if (myform.bucPj.value !='' && myform.bucPj.value != null)
	{
		return true;
	}
	if (myform.bucPv.value !='' && myform.bucPv.value != null)
	{
		return true;
	}
	if (myform.bucTl.value !='' && myform.bucTl.value != null)
	{
		return true;
	}
	if (myform.bucTm.value !='' && myform.bucTm.value != null)
	{
		return true;
	}
	if (myform.bucTmi.value !='' && myform.bucTmi.value != null)
	{
		return true;
	}
	if (myform.bucTj.value !='' && myform.bucTj.value != null)
	{
		return true;
	}
	if (myform.bucTv.value !='' && myform.bucTv.value != null)
	{
		return true;
	}
	if (myform.bucRl.value !='' && myform.bucRl.value != null)
	{
		return true;
	}
	if (myform.bucRm.value !='' && myform.bucRm.value != null)
	{
		return true;
	}
	if (myform.bucRmi.value !='' && myform.bucRmi.value != null)
	{
		return true;
	}
	if (myform.bucRj.value !='' && myform.bucRj.value != null)
	{
		return true;
	}
	if (myform.bucRv.value !='' && myform.bucRv.value != null)
	{
		return true;
	}
	if (myform.bucSl.value !='' && myform.bucSl.value != null)
	{
		return true;
	}
	if (myform.bucSm.value !='' && myform.bucSm.value != null)
	{
		return true;
	}
	if (myform.bucSmi.value !='' && myform.bucSmi.value != null)
	{
		return true;
	}
	if (myform.bucSj.value !='' && myform.bucSj.value != null)
	{
		return true;
	}
	if (myform.bucSv.value !='' && myform.bucSv.value != null)
	{
		return true;
	}
    if (myform.bucVl.value !='' && myform.bucVl.value != null)
	{
		return true;
	}
	if (myform.bucVm.value !='' && myform.bucVm.value != null)
	{
		return true;
	}
	if (myform.bucVmi.value !='' && myform.bucVmi.value != null)
	{
		return true;
	}
	if (myform.bucVj.value !='' && myform.bucVj.value != null)
	{
		return true;
	}
	if (myform.bucVv.value !='' && myform.bucVv.value != null)
	{
		return true;
	}
	return false;
}
function validate(myform)
{
	if (!validate_meniu(myform))
	{
		alert('Trebuie sa introduceti cel putin o portie');
		return false;
	}
	if (myform.firma.value =='' || myform.firma.value == null)
	{
		alert('Trebuie sa introduceti numele firmei!');
		return false;
	}
	if (myform.nume.value == '' || myform.nume.value == null)
	{
		alert('Trebuie sa introduceti numele persoanei de contact');
		return false;
	}
	if (myform.adresa.value == '' || myform.adresa.value == null)
	{
		alert('Trebuie sa introduceti adresa');
		return false;
	}
	if (myform.telefon.value == '' || myform.telefon.value == null)
	{
		alert('Trebuie sa introduceti numarul de telefon');
		return false;
	}
	return true;
}
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
	function ffct( content)
    {
        	content = content.replace(/#/g, "\"");
			content = content.replace(/@/g, "#");
			document.getElementById('id2').innerHTML = content;
			//alert(document.getElementById('id2').innerHTML);
    }
 -->
</SCRIPT>


<link rel="stylesheet" type="text/css" href="styles/anylinkmenu.css" />
<script type="text/javascript" src="js/menucontents.js"></script>
<script type="text/javascript" src="js/anylinkmenu.js">
/***********************************************
* AnyLink JS Drop Down Menu v2.0- ¬© Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Project Page at http://www.dynamicdrive.com/dynamicindex1/dropmenuindex.htm for full source code
***********************************************/
</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>



</head>
<?php
	$now = time();
	$time = strtotime("+7 hours",$now);
	$today = date("w",$time);
	$ora_locala = date("H",$time);
	//$ora2 = date("H:i:s",$time);
		$ora2_h = date("H",$time);
			$ora2_m = date("i",$time);
				$ora2_s = date("s",$time);
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
		$alert = 'Astazi este '.$day[$azi].' ora '.$ora2_h.':'.$ora2_m.':'.$ora2_s.'. Se poate comanda pentru '.$zile.' din saptamana curenta si pentru viitoare.';

	}
	else
	{
		$alert = 'Astazi este '.$day[$azi].' ora '.$ora2_h.':'.$ora2_m.':'.$ora2_s.'. Se poate comanda numai pentru zilele de '.$zile.' din saptamana viitoare.';
	}
?>

<body  onload="javascript: alert('<?php echo $alert; ?>')">

	<div id="content"><!-- start of content -->
    		<div id="upper_part"><!-- start of upper_part -->
            
            		
            		
 					 <div id="sus">
                                <div id="servetel">
                                    <img src="images/servetel_sus.png" />                            </div>
                                <div id="newsletter">
                                
                                	
                                		<div id="plic">
                                        	<img src="images/plic.png" />                                       </div>
                                       <?php include "newsletter.php"; ?> 
                               </div>
                    </div>
                   <?php include "meniu_sus.php"; ?>
            </div><!-- end of upper_part -->
          <div id="sus_centru">
            
            </div>
  			<div id="center"> <!-- start of center -->
            <!-- ================================== CONTENT =============================== -->
            			<div id="descarca_butoane">
                        		<div id="butoane_sapt">
                                        <div id="saptamana_curenta">
                                     			<img src="images/meniu/sapt_curenta.png" name="saptamana_curenta_pic"  width="202" height="38" border="0"/>
                                        		<!--<a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('saptamana_curenta_pic','','images/meniu/sapt_viitoare.png',1)">
                            					<img src="images/meniu/sapt_curenta.png" name="saptamana_curenta_pic"  width="202" height="38" border="0"/></a>-->
                                                <div id="numar"> <span id="alb_saptamana"><?php echo date('W', time()+3600*8)+0 ?></span>
                                                <?php
							$acum1 = time();
							$time_azi1 = strtotime("+8 hours",$acum1);
							$time_next1 = strtotime("+1 week",$time_azi1);
							$zi_c1 = date("w",$time_next1);
							if ($zi_c1 == 0)
							{
								$zi_c1 = 7;
							}
							$dif1 = $zi_c1-1;
							$dif21 = 5-$zi_c1;
							$in_saptamanii1 = date("j",strtotime("-".$dif1." days",$time_next1));
							//$sf_saptamanii1 = date("d.m.y",strtotime("+".$dif21." days",$time_next1));
							$sf_saptamanii11 = date("j",strtotime("+".$dif21." days",$time_next1));
							$sf_saptamanii12 = date("F",strtotime("+".$dif21." days",$time_next1));
							$sf_saptamanii13 = date("o",strtotime("+".$dif21." days",$time_next1));
							//$sfarsit=explode('.',$sf_saptamanii1);
							if (strcmp($sf_saptamanii12,'January')==0)
							{
								$sf_saptamanii12='ian';
							}
							elseif (strcmp($sf_saptamanii12,'February')==0)
							{
								$sf_saptamanii12='feb';
							}
							elseif (strcmp($sf_saptamanii12,'March')==0)
							{
								$sf_saptamanii12='martie';
							}
							elseif (strcmp($sf_saptamanii12,'April')==0)
							{
								$sf_saptamanii12='aprilie';
							}
							elseif (strcmp($sf_saptamanii12,'May')==0)
							{
								$sf_saptamanii12='mai';
							}
							elseif (strcmp($sf_saptamanii12,'June')==0)
							{
								$sf_saptamanii12='iun';
							}
							elseif (strcmp($sf_saptamanii12,'July')==0)
							{
								$sf_saptamanii12='iul';
							}
							elseif (strcmp($sf_saptamanii12,'August')==0)
							{
								$sf_saptamanii12='aug';
							}
							elseif (strcmp($sf_saptamanii12,'September')==0)
							{
								$sf_saptamanii12='sept';
							}
							elseif (strcmp($sf_saptamanii12,'October')==0)
							{
								$sf_saptamanii12='oct';
							}
							elseif (strcmp($sf_saptamanii12,'November')==0)
							{
								$sf_saptamanii12='nove';
							}
							elseif (strcmp($sf_saptamanii12,'December')==0)
							{
								$sf_saptamanii12='dec';
							}
							$sf_saptamanii1=$sf_saptamanii11.' '.$sf_saptamanii12.' '.$sf_saptamanii13;
							$saptamana_next = date("W");
							//echo $saptamana_curenta;
						?>
                                                </div>
                                        </div>
                                        <div id="saptamana_viitoare">
                                        		<a href="meniu_viitor.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('saptamana_viitoare_pic','','images/meniu/sapt_viitoare.png',1)">
                            					<img src="images/meniu/sapt_curenta.png" name="saptamana_viitoare_pic"  width="202" height="38" border="0"/></a>
                                                <div id="numar"><span id="alb_saptamana"><?php echo date('W', time()+3600*8)+1 ?></span>
                                                </div>
                                        </div>
                                </div>
                                <div id="deacarca_content">
                                		<div id="descarca_content_sus">
                                        </div>
                                        <div id="descarca_content_jos">
                                        		<form action="descarca_pdf.php" method="post" name="descarca_meniu_form" target="_blank" >
                                                        <div id="descarca_select">
                                                        		<input type="radio" name="buton" value="1"/><span id="gri_titluri_jos"> Saptamana curenta</span><br />
                                                                <input type="radio" name="buton" value="2"/><span id="gri_titluri_jos"> Saptamana viitoare  </span>
                                                        </div>
                                                        <div id="descarca_buton">
                                                                <input type="image" src="images/meniu/descarca_meniu.png" name"descarca" id="descarca" value="descarca" />
                                                        </div>
                                                </form>
                                        </div>
                                        
                                </div>
                        </div>
                        <div id="spatiu"></div>
                        
                        <!-- ========================================   MENIU  ============================================== -->
                        <div id="tabel">
                        
                        
                        			<table width="817" bgcolor="#8BB903" cellspacing="1" cellpadding="0" align="center">
                                  
            	<tr height="25" valign="middle">
	             	<td width="100" bgcolor="#8BB903" align="center">
                     <span class="alb_sapt1">
                    	<?php
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
							$in_saptamanii = date("j",strtotime("-".$dif." days",$time_azi));
							//$sf_saptamanii = date("d.m.y",strtotime("+".$dif2." days",$time_azi));
							$sf_saptamanii1 = date("j",strtotime("+".$dif2." days",$time_azi));
							$sf_saptamanii2 = date("F",strtotime("+".$dif2." days",$time_azi));
							$sf_saptamanii3 = date("o",strtotime("+".$dif2." days",$time_azi));
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
							echo $in_saptamanii.'-'.$sf_saptamanii;
							$saptamana_curenta = date("W");
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
                <form name="meniu_curent_form" action="comanda.php" method="post" onsubmit="return validate(this);">
                    <td width="50" bgcolor="#fffddf" align="center" rowspan="3">
                       <img src="images/ciorba.jpg" height="61" width="47" align="absmiddle" />
                       <span class="gri_mic_meniu">supe/ ciorbe</span>
                   </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">A1</font><br />
                        <span class="gri_mic_meniu">fara<br />carne</span>
						<!--<span class="puncte_weekend">1 punct</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_curent",'luni','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','a',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','a',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','v',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','v',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','v',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','v',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','v',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','b',$next_day, $ss);
                           echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','b',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','b',$next_day, $ss);
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
                       <span class="gri_mic_meniu">tocanite <br />manca-<br />ruri</span>
						<!--<span class="puncte_weekend">4 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_curent",'luni','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','c',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','c',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','d',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','d',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','d',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','d',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','d',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr >
                    <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">D2</font><br />
                        <span class="gri_mic_meniu">paste</span>
					<!--<span class="puncte_weekend">3 puncte</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_curent",'luni','w',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','w',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','w',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','w',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','w',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <tr >
                   <td width="50" align="center" bgcolor="#fffddf">
                        <font class="gri_mare_meniu">E</font><br />
                        <span class="gri_mic_meniu">manca-<br />ruri</span>
						<!--<span class="puncte_weekend">4 puncte</span>-->
                   </td>
                        <?php
                            $s = meniu_zi("meniu_curent",'luni','e',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_curent",'marti','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','e',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','e',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','f',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','f',$next_day, $ss);
                           echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','f',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','f',$next_day, $ss);
                           echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','f',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','g',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','g',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','s',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','s',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','h',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','h',$next_day, $ss);
                            echo $s;
                       ?>
                </tr>
                <tr >
                    <td width="50" bgcolor="#fffddf" align="center"  rowspan="2">
                       <img src="images/desert.jpg" height="44" width="47" align="absmiddle" />
                    </td>
                    <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">I1</font><br />
                        <span class="gri_mic_meniu">desert</span>
						<!--<span class="puncte_weekend">2 puncte</span>-->
                  </td>
                        <?php
                            $s = meniu_zi("meniu_curent",'luni','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','i',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','i',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','x',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','x',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','x',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','x',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','x',$next_day, $ss);
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
					<!--<span class="puncte_weekend">1 punct</span>-->
                    </td>
                        <?php
                            $s = meniu_zi("meniu_curent",'luni','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','j',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','j',$next_day, $ss);
                            echo $s;
                          $s = meniu_zi("meniu_curent",'vineri','j',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','k',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','k',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','o',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','o',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','o',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_curent",'joi','o',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_curent",'vineri','o',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','p',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','p',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','p',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','p',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','p',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','l',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','l',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','u',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','u',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_curent",'miercuri','u',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','u',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','u',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','q',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','q',$next_day, $ss);
                            echo $s;
                           $s = meniu_zi("meniu_curent",'miercuri','q',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','q',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','q',$next_day, $ss);
                            echo $s;
                        ?>
                </tr>
                <!-- ________________ -->
                <tr>
                    <td width="50" bgcolor="#fffddf" align="center" >
                       <img src="images/meniu_.jpg" height="44" width="47" align="absmiddle" />
                   </td>
                   <td width="50" bgcolor="#fffddf" align="center">
                        <font class="gri_mare_meniu">M</font><br />
                        <span class="gri_mic_meniu">meniu</span>
						<!--<span class="puncte_weekend">7 puncte</span>-->
                    </td>
                       <?php
                            $s = meniu_zi("meniu_curent",'luni','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','m',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','m',$next_day, $ss);
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
                            $s = meniu_zi("meniu_curent",'luni','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'marti','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'miercuri','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'joi','n',$next_day, $ss);
                            echo $s;
                            $s = meniu_zi("meniu_curent",'vineri','n',$next_day, $ss);
                            echo $s;
                       ?>
                </tr>
  			</table>
                        </div>
                         <div id="spatiu"></div>
                        
                        <!-- ========================================  END OF MENIU  ============================================== -->
                        <div id="content_jos">	
                        		<div id="titlu1"><img src="images/meniu/titluri1.png" /></div>
                                <div id="content_titlu1">
                                	<div id="content_titlu1_stanga">
                                    			<div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">Cod : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta">
                                                                		<input type="text" id="cod" name="cod" class="text_contact" />
                                                                </div>                                                     
                                                                
                                                </div>
                                                
                                    			<div id="text"><img src="images/meniu/text1.png" /></div>
                                    			
                                      <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        
                                                                </div>
                                                                <div id="linie_formular_dreapta_no">
                                                                		<input type="checkbox" name="client_nou" value="1" />
                                    									<span id="gri_inchis">client nou</span>
                                                                </div>                                                     
                                                                
                                      </div>
                                    
                                    			<div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">Firma : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta_stea">
                                                                		<input type="text" id="firma" name="firma" class="text_contact" />
                                                                </div>                                                     
                                                                
                                                </div>
                                                <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">Nume : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta_stea">
                                                                		<input type="text" id="nume" name="nume" class="text_contact" />
                                                                </div>                                                     
                                                                
                                                </div>
                                                <div id="text"><img src="images/meniu/text2.png" /></div>
                                                
                                                <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">Adresa : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta_stea">
                                                                		<input type="text" id="adresa" name="adresa" class="text_contact" />
                                                                </div>                                                     
                                                                
                                                </div>
                                                <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">Telefon : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta_stea">
                                                                		<input type="text" id="telefon" name="telefon" class="text_contact" />
                                                                </div>                                                     
                                                                
                                                </div>
                                                 <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">E-mail : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta">
                                                                		<input type="text" id="email" name="email" class="text_contact" />
                                                                </div>                                                     
                                                                
                                                </div>
                                                <div id="text"><img src="images/meniu/text3.png" /></div>
                                                <div id="spatiu"></div>
                                                <div id="linie_formular_large">
                                                                <div id="linie_formular_stanga_large">                                                                </div>
                                                                <div id="linie_formular_dreapta_large">
                                                                		<img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" />                                                                </div>                                                     
                                                </div>
                                                <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        
                                                                </div>
                                                                <div id="linie_formular_dreapta_stea">
                                                                		<input type="text" id="security_code" name="security_code" class="text_contact" />
                                                                </div>                                                     
                                                                
                                                </div>
                                                
                                                        <div id="buton_submit">
                                                                <input type="image" src="images/meniu/comanda.png" align="absmiddle" />
                                                        </div>
                                    			
                                    </div>
                                    <div id="content_titlu1_centru"><img src="images/meniu/volum_portii.png" /></div>
                                    <div id="content_titlu1_dreapta"><img src="images/meniu/legenda.png" /></div>
                                
                                </div>
                                <div id="titlu2"><img src="images/meniu/titluri2.png" /></div>
                                <div id="content_titlu2"><img src="images/meniu/cum_comand.png" /></div>
                        </div>
            		
              <!-- ================================== ENF OF CONTENT =============================== -->
      </div><!-- end of center -->
<div id="center_jos">            </div>
<div id="footer"> <!-- start of footer -->
            		
            	<?php include "meniu_footer.php"; ?>
            </div> <!-- end of footer -->
            
            <div id="logo"> <!-- start of logo -->
            	<a href="index.php">
                  	<img src="images/quick_lunch_logo2.png" />     </a>       </div><!-- end of logo -->
</div>
	 <!-- end of content -->
</body>
</html>
