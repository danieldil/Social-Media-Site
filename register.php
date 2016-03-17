<html>
    <body>
<div id="welcome">
    <p>Super Car Sunday Forums!</p>
</div><br><br><br>
<div id="php">
<link rel="stylesheet" type="text/css" href="style.css" />
<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin())
{
	//echo ' you need to regiester ';
	if
	(
	isset($_POST['username'])&&
	isset($_POST['password'])&&
	isset($_POST['password_again'])&&
	isset($_POST['first_name'])&&
	isset($_POST['last_name'])
	)	
	{
	//check if they are empty
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_again = $_POST['password_again'];
		$password_hash =md5($password);
		$firstname = $_POST['first_name'];
		$lastname = $_POST['last_name'];
		if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($lastname))
		{
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$privatekey = "6LcebgoTAAAAAPWZZ2iTwIqKOqv2gfGY07XZPwCL";
			$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
			$data = json_decode($response);
			
			if(isset($data->success) AND $data->success==true)
			{
					//true what happens when user is verified
				
				
				if($password != $password_again)
				{
					echo "passwords do not match";
				}
				else
				{
				$query = "SELECT `username` FROM `users` WHERE `username` = '$username'";	
				$query_run = mysql_query($query);
					if(mysql_num_rows($query_run) == 1)
					{
						echo "username ".$username." already exists";
					}
					else
					{
						$query = "INSERT INTO `users` VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($lastname)."','','')";
						if($query_run = mysql_query($query))
						{
							header('Location: register_success.php');
						}
						else
						{
							echo "sorry couldnt register";
						}
					}
			}
			}else{
				//what happens if they fail recaptcha
				echo "please use the RECAPTCH";
			}
		}
		else
		{
			echo "<br> All fields required";
		}
	}
?>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div id= "username">
<form action= "register.php" method="POST">
Username:<br><input type = "text" name="username" value = "<?php if(isset($username)){echo $username;}?>" ><br><br>
Password:<br><input type = "password" name = "password" ><br><br>
Password Again:<br><input type = "password" name = "password_again" ><br><br>
First Name:<br><input type="text" name = "first_name"value = "<?php if(isset($firstname)){echo $firstname;}?>"><br><br>
Last Name:<br><input type="text" name = "last_name"value = "<?php if(isset($lastname)){echo $lastname;}?>"><br><br>
<div class="g-recaptcha" data-sitekey="6LcebgoTAAAAAOt2bGmtAlf66dyu9bbbqyUx4fP6"></div>
<input type="image" src = "Untitled-1.PNG" width=15% >
<!--<input type = "submit" value = "Register">-->
</div>
</form>
<?php
	}
else if(loggedin())
{
	echo "you are already registered and logged in";
}
?>
        </body>
</html>
