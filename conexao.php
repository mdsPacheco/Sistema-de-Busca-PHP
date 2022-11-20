<?php

$host = "localhost";
$db   = "carros";
$user = "root";
$pass = "";

$mysqly = new mysqli($host, $user, $pass, $db);
if($mysqly->connect_errno){
    die('Falha na conecão com o banco de dados');
}