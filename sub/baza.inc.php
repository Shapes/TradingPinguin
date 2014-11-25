<?php

$dbhost = '23.229.148.226';

$dbusername = "headPinguin";

$dbpassword = "geslogeslo";

$database_name = "pinguin";



$connection = mysql_connect("$dbhost", "$dbusername", "$dbpassword") or die ('Problem in connecting with server.');

$db = mysql_select_db("$database_name", $connection) or die ('Can not choose database.');


?>