<?php
	include("templates/template.php");
	include("templates/template2.php");
	//include("templates/template3.php");
	
	$query1="select * from noutati";
	$result1=@mysql_query($query1) or die(mysql_error());	
		
	$query2="select * from noutati";
	$result2=@mysql_query($query2) or die(mysql_error());
?>

    <br />
	<table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="adauga_noutate.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="2" align="center" class="text1">
            	Adaugati noutate
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Numele noutatii:
            </td>
            <td align="left">
            	<input type="text" name="nume_noutate" class="submit" />
            </td>
        </tr>
        
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Textul noutatii:
            </td>
            <td align="left">
            	<textarea name="text_noutate" cols="50" rows="3" class="comentarii"></textarea>
            </td>
        </tr>
        
        <tr>
        	<td class="text2" align="center" width="50%">
            	Stergeti noutate(dati click pe cel pe cea pe care doriti sa o stergeti)
            </td>
            <td align="left">
            	<?php
					while($row2=mysql_fetch_array($result2))
					{
							$nume2=utf8_decode($row2['nume_noutate']);
							$nume2 = str_replace('<br>',chr(13),$nume2);
							$nume2=str_replace('***---','"',$nume2);
						echo '<a class="text1" href="sterge_noutate.php?id='.$row2['id'].'">'.$nume2.'</a><br />';
					}
				?>
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" name="submit" value="Submit" class="submit"  />
            </td>
        </tr>
        </form>
    </table>
        <br />
    <table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="editeaza_noutate.php" method="post" enctype="multipart/form-data">
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Editeaza o noutate:
            </td>
            <td align="left">
            
            	<select name="id_noutate" class="select">
                	<option value="">-</option>
                    <?php
						while ($row=mysql_fetch_array($result1))
						{
					?>
                    	<option value="<?php echo $row['id']; ?>"><?php echo utf8_decode($row['nume_noutate']); ?></option>
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
</body>
</html>	