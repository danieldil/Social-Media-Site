<link rel="stylesheet" type="text/css" href="style.css" />
<?php
require_once 'connect.inc.php';
include_once 'core.inc.php';
if(isset($_POST['username'])&&isset($_POST['Password']))
{
	$username = $_POST['username'];
	$password = $_POST['Password'];
	$password_hash = md5($password);
	echo $password_hash;
	if(!empty($username)&&!empty($password))
	{
		echo "ok<br>";
		$query = "SELECT `id` FROM `users` WHERE `username` = '".mysql_real_escape_string($username)."' AND `password` = '".mysql_real_escape_string($password_hash)."'";
		if($query_run = mysql_query($query))
		{	echo"ok<br>";
			$query_num_rows = mysql_num_rows($query_run);
			echo "<br> The amount of rows that contain this is :". $query_num_rows."<br>";
				if($query_num_rows == 0)
				{
					echo 'invalid username/password<br>';
					//$query1 = "INSERT INTO `first`.`users` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES (NULL, '$username', '$password_hash', 'sirak', 'maro')";
					/* if(mysql_query($query1))
					{
						echo "registered";
					} */
				}
				else
				{
					echo 'logged in successfully';
					$user_id = mysql_result($query_run,0,'id');//the zero stands for the row
					echo "<br>The user id is: ".$user_id;
					$_SESSION['user_id']=$user_id;
					header('Location: index.php');
				}
			
		}
		
	}
}
?>
<html>
<div id="welcome">
 <strong>Super Car Sunday Forums! </strong>
</div>
<body>
<br><br>
<form action= "<?php echo $current_file;?>" method = 'POST'>
<div id= "username">Username:<input type="text" name="username"><Br>Password:<input type="password" name="Password"><br>

<input type=image src=Untitled-1.png alt="Submit feedback" ></div>
</form>
</body
</html>