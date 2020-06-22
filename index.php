<?php
	include("db.php");
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

<style>
#upper_center
			{
				width:880px;
				height:490px;
				left:8px;
				position:relative;
				overflow:hidden;
				background:url(images/home/comanda_background.png) no-repeat !important;
				zoom: 1;
			}
</style>

<link type="text/css" href="styles/style_index.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="styles/style_ie6.css" />
<script type="text/javascript" src="js/swap.js"></script>
<script type="text/javascript" src="js/action.js"></script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  D. Keith Higgs (dkh2@po.cwru.edu) -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->
<?php
	$sql_poze="SELECT * from `poze_prima_pag` ORDER BY `id` ASC";
	$result_poze=mysql_query($sql_poze) or die (mysql_error());
	$poze="";
	while($row_poze=mysql_fetch_assoc($result_poze))
	{
		if($row_poze["poza"]!=NULL || $row_poze["poza"]!="")
		{
				if($poze==NULL || $poze=="")
				{
					$prima_poza = $row_poze["poza"];
					$poze='"'.$row_poze["poza"].'"';
				}
				else
				{
					$poze=$poze.',"'.$row_poze["poza"].'"';
				}
		}
	}
	
?>
<!-- Begin
var timeDelay = 3; // change delay time in seconds
var Pix = new Array
(<?php echo $poze; ?>
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
</head>

<body onload="MM_preloadImages('images/meniu_sus/despre_noi_over.png','images/meniu_sus/servicii_over.png','images/meniu_sus/meniu_over.png','images/meniu_sus/cum_comand_over.png','images/meniu_sus/retete_over.png','images/meniu_sus/cariere_over.png','images/meniu_sus/contact_over.png');startPix();">

	<div id="content"><!-- start of content -->
    		<div id="upper_part" style="height:143px"><!-- start of upper_part -->
            
            		
            		
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
          
  			<div id="center"> <!-- start of center -->
            
            		<div id="upper_center"> <!-- start of upper_center -->
                    		<div id="comanda_left">
                            		<div id="text1">
                                    	<img src="images/home/text1.png" />	
                                    </div>
                                    <div id="text2">
                                    <a href="meniu_curent.php"><img src="images/home/text2.png" /></a>
                                    </div>
                                    <div id="text3">
                                    	<img src="images/home/text3.png" />
                                    </div>
                                    
                            </div>
                              <div id="comanda_right">
                            		<div id="images">
                                    	 <a href="meniu_curent2.php"><img src="<?php echo $prima_poza; ?>" name="ChangingPix"/></a> 
                                    </div>
                             </div>
                    </div><!-- end of upper_center -->
                    
                    <div id="lower_center"><!-- start of lower_center -->
                    	<div id="lower_titles">
                        		<div id="lower_noutati"></div>
                                <div id="lower_reteta_saptamanii"></div>
                                <div id="lower_recomandari"></div>
                        </div>
                        <div id="lower_space"></div>
                      <div id="lower_content">
                       	<div id="noutati_content"><!-- start of noutati_content -->
                        
                        			<?php
													$query_noutati = 'Select * from noutati order by id DESC LIMIT 0, 3';
													$result_noutati = mysql_query($query_noutati) or die (mysql_error());
													while($row=mysql_fetch_assoc($result_noutati))
													{
														$tt = $row["nume_noutate"];
														$tt = str_replace('***---','"',$tt);
														$titlu = utf8_decode($tt);														
														$Cc = $row["text_noutate"];
														$sir=explode(" ",$Cc);
														$nr=sizeof($sir);
														//echo $Cc;
														if(strlen($Cc)>115)
														{
															$poz = strpos($Cc,' ',115);
														}
														else
														{
															$poz = strpos($Cc,' ',($nr-1));
														}	
														$continut = substr($Cc,0,$poz);
														$continut = str_replace('***---','"',$continut);
														$continut = str_replace(',',', ',$continut);
														$continut = utf8_decode($continut);	
													
													
													
												?>
                            		<div id="noutati_content_titlu">
                                    		<span id="verde_titluri_jos"><?php echo $titlu; ?></span>                                    </div>
                                    <div id="noutati_content_spatiu">                                    </div>
                                    <div id="noutati_content_text">
                                    	<span id="gri_titluri_jos" style="line-height:15px"><?php echo $continut; ?></span>
                                        <a href="noutati.php" class="puncte" style="line-height:12px">[...]</a>
                                                                            </div>
                                    <div id="noutati_content_spatiu1">                                    </div>
                                    <?php } ?>
                                    
                                    <div id="noutati_content_tot">
                                    		<a href="noutati.php" class="puncte">[tot ce e nou]</a>                                    </div>
                        </div>
                   	<!-- end of noutati_content -->
                            <div id="reteta_content"><!-- start of reteta_content -->
                            
                            		<?php
									  	$query_reteta='select * from reteta_saptamanii where activ="1"';
                                        $result_reteta=@mysql_query($query_reteta);// or die('3'.mysql_error());
                                        $reteta=@mysql_fetch_array($result_reteta);
										
										 
											   		$ret = $reteta['nume_reteta'];
													$ret = str_replace('\"','"',$ret);
													$ret = utf8_decode($ret);
													
													$text = $reteta['text_reteta']; 
													$text = str_replace('\"','"',$text);
													$text = utf8_decode($text);
													$poz = @strpos($text,' ',110);
													$text = substr($text,0,$poz);														
														
													$ingrediente=utf8_decode($reteta['ingrediente']);
													$ingrediente = str_replace(',','<br />',$ingrediente);
													
												 ?>
 										
                            		<div id="noutati_content_titlu">
                                    		<span id="verde_titluri_jos"><?php echo $ret; ?></span>                                    </div>
                                    <div id="noutati_content_spatiu">                                    </div>
                                    <div id="noutati_content_text">
                                    	<span id="gri_titluri_jos"><?php echo $text; ?></span>
                                        <a href="retete.php" class="puncte">[...]</a>                                    </div>
                                    <div id="noutati_content_spatiu1">                                    </div>
                            		
                                    <div id="ingrediente_content">
                                    	<div id="ingrediente_poza">
                                        		<img src="images/home/oala.png" />                                        </div>
                      					<div id="ingrediente_text_text">
                                      
                                                        <div id="ingrediente_text_titlu">
                                                                <span id="verde_titluri_jos">Ingrediente/4 por&#355;ii</span>                                                         </div>
                                                    
                                                        <div id="ingrediente_text_spatiu">                                                        </div>
                                                        
                                                        <div id="ingrediente_text_propriu">
                                                        		<span id="portocaliu_titluri_jos"><?php echo $ingrediente ?></span>                                                        </div>
                                                        <div id="ingrediente_text_spatiu1"></div>
                                                        <div id="ingrediente_text_tot">
                                                        		<a href="retete.php" class="puncte">[toate re&#355;etele]</a>                                                        </div>
                                        </div>
                              </div>
                            </div>
                    <!-- end of reteta_content -->
                            <div id="recomandari_content"><!-- start of recomandari_content -->
                            		<?php 
												$query = 'Select * from comment where confirmat="1" order by data DESC';
												$result = mysql_query($query) or die (mysql_error());
												$ni = 0;
												while ($row = mysql_fetch_array($result))
												{       
												$ni++;
												if ($ni>3) break;        
												$tt = $row["nume"];
														$tt = str_replace('\"','"',$tt);
														$titlu = utf8_decode($tt);														
														//$Cc = $row["mesaj"];
														//echo $Cc;
														//$poz = @strpos($Cc,' ',110);
														$data = $row["data"];
														$now = strtotime($data);
														$data = date("d.m.Y",$now);
														
														
														//$continut = substr($Cc,0,$poz);
														//$continut = str_replace('\"','"',$continut);
														//$continut = str_replace(',',', ',$continut);
														//$continut = utf8_decode($continut);
														
														$continut = $row["mesaj"];	
														$continut = str_replace('\"','"',$continut);
														$continut = str_replace(',',', ',$continut);
														$continut = utf8_decode($continut);	
																

												?>                                                                     

											 	
                                            

                            		<div id="noutati_content_titlu">
                                    		<span id="verde_titluri_jos"><i><?php echo $titlu.' - '.$data; ?></i></span>                                    </div>
                                    <div id="noutati_content_spatiu">                                    </div>
                                    <div id="noutati_content_text">
                                    	<span id="gri_titluri_jos"><?php $arr = str_split($continut, 110);echo $arr[0];  ?></span>
                                        <a href="recomandari.php" class="puncte">[...]</a>                                    </div>
                                    <div id="noutati_content_spatiu1">                                    </div>
                                    <?php
										}
										?> 
                                    
                                    
                                    
                                    <div id="noutati_content_tot">
                                    		<a href="recomandari.php" class="puncte">[toate recomand&#259;rile]</a><br />
                                            <a href="recomandari.php" class="puncte">[spune-&#355;i p&#259;rerea]</a>                                    </div>
                            </div>
                        <!-- end of recomandari_content -->
                        
                      </div>
                      <div style="clear:both"></div>
                      <div style="margin-left:28px;margin-top:10px;"><span style="color:#2a6115;font-size:12px;font-family:Georgia, 'Times New Roman', Times, serif;font-weight:bold;">Quick-Lunch sustine :</span><a href="http://www.generatietanara.ro/" target="_blank"><img src="images/logogtrfin.png" width="84px" height="43px" align="absmiddle"/></a></div>
                    </div><!-- end of lower_center -->
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
