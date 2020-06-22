<?php
include("db.php");

$dt = new DateTime();
// create DateTime object with current time

$dt->setISODate($dt->format('o'), $dt->format('W'));
// set object to Monday on next week

$periods = new DatePeriod($dt, new DateInterval('P1D'), 6);
// get all 1day periods from Monday to +6 days

$days_this_week = iterator_to_array($periods);


$dt = new DateTime();
// create DateTime object with current time

$dt->setISODate($dt->format('o'), $dt->format('W') + 1);
// set object to Monday on next week

$periods = new DatePeriod($dt, new DateInterval('P1D'), 6);
// get all 1day periods from Monday to +6 days

$days_next_week = iterator_to_array($periods);


$fis_xml = fopen("meniu_viitor.xml","w");
$xml          = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$xml         .= "<meniuri_QL>\n";
$sql = "SELECT * FROM meniu_viitor";
 
$result = mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

 
if(mysql_num_rows($result)>0)
{
   while($result_array = mysql_fetch_assoc($result))
   {
      $xml .= "<meniu_viitor>\n";
 
      //loop through each key,value pair in row
      foreach($result_array as $key => $value)
      {
         //$key holds the table column name
         $xml .= "<$key>\n";
         if(strcmp($key,"tip")==0)
		 {
         							if (strcmp($value,"O")==0)
									{
										$value =  'N';
									}
									elseif (strcmp($value,"A")==0)
									{
										$value = 'A1';
									}
									elseif (strcmp($value,"V")==0)
									{
										$value =  'A2';
									}
									elseif (strcmp($value,"DA")==0)
									{
										$value =  'D1';
									}
										elseif (strcmp($value,"DB")==0)
									{
										$value =  'D2';
									}
									elseif (strcmp($value,"G")==0)
									{
										$value =  'G1';
									}
									elseif (strcmp($value,"S")==0)
									{
										$value =  'G2';
									}
									elseif (strcmp($value,"T")==0)
									{
										$value =  'G3';
									}
									elseif (strcmp($value,"Y")==0)
									{
										$value =  'G4';
									}
									elseif (strcmp($value,"I")==0)
									{
										$value =  'I1';
									}
									elseif (strcmp($value,"X")==0)
									{
										$value =  'I2';
									}
									elseif (strcmp($value,"J")==0)
									{
										$value =  'J1';
									}
									elseif (strcmp($value,"Z")==0)
									{
										$value =  'J2';
									}
									elseif (strcmp($value,"R")==0)
									{
										$value =  'V';
									}
									elseif (strcmp($value,"M")==0)
									{
										$value =  'MM';
									}
									elseif (strcmp($value,"N")==0)
									{
										$value =  'ME';
									}
									elseif (strcmp($value,"AA")==0)
									{
										$value =  'A1M';
									}
									elseif (strcmp($value,"AB")==0)
									{
										$value =  'A2M';
									}
									elseif (strcmp($value,"AC")==0)
									{
										$value =  'G1M';
									}
									elseif (strcmp($value,"AD")==0)
									{
										$value =  'G2M';
									}
									elseif (strcmp($value,"AE")==0)
									{
										$value =  'G3M';
									}
									elseif (strcmp($value,"AF")==0)
									{
										$value =  'G4M';
									}
									elseif (strcmp($value,"E")==0)
									{
										$value =  'E1';
									}
									elseif (strcmp($value,"AG")==0)
									{
										$value =  'E2';
									}
									else
									{
										
									}
						}
						else if(strcmp($key,"poza")==0)	
						if($value != '') $value= "http://www.quick-lunch.ro/poze/".$value;
		 //embed the SQL data in a CDATA element to avoid XML entity issues
         $xml .= "<![CDATA[$value]]>\n";
 
         //and close the element
         $xml .= "</$key>\n";
		 
		 if(strcmp($key,"ziua")==0)
		 {
		 	if(strcmp($value,"luni")==0)
			  $data = $days_next_week[0]->format('Y-m-d');
			else if(strcmp($value,"marti")==0)
			  $data = $days_next_week[1]->format('Y-m-d');
			else if(strcmp($value,"miercuri")==0)
			  $data = $days_next_week[2]->format('Y-m-d');
			else if(strcmp($value,"joi")==0)
			  $data = $days_next_week[3]->format('Y-m-d');
			else if(strcmp($value,"vineri")==0)
			  $data = $days_next_week[4]->format('Y-m-d');
		 }
      }
       $xml .= "<data>\n";
	   $xml .= "<![CDATA[$data]]>\n";
	   $xml .= "</data>\n";
    
      $xml.="</meniu_viitor>\n";
   }
}
//close the root element
$xml .= "</meniuri_QL>\n";
 
//send the xml header to the browser
//header ("Content-Type:text/xml");
 
//output the XML data



fwrite($fis_xml,$xml);
fclose($fis_xml);	

 
 
?>