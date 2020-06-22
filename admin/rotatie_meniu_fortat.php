<?php
include("db.php");
if (!isset($_POST['sub'])) {
?>
<form method="post" action="<?php $PHP_SELF ?>" name="rotatie" enctype="multipart/form-data">
<input type="hidden" name="sub" id="sub" />
<input type="submit" name="go" value="go" />
</form>

<?php
}else
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

	rotatie('meniu_viitor2','meniu_viitor3');

	//primul e meniul in care se tranfera, al doilea din care se tranfera

	
	
	}

?>
