<?php
$servername = "localhost";
$username = $_POST['username'];
$password = $_POST['password'];
$database = "raportowanieOperacji";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    header('Location: error.php');
} 
 
?>