<?php
	
		$nr = 0;
		for ($i = 'A'; $i<='S'; $i++)
		{
			$_SESSION["vbuc".$i."l"] = $_POST["buc".$i."l"]; //ziua de luni
			$_SESSION["vbuc".$i."m"] = $_POST["buc".$i."m"]; //ziua de marti
			$_SESSION["vbuc".$i."mi"] = $_POST["buc".$i."mi"]; //ziua de miercuri
			$_SESSION["vbuc".$i."j"] = $_POST["buc".$i."j"];//ziua de joi
			$_SESSION["vbuc".$i."v"] = $_POST["buc".$i."v"]; // ziua de vineri
			if (strcmp(trim($_SESSION["vbuc".$i."l"]),'') != 0)
			{
				$nr++;
			}			
			if (strcmp(trim($_SESSION["vbuc".$i."m"]),'') != 0)
			{
				$nr++;
			}
			if (strcmp(trim($_SESSION["vbuc".$i."mi"]),'') != 0)
			{
				$nr++;
			}	
			if (strcmp(trim($_SESSION["vbuc".$i."j"]),'') != 0)
			{
				$nr++;
			}	
			if (strcmp(trim($_SESSION["vbuc".$i."v"]),'') != 0)
			{
				$nr++;
			}										
		}
		
		$_SESSION["vfirma"] = $_POST["firma"];
		$_SESSION["vnume_c"] = $_POST["nume"];
		$_SESSION["vcod"] = $_POST["cod"];
		$_SESSION["vadresa"] = $_POST["adresa"];
		$_SESSION["vtelefon"] = $_POST["telefon"];
		$_SESSION["vemail"] = $_POST["email"];	

		if (strcmp(trim($_SESSION["vfirma"]),'') == 0)
		{
			$nr = 0;
		}
		if (strcmp(trim($_SESSION["vnume_c"]),'') == 0)
		{
			$nr = 0;
		}
		if (strcmp(trim($_SESSION["vtelefon"]),'') == 0)
		{
			$nr = 0;
		}
		if (strcmp(trim($_SESSION["vadresa"]),'') == 0)
		{
			$nr = 0;
		}						

	
	
	include "db.php";
	include "utils.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta content="Quick,Lunch,Meniu,Quick Lunch,Meniuri,Nunti,Botezuri" http-equiv="keywords" />
<title>Quick Lunch | Servim cald | Cattering | Meniuri pentru nunti si botezuri</title>
<link rel="stylesheet" type="text/css" href="text.css" />
</head>

