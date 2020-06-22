<?php
	include("templates/template.php");
	include("templates/template2.php");
	
		
	$query2="select * from recomandarile_saptamanii";
	$result2=@mysql_query($query2) or die(mysql_error());
?>

    <br />
	<table align="center" width="800" bgcolor="#FFFFFF">
    	<form action="adauga_recomandare.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="2" align="center" class="text1">
            	Adaugati recomandare
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Numele meniului:
            </td>
            <td align="left">
            	<input type="text" name="nume_recomandare" class="submit" />
            </td>
        </tr>
        
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Pretul meniului:
            </td>
            <td align="left">
            	<input type="text" name="pret_recomandare" class="submit" />
            </td>
        </tr>
        
        <tr>
        	<td class="text2" align="center" width="50%">
            	Stergeti recomandare(dati click pe cel pe cea pe care doriti sa o stergeti)
            </td>
            <td align="left">
            	<?php
					while($row2=mysql_fetch_array($result2))
					{
							$nume2=utf8_decode($row2['nume_recomandare']);
							$nume2 = str_replace('<br>',chr(13),$nume2);
							$nume2=str_replace('***---','"',$nume2);
						echo '<a class="text1" href="sterge_recomandare.php?id='.$row2['id'].'">'.$nume2.'</a><br />';
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
</body>
</html>	