<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	function total2($id)
	{
		//echo $id;
		$query="select * from prod_comanda where comanda_id=$id";
		$result=@mysql_query($query) or die(mysql_error());
		while($row=mysql_fetch_array($result))
		{
			$nrbuc=$row['buc'];
			$meniu_id=$row['meniu_id'];
			if (strcmp($row['tip'],'c')==0) 
			{
				$query1="select * from meniu_curent where id=$meniu_id";
				$result1=@mysql_query($query1) or die(mysql_error());
				$linie=@mysql_fetch_array($result1);
				$pret=$linie['pret'];
			}
			else
			{
				$query1="select * from meniu_viitor where id=$meniu_id";
				$result1=@mysql_query($query1) or die(mysql_error());
				$linie=@mysql_fetch_array($result1);
				$pret=$linie['pret'];
			}	
			
			
			$suma+=$pret*$nrbuc;
		}
		return $suma;
	}		

	
	$id=$_GET['id'];
	
	include('newsletter_clienti.php');
	//include('functie.php');
	
	newsletter($id);
	$total=total2($id);
	$cer="update factura set total=$total where id_comanda=$id";
	$res=@mysql_query($cer) or die('1'.mysql_error());
	
	$cer1="insert into chitanta(id_comanda) values($id)";
	$res1=@mysql_query($cer1) or die(mysql_error());
	//echo $total;
	
	
	
	$data=$_GET['data'];
	list($an, $luna, $zi) = explode("-", $data);
	
	$cerere="select * from comanda where data=\"$data\" and id=$id";
	$rezultat=@mysql_query($cerere) or die(mysql_error());
	$linie=mysql_fetch_array($rezultat);
	
	$ora=$linie['ora'];
	$firma=$linie['firma'];
	$nume=$linie['nume'];
	$adresa=$linie['adresa'];
	$telefon=$linie['telefon'];
	$cod_client=$linie['cod_client'];
	$email=$linie['email'];
	$comanda_id1=$linie['id'];
	
	$cerere1="insert into comanda1(id,data, ora, firma, nume, adresa, telefon, cod_client, email) values('$comanda_id1','$data', '$ora', '$firma', '$nume', '$adresa', '$telefon', '$cod_client', '$email')";
	$rezultat1=@mysql_query($cerere1) or die('11'.mysql_error());
	
	$cerere11="insert into comanda_factura(id,data, ora, firma, nume, adresa, telefon, cod_client, email) values('$comanda_id1','$data', '$ora', '$firma', '$nume', '$adresa', '$telefon', '$cod_client', '$email')";
	$rezultat11=@mysql_query($cerere11) or die('12'.mysql_error());
	
	$cerere2="select * from prod_comanda where comanda_id=$comanda_id1";
	$rezultat2=@mysql_query($cerere2) or die('1'.mysql_error());
	while ($linie2=mysql_fetch_array($rezultat2))
	{
		$meniu_id=$linie2['meniu_id'];
		$tip=$linie2['tip'];
		$buc=$linie2['buc'];
		$comanda_id=$linie2['comanda_id'];
		
		if (strcmp($tip,"c")==0)
		{
			$men='meniu_curent';
		}
		else
		{
			$men='meniu_viitor';
		}
		
		$aabb="select * from ".$men." where id=$meniu_id";
		$bbaa=mysql_query($aabb) or die(mysql_error());
		$bbcc=mysql_fetch_array($bbaa);
		$nume=$bbcc['nume'];
		
		
		
		$cerere3="insert into prod_comanda1(comanda_id, meniu_id, tip, buc, nume) values ('$comanda_id', '$meniu_id', '$tip', '$buc', '$nume')";
		$rezultat3=@mysql_query($cerere3) or die(mysql_error());
	}
	
	//echo $cerere3="select * from prod_comanda where comanda_id=$comanda_id1";
	$rezultat4=@mysql_query($cerere2) or die('3'.mysql_error());
	while ($linie3=mysql_fetch_array($rezultat4))
	{
		$meniu_id3=$linie3['meniu_id'];
		$tip3=$linie3['tip'];
		$buc3=$linie3['buc'];
		$nume3=$linie3['nume'];
		$comanda_id3=$linie3['comanda_id'];
		$cerere3="insert into prod_comanda_factura(comanda_id, meniu_id, tip, buc,nume) values ('$comanda_id3', '$meniu_id3', '$tip3', '$buc3','$nume')";
		$rezultat3=@mysql_query($cerere3) or die(mysql_error());
	}
	
	$query="delete from comanda where data=\"$data\" and id=$id";
	$result=@mysql_query($query) or die('1'.mysql_error());
	
	
	
	$query1="delete from prod_comanda where comanda_id=$id";
	$result1=@mysql_query($query1) or die('2'.mysql_error());
	
	//$cer="insert into factura(id_comanda, total) values($id,'$total')";
	//$res=@mysql_query($cer) or die(mysql_error());
	
	
?>

<table align="center" width="800" bgcolor="#FFFFFF" border="1">
    	<tr>
        	<td class="text2" align="center" >	
            	Comanda stearsa
            </td>
         </tr>
         
         <tr>
         	               
                <td width="50" class="text1" align="center">
                    <a href="comenzi1.php?id=<?php echo $id; ?>&data=<?php echo $data; ?>" class="text2">Inapoi!</a>
                </td>
                
        	</tr>        
       
        
        
        
      
    </table>
    <br />
	
</body>
</html>
