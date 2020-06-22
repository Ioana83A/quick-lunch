<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	
?>
<br />
	<table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="newsletter.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="2" align="center" class="text1">
            	Trimiteti newsletter
            </td>
        </tr>
         <tr>
        	<td align="center" class="text2" width="50%">
            	Subiect:
            </td>
            <td align="left">
            	<input type="text" name="subiect" class="newsletter2">
            </td>
        </tr>
        <tr>
        	<td align="center" class="text2" width="50%">
            	Mesaj:
            </td>
            <td align="left">
            	<textarea name="mesaj" class="comment" rows="6" cols="30"></textarea>
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" name="submit" value="Trimite" class="submit"  />
            </td>
        </tr>
        </form>
    </table>   
</body>
</html>