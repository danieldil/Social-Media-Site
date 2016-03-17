<?php

require_once 'core.inc.php';
require_once 'connect.inc.php';
@$forumname = $_GET['topic'];

$pic_name = getUserField('pic_name');
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<html>
        <div id="welcome">
    <p>Super Car Sunday Forums!</p>
    </div>
        <div id = "loginButtons">
        MENU
        <ul>
        <li><a href="logout.php"> LOG OUT</a><br></li>
        <li><a href="index.php">PROFILE PAGE</a></li>
        </ul>
            </div>
   <!-- <div id ="logout"><a href="logout.php">Log Out </a> <br>
    <a href="index.php">Profile Page</a>-->
    </div>
	Profile Picture <br>
    <img src="<?php echo "uploads/".$pic_name;?>" height="202" width="240"><Br>
    <head>
    Hey this is the forum for <?php echo $forumname;?>!
        <br><br>
    </head>
    <?php
    include 'newsfeed.inc.php';
    ?>
</html>
