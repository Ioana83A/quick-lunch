<?php



	include("db.php");
	//error_reporting(-1);
//ini_set('display_errors', '1');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include "metataguri.php"; ?>
<title>Quick Lunch | Catering Timisoara | Livrare la domiciliu</title>



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



<link type="text/css" href="styles/style_retete.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="styles/style_ie6.css" />
<script type="text/javascript" src="js/swap.js"></script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  D. Keith Higgs (dkh2@po.cwru.edu) -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
var timeDelay = 2; // change delay time in seconds
var Pix = new Array
("images/home/poze_rulare/1.png" 
,"images/home/poze_rulare/2.png" 
,"images/home/poze_rulare/3.png" 
 
);
var howMany = Pix.length;
timeDelay *= 1000;
var PicCurrentNum = 0;
var PicCurrent = new Image();
PicCurrent.src = Pix[PicCurrentNum];
function startPix() {
setInterval("slideshow()", timeDelay);
}
function slideshow() {
PicCurrentNum++;
if (PicCurrentNum == howMany) {
PicCurrentNum = 0;
}
PicCurrent.src = Pix[PicCurrentNum];
document["ChangingPix"].src = PicCurrent.src;
}
//  End -->
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
          <div id="sus_centru">
            
            </div>
  			<div id="center"> <!-- start of center -->
            <!-- ================================== CONTENT =============================== -->
            		<?php 
						$id=$_GET['id'];
						
						if(strcmp($id,"")==0)
						{
							$query_reteta='select * from reteta_saptamanii where activ="1"';
						}
						else
						{
							$query_reteta="select * from reteta_saptamanii where id=$id";
						}
					
					?>
                    <div id="titlu_pag">
                    </div>
                    <div id="continut_titlu">
                   	  <img src="images/retete/titlu_content.png" />
                    </div>
              <div id="continut_pag">
                    	
                    <div id="continut_stanga">
                    		<?php 
							
								$result = mysql_query("SELECT * FROM `reteta_saptamanii`");
								$num_rows = mysql_num_rows($result);
								$numar_retete=$num_rows; 
							    $jumate=$numar_retete/2;
								$jumate=intval($jumate);
							    $ramas=$numar_retete-$jumate;
								$juma=$jumate+1;
								
								
								
								$query_titluri="SELECT * from `reteta_saptamanii` order by `nume_reteta` ASC LIMIT 0, $juma";
								$result_titluri=@mysql_query($query_titluri);// or die('3'.mysql_error());
                                while($row_titlu=@mysql_fetch_array($result_titluri))
								{
								
								
										
										 
											   		$titlu = $row_titlu['nume_reteta'];
													$titlu = str_replace('\"','"',$titlu);
													$titlu = utf8_decode($titlu);
													
													
							
							
							?>
                    		<div id="text_reteta">
                            		<a href="retete.php?id=<?php echo $row_titlu['id']; ?>" class="retete"><?php echo $titlu; ?></a>
                            </div>
                            <div id="spatiu_reteta">
                            </div>
                            
                            <?php
							
							}
							
							?>
                            
                    		

                    </div>
                    <div id="continut_centru">
                    		<?php	
								$query_titluri="SELECT * from `reteta_saptamanii` order by `nume_reteta` ASC LIMIT $juma, $ramas";
								$result_titluri=@mysql_query($query_titluri);// or die('3'.mysql_error());
                                while($row_titlu=@mysql_fetch_array($result_titluri))
								{
								
								
										
										 
											   		$titlu = $row_titlu['nume_reteta'];
													$titlu = str_replace('\"','"',$titlu);
													$titlu = utf8_decode($titlu);
													
													
							
							
							?>
                    		<div id="text_reteta">
                            		<a href="retete.php?id=<?php echo $row_titlu['id']; ?>" class="retete"><?php echo $titlu; ?></a>
                            </div>
                            <div id="spatiu_reteta">
                            </div>
                            
                            <?php
							
							}
							
							?>
                    </div>
                    <div id="continut_dreapta">
                    
                    
                    		<?php
                            
							
                                        $result_reteta=@mysql_query($query_reteta);// or die('3'.mysql_error());
                                        $reteta=@mysql_fetch_array($result_reteta);
										
										 
											   		$ret = $reteta['nume_reteta'];
													$ret = str_replace('\"','"',$ret);
													$ret = utf8_decode($ret);
													
													$text = $reteta['text_reteta']; 
													$text = str_replace('\"','"',$text);
													$text = utf8_decode($text);
																											
														
													$ingrediente=utf8_decode($reteta['ingrediente']);
													$ingrediente = str_replace(',','<br />',$ingrediente);
													
												 
							
							
							
							?>
                    		<div id="imagine_reteta">
                            		<img src="../poze/<?php echo $reteta['poza_reteta']; ?>" class="poza_reteta" width="230px" height="162px"/>
                            </div>
                            <div id="titlu_reteta_quick">
                            		<span id="verde_titlu_reteta"><?php echo $ret; ?></span>
                            </div>
                            <div id="ingrediente">
                            		<br /><span id="portocaliu_titluri_reteta">Ingrediente/4 por&#355;ii</span>
                            </div>
                            <div id="ingrediente">
                            		<span id="gri_titluri_jos">
                                    		<?php echo $ingrediente ?>
		
                                    
                                    </span>
                            </div>
                             <div id="mod_preparare">
                            		<br /><span id="portocaliu_titluri_reteta">Mod de preparare</span>
                            </div>
                            <div id="mod_preparare">
                            		<span id="gri_titluri_jos">
                                    		<br /><?php echo $text; ?><br />
		
                                    
                                    </span>
                            </div>
                            <div id="pofta">
                            		<span id="gri_titluri_jos">
                                    		<br />Poft&#259; bun&#259;!<br /><br /><br />
		
                                    
                                    </span>
                            </div>
                             <div id="frunze_jos">
                            		<img src="images/retete/frunze.png" />
                                    
                            </div>
                    		
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
