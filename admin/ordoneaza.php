<?php
	function twodecfloat($string)
	{
		//echo $string.'..strlen = '.strlen($string).'<br>';
		$pct = 0;$s = '';
		$s1 = '';
		$s1 = $string;
		for ($i = 0; $i<strlen($s1); $i++)
		{
			if ($pct>0)
			{
				$pct++;
			}
			if (strcmp(substr($s1,$i,1),'.') == 0)
			{
				$pct = 1;
			}
			//echo $s1[$i].' '.$pct;
			$s .= substr($s1,$i,1);
			if ($pct == 3)
			{
				break;
			}
			//echo $s.'<br>';
		}
		//echo '----------<br>';
		return $s;
	}	
	
	function tip_meniu($tip,$men_id)
	{
			if (strcmp($tip,"c")==0)
			{
				$query3="select * from meniu_curent where id='$men_id'";
				$result3=@mysql_query($query3) or die(mysql_error());
			}
			else
			{
				$query3="select * from meniu_viitor where id='$men_id'";
				$result3=@mysql_query($query3) or die(mysql_error());
			}	
			
			$linie=mysql_fetch_array($result3);
			return $linie['tip'];
	}
	
	function aflare_pret($tip,$men_id)
	{
			if (strcmp($tip,"c")==0)
			{
				$query3="select * from meniu_curent where id='$men_id'";
				$result3=@mysql_query($query3) or die(mysql_error());
			}
			else
			{
				$query3="select * from meniu_viitor where id='$men_id'";
				$result3=@mysql_query($query3) or die(mysql_error());
			}	
			
			$linie=mysql_fetch_array($result3);
			return $linie['pret'];
	}
	
	include("db.php");
	
	$nume=$_POST['nume'];
	
	$query="select * from comanda1 where nume='$nume'";
	$result=@mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	
?>
<table width="700" border="1" cellpadding="4" cellspacing="0" bordercolor="#E4E4E4">

			  <tr>

				<td width="709"><table width="700" border="0" cellpadding="3" cellspacing="0" class="border2">

				  <tr>

					<td><table width="700" border="0" cellspacing="0" cellpadding="0">

					  <tr>

						<td width="300" rowspan="6"><p class="arial">Furnizor :  S.C. MACPIXEL S.R.L.<br>

					Nr. inm. ORC: J35/1588/1992<br>

					CF: R2795990 <br>

							  Sediu: TIMISOARA, MARTIR CONCIATU 11

					  <br>

					  Judetul: TIMIS<br>

					  Cont: RO93 BPOS 3600 3304 766R OL01<br>

					  Banca: BANC POST TIMISOARA </p>

						  </td>

						<td width="100" rowspan="6">&nbsp;</td>

						<td class="arial">Cumparator: <?php echo $row['nume']; ?></td>

					  </tr>

					  <tr>

						<td class="arial">Cod fiscal: <input type="text" name="cod_client" value="<?php echo $row['cod_client']; ?>" size="20" /></td>

					  </tr>

					  <tr>

						<td class="arial">Adresa: <?php echo $row['adresa']; ?></td>

					  </tr>

					  <tr>

						<td class="arial">Judet: <input type="text" name="judet" value="<?php echo $row['judet']; ?>" size="20" /></td>

					  </tr>

					  <tr>

						<td class="arial">Oras: <input type="text" name="oras" value="<?php echo $row['oras']; ?>" size="20" /></td>

					  </tr>

					  <tr>

						<td width="300">&nbsp;</td>

					  </tr>

					  <tr>

						<td>&nbsp;</td>

						<td><div align="center"><strong>F&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;C&nbsp;&nbsp;T&nbsp;&nbsp;U&nbsp;&nbsp;R&nbsp;&nbsp;A<br>

					PROFORMA </strong></div></td>

						<td>&nbsp;</td>

					  </tr>

					</table></td>

				  </tr>

				  <tr>

					<td><table width="700" border="0" cellspacing="0" cellpadding="0">

					  <tr>

						<td>&nbsp;</td>

						<td><table width="202" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#E4E4E4">

						  <tr>

							<td width="198">nr. factura : <?php echo $row['id']; ?> </td>

						  </tr>

						  <tr>

							<td class="arial">data : <?php echo date('d-m-o'); ?> </td>

						  </tr>

						</table></td>

						<td>&nbsp;</td>

					  </tr>

					  <tr>

						<td>&nbsp;</td>

						<td>&nbsp;</td>

						<td>&nbsp;</td>

					  </tr>

					</table></td>

				  </tr>

				  <tr>

					<td><table width="700" border="1" cellpadding="2" cellspacing="0" bordercolor="#E4E4E4"><tr class="arial">

					  <td width="40"><div align="center">nr.crt</div></td>

						<td width="250"> <div align="center">Denumirea produselor 

			  sau a serviciilor </div></td>

						<td width="40"> <div align="center">U.M. </div></td>

						<td width="40"> <div align="center">Cant. </div></td>

						<td width="100"> <div align="center">Pretul unitar <br>

							  (f&atilde;r&atilde; T.V.A.) <br>

			  -lei- </div></td>

						<td width="100"> <div align="center">Valoarea <br>

			  -lei- </div></td>

						<td width="100"> <div align="center">Valoarea <br>

			  T.V.A. <br>

			  -lei- </div></td>

					  </tr>

					  <tr class="arial">

						<td><div align="center">0</div></td>

						<td><div align="center">1</div></td>

						<td><div align="center">2</div></td>

						<td><div align="center">3</div></td>

						<td><div align="center">4</div></td>

						<td><div align="center"> 5 (3 x 4) </div></td>

						<td><div align="center">6</div></td>

					  </tr>
