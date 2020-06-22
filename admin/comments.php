<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$query="select * from comment order by `data` DESC";
	$result=@mysql_query($query) or die('1'.mysql_error());
	
?>
<table align="center" width="800" bgcolor="#ecf3d4">
    	<form action="comements1.php" method="post" enctype="multipart/form-data">
        <tr>
        	<td class="text2" align="center" colspan="2">	
            	Comments:
                
            </td>
        </tr>
        <?php
			while($row=mysql_fetch_array($result))
			{
		?>
        	<tr>
        		<td align="center" width="50%">
                	Nume: <?php echo $row['nume']; ?><br />
                    Data: <b><?php echo $row['data']; ?></b>
                </td>
                <td align="center" width="50%">
                	E-mail: <?php echo $row['email']; ?>
                </td>
        	</tr>
            <tr>
        		<td align="center" width="50%">
                	Mesaj
                </td>
                <td align="center" width="50%">
                	<?php echo utf8_decode($row['mesaj']); ?>
                </td>
            </tr>
            <tr>
            	<td class="text2" align="center" colspan="2">
                	<?php
						if(strcmp($row['confirmat'],0)==1)
						{
							echo '<a class="text2" href="del_comm.php?id='.$row['id'].'">Sterge comentariul</a>';
						}
						else
						{
							echo '<a class="text2" href="del_comm.php?id='.$row['id'].'">Sterge comentariul</a> | <a class="text2" href="activeaza_comm.php?id='.$row['id'].'">Activeaza</a>';
						}
					?>
                </td>
            </tr>    
        	<tr>
        		<td class="text2" align="center"colspan="2">
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
