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

	rotatie_copii('meniu_copii_viitor2','meniu_copii_viitor3');

	
	
	}

?>
