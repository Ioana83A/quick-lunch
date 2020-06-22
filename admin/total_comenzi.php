<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	
	
?>
<?php
	include('db.php');
	
	$zi=date('d');
	$luna=date('m');
	$an=date('o');
	$total=0;
	$total1=0;
	
	$data=$an.'-'.$luna.'-'.$zi;
	
	$query="select * from comanda1 where data='$data'";
	$result=@mysql_query($query) or die('2'.mysql_error());
	while($row=@mysql_fetch_array($result))
	{
		$id_comanda=$row['id'];
		
		$query1="select * from prod_comanda1 where comanda_id=$id_comanda";
		$result1=@mysql_query($query1) or die('1'.mysql_error());
		while($row1=@mysql_fetch_array($result1))
		{
			$tip=$row1['tip'];
			$meniu_id=$row1['meniu_id'];
			$buc=$row1['buc'];
			if (strcmp($tip,'c')==0)
			{
				$query2="select * from meniu_curent where id=$meniu_id";
				$result2=@mysql_query($query2) or die('4'.mysql_error());
				$row2=@mysql_fetch_array($result2);
				$total=$total+$buc*$row2['pret'];
			}
			else
			{
				$query2="select * from meniu_viitor3 where id=$meniu_id";
				$result2=@mysql_query($query2) or die('3'.mysql_error());
				$row2=@mysql_fetch_array($result2);
				$total=$total+$buc*$row2['pret'];
				//echo $total.'<br />';
			}
		}
	}
	
	
	$query3="select * from comanda where data='$data'";
	$result3=@mysql_query($query3) or die('2'.mysql_error());
	while($row3=@mysql_fetch_array($result3))
	{
		$id_comanda1=$row3['id'];
		
		$query4="select * from prod_comanda where comanda_id=$id_comanda1";
		$result4=@mysql_query($query4) or die('1'.mysql_error());
		while($row4=@mysql_fetch_array($result4))
		{
			$tip1=$row4['tip'];
			$meniu_id1=$row4['meniu_id'];
			$buc1=$row4['buc'];
			if (strcmp($tip1,'c')==0)
			{
				$query5="select * from meniu_curent where id=$meniu_id1";
				$result5=@mysql_query($query5) or die('4'.mysql_error());
				$row5=@mysql_fetch_array($result2);
				$total1=$total1+$buc1*$row5['pret'];
			}
			else
			{
				$query5="select * from meniu_viitor3 where id=$meniu_id1";
				$result5=@mysql_query($query5) or die('3'.mysql_error());
				$row5=@mysql_fetch_array($result5);
				$total1=$total1+$buc1*$row5['pret'];
				//echo $total.'<br />';
			}
		}
	}
	
	$total2=$total+$total1;
?>
<table align="center" width="800" bgcolor="#ecf3d4">
    	
        <tr>
        	<td colspan="2" align="center">
            	<?php echo $total2.' RON in data de '.$zi.'/'.$luna.'/'.$an; ?>
            </td>
        </tr>
        
    </table>
    <br />
	
</body>
</html>