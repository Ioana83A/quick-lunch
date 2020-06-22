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
</head>

<body bgcolor="#E1CCF9" >

<?php 	
	if (!isset($_SESSION['username']))
    {
		header("Location: index.php");
		exit();
    }
    $page_title="Logged in";

 
    echo "<table bgcolor='#FFFFFF' width='800' align='center'` bordercolor='#CC0033'>";
    echo "<th align='middle' colspan='5' ><font color='#E1CCF9' size='3'>welcome {$_SESSION['username']} </font></th>";
	echo '<tr >
	</tr>';
	echo '<tr >
			<td align="center" bgolor="#FFFFFF" width="25%">';
			if(isset($_SESSION['username']) and (substr($_SERVER['PHP_SELF'],-10)!='logout.php'))
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text1"><a href="logout.php">IESIRE</a></span>';
			}
			else
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text1"><a href="index.php">LOGARE</a></span>';
			}
	echo '</td>
			<td align="center" width="25%">';
			if(isset($_SESSION['username']) and (substr($_SERVER['PHP_SELF'],-10)!='logout.php'))
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text1"><a href="administration.php">Administrare</a></span>';
			}
	echo '		</td>';
	echo '		<td align="center" width="25%">';
			if(isset($_SESSION['username']) and (substr($_SERVER['PHP_SELF'],-10)!='logout.php'))
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text1"><a href="send_newsletter.php">Send newsletter</a></span>';
			}
	echo '		</td>';
		
echo '  	<td align="center">';
if(isset($_SESSION['username']) and (substr($_SERVER['PHP_SELF'],-10)!='logout.php') )
			{
			    echo '<span class="bull">&bull;</span>&nbsp;<span class="text1"><a href="register.php">Schimbati parola</a></span>';
			}	
			echo '

</tr>
<tr>
	<td colspan="4" align="center">
		<span class="bull">&bull;</span>&nbsp;<span class="text1"><a href="facturare.php">Facturare</a></span>
	</td>
</tr>
</table>';
?>