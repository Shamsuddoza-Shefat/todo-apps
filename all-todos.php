<?php
session_start();
include "./database/env.php";
$querry = "SELECT * FROM todos ORDER BY id DESC";
$res = mysqli_query($conn,$querry);
$posts = mysqli_fetch_all($res,1);

// echo "<pre>";
// print_r($posts);
// echo "</pre>";







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

<!-- avbar start. -->
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
  <div class="container">
    <a class="navbar-brand" href="#">Todo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse m-auto" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add Todo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./all-todos.php">All Todo</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- navbar end. -->

<!-- //form start.  -->
<div class="col-sm-7 mx-auto">
    <div class="card">
        <div class="card-header">
            All Todo
        </div>
        <div class="card-body">

        <table class="table table-responsive">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Detail</th>
                <th></th>
            </tr>



            <?php
            foreach($posts as $key=>$post){

            ?>

                <tr>
                <td><?= ++$key ?></td>
                <td><?= $post['title'] ?></td>
                <td><?= $post['detail'] ?></td>
                <td>
                    <div class="btn-group">
                        <a href="./edit-todo.php?id=<?=$post['id']?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="./controller/todoDeletController.php ? id=<?=$post['id']?>" class="btn btn-danger btn-sm">Delet</a>
                    </div>
                </td>
            </tr>
            <?php
            
            }
            
            ?>





           

        </table>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_unset()
?>