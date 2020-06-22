<?php
	include("templates/template.php");
	include("templates/template2.php");
	//include("templates/template3.php");
	
	include "db.php";
	
	$id=$_POST['id_noutate'];
	
	$query="select * from noutati where id=$id";
	$result=@mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	
	$text = str_replace('<br>',chr(13),$row['text_noutate']);
	$text=str_replace("***---",'"',$text);
	$text= str_replace('<br />',chr(13),$text);
	
	
	$nume_noutate = str_replace('<br>',chr(13),$row['nume_noutate']);
	$nume_noutate=str_replace("***---",'"',$nume_noutate);	
	
		
?>
<br />
	<table align="center" width="800" bgcolor="#FFFFFF">
    	<form action="edit_noutate.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="2" align="center" class="text1">
            	Editati noutatea
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Schimbati numele noutatii:
            </td>
            <td align="left">
            	<input type="hidden" name="id" value="<?php echo $id; ?>"  />
            	<input type="text" name="nume_noutate" class="submit" value="<?php echo utf8_decode($nume_noutate); ?>"  />
            </td>
        </tr>
        
      
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Editati textul noutatii:
            </td>
            <td align="left">
            	<textarea name="text_noutate" cols="50" rows="6" class="comentarii"><?php echo utf8_decode($text); ?></textarea>
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
