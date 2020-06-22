<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$id=$_GET['id'];
	
	include('newsletter_clienti.php');
	newsletter($id);
	
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
	
	$cerere1='insert into comanda1(id,data, ora, firma, nume, adresa, telefon, cod_client, email) values("'.$comanda_id1.'","'.$data.'", "'.$ora.'", "'.$firma.'", "'.$nume.'", "'.$adresa.'", "'.$telefon.'", "'.$cod_client.'", "'.$email.'")';
	$rezultat1=@mysql_query($cerere1) or die(mysql_error());
	
	$cerere2="select * from prod_comanda where comanda_id=$comanda_id1";
	$rezultat2=@mysql_query($cerere2) or die('1'.mysql_error());
	while ($linie2=mysql_fetch_array($rezultat2))
	{
		$meniu_id=$linie2['meniu_id'];
		$tip=$linie2['tip'];
		$buc=$linie2['buc'];
		$comanda_id=$linie2['comanda_id'];
		$cerere3="insert into prod_comanda1(comanda_id, meniu_id, tip, buc) values ('$comanda_id', '$meniu_id', '$tip', '$buc')";
		$rezultat3=@mysql_query($cerere3) or die(mysql_error());
	}
	
	$query="delete from comanda where data=\"$data\" and id=$id";
	$result=@mysql_query($query) or die('1'.mysql_error());
	
	
	
	$query1="delete from prod_comanda where comanda_id=$id";
	$result1=@mysql_query($query1) or die('2'.mysql_error());
	
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
