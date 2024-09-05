<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'datasystem';

//$conn
$mysqli = new mysqli($host, $user, $password, $db);
if ($mysqli->connect_errno) {
die($mysqli->connect_error);
}
$mysqli->set_charset('utf8');

//启用session
session_start();
