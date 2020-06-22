<font size="-5"><br  style="height:auto" /></font>
<table bgcolor='#FFFFFF' width='800' align='center' bordercolor='#CC0033'>   
<?php
	if(($_SESSION['username']=='macpixel') and (substr($_SERVER['PHP_SELF'],-10)!='logout.php'))
	{
		echo '
			<tr>
				<td align="center" class="text1" colspan="3">&diams;&nbsp;<a href="vezi_comenzi.php">Comenzile sterse(super-user)</a><td>
			</tr>';
	}
	
	$qq="select * from comment where confirmat=0";
	$rr=@mysql_query($qq) or die(mysql_error());
	$num=@mysql_num_rows($rr);
	
	if (strcmp($num,"")==0)
	{
		$num=0;
	}
	
?>	
</table>
<table bgcolor='#FFFFFF' width='800' align='center' bordercolor='#CC0033'>
	<tr>
    	<td align="center" width="33%" class="text3">&diams;&nbsp;<a href="reteta_saptamanii.php">Reteta saptamanii</a></td>
		
        
         <td align="center" class="text3" width="33%">&diams;&nbsp;<a href="noutati.php">Noutati</a></td>
         <td align="center" class="text3" width="33%">&diams;&nbsp;<a href="upload_pdf.php">Upload pdf-uri meniu</a></td>
	</tr>
</table>    

<table bgcolor='#FFFFFF' width='800' align='center' bordercolor='#CC0033'>   
    <tr>
    	<td align="center" class="text3" width="33%">&diams;&nbsp;<a href="editati_menu_curent.php">Editati meniu saptamana curenta</a><td>
        <td align="center" class="text3" width="33%">&diams;&nbsp;<a href="editati_menu_viitor.php">Editati meniu pentru saptamana viitoare</a><td>
         <td align="center" class="text3" width="33%">&diams;&nbsp;<a href="editati_meniu_viitor2.php">Editati meniul de peste doua saptamani</a><td>
    </tr>
</table>
<table bgcolor='#FFFFFF' width='800' align='center' bordercolor='#CC0033'>    
    <tr>
    	<td align="center" class="text3" width="33%">&diams;&nbsp;<a href="comenzi.php">Vizualizati comenzile</a><td>
    	<td align="center" class="text3" width="33%">&diams;&nbsp;<a href="comments.php">Vizualizati comment-urile(<?php echo $num; ?>)</a><td>
        <td align="center" class="text3" width="33%">&diams;&nbsp;<a href="cvuri.php">Vizualizati CV-urile</a><td>
    </tr>
</td>
<table bgcolor='#FFFFFF' width='800' align='center' bordercolor='#CC0033'>       
    <tr>
    	<td align="center" class="text3" width="100%" >&diams;&nbsp;<a href="meniu/meniu_doua_sapt.php" target="_blank">Vizualizati meniul de peste doua saptamani</a><td>
    	
    </tr>
</table>

