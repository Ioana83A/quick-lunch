<?php
	include("templates/template.php");
	include("templates/template2.php");
?>
<table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="tip_copii_menu4.php" method="post" enctype="multipart/form-data">
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Selectati ziua saptamanii:
            </td>
            <td align="left">
            	<select name="zi">
                	<option value="">-</option>
                	<option value="luni">Luni</option>
                    <option value="marti">Marti</option>
					<option value="miercuri">Miercuri</option>
                    <option value="joi">Joi</option>
                    <option value="vineri">Vineri</option>                    
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
