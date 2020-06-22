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
		function validare_contact(form)
			{
				
				if (form.nume.value == "" ) {
					alert( "Va rugam introduceti un nume.\n" );
					form.nume.focus();
					return false ;
				}
				if (form.email.value == "" ) {
					alert( "Va rugam introduceti o adesa de e-mail.\n" );
					form.email.focus();
					return false ;
				}
				if (form.telefon.value == "" ) {
					alert( "Va rugam introduceti numarul de telefon.\n" );
					form.email.focus();
					return false ;
				}
				if (form.mesaj.value =="") {
					alert( "Va rugam introduceti un mesaj.\n" );
					form.mesaj.focus();
					return false ;
				}
				return true ;
			}

</script>


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
                                    	<a href="mailto:evenimente@quick-lunch.ro"><img src="images/contact/email-new.png" /></a>
                                    </div>
                                    
                             		 <div id="5">
                                    	<img src="images/contact/relatii_clienti5.png" />
                              		</div>
                                   
                            </div>
                            <div id="continut_pag_centru">
                            		<div id="6">
                                    	<img src="images/contact/relatii_clienti6.png" />
                                    </div>
                                     <div id="formular_contact">     
                                     		<form name="contactForm" action="send_contact.php" method="post" onclick="return validate_contact(this);">                              
                                                        <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">Nume : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta">
                                                                		<input type="text" id="nume_contact" name="nume" class="text_contact" />
                                                                </div>
                                                        </div>
                                                        <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">E-mail : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta">
                                                                		<input type="text" id="email_contact" name="email" class="text_contact" />
                                                                </div>
                                                        </div>
                                                        <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">Telefon : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta">
                                                                		<input type="text" id="telefon_contact" name="telefon" class="text_contact" />
                                                                </div>
                                                        </div>
                                                        <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">Mesaj : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta_textarea">
                                                                		<textarea rows='6' cols='18' name="mesaj" id="mesaj" class="textarea_contact" onkeyup="scroll()" ></textarea>
                                                                </div>
                                                        </div>
                                                        <div id="submit_formular">
                                                                <input type="image" src="images/contact/trimite.png" name="trimite" value="trimite" />
                                                        </div>
                                               </form>
                                     
                                      </div>
                                    
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
