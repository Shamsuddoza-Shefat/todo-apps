<?php
session_start();
include "./database/env.php";

$id= $_REQUEST['id'];

$querry = "SELECT * FROM `todos` WHERE id='$id'" ;

$res = mysqli_query($conn, $querry);
$post=mysqli_fetch_assoc($res);

if ($post == null){
    header("Location: ./404.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>


<?php 
include './include/navbar.php';
?>

<!-- //form start.  -->
<div class="col-sm-7 mx-auto">
    <div class="card">
        <div class="card-header">
            Edit Todo
        </div>
        <div class="card-body">

<form method="POST" action="./UpdateTodoController.php">

<input type="hidden" name="id" value="<?=$post['id']??null?>">

    <input name="title" type="text" class="form-control my-2" placeholder="Todo Title" value="<?=$post['title']??null?>" >
    <p class="text-danger">
          <?= $_SESSION['errors']['title_errors'] ?? null ?>
    </p>
    <textarea name="detail" class="form-control my-2" placeholder="Todo Detail"><?=$post['detail']??null?></textarea>
    <p class="text-danger">
          <?= $_SESSION['errors']['detail_errors'] ?? null ?>
    </p>
    <button class="btn btn-primary rounded-0">Update Todo</button>

</form>
        </div> 


    </div>
</div>
<!-- //form end. -->




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_unset()
?>