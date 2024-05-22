<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ecommerce';
$GLOBALS['conn']  = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection Error :'.$conn->connect_error);
} else {
}
