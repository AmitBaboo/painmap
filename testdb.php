<?php
$servername = "painmapcluster-instance-1.ccoq26sg5hhu.eu-west-2.rds.amazonaws.com";
$username = "admin";
$password = "Trustno001*";
$db = "";
$link = mysql_connect($servername, $username, $password);
if (!$link) {
	die('Could not connect: ' . mysql_error());
}



// ?>
