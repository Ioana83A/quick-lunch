<?php



	include("db.php");
	//error_reporting(-1);
//ini_set('display_errors', '1');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Quick Lunch | Catering Timisoara | Livrare la domiciliu</title>


<link rel="stylesheet" type="text/css" href="styles/anylinkmenu_new.css" />
<script type="text/javascript" src="js/menucontents_v1_1.js"></script>
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



<link type="text/css" href="styles/style_contact.css" rel="stylesheet" />
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
            		
                    <div id="titlu_pag">
                    </div>
                    <div id="continut_pag">
                    		<div id="continut_pag_st">
                            		<div id="1">
                                    	<img src="images/contact/relatii_clienti1.png" />
                                    </div>
                                    <div id="2">
                                    	<a href="mailto:comanda@quick-lunch.ro"><img src="images/contact/relatii_clienti2.png" /></a>
                                    </div>
                                    <div id="3">
                                    	<img src="images/contact/relatii_clienti3.png" />
                                    </div>
                                    <div id="4">
                                    	<a href="mailto:nutritionist@quick-lunch.ro"><img src="images/contact/relatii_clienti4.png" /></a>
                                    </div>
                             		 <div id="5">
                                    	<img src="images/contact/relatii_clienti5.png" />
                              		</div>
                                   
                            </div>
                            <div id="continut_pag_centru">
                             <?php

		

			//error_reporting(0);

			$name = mysql_real_escape_string($_POST["nume"]);

			$email = mysql_real_escape_string($_POST["email"]);

			$tel = mysql_real_escape_string($_POST["telefon"]);

			$message = mysql_real_escape_string($_POST["mesaj"]);

			$message = str_replace(chr(13),'<br>',$message);

			



			$content = '

			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

			<html xmlns="http://www.w3.org/1999/xhtml">

			<head>

			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

			<style type="text/css">

			.menu {text-decoration:none; font-weight:bolder; font-size:12px; font-variant:normal; color: #626060; font-family:Arial, Helvetica, sans-serif;}

			.hometext {text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:12px; color: #727272; font-variant:normal; font-style:normal; font-weight:bold}

			.menutext{text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:12px; color: #FFFFFF; font-variant:normal; font-style:normal; font-weight:normal}

			.boldhometext {text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:12px; color: #727272; font-variant:normal; font-style:normal; font-weight:bolder}

			.bigtext {text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:14px; color: #727272; font-variant:normal; font-style:normal; font-weight:bolder}

			.blackbigtxt{text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#171717; font-style:normal; font-weight:bold}

			.blacklittletxt{text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#171717; font-style:normal; font-weight:bold}

			</style>

			<title></title>



			</head>

			<body>

			<font class="blackbigtxt"> Dl/Dna '.$name.' </font><br>

			<font class="menu">Tel : '.$tel.' </font><br />
			<font class="hometext">E-mail : '.$email.' </font><br /><br />

			<font class="hometext">'.$message.' </font>

			</body>

			</html>';
			
			$header  = "MIME-Version: 1.0\r\n";
			$header .= "Content-type: text/html; charset=iso-8859-1\r\n";

			$header .= "From: ".Quick-Lunch.'<'.$email.'\r\nReply-to: '.$email."\r\nContent-type: text/html; charset=us-ascii" ;

			$sender = "From: ".Quick-Lunch." <".$email.">";

			if (mail('office@quick-lunch.ro','Aveti un mesaj de la unul din clienti',$content,$header))

			{

				;

			}

			echo $string;



		?> 
                            
                            
                            		     <br /><br /><br /><br /><br /><br /><br />
                                     		<span id="portocaliu_titluri_jos">Mesaj trimis! Veti fii contactat in curand in legatura cu problema dumneavoastra.</span>
                                     
                                      
                                    
                            </div>
                            <div id="continut_pag_dreapta">
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
