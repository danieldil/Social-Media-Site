<div id = "php"><?php
require_once 'core.inc.php';
require_once 'connect.inc.php';

if(loggedin())
{	
	global $firstname;
	$firstname =  ucfirst(getUserField('firstname'));
	$lastname = ucfirst(getUserField('lastname'));
	include 'profilepage.php';
	
	}
else
{
	include 'loginform.inc.php';
}

?>
</div>
<style>
<link rel="stylesheet" type="text/css" href="style.css" />

</style>