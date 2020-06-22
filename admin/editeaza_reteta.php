<?php
	include("templates/template.php");
	include("templates/template2.php");
	//include("templates/template3.php");
	
	include "db.php";
	
	$id=$_POST['id_reteta'];
	
	$query="select * from reteta_saptamanii where id=$id";
	$result=@mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	
	$text = str_replace('<br>',chr(13),$row['text_reteta']);
	$text=str_replace('\"','"',$text);
	$text= str_replace('<br />',chr(13),$text);
	
	$ingrediente = str_replace('<br>',chr(13),$row['ingrediente']);
	$ingrediente=str_replace('\"','"',$ingrediente);
	$ingrediente= str_replace('<br />',chr(13),$ingrediente);
	
	$nume_reteta = str_replace('<br>',chr(13),$row['nume_reteta']);
	$nume_reteta=str_replace('\"','"',$nume_reteta);	
	
	$timp_preparare = str_replace('<br>',chr(13),$row['timp_preparare']);
	$timp_preparare=str_replace("***---",'"',$timp_preparare);	
	
	$dificultate = str_replace('<br>',chr(13),$row['dificultate']);
	$dificultate=str_replace("***---",'"',$dificultate);	
	
	$calorii = str_replace('<br>',chr(13),$row['calorii']);
	$calorii=str_replace("***---",'"',$calorii);	
?>
<br />
	<table align="center" width="800" bgcolor="#FFFFFF">
    	<form action="edit_reteta_saptamanii.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="2" align="center" class="text1">
            	Editati reteta saptamanii
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Schimbati numele retetei:
            </td>
            <td align="left">
            	<input type="hidden" name="id" value="<?php echo $id; ?>"  />
            	<input type="text" name="nume_reteta" class="submit" value="<?php echo utf8_decode($nume_reteta); ?>"  />
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Editati poza retetei:
            </td>
            <td align="left">
            	<input type="file" name="poza" class="submit"  />
            </td>
        </tr>
       <tr>
        	<td class="text2" align="center" width="50%">	
            	Editati ingredientele:
            </td>
            <td align="left">
            	<textarea name="ingrediente" cols="50" rows="6" class="comentarii"><?php echo utf8_decode($ingrediente); ?></textarea>
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Editati textul retetei:
            </td>
            <td align="left">
            	<textarea name="text_reteta" cols="50" rows="6" class="comentarii"><?php echo utf8_decode($text); ?></textarea>
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Editati timpul de preparare(in minute):
            </td>
            <td align="left">
            	<input type="text" name="timp_preparare" class="submit" value="<?php echo utf8_decode($timp_preparare); ?>"  />
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Editati dificultatea retetei:
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
            	Editati caloriile:
            </td>
            <td align="left">
            	<input type="text" name="calorii" class="submit" value="<?php echo utf8_decode($calorii); ?>"  />
            </td>
        </tr>
        
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" name="submit" value="Modifica" class="submit"  />
            </td>
        </tr>
        </form>
    </table>
    <br />
	
</body>
</html>
