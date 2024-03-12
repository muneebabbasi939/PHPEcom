<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "phpecom";

// creating database connection
$con = mysqli_connect($host,$username,$password,$dbname);

// checking connection
if(!$con){
    die("Connection Failed:".mysqli_connect_error());
}
else{
    
}
?>