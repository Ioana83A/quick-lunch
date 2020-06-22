<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$query="select distinct data from comanda order by data asc";
	$result=@mysql_query($query) or die('1'.mysql_error());
	
?>
<table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="comenzi1.php" method="post" enctype="multipart/form-data">
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Selectati data comenzii:
                <input type="hidden" name="zi" value="<?php echo $zi; ?>" />
            </td>
            <td align="left">
            	<select name="data">
                	<option value="">-</option>
                <?php
					while($data=@mysql_fetch_array($result))
					{
				?>
                		<option value="<?php echo $data['data'] ?>"><?php echo $data['data'] ?></option>
                <?php
					}
                ?>	
					
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
