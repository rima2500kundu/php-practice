<?php
// connect to the db
$servername = "localhost";
$username = "root";
$password = "";
$database = "phppractice";

// create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("connection was not successful beacuse -->". mysqli_connect_error());
}
// else{
//     echo "connection was successful";
// }







?>