<?php
	$id=$_GET['id'];

	
	$sql_transport="SELECT * from taxa";
	$result_transport=mysql_query($sql_transport);
	$row_transport=mysql_fetch_array($result_transport);
	$shippingCost=$row_transport["taxa"];
	
	
	
  

$query_noutati = "Select * from `comenzi_vechi` WHERE `id`='$id'";	
$result_noutati = mysql_query($query_noutati) or die (mysql_error());
$count=mysql_num_rows($result_noutati);

	while($row=mysql_fetch_assoc($result_noutati))
	{
		
		$id_comanda=$row["id"];

		$tip=$row["tip"];
		
		$nume=$row["nume"];
		$prenume=$row["prenume"];
		
		//$cnp=$row["cnp"];
		
		
		$nume_firma=$row['nume_firma'];
		$cui=$row["cui"];									
		$cod_inreg=$row["cod_inreg"];
		$banca=$row["banca"];
		$iban=$row["iban"];
		
		$strada=$row["strada"];
		$numarul=$row["numarul"];
		$bloc=$row["bloc"];
		$scara=$row["scara"];
		$etaj=$row["etaj"];
		$apartament=$row["apartament"];
		//$cod_postal=$row["cod_postal"];
		
		$localitate=$row["localitate"];
		$judet=$row["judet"];
		$mail=$row["mail"];
		$telefon=$row["telefon"];
		
		$data=$row["data_comenzii"];
		$od_id=$row["od_id"];
		
		
		
					


								
								?> 

<div>
    <table>
        <tr>
            <td><span class="decriere_detaliu_mare">Nr. comand&#259;:</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $id_comanda; ?></span></td>
        </tr>
        <tr>
            <td><span class="decriere_detaliu_mare">Data comenzii:</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $data; ?></span></td>
        </tr>
        <tr height="10px"><td>&nbsp;</td></tr>
       <?php
			if($tip=="pers_fizica")
			{
		
		?>
        <tr>
            <td><span class="decriere_detaliu_mare">Client (pers. fizic&#259;):</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $nume." ".$prenume; ?></span></td>
        </tr>
        <!--<tr>
            <td><span class="decriere_detaliu_mare">CNP:</span></td>
            <td><span class="decriere_comenzi_contact">--><?php //echo $cnp; ?><!--</span></td>
        </tr>-->
        
        <?php
		}
		else
		{
		?>
        <tr>
            <td><span class="decriere_detaliu_mare">Client (firm&#259;):</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $nume_firma; ?></span></td>
        </tr>
        <tr>
            <td><span class="decriere_detaliu_mare">Cod unic (CUI):</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $cui; ?></span></td>
        </tr>
        <tr>
            <td><span class="decriere_detaliu_mare">Cod &#238;nregistrare (Reg.com.):</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $cod_inreg; ?></span></td>
        </tr>
        <tr>
            <td><span class="decriere_detaliu_mare">Banc&#259;:</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $banca; ?></span></td>
        </tr>
        <tr>
            <td><span class="decriere_detaliu_mare">Cod banc&#259; IBAN:</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $iban; ?></span></td>
        </tr>
        <?php
		}
		?>
        <tr>
            <td valign="top"><span class="decriere_detaliu_mare">Adres&#259;:</span></td>
            <td><span class="decriere_comenzi_contact"> str. <?php echo $strada; ?> nr. <?php echo $numarul; ?> <br />
             bl. <?php echo $bloc; ?>,scara. <?php echo $scara; ?>, et. <?php echo $etaj; ?>, ap. <?php echo $apartament; ?><br />
             <?php echo $localitate; ?> <br />
             jud. <?php echo $judet; ?></span></td>
        </tr>
        <tr>
            <td><span class="decriere_detaliu_mare">Telefon:</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $telefon; ?></span></td>
        </tr>
        <tr>
            <td><span class="decriere_detaliu_mare">E-mail:</span></td>
            <td><span class="decriere_comenzi_contact"><?php echo $mail; ?></span></td>
        </tr>
    </table>
</div>
<div style="height:30px;"></div>
<div>

    <table style="width:653px;border-collapse:collapse;">
    <!-- header -->
        <tr style="background:url(images/comenzi/detaliat/header.jpg);width:653px;height:44px;">
            <td style="width:211px;padding:10px 12px 0px 12px;text-align:left;"><span class="decriere_comenzi">Articol</span></td>
            <td style="width:145px;padding:10px 12px 0px 12px;text-align:left;"><span class="decriere_comenzi">Nr. unit&#259;&#355;i comandate</span></td>
            <td style="width:125px;padding:10px 12px 0px 12px;text-align:left;"><span class="decriere_comenzi">Pre&#355; pe unitate</span></td>
            <td style="width:76px;padding:10px 12px 0px 12px;text-align:left;"><span class="decriere_comenzi">Total</span></td>
            
        </tr>
    <!-- end -->
     <?php
		$total=0;
		$sql_ord="SELECT * FROM `order_item` WHERE `od_id`='$od_id'";
		$result_ord=mysql_query($sql_ord);
		$i=0;
		while($row_ord=mysql_fetch_array($result_ord))
		{
			$i++;
			$sum=0;
			$cantitate=$row_ord["od_qty"];
			$produs=$row_ord["pd_id"];
			$sql_prod="SELECT * from `produse` WHERE `id`='$produs'";
			$result_prod=mysql_query($sql_prod);
			$row_prod=mysql_fetch_array($result_prod);
			$pret_prod=$row_prod["pret"];
			$nume_prod=$row_prod["nume"];
			$unitate_masura_prod=$row_prod["unitate_masura"];
			$sum=$pret_prod*$cantitate;
			$total=$total+$sum;
		
		//$total=0;
//		$sql_ord_sum = "SELECT SUM(p.pret * oi.od_qty) AS 'suma'
//	        FROM order_item oi, produse p 
//		    WHERE oi.pd_id = p.id and oi.od_id = '$od_id';";
//		$result_ord_sum=mysql_query($sql_ord_sum);
//		$row_ord_sum=mysql_fetch_array($result_ord_sum);
//		echo $row_ord_suma['SUM(p.pret * oi.od_qty)'];
//		echo $suma=$row_ord_suma["suma"];
		
											if($i%2!=0)  
													{
											
											?>
	
    <!-- portocaliu -->
        <tr style="background:url(images/comenzi/detaliat/portocaliu.jpg) repeat-y;width:653px;min-height:38px;">
            <td style="width:211px;padding:10px 12px 10px 12px;text-align:left; " valign="middle"><span class="decriere_comenzi"><?php echo $nume_prod; ?></span></td>
            <td style="width:145px;padding:10px 12px 10px 12px;text-align:left;" valign="middle"><span class="decriere_comenzi"><?php echo $cantitate; ?> </span></td>
            <td style="width:125px;padding:10px 12px 10px 12px;text-align:left;" valign="middle"><span class="decriere_comenzi"><?php echo $pret_prod; ?> ron / <?php echo $unitate_masura_prod; ?>  </span></td>
            <td style="width:76px;padding:10px 12px 10px 12px;text-align:left;" valign="middle"><span class="decriere_comenzi"><?php echo $sum; ?> ron</span></td>
            
        </tr>
    <!-- end -->	
    									<?php
										}else{
										?>
    <!-- simplu -->
        <tr style="background:url(images/comenzi/detaliat/simplu.jpg) repeat-y;width:653px;min-height:38px;">
            <td style="width:211px;padding:10px 12px 10px 12px;text-align:left; " valign="middle"><span class="decriere_comenzi"><?php echo $nume_prod; ?></span></td>
            <td style="width:145px;padding:10px 12px 10px 12px;text-align:left;" valign="middle"><span class="decriere_comenzi"><?php echo $cantitate; ?></span></td>
            <td style="width:125px;padding:10px 12px 10px 12px;text-align:left;" valign="middle"><span class="decriere_comenzi"><?php echo $pret_prod; ?> ron / <?php echo $unitate_masura_prod; ?> </span></td>
            <td style="width:76px;padding:10px 12px 10px 12px;text-align:left;" valign="middle"><span class="decriere_comenzi"><?php echo $sum; ?> ron</span></td>
            
        </tr>
    <!-- end -->
    
    <?php
					}
		}
		$total_fin=$total+$shippingCost;
	?>
    
    
    
    </table>
</div>
<div style="height:30px;"></div>

<div>

    <table style="width:653px;border-collapse:collapse;">
        <tr style="background:url(images/comenzi/detaliat/tab_jos_total.jpg);width:653px;height:38px;">
            <td style="width:541px;padding:10px 12px 10px 0px;text-align:right;"><span class="decriere_comenzi">Total</span></td>
            <td style="width:76px;padding:10px 12px 10px 12px;text-align:left;"><span class="decriere_comenzi_contact_visiniu"><?php echo $total_fin; ?> ron</span></td>
            
        </tr>
    <!-- end -->
    
   
    
    
    
    </table>
</div>


<?php 
}
?>
