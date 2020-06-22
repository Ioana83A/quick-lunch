<?php
require 'classes/class.phpmailer.php';

function newsletter($id)
{
		include("db.php");
		include("functie.php");
	
		$query="select * from comanda1 where id=$id";
		$result=@mysql_query($query) or die('1'.mysql_error());
			
		$date=@mysql_fetch_array($result);
		
		$email=$date['email'];
		$nume=$date['nume'];
		$query1="select * from prod_comanda1 where comanda_id=$id";
		$result1=@mysql_query($query1) or die('1'.mysql_error());
			
		$date1=@mysql_fetch_array($result1);
		
		$data=$date["data"];
		$data=explode("-",$data);
		$data1=$data[2].'/'.$data[1].'/'.$data[0];
		$year=$data[0];
		$month=$data[1];
		$day=$data[2];
		$s=0;
	
	
			
            if (strcmp($date1['tip'],'c')==0) 
			{
			    $variabila='saptamana '.date('W', time()+3600*8);									
			}
			else
			{
				 if (date('W', time()+3600*8)==51)
					$next_week = "2";
				 else if (date('W', time()+3600*8)==52)
					$next_week = "2";
				 else $next_week = date('W', time()+3600*8)+1;
				 
				 $variabila= 'saptamana '.$next_week;
			}
			
			$mail = new PHPMailer(true); //New instance, with exceptions enabled

			$body             = '


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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','A',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','A',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','A',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','A',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','A',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">A1M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','AA',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','AA',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','AA',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','AA',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','AA',$id,$s).'</span>
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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','V',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','V',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','V',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','V',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','V',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">A2M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','AB',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','AB',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','AB',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','AB',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','AB',$id,$s).'</span>
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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','B',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','B',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','B',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','B',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','B',$id,$s).'</span>
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
									<span class="negru">'.afisare3('luni','C',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare3('marti','C',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare3('miercuri','C',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare3('joi','C',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare3('vineri','C',$id,$s).'</span>
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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','DA',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','DA',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','DA',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','DA',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','DA',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">D2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','DB',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','DB',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','DB',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','DB',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','DB',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">E1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','E',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','E',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','E',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','E',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','E',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">E2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','AG',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','AG',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','AG',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','AG',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','AG',$id,$s).'</span>
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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','F',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','F',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','F',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','F',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','F',$id,$s).'</span>
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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','G',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','G',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','G',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','G',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','G',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">G1M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','AC',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','AC',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','AC',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','AC',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','AC',$id,$s).'</span>
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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','S',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','S',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','S',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','S',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','S',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">G2M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','AD',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','AD',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','AD',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','AD',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','AD',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">G3</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','T',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','T',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','T',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','T',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','T',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">G3M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','AE',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','AE',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','AE',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','AE',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','AE',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">G4</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','Y',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','Y',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','Y',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','Y',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','Y',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">G4M</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','AF',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','AF',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','AF',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','AF',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','AF',$id,$s).'</span>
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
                                	afisare3('luni','H',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','H',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','H',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','H',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','H',$id,$s).'</span>
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
                                	afisare3('luni','I',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','I',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','I',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','I',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','I',$id,$s).'</span>
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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','X',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','X',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','X',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','X',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','X',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">J1</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
                                '.
                                	afisare3('luni','J',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare3('marti','J',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> '.
                                	afisare3('miercuri','J',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> '.
                                	afisare3('joi','J',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> 
								'.
                                	afisare3('vineri','J',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">J2</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">
                                '.
                                	afisare3('luni','Z',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle">
									<span class="negru">'.afisare3('marti','Z',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> '.
                                	afisare3('miercuri','Z',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> '.
                                	afisare3('joi','Z',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru"> 
								'.
                                	afisare3('vineri','Z',$id,$s).'</span>
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
                                	afisare3('luni','k',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','k',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','k',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
	                               	afisare3('joi','k',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','k',$id,$s).'</span>
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
                                	afisare3('luni','o',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','o',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','o',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
	                               	afisare3('joi','o',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','o',$id,$s).'</span>
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
                                	afisare3('luni','p',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','p',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','p',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
	                               	afisare3('joi','p',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','p',$id,$s).'</span>
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
                                	afisare3('luni','L',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','L',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','L',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','L',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','L',$id,$s).'</span>
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
                                	afisare3('luni','U',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','U',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','U',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','U',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','U',$id,$s).'</span>
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
                                	afisare3('luni','R',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','R',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','R',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','R',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','R',$id,$s).'</span>
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
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('luni','Q',$id,$s).'
                                </span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('marti','Q',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('miercuri','Q',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('joi','Q',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.afisare3('vineri','Q',$id,$s).'</span>
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
                                <td width="40" bgcolor="#fffcd6" align="center" valign="middle"><span class="gri">MM</span>
                                </td>
                                <td width="80" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('luni','M',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','M',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','M',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','M',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','M',$id,$s).'</span>
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
                                	afisare3('luni','N',$id,$s).'</span>
                                </td>
                                <td width="85" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('marti','N',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('miercuri','N',$id,$s).'</span>
                                </td>
                                <td width="84" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('joi','N',$id,$s).'</span>
                                </td>
                                <td width="83" bgcolor="#fffcd6" align="center" valign="middle"><span class="negru">'.
                                	afisare3('vineri','N',$id,$s).'</span>
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
                                <td width="109" bgcolor="#ffffff" align="left" valign="middle"><span class="negru"><b>'.total3($id,$day,$month,$year).'</b></span><span class="negru_mic"> RON</span> 
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

//Strip backslashes
			$mail1="comanda@quick-lunch.ro";
			$name="Quick-Lunch";
			$mail->IsSMTP();                           // tell the class to use SMTP
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Port       = 465;                    // set the SMTP server port
			$mail->Host       = "mac.macpixel.ro"; // SMTP server
			$mail->Username   = "comanda@quick-lunch.ro";     // SMTP server username
			$mail->Password   = "c0m@nd@qu1cklunch2012";            // SMTP server password
		
			$mail->IsSendmail();  // tell the class to use Sendmail
		
			$mail->AddReplyTo($mail1,$name);
		
			$mail->From       = $mail1;
			$mail->FromName   = $name;
				
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		//{
		
			//$to = "ada@macpixel.ro";
			//$cc="fant0mita@yahoo.com";
			$to  = $email;
			$mail->AddAddress($to);
		//	$cc  = 'sales@bsateam.com ';
			$bcc='ioana.orhei@gmail.com';
			
			
		
			
			//$mail->AddCC($cc);
			$mail->AddBCC($bcc);
		
				$mail->Subject  = "Comanda Quick-Lunch";
					
				$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
				$mail->WordWrap   = 80; // set word wrap
			
				$mail->MsgHTML($body);
			
				$mail->IsHTML(true); // send as HTML
				$mail->Send();
			$mail->ClearAddresses();

	
		}
				
				
}

//newsletter(185);
?>
