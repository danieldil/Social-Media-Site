<?php
require_once 'core.inc.php';
echo $http_referer;
session_destroy();
header('Location: home.php');
?>