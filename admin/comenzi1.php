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
	$query="select * from comanda where data=\"$data\"";
	$result=@mysql_query($query) or die('1'.mysql_error());
	
	
	
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<table align="center" width="800" bgcolor="#CCCCCC" border="0" cellspacing="1">
    	<tr>
        	<td class="text2" align="center" colspan="10" bgcolor="#FFFFFF">	
            	Comenzi facute in data de <?php echo $zi.'/'.$luna.'/'.$an; ?>
            </td>
         </tr>
         
         <tr>
          <td width="35" class="text1" align="center" bgcolor="#FFFFFF">
            	STERGE
            </td>
         	<td width="25" class="text1" align="center" bgcolor="#FFFFFF">
            	Nr.crt
            </td>
         	<td width="100" class="text1" align="center" bgcolor="#FFFFFF">
            	NUME
            </td>
            <td width="225" class="text1" align="center" bgcolor="#FFFFFF">
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
           
           
            <!--td width="40" class="text1" align="center" bgcolor="#FFFFFF">
            	STERGE PT FACT
            </td-->
            <td width="150" class="text1" align="center" bgcolor="#FFFFFF">
            	VIZUALIZARE COMENZI
            </td>
        </tr>
        <?php
			while($date=@mysql_fetch_array($result))
			{
				$id_comanda=$date['id'];
				$query1="select * from factura where id_comanda=$id_comanda";
				$result1=@mysql_query($query1) or die('2'.mysql_error());
				$row1=mysql_fetch_array($result1);
				
		?>
        	<tr>
            <?php
                if ((strcmp($row1['cont'],"")==0) or (strcmp($row1['cf'],"")==0))
				{
				
                	echo '<td width="75" class="text1" align="center" bgcolor="#FFFFFF">
                    	<a href="sterge_comanda.php?id='.$id_comanda.'&data='.$data.'"><img src="imgs/del.jpg" width="20" class="poza" /></a>
                	</td>';
				}
				else
				{
					echo '<td width="40" class="text1" align="center" bgcolor="#FFFFFF">
                    			<a href="sterge_comanda_facturare.php?id='.$id_comanda.'&data='.$data.'"><img src="imgs/check.jpg" width="20" class="poza" /></a>
                			</td>';	
				}
					
				?>
            	<td width="25" class="text1" align="center" bgcolor="#FFFFFF">
            		<?php echo $date['id']; ?>
                </td>
        		<td width="100" class="text1" align="center" bgcolor="#FFFFFF">
            		<?php echo $date['nume']; ?>
                </td>
                <td width="225" class="text1" align="center" bgcolor="#FFFFFF">
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
                
                
                <td width="125" class="text1" align="center" bgcolor="#FFFFFF">
                    <a href="vizualizare2.php?id=<?php echo $date['id']; ?>&data=<?php echo $data; ?>" target="_blank" ><img src="imgs/vizualizare.gif" width="100" class="poza" /></a>
                </td>
        	</tr>        
        <?php
			}
		?>
        
        
        
      
    </table>
    <br />
	
</body>
</html>
