<?php
	session_start();
	ini_set('session.bug_compat_warn', 0);
	ini_set('session.bug_compat_42', 0);
	$cod_sec = $_POST["security_code"];
		$nr = 0;
		for ($i = 'A'; $i<='Z'; $i++)
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
		$_SESSION["orc"] = $_POST["orc"];
		$_SESSION["cf"] = $_POST["cf"];
		$_SESSION["banca"] = $_POST["banca"];
		$_SESSION["cont"] = $_POST["cont"];

		
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
		if ((strcmp(trim($_SESSION["email"]),'') == 0)|| !filter_var(trim($_SESSION["email"]), FILTER_VALIDATE_EMAIL))
		{
			$nr = 0;
		}
	
		$z=1;
		$z1=1;
		if ((strcmp(trim($_SESSION["cf"]),'') != 0) or (strcmp(trim($_SESSION["orc"]),'') != 0) or (strcmp(trim($_SESSION["banca"]),'') != 0) or (strcmp(trim($_SESSION["cont"]),'') != 0))
		{
			//echo 'a';
			if (strcmp(trim($_SESSION["orc"]),'') == 0)
			{
				$z=0;
			}
			if (strcmp(trim($_SESSION["cf"]),'') == 0)
			{
				$z1=0;
			}
		}	
		
		
	if ($nr<=0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=meniu_curent2.php?err=1#error" />';
	}
	else
	{
	include "db.php";
	include "utils.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include "metataguri.php"; ?>
<title>Quick Lunch | Catering Timisoara | Livrare la domiciliu</title>


<link rel="stylesheet" type="text/css" href="styles/anylinkmenu_v2.css" />
<script type="text/javascript" src="js/menucontents_v2.js"></script>
<script type="text/javascript" src="js/anylinkmenu.js">
/***********************************************
* AnyLink JS Drop Down Menu v2.0- ������������������ Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Project Page at http://www.dynamicdrive.com/dynamicindex1/dropmenuindex.htm for full source code
***********************************************/
</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>


<link type="text/css" href="styles/style_comanda.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="styles/style_ie6.css" />
<script type="text/javascript" src="js/swap.js"></script>

<script type="text/javascript" >
		function scroll()
		{
		document.getElementById('mesaj').scrollTop=document.getElementById('mesaj').scrollHeight-document.getElementById('mesaj').clientHeight;
		}		
		
</script>
</head>

<body onload="MM_preloadImages('images/meniu_sus/despre_noi_over.png','images/meniu_sus/servicii_over.png','images/meniu_sus/meniu_over.png','images/meniu_sus/retete_over.png','images/meniu_sus/cariere_over.png','images/meniu_sus/contact_over.png');startPix();">

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
            		
                    <div id="titlu_pag">
                    </div>
                    
              <div id="continut_pag">
              			<div id="continut_st">
                         	<div id="titlu_comanda"></div>
                            <div id="mesaj_reusit"><span id="portocaliu_imens">Comanda dvs. a fost &icirc;nregistrat&#259; cu succes!</span></div>
                            <div id="text1"><span id="gri_14">&Icirc;n scurt timp v&#259; vom contacta pentru confirmarea comenzii &#351;i stabilirea detaliilor de livrare.</span></div>
                            <div id="text2"><span id="gri_14">V&#259; multumim &#351;i v&#259; dorim poft&#259; bun&#259;!</span></div>
                            
                            <?php
							//$data_t = date("Y-m-d");
							
							
							$now = time();



							$time = strtotime("+8 hours",$now);
	
							//$today = 
							$data_t=date("Y-m-d",$time);
							$ora_t = date("H:i:s");
							//echo $data_t;
							$firma = mysql_real_escape_string($_POST["firma"]);
							$nume = mysql_real_escape_string($_POST["nume"]);
							$cod = mysql_real_escape_string($_POST["cod"]);
							$client_nou = mysql_real_escape_string($_POST["client_nou"]);
							if (strcmp($client_nou,'1') == 0)
							{
								$cod = 'client_nou';
							}
							$adresa = mysql_real_escape_string($_POST["adresa"]);
							$telefon = mysql_real_escape_string($_POST["telefon"]);
							$email = mysql_real_escape_string($_POST["email"]);
							$nr_orc=mysql_real_escape_string($_POST['orc']);
							$cod_fiscal=mysql_real_escape_string($_POST['cf']);
							$judet=mysql_real_escape_string($_POST['judet']);
							$cont=mysql_real_escape_string($_POST['cont']);
							$banca=mysql_real_escape_string($_POST['banca']);
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
							/*$query1 = 'Select * from comanda where data="'.$data_t.'" and ora="'.$ora_t.'" and firma="'.$firma.'"';
							$result1 = mysql_query($query1) or die (mysql_error());
							if ($row = mysql_fetch_array($result1))
							{
								$c_id = $row["id"];
								$query11="insert into factura(id_comanda,cumparator, nr_inm, cf, sediu, judet, cont, banca) values($c_id,'$firma','$nr_orc','$cod_fiscal','$adresa','$judet','$cont','$banca')";
								mysql_query($query11) or die ('1'.mysql_error());
								
								if (strcmp($cf,"")!=0)
								{
								
									$query111="insert into clienti(firma,nr_inm,cod_fiscal,sediu,judet,cont,banca) values ('$firma','$nr_orc','$cod_fiscal','$adresa','$judet','$cont','$banca')";
									mysql_query($query111) or die ('1'.mysql_error());
								}	
							}*/
							
							$query1 = 'Select * from comanda where data="'.$data_t.'" and ora="'.$ora_t.'" and firma="'.$firma.'"';
							$result1 = mysql_query($query1) or die (mysql_error());
							if ($row = mysql_fetch_array($result1))
							{
								$c_id = $row["id"];
								
								
								// and nr_inm='$nr_orc' and cod_fiscal='$cod_fiscal' and sediu='$adresa' and judet='$judet'
								if(strcmp($cod_fiscal,"")!=0)
								{
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
									
							}
							
							for ($i = 'A'; $i<='Z'; $i++)
							{
								$buc[$i."l"] = $_POST["buc".$i."l"]; //ziua de luni
								if (strcmp($buc[$i."l"],'') != 0)
								{									
									$bc = $buc[$i."l"];
									$q = 'Select * from meniu_curent where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="luni"';
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
								$buc[$i."m"] = $_POST["buc".$i."m"]; //ziua de marti
								if (strcmp($buc[$i."m"],'') != 0)
								{
									$bc = $buc[$i."m"];
									$q = 'Select * from meniu_curent where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="marti"';
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
									$q = 'Select * from meniu_curent where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="miercuri"';
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
									$q = 'Select * from meniu_curent where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="joi"';
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
									$q = 'Select * from meniu_curent where (tip="'.$i.'" or tip="'.strtoupper($i).'") and ziua="vineri"';
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
							for ($i = 'A'; $i<='Z'; $i++)
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
                            <div id="frunze"></div>         
                                
                                
                        </div>
                                               
                       
                        
                        
                        <div id="continut_dr">
                        </div>
                   
                   
                   
                                     
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
<?php
	}

?>