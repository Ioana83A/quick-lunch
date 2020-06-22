<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$id=$_GET['id'];
	
	
	$rez=@mysql_query("select * from cv where id=$id") or die(mysql_error());
	$linie=mysql_fetch_array($rez);
	
	@unlink('../cv/'.$linie['cv']);
	
	$query="delete from cv where id=$id";
	$result=@mysql_query($query) or die(mysql_error());
			
		
?>
<table align="center" width="800" bgcolor="#FFFFFF">
    	
        <tr>
        	<td align="center" class="text2">
            	Stergere reusita!<br />
                
            </td>
        </tr>
         
        
</table>
<br />
	
</body>
</html>
