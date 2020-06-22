<?php



include("db.php");



if ((date('D')=='Mon') or(date('D')=='Sun'))

{ 

	function rotatie($menu1,$menu2)

	{

		include("db.php");

		$query="select * from $menu2";

		$result=@mysql_query($query) or die('1'.mysql_error());

		while($row=mysql_fetch_array($result))

		{

			$ziua=$row['ziua'];

			$tip=$row['tip'];

			$nume=$row['nume'];

			$pret=$row['pret'];

			$lacto_vegetarian=$row['lacto_vegetarian'];

			$recomandare=$row['recomanda'];

			$fitness=$row['fitness'];

			$poza=$row['poza'];

			$nou=$row['nou'];

			$buc=$row['buc'];

			$query1="update $menu1 set nume='$nume', pret=$pret, lacto_vegetarian=$lacto_vegetarian, recomanda=$recomandare, fitness=$fitness, poza=\"$poza\", nou=\"$nou\", buc=$buc where ziua='$ziua' and tip='$tip'";

			$result1=@mysql_query($query1) or die("3".mysql_error());	

		}

	}
	function rotatie_copii($menu_copii1,$menu_copii2)

	{

		include("db.php");

		$query="select * from $menu_copii2";

		$result=@mysql_query($query) or die('1'.mysql_error());

		while($row=mysql_fetch_array($result))

		{

			$ziua=$row['ziua'];

			$tip=$row['tip'];

			$nume=$row['nume'];

			$calorii=$row['calorii'];

			

			$query_copii1="update $menu_copii1 set nume='$nume', calorii=$calorii where ziua='$ziua' and tip='$tip'";

			$result_copii1=@mysql_query($query_copii1) or die("3".mysql_error());	

		}

	}

	
	

	rotatie('meniu_trecut','meniu_curent');

	//primul e meniul in care se tranfera, al doilea din care se tranfera

	rotatie('meniu_curent','meniu_viitor');

	rotatie('meniu_viitor','meniu_viitor2');
	rotatie('meniu_viitor2','meniu_viitor3');
	rotatie('meniu_viitor3','meniu_viitor4');
	rotatie('meniu_viitor4','meniu_viitor5');


	
	rotatie_copii('meniu_copii_trecut','meniu_copii_curent');

	//primul e meniul in care se tranfera, al doilea din care se tranfera

	rotatie_copii('meniu_copii_curent','meniu_copii_viitor');

	rotatie_copii('meniu_copii_viitor','meniu_copii_viitor2');
	rotatie_copii('meniu_copii_viitor2','meniu_copii_viitor3');
	rotatie_copii('meniu_copii_viitor3','meniu_copii_viitor4');
	rotatie_copii('meniu_copii_viitor4','meniu_copii_viitor5');
	
	rotatie_copii('meniu_gradinite_trecut','meniu_gradinite_curent');

	//primul e meniul in care se tranfera, al doilea din care se tranfera

	rotatie_copii('meniu_gradinite_curent','meniu_gradinite_viitor');

	rotatie_copii('meniu_gradinite_viitor','meniu_gradinite_viitor2');
	rotatie_copii('meniu_gradinite_viitor2','meniu_gradinite_viitor3');
	rotatie_copii('meniu_gradinite_viitor3','meniu_gradinite_viitor4');
	rotatie_copii('meniu_gradinite_viitor4','meniu_gradinite_viitor5');
	

	$query2="update meniu_viitor5 set nume='', pret=0, lacto_vegetarian=0, recomanda=0, fitness=0, nou=0, poza=''";

	$result2=@mysql_query($query2) or die("4".mysql_error());	

	
	$query_copii2="update meniu_copii_viitor5 set nume='', calorii=0";

	$result_copii2=@mysql_query($query_copii2) or die("4".mysql_error());
	
	$query_gradinite2="update meniu_gradinite_viitor5 set nume='', calorii=0";

	$result_gradinite2=@mysql_query($query_gradinite2) or die("4".mysql_error());
	

	$query2="select * from meniu_trecut";

	$result2=@mysql_query($query2) or die('13'.mysql_error());

	while($row2=@mysql_fetch_array($row2))

	{

		@unlink("../poze/".$row2['poza']);

	}
	if (date('W', time())<51) 
		$query3="UPDATE `prod_comanda` SET `tip`='c' WHERE 1";

	$result3=@mysql_query($query3);

}	

?>