<?php



	include("db.php");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include "metataguri.php"; ?>
<title>Quick Lunch | Catering Timisoara | Livrare la domiciliu</title>

<link type="text/css" href="styles/style_cariere.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="styles/style_ie6.css" />
<script type="text/javascript" src="js/swap.js"></script>

<script type="text/javascript" >
		function scroll()
		{
		document.getElementById('mesaj').scrollTop=document.getElementById('mesaj').scrollHeight-document.getElementById('mesaj').clientHeight;
		}
		
		
		function verif()	
	{
		if (document.cariere_form.nume.value.length < 1) 
		{
			alert('Nu v-ati introdus numele!');
			return false;
		}

	
		if (document.cariere_form.email.value.length < 1) 
		{
			alert('Trebuie sa introduceti o adresa de e-mail!');
			return false;
		}
		var myString1 = document.cariere_form.email.value;
		if ((myString1.indexOf(".") < 2) || (myString1.indexOf("@") < 0) || (myString1.lastIndexOf(".") < myString1.indexOf("@"))) 
		{
			alert('Va rugam introduceti o adresa de e-mail valida!');
			return false;
		}	
		
		
		if (document.cariere_form.telefon.value.length < 1) 
		{
			alert('Nu ati introdus numarul de telefon!');
			return false;
		}
		
		if (document.cariere_form.cv.value.length < 1) 
		{
			alert('Nu ati introdus CV-ul!');
			return false;
		}
		
		alert('CV trimis!');
	}		
		
</script>



<link rel="stylesheet" type="text/css" href="styles/anylinkmenu_v3.css" />
<script type="text/javascript" src="js/menucontents_v5.js"></script>
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
                            		<div id="vino"></div>
                            		<div id="pov">
                                    		<div id="11"><img src="images/cariere/text1.png" /></div>
                                            <div id="12"><a href="mailto:office@quick-lunch.ro"><img src="images/cariere/text2.png" /></a></div>
                                            <div id="13"><img src="images/cariere/text3.png" /></div>
                              		</div>
                                   
                            </div>
                            <div id="continut_pag_centru">
                            		<div id="spatiu_deasupra_form">
                                    	
                                    </div>
                                    
                                   
                                     <div id="formular_contact">     
                                     		<form name="cariere_form" method="post" enctype="multipart/form-data" action="procesare_cariere.php" onsubmit="return verif();">                            
                                                        <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">Nume : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta1">
                                                                		<input type="text" id="nume_contact" name="nume" class="text_contact" />
                                                                </div>
                                                        </div>
                                                        <div id="linie_formular">
                                                                <div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">E-mail : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta1">
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
                                                        
                                                        <div id="linie_formular">
                                                        		<img src="images/cariere/incarca.png" />
                                                        </div>
                                                        <div id="linie_formular">
                                                        		<div id="linie_formular_stanga">
                                                                        <span id="gri_inchis">CV : </span>
                                                                </div>
                                                                <div id="linie_formular_dreapta2">
                                                                		<input type="file" size="11" name="cv" />
                                                                		<span id="portocaliu_stele">&nbsp;*</span>
                                                                </div>
                                                        </div>
                                                        <div id="atentie">
                                                        	<img src="images/cariere/atentie_campuri.png" />
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
