<?php
	include("templates/template.php");
	include("templates/template2.php");
	//include("templates/template3.php");
	
	include "db.php";
	$zi=$_POST['zi'];
	$tip=$_POST['tip'];
	$query="select * from meniu_copii_curent where ziua=\"$zi\" and tip=\"$tip\"";
	$result=@mysql_query($query) or die(mysql_error());
	//$row=mysql_fetch_array($result);
	
	
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<br />
	<table align="center" width="800" bgcolor="#FFFFFF">
    	<form action="edit_meniu_copii_curent.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="5" align="center" class="text1">
            	Editati meniu pe saptamana curenta ziua <?php echo $zi; ?>
            </td>
        </tr>
    <?php
		$row=mysql_fetch_array($result);
		
	?>
 
    	<tr>
        	<td class="text2" align="center" width="15%">	
            	Meniu tip : <?php echo $row['tip']; ?>
                <input type="hidden" name="tip" value="<?php echo $tip; ?>"  />
                <input type="hidden" name="zi" value="<?php echo $zi; ?>"  />
            </td>
            <td align="left" width="25%" class="text2">
            	Nume: &nbsp;<input type="text" name="nume" class="submit" value="<?php echo $row['nume']; ?>"  />
            </td>
            <td class="text2" align="center" width="10%">	
            	Calorii: &nbsp;<input type="text" name="calorii" class="submit" value="<?php echo $row['calorii']; ?>" size="5"  />
            </td>
            
        </tr>
        
        <tr>
        	<td colspan="5">
            	<hr />
            </td>
        </tr>
   
        <tr>
        	<td colspan="5" align="center">
            	<input type="submit" name="submit" value="Modifica" class="submit"  />
            </td>
        </tr>
        </form>
    </table>
    <br />
	
</body>
</html>
