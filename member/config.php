<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
<<<<<<< HEAD
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'alumni');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// $mysqli = new mysqli('localhost','root','','alumni');
=======
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'alumni');
 
/* Attempt to connect to MySQL database */
// $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$mysqli = new mysqli('localhost','root','','alumni');
>>>>>>> master
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>