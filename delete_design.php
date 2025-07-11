<?php 
session_start();
if(!$_SESSION['loggedin'] || $_SESSION['loggedin'] != true){
    header("location: login.php");
}

include "partials/_dbconnect.php";

$id = $_GET['id'];

// delete data
$sql = "DELETE FROM `phpcrud` WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);

if($result){
    echo "Record deleted";
    header("location: index.php");
    exit;
} else{
    echo "Failed to delete";
}

?>

