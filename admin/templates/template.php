<?php	
	session_start();
	if (!isset($_SESSION['username']))
    {
	header("Location: index.php");
	exit();
    }
	include("db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link REL="STYLESHEET" TYPE="text/css" HREF="css/style.css" Title="TOCStyle">
<title>Quick-Lunch</title>
<SCRIPT LANGUAGE="JavaScript">


<!-- Begin

function validate() 
	{
		
			
		
		if (document.signupForm.password.value.length < 1) 
			{
				alert('Trebuie sa introduceti parola veche!');
				return false;
			}	
		
		if (document.signupForm.password1.value.length < 1) 
			{
				alert('Trebuie sa introduceti noua parola!');
				return false;
			}	
				
		if (document.signupForm.password2.value.length < 1) 
			{
				alert('Trebuie sa confirmati parola!');
				return false;
			}	
				
			
		var myPass1 = document.signupForm.password1.value;
		var myPass2 = document.signupForm.password2.value;
		if (myPass1!=myPass2)
		{
			alert('Nu ati confirmat corect parola');
			return false;
		}	
		
				
		
		//alert('OK!');
		return true;
	}	

function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else 
countfield.value = maxlimit - field.value.length;
}



function popupPage() {
var page = "popup.html";
windowprops = "height=500,width=500,location=no,"
+ "scrollbars=no,menubars=no,toolbars=no,resizable=yes";

window.open(page, "Popup", windowprops);
}



// End -->
</script>
<link href="file:///D|/Cip/quick-lunch/admin/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#90c103" >
<table bgcolor='#ecf3d4' width='800' align='center'>
	<tr height="47" bg>
					<td  background="quick.jpg" align="center">
                    <span class="titlu" >Administrare Quick-Lunch</span>
					</td>
			</tr>
</table>
<?php 	
	if (!isset($_SESSION['username']))
    {
		header("Location: index.php");
		exit();
    }
    $page_title="Logged in";

    echo "<table bgcolor='#ecf3d4' width='800' align='center' cellpadding='0' cellspacing='0'>";
    echo "<th align='Center' colspan='5' ><font color='#609103' family='Arial, Helvetica, sans-serif' size='3'>welcome {$_SESSION['username']} </font></th>";
	echo "<tr height='5'><td></td>
			<tr><td>";
	echo "<table bgcolor='#ecf3d4' width='600' align='center' cellpadding='0' cellspacing='0'>";
	echo '<tr >
			<td width="3%"></td>
			<td align="left" bgolor="#ecf3d4" width="35%">';
			if(isset($_SESSION['username']) and (substr($_SERVER['PHP_SELF'],-10)!='logout.php'))
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text3"><a href="administration.php">Administrare</a></span>';
			}
			else
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text3"><a href="index.php">LOGARE</a></span>';
			}
	echo '</td>
    		<td width="3%" bgcolor="#ecf3d4"></td>
			<td align="left" width="31%">';
			if(isset($_SESSION['username']) and (substr($_SERVER['PHP_SELF'],-10)!='logout.php'))
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text3"><a href="send_newsletter.php">Send newsletter</a></span>';
			}
	echo '		</td></tr>';
	echo '<tr>
				<td width="3%"></td>';
	echo '		<td align="left" width="35%">';
			if(isset($_SESSION['username']) and (substr($_SERVER['PHP_SELF'],-10)!='logout.php'))
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text3"><a href="facturare.php">Adauga comanda pentru factura</a></span>';
			}
	echo '		</td>';
		
echo '			<td width="3%"></td>
				<td align="left" width="31%">';
if(isset($_SESSION['username']) and (substr($_SERVER['PHP_SELF'],-10)!='logout.php') )
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text3"><a href="register.php">Schimbati parola</a></span>';
			}	
			echo '
			</td></tr></table>
			</td>
				<td colspan="4" align="left" width="28%">
		<span class="bull">&bull;</span>&nbsp;<span class="text3"><a href="logout.php">IESIRE</a></span>
	</td>
	<td></td>
	
</tr>
<tr height="5">
<td></td>
</tr>
</table><br>';
?>
