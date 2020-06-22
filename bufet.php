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


<link type="text/css" href="styles/style_bufet.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="styles/style_ie6.css" />
<script type="text/javascript" src="js/swap.js"></script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  D. Keith Higgs (dkh2@po.cwru.edu) -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
var timeDelay = 3; // change delay time in seconds
var Pix = new Array
("images/bufet/poze_rulare/1.png" 
,"images/bufet/poze_rulare/2.png" 
,"images/bufet/poze_rulare/3.png"
,"images/bufet/poze_rulare/4.png" 
,"images/bufet/poze_rulare/5.png"  
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
              			
                                
                        <div id="continut_st" style="background: url('images/bufet/stanga_bufet.png') no-repeat">
                        </div>
                        
                        <div id="continut_dr">
                        		<div id="dreapta_sus_poze">
                                <div style="margin:95px auto 0px auto;width:300px;height:300px;padding-left:15px">
                                		<img src="images/bufet/poze_rulare/1.png" name="ChangingPix" />
                                </div>
                                </div>
                                <div id="descarca_titlu" style="height:3px"></div>
                                
                                <div id="descarca">
                                		<div id="spatiu_formular"></div>
                                        <form action="descarca_oferta.php" method="post" name="descarca_oferta_form" target="_blank" >
                                                    <div id="formular_descarca">                                        
                                                    		<!--<input type="radio" name="buton" value="1"/><span id="gri_titluri_jos"> Ofert&#259; platouri</span><br />
                                                             <input type="radio" name="buton" value="2"/><span id="gri_titluri_jos"> Ofert&#259; produse  </span>-->
                                                    
                                                    
                                                    </div>
                                                    <div id="buton_formular"> 
                                                                
                                                                        <input type="image" src="images/bufet/descarca_oferta.png" name"descarca_oferta" id="descarca_oferta" value="descarca_oferta" />
                                                                   
                                                    </div>
                                        </form>
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
