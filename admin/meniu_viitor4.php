<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	
	include "db.php";
	$zi=$_POST['zi'];
	$tip=$_POST['tip'];
	$query="select * from meniu_viitor4 where ziua=\"$zi\" and tip=\"$tip\"";
	$result=@mysql_query($query) or die(mysql_error());
	
	
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<br />
	<table align="center" width="800" bgcolor="#FFFFFF">
    	<form action="edit_meniu_viitor4.php" method="post" enctype="multipart/form-data">
    	<tr>
        	<td colspan="5" align="center" class="text1">
            	Editati meniul de peste patru saptamani ziua <?php echo $zi; ?>
            </td>
        </tr>
    <?php
		$row=mysql_fetch_array($result);
		
	?>
 
    	<tr>
        	<td class="text2" align="center" width="15%">	
            	Meniu tip <?php if (strcmp($row['tip'],"O")==0)
									{
										echo 'N';
									}
									elseif (strcmp($row['tip'],"A")==0)
									{
										echo 'A1';
									}
									elseif (strcmp($row['tip'],"V")==0)
									{
										echo 'A2';
									}
									elseif (strcmp($row['tip'],"DA")==0)
									{
										echo 'D1';
									}
									elseif (strcmp($row['tip'],"DB")==0)
									{
										echo 'D2';
									}
									elseif (strcmp($row['tip'],"G")==0)
									{
										echo 'G1';
									}
									elseif (strcmp($row['tip'],"S")==0)
									{
										echo 'G2';
									}
									elseif (strcmp($row['tip'],"T")==0)
									{
										echo 'G3';
									}
									elseif (strcmp($row['tip'],"Y")==0)
									{
										echo 'G4';
									}
									elseif (strcmp($row['tip'],"I")==0)
									{
										echo 'I1';
									}
									elseif (strcmp($row['tip'],"X")==0)
									{
										echo 'I2';
									}
									elseif (strcmp($row['tip'],"J")==0)
									{
										echo 'J1';
									}
									elseif (strcmp($row['tip'],"Z")==0)
									{
										echo 'J2';
									}
									elseif (strcmp($row['tip'],"R")==0)
									{
										echo 'V';
									}
									elseif (strcmp($row['tip'],"M")==0)
									{
										echo 'MM';
									}
									elseif (strcmp($row['tip'],"N")==0)
									{
										echo 'ME';
									}
									elseif (strcmp($row['tip'],"AA")==0)
									{
										echo 'A1M';
									}
									elseif (strcmp($row['tip'],"AB")==0)
									{
										echo 'A2M';
									}
									elseif (strcmp($row['tip'],"AC")==0)
									{
										echo 'G1M';
									}
									elseif (strcmp($row['tip'],"AD")==0)
									{
										echo 'G2M';
									}
									elseif (strcmp($row['tip'],"AE")==0)
									{
										echo 'G3M';
									}
									elseif (strcmp($row['tip'],"AF")==0)
									{
										echo 'G4M';
									}
									elseif (strcmp($row['tip'],"E")==0)
									{
										echo 'D3';
									}
									elseif (strcmp($row['tip'],"AG")==0)
									{
										echo 'E';
									}
									else
									{
										echo $row['tip'];
									}	 ?>
                <input type="hidden" name="tip" value="<?php echo $tip; ?>"  />
                <input type="hidden" name="zi" value="<?php echo $zi; ?>"  />
            </td>
            <td align="left" width="25%" class="text2">
            	Nume: &nbsp;<input type="text" name="nume" class="submit" value="<?php echo $row['nume']; ?>"  />
            </td>
            <td class="text2" align="center" width="10%">	
            	Pret &nbsp;<input type="text" name="pret" class="submit" value="<?php echo $row['pret']; ?>" size="5"  />
            </td>
            <td class="text2" align="center" width="30%">	Alegeti felul meniului
            	<select  name="type[]" multiple="multiple" size="5">
                	<?php
                if ($row['lacto_vegetarian']==1)
                {
					echo '<option value="vegetarian" selected="selected">Lacto-vegetarian</option>';
				}
				else
				{
					echo '<option value="vegetarian" >Lacto-vegetarian</option>';
				}
				
				if ($row['fitness']==1)
                {
					echo '<option value="fitness" selected="selected">Fitness</option>';
				}
				else
				{
					echo '<option value="fitness" >Fitness</option>';
				}
				if ($row['recomanda']==1)
                {
					echo '<option value="recomandare" selected="selected">Recomandare</option>';
				}
				else
				{
					echo '<option value="recomandare" >Recomandare</option>';
				}
				if ($row['nou']==1)
                {
					echo '<option value="nou" selected="selected">Nou</option>';
				}
				else
				{
					echo '<option value="nou" >Nou</option>';
				}
				if ($row['buc']==1)
                {
					echo '<option value="buc" selected="selected">Recomandarea bucatarului</option>';
				}
				else
				{
					echo '<option value="buc" >Recomandarea bucatarului</option>';
				}
				?>
				?>
                </select>
            </td>
            <td class="text2" align="center" width="20%">	
               	Poza:<input type="file" name="poza" class="submit"  />
                Click pentru a sterge poza: <a href="del_poza_meniu_viitor2.php?zi=<?php echo $zi; ?>&tip=<?php echo $tip; ?>"><img class="poza" src="imgs/del.jpg" height="10" /></a>
            </td>
        </tr>
        
        <tr>
        	<td colspan="5">
            	<hr />
            </td>
        </tr>
   
        <tr>
        	<td colspan="5" align="center">
            	<input type="submit" name="submit" value="Modifica" class="submit"  />
            </td>
        </tr>
        </form>
    </table>
    <br />
	
</body>
</html>
