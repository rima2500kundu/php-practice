<?php
$showError = false;
$showAlert = false;
$login = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
include "partials/_dbconnect.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `phppractice` where `username` = '$username'";
$result = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($result);

if($numrows == 1){
    while($row = mysqli_fetch_assoc($result)){
        if(password_verify($password, $row['password'])){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: index.php");
            exit;
        } else{
            $showError = "Invalid Credential";
        }
    } 
} else{
    $showError = "Invalid Credential";
}

}



?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>

<?php include "partials/_header.php" ?>

<?php
if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError .'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> '. $showAlert .'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

?>

<div class="container mt-5">
    <h1 class="text-center">Login</h1>

    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>