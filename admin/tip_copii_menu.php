<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$ziua=$_GET['zi'];
	if (strcmp($ziua,"")!=0)
	{
		$zi=$ziua;
	}
	else
	{
		$zi=$_POST['zi'];
	}
	//echo $zi;
?>
<table align="center" width="800" bgcolor="#FFFFFF">
    	<form action="meniu_copii_curent.php" method="post" enctype="multipart/form-data">
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Selectati felul :
                <input type="hidden" name="zi" value="<?php echo $zi; ?>" />
            </td>
            <td align="left">
            	<select name="tip">
                	<option value="">-</option>
                	<option value="fel1">Felul 1</option>
                    <option value="fel2">Felul 2</option>
                    <option value="desert">Desert</option>
					
                </select>
            </td>
        </tr>
         
        
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" name="submit" value="Selecteaza" class="submit"  />
            </td>
        </tr>
        </form>
    </table>
    <br />
	
</body>
</html>
