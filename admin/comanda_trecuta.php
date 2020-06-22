<?php
	
	

		$nr = 0;
		for ($i = 'A'; $i<='S'; $i++)
		{
			$_SESSION["buc".$i."l"] = $_POST["buc".$i."l"]; //ziua de luni
			$_SESSION["buc".$i."m"] = $_POST["buc".$i."m"]; //ziua de marti
			$_SESSION["buc".$i."mi"] = $_POST["buc".$i."mi"]; //ziua de miercuri
			$_SESSION["buc".$i."j"] = $_POST["buc".$i."j"];//ziua de joi
			$_SESSION["buc".$i."v"] = $_POST["buc".$i."v"]; // ziua de vineri
			if (strcmp(trim($_SESSION["buc".$i."l"]),'') != 0)
			{
				$nr++;
			}			
			if (strcmp(trim($_SESSION["buc".$i."m"]),'') != 0)
			{
				$nr++;
			}
			if (strcmp(trim($_SESSION["buc".$i."mi"]),'') != 0)
			{
				$nr++;
			}	
			if (strcmp(trim($_SESSION["buc".$i."j"]),'') != 0)
			{
				$nr++;
			}	
			if (strcmp(trim($_SESSION["buc".$i."v"]),'') != 0)
			{
				$nr++;
			}										
		}
		
		$_SESSION["firma"] = $_POST["firma"];
		$_SESSION["nume_c"] = $_POST["nume"];
		$_SESSION["cod"] = $_POST["cod"];
		$_SESSION["adresa"] = $_POST["adresa"];
		$_SESSION["telefon"] = $_POST["telefon"];
		$_SESSION["email"] = $_POST["email"];	

		if (strcmp(trim($_SESSION["firma"]),'') == 0)
		{
			$nr = 0;
		}
		if (strcmp(trim($_SESSION["nume_c"]),'') == 0)
		{
			$nr = 0;
		}
		if (strcmp(trim($_SESSION["telefon"]),'') == 0)
		{
			$nr = 0;
		}
		if (strcmp(trim($_SESSION["adresa"]),'') == 0)
		{
			$nr = 0;
		}						

	
	
	
	
	include "db.php";
	include "utils.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta content="Quick,Lunch,Meniu,Quick Lunch,Meniuri,Nunti,Botezuri" http-equiv="keywords" />
<title>Quick Lunch | Servim cald | Cattering | Meniuri pentru nunti si botezuri</title>
<link rel="stylesheet" type="text/css" href="menu/text.css" />
<style type="text/css">
<!--
body,td,th {
	font-size: 18px;
}
-->
</style></head>

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
                    <td width="764" bgcolor="#fffddf" colspan="4">
						<a class="portocaliu_mare" href="meniu.php">Inapoi</an><br />
                      <br /><br />
                        </span>
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
							$nr_orc=$_POST['nr_orc'];
							$cod_fiscal=$_POST['cod_fiscal'];
							$judet=$_POST['judet'];
							$cont=$_POST['cont'];
							$banca=$_POST['banca'];
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
							
							//$query11="select * from comanda where data='$data_t', ora='$ora_t', nume='$nume'";
							 
							
							$query1 = 'Select * from comanda where data="'.$data_t.'" and ora="'.$ora_t.'" and firma="'.$firma.'"';
							$result1 = mysql_query($query1) or die (mysql_error());
							if ($row = mysql_fetch_array($result1))
							{
								$c_id = $row["id"];
								
								
								// and nr_inm='$nr_orc' and cod_fiscal='$cod_fiscal' and sediu='$adresa' and judet='$judet'
								
									$quuu="select * from clienti where firma='$firma'";
									$resuu=@mysql_query($quuu) or die(mysql_error());
									echo $numm=mysql_num_rows($resuu);
									if ($numm==0)
									{
									
										$query111="insert into clienti(firma,nr_inm,cod_fiscal,sediu,judet,cont,banca) values ('$firma','$nr_orc','$cod_fiscal','$adresa','$judet','$cont','$banca')";
										mysql_query($query111) or die ('1'.mysql_error());
										$query11="insert into factura(id_comanda,cumparator, nr_inm, cf, sediu, judet, cont, banca) values($c_id,'$firma','$nr_orc','$cod_fiscal','$adresa','$judet','$cont','$banca')";
										mysql_query($query11) or die ('1'.mysql_error());
									}
									else
									{
										$rouu=mysql_fetch_array($resuu);
										$nr_orc=$rouu['nr_inm'];
										$cod_fiscal=$rouu['cod_fiscal'];
										$adresa=$rouu['sediu'];
										$judet=$rouu['judet'];
										$cont=$rouu['cont'];
										$banca=$rouu['banca'];
										$query11="insert into factura(id_comanda,cumparator, nr_inm, cf, sediu, judet, cont, banca) values($c_id,'$firma','$nr_orc','$cod_fiscal','$adresa','$judet','$cont','$banca')";
										mysql_query($query11) or die ('1'.mysql_error());
									}	
									
							}
							
							
							for ($i = 'A'; $i<='S'; $i++)
							{
								$buc[$i."l"] = $_POST["buc".$i."l"]; //ziua de luni
								if (strcmp($buc[$i."l"],'') != 0)
								{									
									$bc = $buc[$i."l"];
									$q = 'Select * from meniu_trecut where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="luni"';
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
												'c',
												$bc)";
									mysql_query($query2) or die(mysql_error());
								}
								$buc[$i."m"] = $_POST["buc".$i."m"]; //ziua de marti
								if (strcmp($buc[$i."m"],'') != 0)
								{
									$bc = $buc[$i."m"];
									$q = 'Select * from meniu_trecut where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="marti"';
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
												'c',
												$bc)";
									mysql_query($query2);
								}								
								$buc[$i."mi"] = $_POST["buc".$i."mi"]; //ziua de miercuri
								if (strcmp($buc[$i."mi"],'') != 0)
								{
									$bc = $buc[$i."mi"];
									$q = 'Select * from meniu_trecut where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="miercuri"';
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
												'c',
												$bc)";
									mysql_query($query2);
								}								
								$buc[$i."j"] = $_POST["buc".$i."j"];//ziua de joi
								if (strcmp($buc[$i."j"],'') != 0)
								{
									$bc = $buc[$i."j"];
									$q = 'Select * from meniu_trecut where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="joi"';
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
												'c',
												$bc)";
									mysql_query($query2);
								}								
								$buc[$i."v"] = $_POST["buc".$i."v"]; // ziua de vineri
								if (strcmp($buc[$i."v"],'') != 0)
								{
									$bc = $buc[$i."v"];
									$q = 'Select * from meniu_trecut where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="vineri"';
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
												'c',
												$bc)";
									mysql_query($query2);
								}													
							}		
							for ($i = 'A'; $i<='S'; $i++)
							{
								$_SESSION["buc".$i."l"] = '';
								$_SESSION["buc".$i."m"] = '';
								$_SESSION["buc".$i."mi"] = '';
								$_SESSION["buc".$i."j"] = '';
								$_SESSION["buc".$i."v"] = '';
							}	
						
							$_SESSION["firma"] = '';
							$_SESSION["nume_c"] = '';
							$_SESSION["cod"] = '';
							$_SESSION["adresa"] = '';
							$_SESSION["telefon"] = '';
							$_SESSION["email"] = '';
						?>                        
                    </td>
                </tr>
			</table>                      
        </td>
        
	</tr>
</table>
</body>
</html>
