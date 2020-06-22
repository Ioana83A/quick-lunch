<?php
	include("templates/template.php");
?>
<table align="center" bgcolor="#d4e1f1" border="0" cellpadding="1" width="800">
    <tr>
    	<td>
	<form action="schimb_parola.php" method="post" onSubmit="return validate();" name="signupForm">
    	<table align="center" bgcolor="#ecf3d4" width="800" border="0" cellspacing="1">
        	<tr>
            	<td width="50%" align="center" class="text2">
                <?php
					if ($_GET['action']==1)
					{
						echo '<font color="#FF0000">Parola incorecta! - Incercati din nou</font>';
					}
					else
					{
						echo 'Introduceti vechea parola:';
					}
				?>
                	
                </td>
                <td>
                	<input type="password" name="password" size="40"  />
                </td>
            </tr>
            <tr>
            	<td align="center" class="text2">
                	Introduceti noua parola:
                </td>
                <td>
                	<input type="password" name="password1" size="40"  />
                </td>
            </tr>
            <tr>
            	<td align="center" class="text2">
                	Confirmati noua parola:
                </td>
                <td>
                	<input type="password" name="password2" size="40"  />
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="center" >
                	<input type="submit" name="submit" value="Modifica parola!" class="submit"/>
                </td>
            </tr>
        </table>
    </form>
    </td>
    </tr>
    </table>

</body>
</html>
