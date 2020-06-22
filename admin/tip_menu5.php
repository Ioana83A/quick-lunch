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
    	<form action="meniu_viitor5.php" method="post" enctype="multipart/form-data">
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Selectati tipul meniului:
                <input type="hidden" name="zi" value="<?php echo $zi; ?>" />
            </td>
            <td align="left">
            	<select name="tip">
                	<option value="">-</option>
                	<option value="A">A1</option>
                    <option value="AA">A1M</option>
                    <option value="V">A2</option>
                    <option value="AB">A2M</option>
                    <option value="B">B</option>
					<option value="C">C</option>
                    <option value="DA">D1</option>
                    <option value="DB">D2</option>
                    <option value="E">D3</option>
                    <option value="AG">E</option> 
                    <option value="F">F</option>
                    <option value="G">G1</option>
                    <option value="AC">G1M</option>
                    <option value="S">G2</option>
                    <option value="AD">G2M</option>
                    <option value="T">G3</option>
                    <option value="AE">G3M</option>
                    <option value="Y">G4</option>
                    <option value="AF">G4M</option>
					<option value="H">H</option>
                    <option value="I">I1</option>
                    <option value="X">I2</option>
                    <option value="J">J1</option> 
                    <option value="Z">J2</option>
                    <option value="K">K</option>
                    <option value="O">N</option>
                    <option value="P">P</option>                    					
                    <option value="L">L</option>
                    <option value="U">U</option>
                    <option value="R">V</option>
                    <option value="Q">Q</option>
					<option value="M">MM</option>
                    <option value="N">ME</option>
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
