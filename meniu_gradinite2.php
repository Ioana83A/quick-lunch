<?php 
 if ((date('W', time()+3600*8)==52)|| (date('W', time()+3600*8)==1))
 {
 header('Location: http://www.quick-lunch.ro/meniu_gradinite_viitor2.php');
 exit;
 }
include "db.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include "metataguri.php"; ?>
<title>Quick Lunch | Catering Timisoara | Livrare la domiciliu</title>

<link type="text/css" href="styles/style_meniu_copii_nou.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="styles/style_ie6.css" />

<script type="text/javascript" src="js/swap.js"></script>


<link rel="stylesheet" type="text/css" href="styles/anylinkmenu_v2.css" />
<script type="text/javascript" src="js/menucontents_v6.js"></script>
<script type="text/javascript" src="js/anylinkmenu.js">
/***********************************************
* AnyLink JS Drop Down Menu v2.0- �� Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Project Page at http://www.dynamicdrive.com/dynamicindex1/dropmenuindex.htm for full source code
***********************************************/
</script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>

<script type="text/javascript" >
		function scroll()
		{
		document.getElementById('mesaj').scrollTop=document.getElementById('mesaj').scrollHeight-document.getElementById('mesaj').clientHeight;
		}		
		
</script>
</head>

<body onload="MM_preloadImages('images/meniu_sus/despre_noi_over.png','images/meniu_sus/servicii_over.png','images/meniu_sus/meniu_over.png','images/meniu_sus/cum_comand_over.png','images/meniu_sus/retete_over.png','images/meniu_sus/cariere_over.png','images/meniu_sus/contact_over.png');startPix();">

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
          <div id="sus_centru">            </div>
  			<div id="center"> <!-- start of center -->
            <!-- ================================== CONTENT =============================== -->
            			<div id="descarca_butoane">
                        		<div id="butoane_sapt">
                                        <div id="saptamana_curenta">
                                     			<img src="images/meniu/sapt_curenta.png" name="saptamana_curenta_pic"  width="202" height="38" border="0"/>
                                        		
                                                <div id="numar"> <span id="alb_saptamana"><?php 
													echo date('W', time()+3600*8)+0;?></span>                                                
												</div>
                                        </div>
                                        <div id="saptamana_viitoare">
                                        		<a href="meniu_gradinite_viitor2.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('saptamana_viitoare_pic','','images/meniu/sapt_viitoare.png',1)">
                            					<img src="images/meniu/sapt_curenta.png" name="saptamana_viitoare_pic"  width="202" height="38" border="0"/></a>
                                                <div id="numar"><span id="alb_saptamana">
												
                                                <?php 
														if (date('W', time()+3600*8)==51)  
																{
																	$now = time();
																	$time_azi = strtotime("+8 hours",$now);
																	$time_next = strtotime("+3 week",$time_azi); 
																	echo date('W', $time_next);
																} 
														else if (date('W', time()+3600*8)==52)  
																{
																	$now = time();
																	$time_azi = strtotime("+8 hours",$now);
																	$time_next = strtotime("+2 week",$time_azi); 
																	echo date('W', $time_next);
																}																
														else echo date('W', time()+3600*8)+1;?>
                                                </span> 
                                                </div>
                                        </div>
                                </div>
                                <div id="deacarca_content">
                                		<div id="descarca_content_sus">                                        </div>
                                        <div id="descarca_content_jos">
                                        		<form action="descarca_pdf_gradinite.php" method="post" name="descarca_meniu_form" target="_blank" >
                                                        <div id="descarca_select">
                                                        		<input type="radio" name="buton" value="1"/><span id="gri_titluri_jos"> Saptamana curenta</span>
                                                                <input type="radio" name="buton" value="2"/><span id="gri_titluri_jos"> Saptamana viitoare  </span> 
                                                        </div>
														<div id="descarca_buton">
                                                                <input type="image" src="images/meniu/descarca_meniu.png" name"descarca" id="descarca" value="descarca" />
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                        </div>
                        <div id="tabel">     </div>
                        <div id="content_jos"><!--  ------------START OF CONTENT JOS------------ -->
                                	<div id="feluri"><img src="images/meniu_copii/feluri_gradinite.jpg" /></div>
                                    <div id="meniu_copii_poza"><!-- start of meniu_copii_poza -->
                                    		<div id="zile"><!-- start of zile -->
                                            	<img src="images/meniu_copii/meniu_copii_nou/zile.jpg" />
                                            </div><!-- end of zile -->
                                            
                                            <?php
												function meniu_zi($tabel, $ziua, $tip,$tip_zi)
													{
														$sql="SELECT * from `".$tabel."` WHERE `ziua`='".$ziua."' AND `tip`='".$tip."'";
														$result=mysql_query($sql);
														$row=@mysql_fetch_assoc($result);
														$nume=$row["nume"];
														$calorii=$row["calorii"];
														
														if($calorii!=0)
														{
																echo"<div id='".$tip_zi."_fel'>".$nume."</div>
                                                       				 <div id='".$tip_zi."_cal'>- ".$calorii." kcal</div>";
														}
														else
														{
																echo"<div id='".$tip_zi."_fel'>".$nume."</div>
                                                       				 <div id='".$tip_zi."_cal'> </div>";
														}
													}
											
											?>
                                            
                                            
                                            <?php
												$meniu_luat="meniu_gradinite_curent";
													
												?>
                                            <div id="meniu_continut_zile"><!-- start of meniu_continut_zile -->
                                            		<div id="luni"><!-- start of luni -->
                                                    	<div id="luni1">
                                                        	<?php meniu_zi($meniu_luat,'luni','fel1','luni1'); ?>    
                                                        </div>
                                                        <div id="luni2">
                                                        	<?php meniu_zi($meniu_luat,'luni','fel2','luni2'); ?>
                                                        </div>
                                                        <div id="luni3">
                                                        	<?php meniu_zi($meniu_luat,'luni','desert','luni3'); ?>
                                                        </div>
                                                    </div><!-- end of luni -->
                                                    <div id="marti"><!-- start of marti -->
                                                    	<div id="marti1">
                                                        	<?php meniu_zi($meniu_luat,'marti','fel1','marti1'); ?>
                                                        </div>
                                                        <div id="marti2">
                                                        	<?php meniu_zi($meniu_luat,'marti','fel2','marti2'); ?>
                                                        </div>
                                                        <div id="marti3">
                                                        	<?php meniu_zi($meniu_luat,'marti','desert','marti3'); ?>
                                                        </div>
                                                    </div><!-- end of marti -->
                                                    <div id="miercuri"><!-- start of miercuri -->
                                                    	<div id="miercuri1">
                                                        	<?php meniu_zi($meniu_luat,'miercuri','fel1','miercuri1'); ?>
                                                        </div>
                                                        <div id="miercuri2">
                                                        	<?php meniu_zi($meniu_luat,'miercuri','fel2','miercuri2'); ?>
                                                        </div>
                                                        <div id="miercuri3">
                                                        	<?php meniu_zi($meniu_luat,'miercuri','desert','miercuri3'); ?>
                                                        </div>
                                                    </div><!-- end of miercuri -->
                                                    <div id="joi"><!-- start of joi -->
                                                    	<div id="joi1">
                                                        	<?php meniu_zi($meniu_luat,'joi','fel1','joi1'); ?>
                                                        </div>
                                                        <div id="joi2">
                                                        	<?php meniu_zi($meniu_luat,'joi','fel2','joi2'); ?>
                                                        </div>
                                                        <div id="joi3">
                                                        	<?php meniu_zi($meniu_luat,'joi','desert','joi3'); ?>
                                                        </div>
                                                    </div><!-- end of joi -->
                                                    <div id="vineri"><!-- start of vineri -->
                                                    	<div id="vineri1">
                                                        	<?php meniu_zi($meniu_luat,'vineri','fel1','vineri1'); ?>
                                                        </div>
                                                        <div id="vineri2">
                                                        	<?php meniu_zi($meniu_luat,'vineri','fel2','vineri2'); ?>
                                                        </div>
                                                        <div id="vineri3">
                                                        	<?php meniu_zi($meniu_luat,'vineri','desert','vineri3'); ?>
                                                        </div>
                                                    </div><!-- end of vineri -->
                                            </div><!-- end of meniu_continut_zile -->
                                            <div id="copii_poza"><!-- start of copii_poza -->
                                            	<img src="images/meniu_copii/desen.jpg" />
                                            </div><!-- end of copii_poza -->
                                    </div><!-- end of meniu_copii_poza -->
                                    <div id="feluri_pret_comanda"><!-- start of feluri_pret_comanda -->
                                    	<div id="feluri_pret"><!-- start of feluri_pret -->
                                        	<div id="feluri_pret_st">
                                            		1.felul 1 + felul 2:      <br />  
                                                    2.felul 1 + felul 2 + chifla:    <br />
                                                    3.felul 1 + felul 2 + desert:    <br />   
                                                    4.felul 1 + felul 2 + desert + chifla:        
                                            </div>
                                            <div id="feluri_pret_dr">
                                            		8,5 ron<br /> 
                                                    9 ron<br />
                                                    9 ron<br /> 
                                                    9,5 ron
                                            </div>
                                        </div><!-- end of feluri_pret -->
                                        <div id="comanda_feluri"><!-- start of comanda_feluri -->
                                        		Tu comanzi iar noi livr&#259;m la cre&#351;a<br />
                                                sau gr&#259;dini&#355;a copilului t&#259;u!<br /> 
                                                Comenzi la telefon: <br />
                                                <b>0256 386 075</b> 
                                        </div><!-- end of comanda_feluri -->
                                    </div><!-- end of feluri_pret_comanda -->
                              
                        </div><!--  ------------END OF CONTENT JOS------------ -->
            		
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