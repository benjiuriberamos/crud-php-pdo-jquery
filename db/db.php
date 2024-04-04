<?php

$host = 'localhost';
$db   = 'crud_php';
$user = 'root';
$pass = '98738534';
$port = "3306";
// $charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;port=$port";
$pdo = new \PDO($dsn, $user, $pass, $options);