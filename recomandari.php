<?php





	include("db.php");
//	error_reporting(-1);
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



<link type="text/css" href="styles/style_recomandari.css" rel="stylesheet" />
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
		function validare_recomand(form)
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
				
				if (form.mesaj.value =="") {
					alert( "Va rugam introduceti un mesaj.\n" );
					form.mesaj.focus();
					return false ;
				}
				return true ;
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
                                    <div id="titlu_recomandari">
                                    </div>
                                    <div id="formular_recomandari">
                                     <?php    
            if (!isset($_POST['nume'])) {
			
		?>
                                    		<form  method="post" action="<?php $PHP_SELF ?>" enctype="multipart/form-data" onsubmit="return validate_recomand(this);" name="recomandari_form"> 
                                            
                                            	<div id="linie_formular">
                                                		<div id="linie_st"><span id="gri_inchis">Nume : </span></div>
                                                        <div id="linie_dr_textbox"><input type="text" id="nume_recomandari" name="nume" class="text_recomandari" /></div>
                                                </div>  
                                                <div id="linie_formular">
                                                		<div id="linie_st"><span id="gri_inchis">E-mail : </span></div>
                                                        <div id="linie_dr_textbox"><input type="text" id="email_recomandari" name="email" class="text_recomandari" /></div>
                                                </div> 
                                                <div id="linie_formular"><img src="images/recomandarile/confidential.png" /></div>
                                                <div id="linie_formular">
                                                		<div id="linie_st"><span id="gri_inchis">Mesaj : </span></div>
                                                        <div id="linie_dr_textarea"><textarea rows='6' cols='18' name="mesaj" id="mesaj" class="textarea_recomandari" onkeyup="scroll()" ></textarea></div>
                                                </div>
                                                <div id="linie_formular"><img src="images/recomandarile/campuri.png" /></div>
                                                <div id="linie_formular">
                                                		<div id="buton_trimite"><input type="image" src="images/contact/trimite.png" name="trimite_parere" value="trimite_parere" /></div>
                                                </div>
                                            </form>
                                            
                                             <?php
               }
			   else
			   {
			   
			   
			   
			
			$nume=utf8_encode($_POST["nume"]);
			$mail= $_POST["email"];
			$mesaj= utf8_encode($_POST["mesaj"]);
			
			$mesaj=str_replace('"','\"',$mesaj);
			$mesaj = str_replace(chr(13),'<br />',$mesaj);
			$data=date("Y-m-d");
			
			$cerere="insert into comment(nume, email, mesaj, data, confirmat ) values (\"$nume\", \"$email\", \"$mesaj\", \"$data\",0)";
			$rezultat=@mysql_query($cerere) or die(mysql_error());
			echo" <br /><br /><br /><br /><br /><br /><br />
                                     		<span id='portocaliu_titluri_jos'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recomandare inregristrata!</span>";
			
       }?>
                                    </div>
                                    <div id="omulet_recomandari">
                                    </div>              
                                
                                
                        </div>
                        
                        
                        
                        <div id="continut_pag_centru">
                        </div>
                        
                        
                        <div id="continut_pag_dr">
                        
                        		<?php 
														
														$page = $_GET['page'];
														if(strcmp($page,"")==0)
														{
														 $page=1;
														}
												 $start_from = ($page - 1) * 6;
												$query = 'Select * from comment where confirmat="1" order by data DESC LIMIT '. $start_from.', 6';
												$result = mysql_query($query) or die (mysql_error());
												
												while ($row = mysql_fetch_array($result))
												{       
												        
														$tt = $row["nume"];
														$tt = str_replace('\"','"',$tt);
														$titlu = utf8_decode($tt);														
														$continut = $row["mesaj"];
														//echo $Cc;
														
														$data = $row["data"];
														$now = strtotime($data);
														$data = date("d.m.Y",$now);
														
														$continut = str_replace('\"','"',$continut);
														$continut = str_replace(',',', ',$continut);
														$continut = utf8_decode($continut);	
																

												?>                
                        	
                        		<div id="entry">
                                		<div id="spatiu_sus"></div>
                                		<div id="titlu">	
                                        	<span id="verde_noutati"><?php echo $titlu.' - '.$data; ?></span>
                                        </div>
                                        <div id="continut">
                                        	<span id="gri_noutati"><?php echo $continut;  ?></span>
                                        </div>
                                </div>
                             <?php  
							  
                             } 
							 
							 ?>
                                
                                
                        </div>
                   
                   
                   
                                     
              </div>
              <div id="spatiu_sus"></div>
               <div id="numere_pag">
               
               
               <?php
			   //------------- pagination--------------
	
	$sql1 = "SELECT * FROM comment where confirmat='1'";
        $result1 = mysql_query($sql1);
        $total_records = mysql_num_rows($result1);
        $total_pages = ceil($total_records / 6);
        echo "  <div id='space'><center>";
			

        if ($page == 1) {
            echo "<img src='images/noutati/first.png' align='absmiddle'/>";
			
            echo "<img src='images/noutati/previous.png' align='absmiddle'/>";
        } else {
            $page_previous = $page - 1;
            echo "<a  class='paginare' href=\"recomandari.php?page=1\"><img src='images/noutati/first.png' align='absmiddle'/> </a> ";
			
            echo "<a class='paginare'href=\"recomandari.php?page=" . $page_previous . "\"><img src='images/noutati/previous.png' align='absmiddle'/></a> ";
        }

        echo "&nbsp&nbsp&nbsp  ";
