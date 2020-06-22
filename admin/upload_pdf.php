<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	include "db.php";
	
?>
<br />
	<table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="upload.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="2" align="center" class="text1">
            	Editati pdf-urile ce contin meniurile pe saptamana curenta si viitoare
            </td>
        </tr>
      	<tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf saptamana curenta:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_curent" class="submit"  /><br /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf saptamana viitoare:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_viitor" class="submit"  /><br /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf de peste doua saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_viitor2" class="submit"  /><br /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf de peste trei saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_viitor3" class="submit"  /><br /><br />
                
            </td>
        </tr>
         <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf de peste patru saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_viitor4" class="submit"  /><br /><br />
                
            </td>
        </tr>
        
         <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf de peste cinci saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_viitor5" class="submit"  /><br /><br />
                
            </td>
        </tr>
        
        <tr><td>&nbsp;</td><td></td></tr>
        
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu scoli pentru saptamana curenta:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_copii_curent" class="submit"  /><br /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu scoli pentru saptamana viitoare:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_copii_viitor" class="submit"  /><br /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu scoli pentru peste doua saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_copii_viitor2" class="submit"  /><br /><br />
                
            </td>
        </tr>
          <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu scoli pentru peste trei saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_copii_viitor3" class="submit"  /><br /><br />
                
            </td>
        </tr>
          <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu scoli pentru peste patru saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_copii_viitor4" class="submit"  /><br /><br />
                
            </td>
        </tr>
          <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu scoli pentru peste cinci saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_copii_viitor5" class="submit"  /><br /><br />
                
            </td>
           </tr>
		 <tr><td>&nbsp;</td><td></td></tr>
		 <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu gradinite pentru saptamana curenta:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_gradinite_curent" class="submit"  /><br /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu gradinite pentru saptamana viitoare:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_gradinite_viitor" class="submit"  /><br /><br />
                
            </td>
        </tr>
        <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu gradinite pentru peste doua saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_gradinite_viitor2" class="submit"  /><br /><br />
                
            </td>
        </tr>
          <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu gradinite pentru peste trei saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_gradinite_viitor3" class="submit"  /><br /><br />
                
            </td>
        </tr>
          <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu gradinite pentru peste patru saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_gradinite_viitor4" class="submit"  /><br /><br />
                
            </td>
        </tr>
          <tr>
        	<td class="text2" align="center" width="50%">	
            	Adaugati pdf meniu gradinite pentru peste cinci saptamani:<br /><br />
               
            </td>
            <td align="left">
            	<input type="file" name="pdf_gradinite_viitor5" class="submit"  /><br /><br />
                
            </td>
        </tr>
        
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
