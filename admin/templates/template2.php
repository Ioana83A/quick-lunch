<table bgcolor='#ecf3d4' width='800' align='center' bordercolor='#CC0033'>   
<?php
	if(($_SESSION['username']=='macpixel') and (substr($_SERVER['PHP_SELF'],-10)!='logout.php'))
	{
		echo '
		<table bgcolor="#ecf3d4" width="800" align="center">
		<tr>
			<td width="20%">
			</td>
			<td align="left" class="text3" >&diams;&nbsp;<a href="vezi_comenzi.php">Comenzile sterse(super-user)</a></td>		
			<td width="20%">
			</td>
			<td align="left" class="text3" >&diams;&nbsp;<a href="total_comenzi.php">Total plata comenzi pe ziua in curs(super-user)</a></td>		
			<td width="20%">
			</td>
		</tr>
		</table>
		<br>
			';
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
<table bgcolor='#ecf3d4' width='800' height="250" align='center' border="0" cellpadding="0" cellspacing="0">

 <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="32%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%" bgcolor="#ecf3d4">&nbsp;</td>
    </tr>

<tr height="17%">
	<td width="3%">
   	<td align="Left" width="32%" class="text3"><strong>&nbsp;Vizualizati:</strong></td>
   		<td width="3%" bgcolor='#90c103'></td>
    	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%"><strong>&nbsp;Editati meniul:</strong></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%"><strong>&nbsp;Utilitare:</strong></td>
	</tr>
    
     <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="32%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%" bgcolor="#ecf3d4">&nbsp;</td>
    </tr>
    
 	<tr height="17%">
    	<td width="3%"></td>
   	  <td align="Left" width="32%" class="text3">&diams;&nbsp;<a href="comenzi.php">Comenzile</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_menu_curent.php">Din saptamana curenta</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%">&diams;&nbsp;<a href="reteta_saptamanii.php">Reteta saptamanii</a></td>
	</tr>
    
    
     <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="32%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%" bgcolor="#ecf3d4">&nbsp;</td>
    </tr>
    
    
    <tr height="17%">
    	<td width="3%"></td>
   	  <td align="Left" class="text3" width="32%">&diams;&nbsp;<a href="comments.php">Comment-urile(<?php echo $num; ?>)</a>	</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_menu_viitor.php">Pentru saptamana viitoare</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
         <td align="Left" class="text3" width="25%">&diams;&nbsp;<a href="noutati.php">Noutati</a></td>
    </tr>
    
     <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="32%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%" bgcolor="#ecf3d4">&nbsp;</td>
    </tr>
    
    
    <tr height="17%">
    	<td width="3%">
   	  <td align="Left" class="text3" width="32%">&diams;&nbsp;<a href="cvuri.php">CV-urile</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
    	<td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_viitor2.php">De peste doua saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%">&diams;&nbsp;<a href="upload_pdf.php">Upload pdf-uri meniu</a></td>
    </tr>
    
    <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="32%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%" bgcolor="#ecf3d4">&nbsp;</td>
    </tr>
    
    
    
    <tr height="17%">
    	<td width="3%"></td>
   	  <td align="Left" class="text3" width="32%" >&diams;&nbsp;<a href="meniu/meniu_doua_sapt.php" target="_blank">Meniul de peste doua saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_viitor3.php">De peste trei saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%">&diams;&nbsp;<a href="upload_poze.php">Upload poze prima pagina</a></td>
    </tr>
      <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
   	  <td  align="Left" class="text3" width="32%" bgcolor="#ecf3d4"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="25%" bgcolor="#ecf3d4">&nbsp;</td>
    </tr>
    
    
     <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
   	  <td align="Left" class="text3" width="32%" >&diams;&nbsp;<a href="meniu/meniu_trei_sapt.php" target="_blank">Meniul de peste trei saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_viitor4.php">De peste patru saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103"></td>
    </tr>
    <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
   	  <td  align="Left" class="text3" width="32%" bgcolor="#ecf3d4"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103"></td>
    </tr>
    
    
    <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="32%" >&diams;&nbsp;<a href="meniu/meniu_patru_sapt.php" target="_blank">Meniul de peste patru saptamani</a></td>
   	  
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
       <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_viitor5.php">De peste cinci saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103"></td>
    </tr>
    
    
    <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
   	  <td  align="Left" class="text3" width="32%" bgcolor="#ecf3d4"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103"></td>
    </tr>
    
    
    
      <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="32%" >&diams;&nbsp;<a href="meniu/meniu_cinci_sapt.php" target="_blank">Meniul de peste cinci saptamani</a></td>
   	  
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103"></td>
    </tr>
    
    <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
   	 <td  align="Left" class="text3" width="32%" bgcolor="#ecf3d4"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
         <td align="Left" class="text3" width="28%"><strong>&nbsp;Editati meniu scoli:</strong></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103"></td>
    </tr>
    
    
      <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
         <td align="Left" class="text3" width="32%" >&diams;&nbsp;<a href="sondaj.php" >Sondaj</a></td>
   	  
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103"></td>
    </tr>
    
     <tr height="17%">
    	<td width="3%" bgcolor='#ecf3d4'></td>
   	<td  align="Left" class="text3" width="32%" bgcolor="#ecf3d4"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
    
    <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_menu_copii_curent.php">Din saptamana curenta</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_menu_copii_viitor.php">Pentru saptamana viitoare</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_copii_viitor2.php">De peste doua saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_copii_viitor3.php">De peste trei saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
       <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_copii_viitor4.php">De peste patru saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_copii_viitor5.php">De peste cinci saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
    <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
     <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   	  <td  align="Left" class="text3" width="32%" bgcolor="#90c103">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
     <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   	 <td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
         <td align="Left" class="text3" width="28%"><strong>&nbsp;Editati meniu cre&#351;e &#351;i gr&#259;dini&#355;e:</strong></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103"></td>
    </tr>
    
    
      <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
         <td align="Left" class="text3" width="32%" bgcolor="#90c103"></a></td>
   	  
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103"></td>
    </tr>
    
     <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   	<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
    
    <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_menu_gradinite_curent.php">Din saptamana curenta</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_menu_gradinite_viitor.php">Pentru saptamana viitoare</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_gradinite_viitor2.php">De peste doua saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_gradinite_viitor3.php">De peste trei saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
       <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_gradinite_viitor4.php">De peste patru saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
       <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td align="Left" class="text3" width="28%">&diams;&nbsp;<a href="editati_meniu_gradinite_viitor5.php">De peste cinci saptamani</a></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
    <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   		<td  align="Left" class="text3" width="32%" bgcolor="#90c103"></td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#ecf3d4'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#ecf3d4">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
     <tr height="17%">
    	<td width="3%" bgcolor='#90c103'></td>
   	  <td  align="Left" class="text3" width="32%" bgcolor="#90c103">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
       	<td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="28%" bgcolor="#90c103">&nbsp;</td>
        <td width="3%" bgcolor='#90c103'></td>
        <td width="3%" bgcolor='#90c103'></td>
        <td  align="Left" class="text3" width="25%" bgcolor="#90c103">&nbsp;</td>
    </tr>
    
    
     <tr bgcolor="#90c103">
   		<td height="3%"></td>
    	<td></td>
    	<td></td>
    	<td></td>
        <td></td>
    	<td></td>
        <td></td>
    	<td></td>
    </tr>
</table>

 