<!-- WHEN USING THIS IN YOUR FILE AS AN INCLUDE YOU NEED TO NAME THE VARIABLE $FORUMNAME --> 
<style>
<link rel="stylesheet" type="text/css" href="style.css" />
</style>
<div id="newsfeed">
<?php
echo 'This is your news feed <br>';
//$forumname = 'lancers';
?>
<textarea id="mTA" rows="4" cols="50" onfocus="clearContents(this);">
Create a post!...
</textarea>
<button onclick="myFunction()">Submit</button>
</div>
<script>
function myFunction() {
    var x = document.getElementById("mTA").value;
	//window.alert(x);
    window.location.href = window.location.href+"&w1="+ x;

}
function clearContents(element) {
  element.value = '';
}
</script>
<?php
if (isset($_GET["w1"])){
	$query = "INSERT INTO `first`.`".$forumname."` (`user_id`, `post_id`, `post`, `pic_name`,`time`) VALUES ('".$_SESSION['user_id']."', NULL, '".$_GET["w1"]."', '','".time()."')";
	mysql_query($query);
	//header( "refresh:.2 ;url= index.php" );

}
?>
<div id = "news">
<?php

//run the query
$loop = mysql_query("SELECT `post`, `user_id`,`time` FROM `".$forumname."`")
   or die (mysql_error());

while ($row = mysql_fetch_array($loop))
{
     echo "<br>"."<br>";
	$query_run = mysql_query("SELECT `username` FROM `users` WHERE `id` = '".$row['user_id']."'");
		     echo "- ' ".$row['post']." ' -";

	echo mysql_result($query_run,0,'username');
		 ?>
		 <div  id='date'>
		 <?php
		 echo(date(" g:i m/d/Y ",$row['time']));
		 ?>
		 </div>
	<img src="<?php echo "uploads/".mysql_result(mysql_query("SELECT `pic_name` FROM `users` WHERE `id` = '".$row['user_id']."'"),0,'pic_name');?>" height="24" width="24">
<?php
}
?>

</div>