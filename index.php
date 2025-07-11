<?php 
session_start();
include "partials/_dbconnect.php";

if(!$_SESSION['loggedin'] || $_SESSION['loggedin'] != true){
    header("location: login.php");
}

$showError = false;
$showAlert = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){

$title = $_POST['title'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `phpcrud` (`title`, `description`) VALUES ('$title', '$desc')";
$result = mysqli_query($conn, $sql);

if($result){
    $showAlert = "Note has been updated successfully";
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
    <div class="alert alert-success" role="alert">
        <h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h1>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
    </div>
</div>

<div class="container mt-5">
    <h2>Add a Note</h2>

    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Note Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Note Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
</div>

<div class="container my-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM `phpcrud`";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if($numrows > 0){
                $slid = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $desc = $row['description'];

                    echo '<tr>
                            <th scope="row">'. $slid .'</th>
                            <td>'. $title .'</td>
                            <td>'. $desc .'</td>
                            <td>
                                <a href="update_design.php?id='. $id .'" class="btn btn-primary">Update</a>
                                <a href="delete_design.php?id='. $id .'" class="btn btn-danger" onclick="return checkDelete();">Delete</a>
                            </td>
                        </tr>';
                        $slid++;
                }
            }


            ?>

            
        </tbody>
    </table>
</div>
















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<script>
    function checkDelete(){
        return confirm("Are you sure you want to delete?");
    }
</script>


</body>
</html>