<?php
function newsletter($id)
{
		include("db.php");
		include("functie.php");
	
		$query="select * from comanda where id=$id";
		$result=@mysql_query($query) or die('1'.mysql_error());
			
		$date=@mysql_fetch_array($result);
		
		$email=$date['email'];
		$nume=$date['nume'];
		$query1="select * from prod_comanda where comanda_id=$id";
		$result1=@mysql_query($query1) or die('1'.mysql_error());
			
		$date1=@mysql_fetch_array($result1);
		
		$data=$date["data"];
		$data=explode("-",$data);
		$data1=$data[2].'/'.$data[1].'/'.$data[0];
		
		$s=0;
		//echo 'dsfkjds'.afisare2('luni','A',171,$s).'dsjad';
	
	//calculul totalului
	$total = 0;
	$q = 'Select * from prod_comanda where comanda_id="'.$id.'"';
	$r = mysql_query($q);
	//echo $q;
	while($row = mysql_fetch_array($r))
	{
		//echo 'aa';
		$m_id = $row["meniu_id"];
		$b = $row["buc"];
		
		if (strcmp($row["tip"],'c') == 0) //cautam in meniul curent
		{
			 // pentru revel sapt curenta
			 if (date('W', time()+3600*8)+0==52)  
			  {
				  $q2 = 'Select * from meniu_viitor2 where id="'.$m_id.'"';
				  $sapt_curenta=1;
				  
				  
			  }
		  elseif (date('W', time()+3600*8)+0==1)  
			  {
				   $q2 = 'Select * from meniu_viitor where id="'.$m_id.'"';
				  $sapt_curenta=1; 
				  
			  }
		  else  {
			$q2 = 'Select * from meniu_curent where id="'.$m_id.'"';
			$sapt_curenta=1;
		  		}// fin revel
		}
		else
		{
			// pentru revel sapt viitoare
			if (date('W', time()+3600*8)+1==52)  
						{
							$q2 = 'Select * from meniu_viitor3 where id="'.$m_id.'"';
							$sapt_curenta=0;
							
							
						} 
			else  {
					$q2 = 'Select * from meniu_viitor where id="'.$m_id.'"';
					$sapt_curenta=0;
					}// fin revel
		}
		$r2 = mysql_query($q2);
		if ($row2 = mysql_fetch_array($r2))
		{
			$total += $row2["pret"]*$b;		
		}	
		else 
		{
			echo 'nu exista';
		}
	}	
	
	if($sapt_curenta==1)
	{
		$variabila='saptamana curenta';
		 $litera='K';
		 $litera1='P';
															  $lit='O';
															  $lit1='K';
	}
	else
	{
		$variabila='saptamana urmatoare';
        //$variabila='saptamana viitoare';
		 $litera='K';
								 $litera1='N';
								 $lit='K';
								 $lit1='O';
	}
 $content = '


<style>
.alb{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:16px;
color:#FFFFFF; 
font-style:normal;
font-weight:bold;
line-height:18px; 
text-decoration:none;
letter-spacing:-1px;
}

.alb_mic{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:11px;
color:#FFFFFF; 
font-style:normal;
font-weight:normal;
line-height:15px; 
text-decoration:none;
letter-spacing:-1px;

}

.galben_mic{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:12px;
color:#fffddf; 
font-style:normal;
font-weight:bold;
line-height:14px; 
text-decoration:none;
letter-spacing:-1px;
}

.portocaliu_urias{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:40px;
color:#f7941d; 
font-style:normal;
font-weight:bold;
line-height:37px; 
text-decoration:none;
}

.portocaliu_formular{
font-family:Georgia, "Times New Roman",Times, serif;
font-size:45px;
color:#f7941d; 
font-style:normal;
font-weight:normal;
line-height:37px; 
text-decoration:none;
letter-spacing:-1px;
}

.portocaliu_comanda{
font-family:Georgia, "Times New Roman",Times, serif;
font-size:35px;
color:#f7941d; 
font-style:normal;
font-weight:normal;
line-height:37px; 
text-decoration:none;
letter-spacing:-1px;
}

.portocaliu_mare{
font-family:Georgia,"Times New Roman", Times, serif;
font-size:24px;
color:#f7941d; 
font-style:normal;
font-weight:normal;
line-height:36px; 
text-decoration:none;
}

.portocaliu_mij{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:20px;
color:#f7941d; 
font-style:normal;
font-weight:normal;
line-height:36px; 
text-decoration:none;
}

.portocaliu_mic{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:12px;
color:#f7941d; 
font-style:normal;
font-weight:normal;
line-height:14px; 
text-decoration:none;
}

.puncte_gri{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:27px;
color:#d1d3d4; 
font-style:normal;
font-weight:bold;
line-height:10px; 
text-decoration:none;
letter-spacing:1px;
}

.gri_mic{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:12px;
color:#77787b; 
font-style:normal;
font-weight:normal;
line-height:14px; 
text-decoration:none;
letter-spacing:0px;
}

.negru_mic{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:12px;
color:#000000; 
font-style:normal;
font-weight:normal;
line-height:14px; 
text-decoration:none;
letter-spacing:0px;
width:100px;
height:14px;
}


.negru{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:13px;
color:#000000; 
font-style:normal;
font-weight:normal;
line-height:14px; 
text-decoration:none;
letter-spacing:0px;
}

.gri{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:23px;
color:#808285; 
font-style:normal;
font-weight:bold;
line-height:20px; 
text-decoration:none;
letter-spacing:0px;
}

.gri_mic2{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:9px;
color:#77787b; 
font-style:normal;
font-weight:normal;
line-height:14px; 
text-decoration:none;
letter-spacing:2px;
}

.gri_mic3{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:11px;
color:#77787b; 
font-style:normal;
font-weight:normal;
line-height:14px; 
text-decoration:none;
letter-spacing:0px;

}


.verde_mic{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:12px;
color:#8bb903; 
font-style:normal;
font-weight:normal;
line-height:13px; 
text-decoration:none;
letter-spacing:0px;
}

.titlu_galben{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:16px;
color:#fffddf; 
font-style:normal;
font-weight:bold;
line-height:13px; 
text-decoration:none;
letter-spacing:-1px;
}



.newsletter{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:11px;
color:#444444; 
font-style:normal;
font-weight:normal;
line-height:13px; 
text-decoration:none;
letter-spacing:0px;
width:125px;
height:11px;
}

.verde_italic{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:12px;
color:#8BB903; 
font-style:italic;
font-weight:normal;
line-height:14px; 
text-decoration:none;
letter-spacing:-1px;
}
</style>
</head>



<body bgcolor="#CCCCCC">

<table width="683" align="center" bgcolor="#FFFFFF" cellpadding="0" cellspacing="10">
	<tr height="88" bgcolor="#FFFFFF">
   		<td width="30">

        </td>
    	<td width="238" align="center">
        	<img src="http://www.quick-lunch.ro/admin/images/sigla_new.jpg" width="228" height="88" border="0" align="left" />
        </td>
        <td width="415" align="left" valign="middle"> <span class="portocaliu_formular">Comanda dumneavoastra<br /></span><span class="portocaliu_comanda">pe '.$variabila.'</span>
        </td>
    </tr>
    <tr height="30" bgcolor="#FFFFFF">
   		<td colspan="3" valign="middle" align="center" >
       		<span class="gri_mic2">
Nume '.$nume.' din data de '.$data1.'<br />			...................................................................................................................................................................</span>
        </td>
    </tr>
    <tr bgcolor="#FFFFFF">
   		<td colspan="3" valign="top" align="center" >
        	<table width="638" border="0" cellpadding="0" cellspacing="0" bgcolor="#FF0000">
            	<tr bgcolor="#8bb903" height="31">
                	<td width="40">
                    </td>
                    <td width="80" align="center" valign="middle">
						<span class="titlu_galben">Luni</span>
                    </td>
                    <td width="85" align="center" valign="middle">
						<span class="titlu_galben">Marti</span>
                    </td>
                    <td width="84" align="center" valign="middle">
						<span class="titlu_galben">Miercuri</span>
                    </td>
                    <td width="84" align="center" valign="middle">
						<span class="titlu_galben">Joi</span>
                    </td>
                    <td width="83" align="center" valign="middle">
						<span class="titlu_galben">Vineri</span>
                    </td>
                    <td width="74" align="center" valign="middle">
						<span class="titlu_galben">Total</span>
                    </td>
                    <td width="108" align="center" valign="middle">
						<span class="titlu_galben">Observatii</span>
                    </td>
                 </tr>
                 <tr bgcolor="#fffcd6" height="5">
                	<td width="638" colspan="8">
                    </td>
                 </tr>
                 <tr bgcolor="#fffcd6">
                	<td width="638" colspan="8">
                    	<table width="638" border="0" cellpadding="0" cellspacing="0" align="center">
                        	<tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">A1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','A',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('marti','A',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('miercuri','A',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('joi','A',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('vineri','A',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center">
									<span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
							<tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">A2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','V',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('marti','V',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('miercuri','V',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('joi','V',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('vineri','V',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center">
									<span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">B</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','B',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('marti','B',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('miercuri','B',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('joi','B',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('vineri','B',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center">
									<span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="gri">C</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare2('luni','C',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare2('marti','C',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare2('miercuri','C',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare2('joi','C',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare2('vineri','C',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">D1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','D',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('marti','D',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('miercuri','D',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('joi','D',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('vineri','D',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
							<tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">D2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','W',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('marti','W',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('miercuri','W',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('joi','W',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('vineri','W',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center">
									<span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">E</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','E',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('marti','E',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('miercuri','E',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('joi','E',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('vineri','E',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">F</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','F',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('marti','F',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('miercuri','F',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('joi','F',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('vineri','F',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">G1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','G',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','G',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','G',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('joi','G',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','G',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">G2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','S',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','S',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','S',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('joi','S',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','S',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">H</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('luni','H',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','H',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','H',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('joi','H',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','H',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">I1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('luni','I',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','I',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','I',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('joi','I',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','I',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
							<tr height="5">
                             	<td colspan="8" align="center">
									<span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>   
							<tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">I2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','X',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('marti','X',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('miercuri','X',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('joi','X',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('vineri','X',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center">
									<span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>                         
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">J</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
                                '.
                                	afisare2('luni','J',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare2('marti','J',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> '.
                                	afisare2('miercuri','J',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> '.
                                	afisare2('joi','J',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> 
								'.
                                	afisare2('vineri','J',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">K</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	'.
                                	afisare2('luni','k',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','k',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','k',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
	                               	afisare2('joi','k',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','k',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
							<tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">N</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	'.
                                	afisare2('luni','o',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','o',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','o',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
	                               	afisare2('joi','o',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','o',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
							  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
							<tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">P</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">	'.
                                	afisare2('luni','p',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','p',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','p',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
	                               	afisare2('joi','p',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','p',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
							  
                            							  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="30">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">L</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('luni','L',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','L',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','L',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('joi','L',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','L',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
							<tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="30">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">U</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('luni','U',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','U',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','U',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('joi','U',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','U',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
							 
                            <tr height="30">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">V</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('luni','R',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','R',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','R',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('joi','R',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','R',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
							<tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">Q</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('luni','Q',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('marti','Q',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('miercuri','Q',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('joi','Q',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare2('vineri','Q',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center">
									<span class="negru_mic">............................................................................................................................................................</span>
								</td>
                            </tr>
                            <tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('luni','M',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','M',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','M',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('joi','M',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','M',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								
								</td>
                            </tr>
							<tr height="20">
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">ME</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('luni','N',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('marti','N',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('miercuri','N',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('joi','N',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare2('vineri','N',$id,$s).'</span>
                                </td>
                                <td width="74" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                                <td width="108" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"></span>
                                </td>
                            </tr>  
                            <tr height="5">
                             	<td colspan="8" align="center"><span class="negru_mic">............................................................................................................................................................</span>
								
								</td>
                            </tr>
                        </table>
                    </td>
                 </tr>
                 <tr bgcolor="#918e7b" >
                	<td width="638" colspan="8">
                    	<table width="638" border="0" bgcolor="#FFFFFF" cellpadding="0" cellspacing="4" align="center">
                        	<tr height="10">
                                <td  colspan="5" bgcolor="#ffffff" align="right" valign="middle">
                                </td>
                            </tr>    
                            <tr height="20">
                                <td width="100" bgcolor="#ffffff" align="right" valign="middle"><span class="negru_mic"></span>
                                </td>
                                <td width="115" bgcolor="#ffffff" align="left" valign="middle">
                                </td>
                                <td width="171" bgcolor="#ffffff" align="center" valign="middle">
                                </td>
                                <td width="139" bgcolor="#ffffff" align="right" valign="middle"><span class="negru_mic">Total de plata:</span>
                                </td>
                                <td width="109" bgcolor="#ffffff" align="left" valign="middle"><span class="negru"><b>'.$total.'</b></span><span class="negru_mic"> RON</span> 
                                </td>
                             </tr>
                             <tr height="1">
                                <td  colspan="5" bgcolor="#ffffff" align="right" valign="middle">
									 Va rugam sa verificati validitatea comenzii si in cazul unei nereguli sa ne sunati!
                                </td>
                            </tr>  
                        </table>    
                    </td>
                </tr>            
            </table>
        </td>    	
    </tr>
</table>
</body>
</html>';


			$sender = "From: Quick-Lunch";
			
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Quick-Lunch<\r\nReply-to: comanda@quick-lunch.ro \r\nContent-type: text/html; charset=us-ascii" ;		
			$nr = 0;
			
				$nr++;
				if ($nr==10)
				{
					@sleep(2);
					$nr = 0;
				}
				if (@mail($email,'Comanda Quick-Lunch',$content,$headers))
				{

					

				}
				
				
}

//newsletter(185);
?>
