<?php
	include("templates/template.php");
	include("templates/template2.php");

	$id=$_GET['id'];
	if (strcmp($id,"")!=0)
	{
		$data=$_GET['data'];
	}
	else
	{
		$data=$_POST['data'];
	}

	list($an, $luna, $zi) = explode("-", $data);
	$query="select * from comanda1 where data=\"$data\"";
	$result=@mysql_query($query) or die('1'.mysql_error());

?>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<table align="center" width="800" bgcolor="#CCCCCC" border="0" cellspacing="1">
    	<tr>
        	<td class="text2" align="center" colspan="9"  bgcolor="#FFFFFF">
            	Comenzi facute in data de <?php echo $zi.'/'.$luna.'/'.$an; ?>
            </td>
         </tr>
         
         <tr>
         	<td width="50" class="text1" align="center" bgcolor="#FFFFFF">
            	Nr. crt
            </td>
         	<td width="100" class="text1" align="center" bgcolor="#FFFFFF">
            	NUME
            </td>
            <td width="150" class="text1" align="center" bgcolor="#FFFFFF">
            	FIRMA
            </td>
            <td width="100" class="text1" align="center" bgcolor="#FFFFFF">
            	ADRESA
            </td>
            <td width="50" class="text1" align="center" bgcolor="#FFFFFF">
            	TELEFON
            </td>
            <td width="50" class="text1" align="center" bgcolor="#FFFFFF">
            	EMAIL
            </td>
            <td width="50" class="text1" align="center" bgcolor="#FFFFFF">
            	COD CLIENT
            </td>
           
            <td width="50" class="text1" align="center" bgcolor="#FFFFFF">
            	STERGE
            </td>
            <td width="150" class="text1" align="center" bgcolor="#FFFFFF">
            	VIZUALIZARE COMENZI
            </td>
        </tr>
        <?php
			while($date=@mysql_fetch_array($result))
			{
		?>
        	<tr>
            	<td width="50" class="text1" align="center" bgcolor="#FFFFFF">
            		<?php echo $date['id']; ?>
                </td>
        		<td width="100" class="text1" align="center" bgcolor="#FFFFFF">
            		<?php echo $date['nume']; ?>
                </td>
                <td width="150" class="text1" align="center" bgcolor="#FFFFFF">
                    <?php echo $date['firma']; ?>
                </td>
                <td width="100" class="text1" align="center" bgcolor="#FFFFFF">
                    <?php echo $date['adresa']; ?>
                </td>
                <td width="50" class="text1" align="center" bgcolor="#FFFFFF">
                    <?php echo $date['telefon']; ?>
                </td>
                <td width="50" class="text1" align="center" bgcolor="#FFFFFF">
                    <?php echo $date['email']; ?>
                </td>
                <td width="50" class="text1" align="center" bgcolor="#FFFFFF">
                    <?php echo $date['cod_client']; ?>
                </td>
                
                <td width="50" class="text1" align="center" bgcolor="#FFFFFF">
                    <a href="sterge_comanda1.php?id=<?php echo $date['id']; ?>&data=<?php echo $data; ?>"><img src="imgs/del.jpg" width="20" class="poza" /></a>
                </td>
                <td width="150" class="text1" align="center" bgcolor="#FFFFFF">
                    <a href="vizualizare1.php?id=<?php echo $date['id']; ?>&data=<?php echo $data; ?>" target="_blank" ><img src="imgs/vizualizare.gif" width="100" class="poza" /></a>
                </td>
        	</tr>        
        <?php
				                            }
		?>
        
        
        
      
    </table>
    <br />

</body>
</html>
