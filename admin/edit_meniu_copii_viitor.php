<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	
	$tip=$_POST['tip'];
	$zi=$_POST['zi'];
	$nume=$_POST['nume'];
	$nume=str_replace("'",'*-',$nume);
	$calorii=$_POST['calorii'];
	
	
	
	
		$query="update meniu_copii_viitor set calorii=$calorii where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die(mysql_error());
	
		$query="update meniu_copii_viitor set nume='$nume' where ziua=\"$zi\" and tip=\"$tip\"";
		$result=@mysql_query($query) or die(mysql_error());
		
		
?>
<table align="center" width="800" bgcolor="#ecf3d4">
    	
        <tr>
        	<td align="center" class="text2">
            	Modificare reusita!<br />
                <a href="tip_copii_menu1.php?zi=<?php echo $zi; ?>"><i>Adauga alt tip de meniu pe saptamana viitoare pe ziua de <?php echo $zi; ?></i></a>
            </td>
        </tr>
         
        
</table>
<br />
	
</body>
</html>