<body background="images/bg_verde.jpg" topmargin="0">
<table width="878" border="0" cellpadding="0" cellspacing="0" align="center">
	
	<tr >
    	<td width="23" bgcolor="#91c102">
        </td>
        <td width="552" bgcolor="#fffddf" valign="top">
        	<table width="552" bgcolor="#fffddf" >
            	<tr height="5">
                	<td colspan="3" bgcolor="#fffddf">
                    </td>
                </tr>
            	<tr height="26" valign="top">
                	<td width="9">
                    </td>
                    <td width="263" bgcolor="#8BB903">
                    	<span class="alb">&nbsp;Comanda inregistrata</span>
                    </td>
                    <td width="200" bgcolor="#fffddf">
                    </td>
                </tr>  
                <tr>
                	<td width="9">
                    </td>
                    <td width="463" bgcolor="#fffddf" colspan="2">
						<a class="portocaliu_mare" href="meniu_saptamana_viitoare.php">Inapoi</a><br />
                      
						<?php
							$data_t = date("Y-m-d");
							$ora_t = date("H:i:s");
							//echo $data_t;
							$firma = $_POST["firma"];
							$nume = $_POST["nume"];
							$cod = $_POST["cod"];
							$client_nou = $_POST["client_nou"];
							if (strcmp($client_nou,'1') == 0)
							{
								$cod = 'client_nou';
							}							
							$adresa = $_POST["adresa"];
							$telefon = $_POST["telefon"];
							$email = $_POST["email"];
							$query = "Insert into comanda 
										(data,
										ora,
										firma,
										nume,
										adresa,
										telefon,
										email,
										cod_client)
										Values
										('$data_t',
										'$ora_t',
										'$firma',
										'$nume',
										'$adresa',

										'$telefon',
										'$email',
										'$cod'
										)";
						
							mysql_query($query) or die (mysql_error());
							$query1 = 'Select * from comanda where data="'.$data_t.'" and ora="'.$ora_t.'" and firma="'.$firma.'"';
							$result1 = mysql_query($query1) or die (mysql_error());
							if ($row = mysql_fetch_array($result1))
							{
								$c_id = $row["id"];
							}
							for ($i = 'A'; $i<='N'; $i++)
							{
								$buc[$i."l"] = $_POST["buc".$i."l"]; //ziua de luni
								if (strcmp($buc[$i."l"],'') != 0)
								{									
									$bc = $buc[$i."l"];
									$q = 'Select * from meniu_viitor where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="luni"';
									//echo $q;
									$r = mysql_query($q);
									$rw = mysql_fetch_array($r);
									$men_id = $rw["id"];
									$query2 = "Insert into prod_comanda
												(comanda_id,
												meniu_id,
												tip,
												buc												
												)
												Values
												('$c_id',
												'$men_id',
												'v',
												$bc)";
									mysql_query($query2) or die (mysql_error());
								}
								$buc[$i."m"] = $_POST["buc".$i."m"]; //ziua de marti
								if (strcmp($buc[$i."m"],'') != 0)
								{
									$bc = $buc[$i."m"];
									$q = 'Select * from meniu_viitor where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="marti"';
									//echo $q;
									$r = mysql_query($q);
									$rw = mysql_fetch_array($r);
									$men_id = $rw["id"];
									$query2 = "Insert into prod_comanda
												(comanda_id,
												meniu_id,
												tip,
												buc												
												)
												Values
												('$c_id',
												'$men_id',
												'v',
												$bc)";
									mysql_query($query2);
								}								
								$buc[$i."mi"] = $_POST["buc".$i."mi"]; //ziua de miercuri
								if (strcmp($buc[$i."mi"],'') != 0)
								{
									$bc = $buc[$i."mi"];
									$q = 'Select * from meniu_viitor where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="miercuri"';
									//echo $q;
									$r = mysql_query($q);
									$rw = mysql_fetch_array($r);
									$men_id = $rw["id"];
									$query2 = "Insert into prod_comanda
												(comanda_id,
												meniu_id,
												tip,
												buc												
												)
												Values
												('$c_id',
												'$men_id',
												'v',
												$bc)";
									mysql_query($query2);
								}								
								$buc[$i."j"] = $_POST["buc".$i."j"];//ziua de joi
								if (strcmp($buc[$i."j"],'') != 0)
								{
									$bc = $buc[$i."j"];
									$q = 'Select * from meniu_viitor where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="joi"';
									//echo $q;
									$r = mysql_query($q);
									$rw = mysql_fetch_array($r);
									$men_id = $rw["id"];
									$query2 = "Insert into prod_comanda
												(comanda_id,
												meniu_id,
												tip,
												buc												
												)
												Values
												('$c_id',
												'$men_id',
												'v',
												$bc)";
									mysql_query($query2);
								}								
								$buc[$i."v"] = $_POST["buc".$i."v"]; // ziua de vineri
								if (strcmp($buc[$i."v"],'') != 0)
								{
									$bc = $buc[$i."v"];
									$q = 'Select * from meniu_viitor where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="vineri"';
									//echo $q;
									$r = mysql_query($q);
									$rw = mysql_fetch_array($r);
									$men_id = $rw["id"];
									$query2 = "Insert into prod_comanda
												(comanda_id,
												meniu_id,
												tip,
												buc												
												)
												Values
												('$c_id',
												'$men_id',
												'v',
												$bc)";
									mysql_query($query2);
								}													
							}	
							
							$buc[$i."l"] = $_POST["buc".$i."l"]; //ziua de luni
								if (strcmp($buc[$i."l"],'') != 0)
								{									
									$bc = $buc[$i."l"];
									$q = 'Select * from meniu_viitor where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="luni"';
									//echo $q;
									$r = mysql_query($q);
									$rw = mysql_fetch_array($r);
									$men_id = $rw["id"];
									$query2 = "Insert into prod_comanda
												(comanda_id,
												meniu_id,
												tip,
												buc												
												)
												Values
												('$c_id',
												'$men_id',
												'v',
												$bc)";
									mysql_query($query2) or die (mysql_error());
								}
							
								
							for ($i = 'A'; $i<='S'; $i++)
							{
								$_SESSION["vbuc".$i."l"] = '';
								$_SESSION["vbuc".$i."m"] = '';
								$_SESSION["vbuc".$i."mi"] = '';
								$_SESSION["vbuc".$i."j"] = '';
								$_SESSION["vbuc".$i."v"] = '';
							}	
						
							$_SESSION["vfirma"] = '';
							$_SESSION["vnume_c"] = '';
							$_SESSION["vcod"] = '';
							$_SESSION["vadresa"] = '';
							$_SESSION["vtelefon"] = '';
							$_SESSION["vemail"] = '';
						?>                        
                    </td>
                </tr>
			</table>                      
        </td>
        <td width="281" background="images/galbui.jpg">
	              
        </td>
        <td width="22"  >
        
        </td>
	</tr>
</table>
</body>
</html>
