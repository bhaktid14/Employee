<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$databaae="crud";



// Create connection
$conn = new mysqli($servername, $username, $password,$databaae);
?>