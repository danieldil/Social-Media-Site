<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$dbName = 'first';
if(mysql_connect($mysql_host,$mysql_user,$mysql_pass) || die('could not connect to database'))
{
	if(mysql_select_db($dbName) or die('couldnt connect'))
	{
		echo " 0 <br>";
	}
}else
	echo" Connection error youre home internet";
echo " 0 <br>";
?>