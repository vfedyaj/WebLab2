<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lr2";

$conn = new mysqli($servername, $username, $password, $database);

if (!$conn){
    die('Error querying database.');
}


