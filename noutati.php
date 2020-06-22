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



<link type="text/css" href="styles/style_noutati.css" rel="stylesheet" />
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
                        
                        <?php 
														
														$page = $_GET['page'];
														if(strcmp($page,"")==0)
														{
														 $page=1;
														}
												 $start_from = ($page - 1) * 4;
												$query_noutati = 'Select * from noutati order by id DESC LIMIT '. $start_from.', 4';
												$result_noutati = mysql_query($query_noutati) or die (mysql_error());
												$i=0;
													while($row=mysql_fetch_assoc($result_noutati))
													{
														$i++;
														$tt = $row["nume_noutate"];
														$tt = str_replace('***---','"',$tt);
														$titlu = utf8_decode($tt);														
														$continut = $row["text_noutate"];
														
														$continut = str_replace('***---','"',$continut);
														$continut = str_replace(',',', ',$continut);
														$continut = utf8_decode($continut);	
													
																

												?>     
                        
                        
                        		<div id="spatiu_sus">
                                </div>
                        		<div id="entry">
                                		<div id="titlu">	
                                        	<?php if($i%2!=0)  
													{
											
											?>
                                        	<span id="verde_noutati"><?php echo $titlu; ?></span>
                                            
                                           <?php }else{
										   ?>
                                           <span id="portocaliu_noutati"><?php echo $titlu; ?></span>
                                           <?php } ?>
                                        </div>
                                        <div id="continut">
                                        	<span id="gri_noutati"><?php echo $continut; ?> </span>
                                        </div>
                                </div>
                                
                                
                                <?php  
							  
                             } 
							 
							 ?>
                                
                                
                                
                        		
                                
                                
                                
                        </div>
                        <div id="continut_pag_dr">
                        	<img src="images/noutati/refturi.png" />
                        </div>
                   
                                     
              </div>
               <div id="numere_pag">
               
                <?php
			   //------------- pagination--------------
	
	$sql1 = "Select * from noutati ";
        $result1 = mysql_query($sql1);
        $total_records = mysql_num_rows($result1);
        $total_pages = ceil($total_records / 4);
        echo "  <div id='space'><center>";
			

        if ($page == 1) {
            echo "<img src='images/noutati/first.png' align='absmiddle'/>";
			
            echo "<img src='images/noutati/previous.png' align='absmiddle'/>";
        } else {
            $page_previous = $page - 1;
            echo "<a  class='paginare' href=\"noutati.php?page=1\"><img src='images/noutati/first.png' align='absmiddle'/> </a> ";
			
            echo "<a class='paginare'href=\"noutati.php?page=" . $page_previous . "\"><img src='images/noutati/previous.png' align='absmiddle'/></a> ";
        }

        echo "&nbsp&nbsp&nbsp  ";
//        for ($i = 1; $i <= $total_pages; $i++) {

       
        if ($total_pages <= 6) {
             
            for ($i = 1; $i <= $total_pages; $i++) {

                if ($i == $page)
                    echo "<a class='paginare' href=\"noutati.php?page=" . $i . "\"><u>" . $i . "</u></a> ";
                else
                    echo "<a class='paginare' href=\"noutati.php?page=" . $i . "\">" . $i . "</a> ";
            }
        }
        else if ($page + 3 == $total_pages||$page+3>$total_pages||$page+3==$total_pages-1) {
            if ($page != 1) {

             echo "<a  class='paginare' href=\"noutati.php?page=1\">1</a> ";
            echo "&nbsp<span id='paginatie1'>...</span>&nbsp";
        }
            for ($i = $total_pages-4; $i <= $total_pages; $i++) {
                if ($i == $page)
                    echo "<a  class='paginare' href=\"noutati.php?page=" . $i . "\"><u>" . $i . "</u></a> ";

                else
                    echo "<a  class='paginare' href=\"noutati.php?page=" . $i . "\">" . $i . "</a> ";
            }
        }
        else if ($page==1||$page==2 ) {
            for ($i=1; $i <=3; $i++) {
                if ($i == $page)
                    echo "<a class='paginare'  href=\"noutati.php?page=" . $i . "\"><u>" . $i . "</u></a> ";

                else
                    echo "<a  class='paginare' href=\"noutati.php?page=" . $i . "\">" . $i . "</a> ";
            }
            echo "&nbsp<span id='paginatie1'>...</span>&nbsp";
            echo "<a  class='paginare' href=\"noutati.php?page=" . $total_pages . "\">" . $total_pages . "</a> ";
        }
        
        else {
             if ($page != 1) {

             echo "<a  class='paginare' href=\"noutati.php?page=1\">1</a> ";
            echo "&nbsp<span id='paginatie1'>...</span>&nbsp";
        }
            for ($i = $page; $i <= $page + 3; $i++) {
                if ($i == $page)
                    echo "<a  class='paginare' href=\"noutati.php?page=" . $i . "\"><u>" . $i . "</u></a> ";

                else
                    echo "<a  class='paginare' href=\"noutati.php?page=" . $i . "\">" . $i . "</a> ";
            }
            echo "&nbsp<span id='paginatie1'>...</span>&nbsp";
            echo "<a class='paginare'  href=\"noutati.php?page=" . $total_pages . "\">" . $total_pages . "</a> ";
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
            echo "<a  class='paginare' href=\"noutati.php?page=" . $page_next . "\"> <img src='images/noutati/next.png' align='absmiddle'/></a> ";
			
            echo "<a  class='paginare' href=\"noutati.php?page=" . $total_pages . "\"> <img src='images/noutati/last.png' align='absmiddle'/></a> ";
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
