<?php

$hostname = 'localhost';
$username = 'root';
$pwd = '';
$dbname = 'hms';

$connect =  new mysqli($hostname,$username,$pwd,$dbname);

if(!$connect){
    die('Database Error'.mysqli_connect_error($connect));
}
