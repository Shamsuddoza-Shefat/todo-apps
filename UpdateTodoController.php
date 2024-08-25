<?php
session_start();

$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$id = $_REQUEST['id'];

$errors = [];

//*VALIDATION

if(empty($title)){
    $errors['title_errors'] = "title is requard";
}
if(empty($detail)){
    $errors['detail_errors'] = "detail is requard";
}

//*REDIRACTION && REEOR SESSION SAVE

if(count($errors)> 0){
    $_SESSION['errors']=$errors;
    $_SESSION['old_data']=$_REQUEST;
    header("Location: ./edit-todo.php?id=$id");

} else{
    //connect to database
    include "./database/env.php";

    $query="UPDATE todos SET title='$title',detail='$detail' WHERE id='$id'";

    $res = mysqli_query($conn,$query);

    if ($res){
        header("Location: ./all-todos.php");
    }

}







