<?php
 $dbhost = "localhost:3307";
 $dbuser = "root";
 $dbpass = "";
 $db = "prompt";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
mysqli_set_charset($conn, 'utf8');

?>