<?php

require_once 'core.inc.php';
require_once 'connect.inc.php';
@$forumname = $_GET['topic'];

$pic_name = getUserField('pic_name');
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<html>
    <div id ="logout"><a href="logout.php">Log Out </a> <br>
    <a href="index.php">Profile Page</a>
    </div>
	Profile Picture <br>
    <img src="<?php echo "uploads/".$pic_name;?>" height="202" width="240"><Br>
    <head>
    Hey this is the forum for <?php echo $forumname;?>!
    </head>
    <?php
    include 'newsfeed.inc.php';
    ?>
</html>
