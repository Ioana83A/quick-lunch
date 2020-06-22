<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$query="select * from cv";
	$result=@mysql_query($query) or die('1'.mysql_error());
	
?>
<table align="center" width="800" bgcolor="#ecf3d4">
    	
        <tr>
        	<td class="text2" align="center" colspan="3">	
            	CV-uri<br />(pentru a vizualiza CV-ul dati click pe link-ul "Vezi CV", pentru salvare click dreapta pe link si selectati "save target as..." sau "save link as.."):
                
            </td>
        </tr>
        <?php
			while($row=mysql_fetch_array($result))
			{
		?>
        	<tr>
        		<td align="center" width="33%">
                	Nume: <?php echo utf8_decode($row['nume']); ?>
                </td>
                <td align="center" width="33%">
                	E-mail: <?php echo $row['email']; ?>
                </td>
                 <td align="center" width="33%">
                	Telefon: <?php echo $row['telefon']; ?>
                </td>
        	</tr>
           <tr>
        		<td align="center" >
                	Mesaj: <?php echo utf8_decode($row['mesaj']); ?>
                </td>
                <td align="center">
                	<a href='../cv/<?php echo $row['cv']; ?>' class="text2" target="_blank" >Vezi CV</a>
                </td>
                <td align="center">
                	<a href="sterge_cv.php?id=<?php echo $row['id']; ?>" class="text2">Sterge CV</a>
                </td> 
        	</tr>
        	<tr>
        		<td class="text2" align="center"colspan="3">
                	<hr />
                </td>
        	</tr>
        		
        <?php
			}
		?>
       
        </form>
    </table>
    <br />
	
</body>
</html>
