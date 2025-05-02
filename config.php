<?php 

session_start();
$conn = mysqli_connect('localhost','root','mysql','chatter');

if (!$conn){
    die("Eroare la conectare la baza de date!" . mysqli_connect_errno());
}
mysqli_set_charset($conn,'utf-8');

define('BASE_URL','http://localhost/Chatter');

?>