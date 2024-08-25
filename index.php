<?php
session_start();
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
            Add Todo
        </div>
        <div class="card-body">

<form method="POST" action="./controller/storeTodoController.php">

    <input value="<?= $_SESSION['old_data']['title'] ?? null ?>" name="title" type="text" class="form-control my-2" placeholder="Todo Title">
    <p class="text-danger">
          <?= $_SESSION['errors']['title_errors'] ?? null ?>
    </p>
    <textarea name="detail" class="form-control my-2" placeholder="Todo Detail"><?= $_SESSION['old_data']['detail'] ?? null ?></textarea>
    <p class="text-danger">
          <?= $_SESSION['errors']['detail_errors'] ?? null ?>
    </p>
    <button class="btn btn-primary rounded-0">Add Todo</button>

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