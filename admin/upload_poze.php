<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	include "db.php";
	
?>
<br />
	<table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="upload_poze1.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="2" align="center" class="text1">
            	Adaugati pozele pentru prima pagina pe saptamana viitoare
            </td>
        </tr>
        <tr><td>&nbsp;</td><td></td></tr>
      	<tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati poza 1:<br />
               
            </td>
            <td align="left">
            	<input type="file" name="pic_mont_1" id="pic_mont_1" class="submit"/><input type="hidden" name="MAX_FILE_SIZE" value="512000" /><br />
            	
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati descriere poza 1:<br /><br /><br /><br />
               
            </td>
            <td align="left">
            	<input type="text" name="descriere_1" id="descriere_1" class="submit"/><br /><br /><br /><br />
            	
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati poza 2:<br />
               
            </td>
            <td align="left">
            	<input type="file" name="pic_mont_2" id="pic_mont_2" class="submit"/><input type="hidden" name="MAX_FILE_SIZE" value="512000" /><br />
                
            </td>
        </tr>
         <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati descriere poza 2:<br /><br /><br /><br />
               
            </td>
            <td align="left">
            	<input type="text" name="descriere_2" id="descriere_2" class="submit"/><br /><br /><br /><br />
            	
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati poza 3:<br />
               
            </td>
            <td align="left">
            	<input type="file" name="pic_mont_3" id="pic_mont_3" class="submit"/><input type="hidden" name="MAX_FILE_SIZE" value="512000" /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati descriere poza 3:<br /><br /><br /><br />
               
            </td>
            <td align="left">
            	<input type="text" name="descriere_3" id="descriere_3" class="submit"/><br /><br /><br /><br />
            	
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati poza 4:<br />
               
            </td>
            <td align="left">
            	<input type="file" name="pic_mont_4" id="pic_mont_4" class="submit"/><input type="hidden" name="MAX_FILE_SIZE" value="512000" /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati descriere poza 4:<br /><br /><br /><br />
               
            </td>
            <td align="left">
            	<input type="text" name="descriere_4" id="descriere_4" class="submit"/><br /><br /><br /><br />
            	
                
            </td>
        </tr>
         <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati poza 5:<br />
               
            </td>
            <td align="left">
            	<input type="file" name="pic_mont_5" id="pic_mont_5" class="submit"/><input type="hidden" name="MAX_FILE_SIZE" value="512000" /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati descriere poza 5:<br /><br /><br /><br />
               
            </td>
            <td align="left">
            	<input type="text" name="descriere_5" id="descriere_5" class="submit"/><br /><br /><br /><br />
            	
                
            </td>
        </tr>
         
        
        <tr><td>&nbsp;</td><td></td></tr>
        
       
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" name="submit" value="Upload" class="submit"  />
            </td>
        </tr>
        
        </form>
    </table>
    <br />
	
</body>
</html>
