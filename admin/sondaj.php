<?php
	include("templates/template.php");
	include("templates/template2.php");
	
	$query="select * from sondaj";
	$result=@mysql_query($query) or die('1'.mysql_error());
	
	
?>
<style type="text/css">
 th, td {
	margin: 0;
	padding: 0;
}
table.sample {

                
                font-weight: normal;
                font-size: 12px;
                color: #404040;
                width: auto;
                background-color: #ecf3d4;
                border: 1px #a0b6c0 solid;
                border-collapse: collapse;
                border-spacing: 50px;
/*                margin: 5px;*/

                }
                table.sample th
                {
                        border-bottom: 2px solid #cad6da;
                        background-color: #ecf3d4;
                        text-align: center;
                        
                        font-weight: bold;
                        font-size: 12px;
                        color: #404040;
                        border: 1px #a0b6c0 solid;

                         padding-bottom:  1px;
                        padding-top:  1px;
                        padding-left:  1px;
                        padding-right:  1px;

                }
                table.sample td
                {
                        
                        font-weight: normal;
                        font-size: 12px;
                        color: #404040;
                        background-color: #ecf3d4;
                        text-align: left;

                        border: 1px #a0b6c0 solid;
                        border-bottom-width: 1px;
                        border-bottom-style: groove;
                        border-bottom-color: #B4C6CB;

                        padding-bottom:  1px;
                        padding-top:  1px;
                        padding-left:  1px;
                        padding-right:  1px;


                }
                table.sample caption
                {
                        text-align: center;
                        font-family: Verdana;
                        font-weight: bold;
                        font-size: 16px;
                }

</style>
<table align="center" width="1300" bgcolor="#ecf3d4" STYLE="font-size:11px;text-align:center;" class="sample">
	<tr style="font-weight:bold;">
    	<th rowspan="2">ID</th>
        <th rowspan="2">COD CLIENT</th>
        <th rowspan="2">E-MAIL</th>
        <th rowspan="2">TIMP LIVRARE</th>
        <th rowspan="2">ATITUDINE DISTRIBUITOR</th>
        <th rowspan="2">GUST MANCARE</th>
        <th COLSPAN="2" rowspan="2">MOD AMBALARE</th>
        <th rowspan="2">DIVERSITATE MENIU</th>
        <th rowspan="2">ATITUDINE OPERATORI</th>
        <th COLSPAN="3">MODALITATE COMANDA PREFERATA</th>
        <th rowspan="2">CALITATE MATERIALE</th>
        <th COLSPAN="5">DE UNDE ATI AFLAT DESPRE NOI</th>
        <th rowspan="2">ALTE SUGESTII</th>
    </tr>
    <tr style="font-weight:bold;">
    	<th>internet</th>
        <th>telefon</th>
        <th>pliant</th>
        <th>internet</th>
        <th>pliant</th>
        <th>publicitate</th>
        <th>banner</th>
        <th>recomandare</th>
        
    </tr>
	<?php
    	while($row=mysql_fetch_array($result))
		{	
									 $id=$row["id"];	
									 $cod_client=$row["cod_client"];	
									 $mail=$row["mail"];
									 $timp_livrare=$row["timp_livrare"];
									 $atitudine_distribuitor=$row["atitudine_distribuitor"];
									 $gust_mancare=$row["gust_mancare"];
									 $mod_ambalare=$row["mod_ambalare"];
									 $mesaj_ambalaj=$row["mesaj_ambalaj"];
									 $mesaj_ambalaj = nl2br($mesaj_ambalaj);
									 $diversitate_meniu=$row["diversitate_meniu"];
									 $atitudine_operatori=$row["atitudine_operatori"];
									 $comanda_internet=$row["comanda_internet"];
									 $comanda_telefon=$row["comanda_telefon"];
									 $comanda_plian=$row["comanda_pliant"];
									 $calitate_materiale=$row["calitate_materiale"];
									 $aflat_internet=$row["aflat_internet"];
									 $aflat_pliant=$row["aflat_pliant"];
									 $aflat_publicitate=$row["aflat_publicitate"];
									 $aflat_banner=$row["aflat_banner"];
									 $aflat_recomandare=$row["aflat_recomandare"];
									 $mesaj_sugestii=$row["mesaj_sugestii"];
									 $mesaj_sugestii = nl2br($mesaj_sugestii);
	?>
    	<tr>
        <td style="text-align:center;"><?php echo $id; ?></td>
        <td style="text-align:center;"><?php echo $cod_client; ?></td>
        <td style="text-align:center;"><?php echo $mail; ?></td>
        <td style="text-align:center;"><?php echo $timp_livrare; ?></td>
        <td style="text-align:center;"><?php echo $atitudine_distribuitor; ?></td>
        <td style="text-align:center;"><?php echo $gust_mancare; ?></td>
        <td style="text-align:center;"><?php echo $mod_ambalare; ?></td>
        <td><?php echo $mesaj_ambalaj; ?></td>
        <td style="text-align:center;"><?php echo $diversitate_meniu; ?></td>
        <td style="text-align:center;"><?php echo $atitudine_operatori; ?></td>
        <td style="text-align:center;"><?php echo $comanda_internet; ?></td>
        <td style="text-align:center;"><?php echo $comanda_telefon; ?></td>
        <td style="text-align:center;"><?php echo $comanda_plian; ?></td>
        <td style="text-align:center;"><?php echo $calitate_materiale; ?></td>
        <td style="text-align:center;"><?php echo $aflat_internet; ?></td>
        <td style="text-align:center;"><?php echo $aflat_pliant; ?></td>
        <td style="text-align:center;"><?php echo $aflat_publicitate; ?></td>
        <td style="text-align:center;"><?php echo $aflat_banner; ?></td>
        <td style="text-align:center;"><?php echo $aflat_recomandare; ?></td>
        <td><?php echo $mesaj_sugestii; ?></td>
        </tr>
    <?php
	}
	?>
    	
    </table>
    <br />
	
</body>
</html>
