<?php

$config = [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => ''
];

$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password']
);

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}
//Crea database
$sql = "CREATE DATABASE IF NOT EXISTS libreria_7_feb";
if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
}
$mysqli->query('USE libreria_7_feb;');
//Crea tabella libreria

$sql = "CREATE TABLE IF NOT EXISTS libri(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        titolo VARCHAR(255) NOT NULL,
        autore VARCHAR(255) NOT NULL,
        anno INT(5) NOT NULL,
        genere VARCHAR(255) NOT NULL
        /* image VARCHAR(100) NULL */
    )";
if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
}
