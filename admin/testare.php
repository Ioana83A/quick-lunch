<?php
$mail="fant0mita@yah-oo.com";
//if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
//    echo "This (email_a) email address is considered valid.";
//}
//else
//{
//	echo "invalid";
//}

if(preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $mail)==0)
{
echo "invalid";
}
else
{
echo "valid";
}

?>