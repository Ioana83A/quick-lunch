<?php
	$buton = $_POST["buton"];
	//echo $buton;
	if (strcmp($buton,'2') == 0)
	{
		if ((date('W', time()+3600*8)==51) ||(date('W', time()+3600*8)==52))
			{
				$sapt = "2";
			}
		else $sapt = date("W")+1;

		$pdf = 'pdf_gradinite/sapt__'.$sapt.'.pdf';
		//echo $pdf;
		echo '<meta content="0; URL='.$pdf.'" http-equiv="refresh" />';
	}
	else
	{
		$sapt = date("W")+0;

		$pdf = 'pdf_gradinite/sapt__'.$sapt.'.pdf';
		//echo $pdf;
		echo '<meta content="0; URL='.$pdf.'" http-equiv="refresh" />';	
	}

?>