//        for ($i = 1; $i <= $total_pages; $i++) {

       
        if ($total_pages <= 6) {
             
            for ($i = 1; $i <= $total_pages; $i++) {

                if ($i == $page)
                    echo "<a class='paginare' href=\"recomandari.php?page=" . $i . "\"><u>" . $i . "</u></a> ";
                else
                    echo "<a class='paginare' href=\"recomandari.php?page=" . $i . "\">" . $i . "</a> ";
            }
        }
        else if ($page + 3 == $total_pages||$page+3>$total_pages||$page+3==$total_pages-1) {
            if ($page != 1) {

             echo "<a  class='paginare' href=\"recomandari.php?page=1\">1</a> ";
            echo "&nbsp<span id='paginatie1'>...</span>&nbsp";
        }
            for ($i = $total_pages-4; $i <= $total_pages; $i++) {
                if ($i == $page)
                    echo "<a  class='paginare' href=\"recomandari.php?page=" . $i . "\"><u>" . $i . "</u></a> ";

                else
                    echo "<a  class='paginare' href=\"recomandari.php?page=" . $i . "\">" . $i . "</a> ";
            }
        }
        else if ($page==1||$page==2 ) {
            for ($i=1; $i <=3; $i++) {
                if ($i == $page)
                    echo "<a class='paginare'  href=\"recomandari.php?page=" . $i . "\"><u>" . $i . "</u></a> ";

                else
                    echo "<a  class='paginare' href=\"recomandari.php?page=" . $i . "\">" . $i . "</a> ";
            }
            echo "&nbsp<span id='paginatie1'>...</span>&nbsp";
            echo "<a  class='paginare' href=\"recomandari.php?page=" . $total_pages . "\">" . $total_pages . "</a> ";
        }
        
        else {
             if ($page != 1) {

             echo "<a  class='paginare' href=\"recomandari.php?page=1\">1</a> ";
            echo "&nbsp<span id='paginatie1'>...</span>&nbsp";
        }
            for ($i = $page; $i <= $page + 3; $i++) {
                if ($i == $page)
                    echo "<a  class='paginare' href=\"recomandari.php?page=" . $i . "\"><u>" . $i . "</u></a> ";

                else
                    echo "<a  class='paginare' href=\"recomandari.php?page=" . $i . "\">" . $i . "</a> ";
            }
            echo "&nbsp<span id='paginatie1'>...</span>&nbsp";
            echo "<a class='paginare'  href=\"recomandari.php?page=" . $total_pages . "\">" . $total_pages . "</a> ";
        }
//            if($i==$page) echo "<a href=\"index.php?option=list&sort=" . $sort . "&page=" . $i . "\"><u>" . $i . "</u></a> ";
//            else
//            echo "<a href=\"index.php?option=list&sort=" . $sort . "&page=" . $i . "\">" . $i . "</a> ";
//        }

        echo "&nbsp&nbsp&nbsp ";
        if ($page == $total_pages) {
            echo " <img src='images/noutati/next.png' align='absmiddle'/> ";
			
            echo " <img src='images/noutati/last.png' align='absmiddle'/> ";
        } else {
            $page_next = $page + 1;
            echo "<a  class='paginare' href=\"recomandari.php?page=" . $page_next . "\"> <img src='images/noutati/next.png' align='absmiddle'/></a> ";
			
            echo "<a  class='paginare' href=\"recomandari.php?page=" . $total_pages . "\"> <img src='images/noutati/last.png' align='absmiddle'/></a> ";
        }

        echo "</center></div>";
	
	//--------------------------------------
		  ?>
                        		<!--<img src="images/noutati/first.png" align="absmiddle"/>
                                <img src="images/noutati/previous.png" align="absmiddle"/>&nbsp;&nbsp;
                                <span id="paginatie">1 2 3</span>
                                
                                &nbsp;&nbsp;<img src="images/noutati/next.png" align="absmiddle"/>
                                <img src="images/noutati/last.png" align="absmiddle"/>-->
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
