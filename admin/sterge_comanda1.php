<?php
	include("templates/template.php");
	include("templates/template2.php");
	include('newsletter_clienti1.php');
	$id=$_GET['id'];
	newsletter($id);
	$data=$_GET['data'];
	list($an, $luna, $zi) = explode("-", $data);
	
	
	$query="delete from comanda1 where data=\"$data\" and id=$id";
	//$result=@mysql_query($query) or die('1'.mysql_error());
	
	$query1="delete from prod_comanda1 where comanda_id=$id";
	//$result1=@mysql_query($query1) or die('2'.mysql_error());
	
?>

<table align="center" width="800" bgcolor="#FFFFFF" border="1">
    	<tr>
        	<td class="text2" align="center" >	
            	Comanda stearsa
            </td>
         </tr>
         
         <tr>
         	               
                <td width="50" class="text1" align="center">
                    <a href="vezi_comenzi1.php?id=<?php echo $id; ?>&data=<?php echo $data; ?>" class="text2">Inapoi!</a>
                </td>
                
        	</tr>        
       
        
        
        
      
    </table>
    <br />
	
</body>
</html>
