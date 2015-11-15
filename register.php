<div id="php"><?php
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
		}
		else
		{
			echo "<br> All fields required";
		}
	}
?>
</div>
<div id= "username">
<form action= "register.php" method="POST">
Username:<br><input type = "text" name="username" value = "<?php if(isset($username)){echo $username;}?>" ><br><br>
Password:<br><input type = "password" name = "password" ><br><br>
Password Again:<br><input type = "password" name = "password_again" ><br><br>
First Name:<br><input type="text" name = "first_name"value = "<?php if(isset($firstname)){echo $firstname;}?>"><br><br>
Last Name:<br><input type="text" name = "last_name"value = "<?php if(isset($lastname)){echo $lastname;}?>"><br><br>
<input type = "submit" value = "Register">
</div>
</form>
<?php
	}
else if(loggedin())
{
	echo "you are already registered and logged in";
}
?>
<style>
html{
	background-image: url("gradient-abstract-hd-wallpaper-2560x1600-9694.jpg");
}
#php{font-size:200%;
color:white;
font-family:"AR DESTINE";}
#username{color:white;
font-family:"AR DESTINE";
font-size:200%;}
</style>