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





?>
