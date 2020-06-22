<?php

		$acum = time();
						//$time_azi = strtotime("+8 hours",$acum);
							
							
							
							
							
							
							
							if (date('W', time()+3600*8)+1==52)  
																{
																	$time_azi = strtotime("+8 hours",$acum);
																	$time_azi = strtotime("+3 week",$time_azi);
																	
																} 
							else  $time_azi = strtotime("+176 hours",$acum);
							
							
							
							
							
							$zi_c = date("w",$time_azi);
							if ($zi_c == 0)
							{
								$zi_c = 7;
								//$time_azi = strtotime("-1 day",$acum);
							}
							$dif = $zi_c-1;
							$dif2 = 5-$zi_c;
							$in_saptamanii = date("j",strtotime("-".$dif." days",$time_azi));
							//$sf_saptamanii = date("d.m.y",strtotime("+".$dif2." days",$time_azi));
							$sf_saptamanii1 = date("j",strtotime("+".$dif2." days",$time_azi));
							$sf_saptamanii2 = date("F",strtotime("+".$dif2." days",$time_azi));
							$sf_saptamanii3 = date("o",strtotime("+".$dif2." days",$time_azi));
							if (strcmp($sf_saptamanii2,'January')==0)
							{
								$sf_saptamanii2='ian';
							}
							elseif (strcmp($sf_saptamanii2,'February')==0)
							{
							$sf_saptamanii2='feb';
							}
							elseif (strcmp($sf_saptamanii2,'March')==0)
							{
								$sf_saptamanii2='martie';
							}
							elseif (strcmp($sf_saptamanii2,'April')==0)
							{
								$sf_saptamanii2='aprilie';
							}
							elseif (strcmp($sf_saptamanii2,'May')==0)
							{
								$sf_saptamanii2='mai';
							}
							elseif (strcmp($sf_saptamanii2,'June')==0)
							{
								$sf_saptamanii2='iun';
							}
							elseif (strcmp($sf_saptamanii2,'July')==0)
							{
								$sf_saptamanii2='iul';
							}
							elseif (strcmp($sf_saptamanii2,'August')==0)
						{
								$sf_saptamanii2='aug';
						}
							elseif (strcmp($sf_saptamanii2,'September')==0)
							{
								$sf_saptamanii2='sept';
							}	
							elseif (strcmp($sf_saptamanii2,'October')==0)
							{
								$sf_saptamanii2='oct';
							}
							elseif (strcmp($sf_saptamanii2,'November')==0)
							{
								$sf_saptamanii2='nove';
							}
							elseif (strcmp($sf_saptamanii2,'December')==0)
							{
								$sf_saptamanii2='dec';
							}
							$sf_saptamanii=$sf_saptamanii1.' '.$sf_saptamanii2.' '.$sf_saptamanii3;
							echo $in_saptamanii.'-'.$sf_saptamanii;
							
?>