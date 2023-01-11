<?php

$host = "localhost";
$dbname = "id20115014_pkd";
$username = "id20115014_root";
$password = "Lc)R]?MS7>HP#w}i";

$mysqli = new mysqli( $host,
                      $username,
                      $password,
                      $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;

?>