<?php
	$i=1;
	$total=0;
	$query11="select * from comanda1 where data='2008-07-14' order by id asc";
	$result11=@mysql_query($query11) or die(mysql_error());
	$row11=mysql_fetch_array($result11);
	$min_id=$row11['id'];
	
	$query1="select * from comanda1 where nume='$nume' and id>$min_id";
	$result1=@mysql_query($query1) or die(mysql_error());
	while($row1=mysql_fetch_array($result1))
	{
		$id=$row1['id'];
		$query2="select * from prod_comanda1 where comanda_id='$id'";
		$result2=@mysql_query($query2) or die(mysql_error());
		while($row2=mysql_fetch_array($result2))
		{
			$meniu_id=$row2['meniu_id'];
			
?>
					  <tr class="arial">

						<td><div align="center"><?php echo $i; ?></div></td>

						<td><div align="center"><?php echo tip_meniu($row2['tip'],$meniu_id); ?> </div></td>

						<td><div align="center"><?php echo 'LEU';//echo $row2['buc']; ?></div></td>

						<td><div align="center"><?php echo $row2['buc']; ?></div></td>

						<td><div align="center"><b>
						<?php
							$y=aflare_pret($row2['tip'],$meniu_id);
							$y1=$y/1.19;
                        	echo twodecfloat($y1);
						?>
                        </b></div></td>

						<td><div align="center"><b><?php
						$total+=aflare_pret($row2['tip'],$meniu_id);
						 echo aflare_pret($row2['tip'],$meniu_id); ?></b></div></td>

						<td><div align="center"><b><?php
							$y=aflare_pret($row2['tip'],$meniu_id);
							$y1=$y*0.19;
                        	echo twodecfloat($y1);
						?></b></div></td>

					  </tr>
<?php
			$i++;
		}
	}
?>                      

					</table></td>

				  </tr>

				  <tr>

					<td><table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#E4E4E4" >

					  <tr>

						<td class="arial"><!--Pret unitar &icirc;n LEI f&atilde;r&atilde; TVA - <b>'.$tip_plata.' 1 LEU</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cursul zilei&nbsp;&nbsp;: <b>'.$preteuro.'</b> lei<br> -->

				  </td>

					  </tr>

					</table> </td>

				  </tr>

				  <tr>

					<td> <div align="center">  <table width="700" border="1" cellpadding="3" cellspacing="0" bordercolor="#E4E4E4" >

				<tr>

				  <td class="arial"><div align="center">Plata se va efectua fie &icirc;n numerar, la sediul MACPIXEL din Martir Conciatu 11, Timisoara,  in orele de program (Luni-Vineri :9.00-16:00), fie prin ordin de plata catre <strong>Macpixel Timsoara, CF R2795990, IBAN:&nbsp;RO93 BPOS 3600 3304 766R OL01 BANC POST Timisoara </strong><br>

						
 </div></td>

				</tr>

			  </table>

					</div></td>

				  </tr>

				  <tr>

					<td><table width="700" height="218" border="1" cellpadding="0" cellspacing="0" bordercolor="#E4E4E4">

					  <tr>

						<td width="180" height="200" rowspan="3"><table width="177" height="170" border="0" cellpadding="0" cellspacing="0">

						  <tr>

							<td height="38"><span class="arial">Semn&atilde;tura si stampila furnizorului </span></td>

						  </tr>

						  <tr>

							<td width="177" height="180" background="semnatura.jpg">&nbsp;</td>

						  </tr>

						</table></td>

						<td width="150" height="170" rowspan="3">&nbsp;</td>

						<td width="150" rowspan="2" class="arial">Valoare <br><br>

						din care accize: 

						</td>

						

						<td><b><?php echo twodecfloat($total); ?></b></td>

						<td><b><?php echo  twodecfloat($total*0.19); ?></b></td>

					  </tr>

					  <tr>

					  

						<td>&nbsp;</td>

						<td><div align="center">X</div></td>

					  </tr>

					  <tr>

						<td height="128">&nbsp;</td>

						<td colspan="2"> <span class="arial">Total de plat&atilde; <b><?php echo twodecfloat($total); ?> RON</b><br>

			(col.5 + col.6) </span><br></td>

					  </tr>

					</table></td>

				  </tr>

				</table></td>

			  </tr>

			</table>
	</body>
</html>            