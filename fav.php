<?php

require_once 'core.inc.php';
require_once 'connect.inc.php';
@$forumname = $_GET['topic'];

?>
<link rel="stylesheet" type="text/css" href="style.css" />
<html>
<div id ="logout"><a href="logout.php">Log Out </a> <br>
<a href="index.php">Profile Page</a>
</div>

<style>
</style>
<head>
Hey this is the forum for <?php echo $forumname;?>!
</head>
<body>
</body>

<?php
include 'newsfeed.inc.php';
?>
</html>
