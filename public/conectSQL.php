<?php
$host = 'localhost';
$db   = 'scotchbox';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

//Papildoma eilute kuri sutvarko PDO, nes priesingu atveju neveikia puslapiavimas
$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );