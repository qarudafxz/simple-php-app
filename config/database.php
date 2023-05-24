<?php
//constants
define('DB_HOST', 'localhost');
define('DB_USER', 'fra');
define('DB_PASS', 'garuda');
define('DB_NAME', 'feedback');

//establish connection
//parameters are the host of the db, user, pass and name
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//check the connection
//pointing at the connect_error method
if ($conn->connect_error) {
    die('Connection Failed' . $conn->connect_error);
}

global $conn;
?>
