<?php
							$acum = time();
							$time_azi = strtotime("+8 hours",$acum);
							$zi_c = date("w",$time_azi);
							if ($zi_c == 0) 
							{
								$zi_c = 7;
								//$time_azi = strtotime("-1 day",$acum);								
							}
							$dif = $zi_c-1;
							$dif2 = 5-$zi_c;
							$in_saptamanii = date("d",strtotime("-".$dif." days",$time_azi));
							//$sf_saptamanii = date("d.m.y",strtotime("+".$dif2." days",$time_azi));
							$sf_saptamanii = date("d",strtotime("+".$dif2." days",$time_azi));
							$in_saptamanii.' - '.$sf_saptamanii;
							$saptamana_curenta = date("W");
							//echo $saptamana_curenta;

	include("db.php");
	$query="select distinct nume, id from comanda1 where id>293 group by nume ";				
	$result=@mysql_query($query) or die (mysql_error());
?>
<form action="ordoneaza.php" method="post">
	<select name="nume">
    	<option value="">-</option>
        <?php
			while($row=mysql_fetch_array($result))
			{
		?>
        		<option value="<?php echo $row['nume']; ?>"><?php echo $row['nume']; ?></option>
        <?php
			}
		?>
    </select>
    <input type="submit" name="submit" value="Ordoneaza" />
</form>    