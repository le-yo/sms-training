<?php

$hostname = "localhost";
$username = "leo";//root
$password = "12345";//""
$connection =  mysql_connect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db("bima");

