<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$id=$_GET['id'];
	
	$query="update comment set confirmat=1 where id=$id";
	$result=@mysql_query($query) or die('1'.mysql_error());
			
		
?>
<table align="center" width="800" bgcolor="#FFFFFF">
    	
        <tr>
        	<td align="center" class="text2">
            	Activare reusita!<br />
                
            </td>
        </tr>
         
        
</table>
<br />
	
</body>
</html>
