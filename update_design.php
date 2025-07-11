<?php 
session_start();
if(!$_SESSION['loggedin'] || $_SESSION['loggedin'] != true){
    header("location: login.php");
}

include "partials/_dbconnect.php";

$showError = false;
$showAlert = false;

$id = $_GET['id'];

$sql = "SELECT * FROM `phpcrud` where id = '$id'";
$result = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if($_SERVER['REQUEST_METHOD'] == "POST"){
$title = $_POST['title'];
$desc = $_POST['desc'];

$sql = "UPDATE `phpcrud` SET `title` = '$title', `description` = '$desc' WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);

if($result){
    $showAlert = "Note has been updated successfully";
    header("location: index.php");
    exit;
} else{
    $showError = "Note has been updated";
}

}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap demo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>



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
    <h2>Update Note</h2>

    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Note Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>">
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Note Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"><?php echo $row['description']; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
</div>


















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>