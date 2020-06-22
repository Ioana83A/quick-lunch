<?php
	include("templates/template.php");
	include("templates/template2.php");
	//include("templates/template3.php");
	
	include "db.php";
	$query="select * from reteta_saptamanii";
	$result=@mysql_query($query) or die(mysql_error());
	
	$query2="select * from reteta_saptamanii";
	$result2=@mysql_query($query2) or die(mysql_error());
	
	$query3="select * from reteta_saptamanii";
	$result3=@mysql_query($query3) or die(mysql_error());
	
?>
<br />
	<table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="adauga_reteta.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="2" align="center" class="text1">
            	Adaugati reteta saptamanii
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Numele retetei:
            </td>
            <td align="left">
            	<input type="text" name="nume_reteta" class="submit" />
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Poza retetei:
            </td>
            <td align="left">
            	<input type="file" name="poza" class="submit"  />
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Ingrediente (ingredientele vor fi trecute cu virgula intre ele):
            </td>
            <td align="left">
            	<textarea name="ingrediente" cols="50" rows="3" class="comentarii"></textarea>
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Textul retetei:
            </td>
            <td align="left">
            	<textarea name="text_reteta" cols="50" rows="6" class="comentarii"></textarea>
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Timpul de preparare(in minute):
            </td>
            <td align="left">
            	<input type="text" name="timp_preparare" class="submit"  />
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Dificultatea retetei:
            </td>
            <td align="left">
            	<select name="dificultate">
                	<option value="">-</option>
                	<option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </td>
        </tr>
         <tr>
        	<td class="text2" align="center" width="50%">	
            	Caloriile:
            </td>
            <td align="left">
            	<input type="text" name="calorii" class="submit"  />
            </td>
        </tr>
        
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" name="submit" value="Adauga" class="submit"  />
            </td>
        </tr>
        </form>
    </table>
    <br />
    <table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="editeaza_reteta.php" method="post" enctype="multipart/form-data">
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Editeaza reteta:
            </td>
            <td align="left">
            
            	<select name="id_reteta" class="select">
                	<option value="">-</option>
                    <?php
						while ($row=mysql_fetch_array($result))
						{
					?>
                    	<option value="<?php echo $row['id']; ?>"><?php echo utf8_decode($row['nume_reteta']); ?></option>
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
	<table align="center" width="800" bgcolor="#ecf3d4">    
    <tr>
        	<td class="text2" align="center" width="50%">
            	Stergeti reteta(dati click pe cel pe cea pe care doriti sa o stergeti)
            </td>
            <td align="left">
            	<?php
					while($row2=mysql_fetch_array($result2))
					{
							$nume2=utf8_decode($row2['nume_reteta']);
							$nume2 = str_replace('<br>',chr(13),$nume2);
							$nume2=str_replace('***---','"',$nume2);
						echo '<a class="text1" href="sterge_reteta.php?id='.$row2['id'].'">'.$nume2.'</a><br />';
					}
				?>
            </td>
        </tr>
    </table>    
<br />
	<table align="center" width="800" bgcolor="#ecf3d4">   
    	<form action="activeaza_reteta.php" method="post" enctype="multipart/form-data">
    	<tr>
        	    	<td class="text2" align="center" width="50%">	
            	Selecteaza ce reteta va fi reteta saptamanii:
            </td>
            <td align="left">
            
            	<select name="id_reteta" class="select">
                	<option value="">-</option>
                    <?php
						while ($row3=mysql_fetch_array($result3))
						{
					?>
                    	<option value="<?php echo $row3['id']; ?>"><?php echo utf8_decode($row3['nume_reteta']); ?></option>
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
