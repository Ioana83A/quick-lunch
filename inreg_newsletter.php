<?php
					include("db.php");
					$mail=mysql_real_escape_string($_POST['newsletter_mail']);
					$sql="SELECT COUNT(*) AS num_rows FROM `newsletter`  where `email`='".$mail."' LIMIT 1";
					$result = @mysql_query($sql);
					$row = @mysql_fetch_array($result);
					if($row["num_rows"] > 0){
					   //user exists
	
					}
					else
					{
						$query_newsletter="insert into newsletter(email) values('$mail')";
						$result_newsletter=@mysql_query($query_newsletter) or die(mysql_error());	
					}
					
					echo '<META http-equiv="refresh" content="0;URL=http://www.quick-lunch.ro/index.php">';
?>