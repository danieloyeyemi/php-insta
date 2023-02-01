<?php

include 'dbcredentials.php';
if (isset($_POST['submit'])){
session_start();
$userDetails = $_SESSION['user_details'];
print_r($_POST);
$caption= $_POST['caption'];
$user_id=$userDetails['user_id'];
$filename=$_FILES["picture"]["tmp_name"];
$name = time().$_FILES["picture"]["name"];
echo $filename;
echo $name;
  $uploaded=move_uploaded_file($filename, "Uploads/".$name);
  if($uploaded){
    $query= "INSERT INTO posts (pictureURL,caption,user_id) VALUES ('$name','$caption','$user_id')";
    $inserted=$connectDb->query($query);
    header("Location: homepage.php");    
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>POST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    form{
    background-repeat: no-repeat;
    width: 50vw;
    }
    body {
    background: #654ea3;
    background: linear-gradient(to right, #e96443, #904e95);
    min-height: 100vh;
    overflow-x:hidden;
}
input[type="file"]{
  display: none;
}
</style>
<body>
<form enctype="multipart/form-data" class="mx-auto item-align-center bg-light border-radius-10 p-5 mt-5" method="post" action="./post.php">
  <div class="form-group">
    <label for="fileInput" class="form-control custom-file-upload btn btn-light">Click to add picture
    <input type="file" id="fileInput" name="picture" placeholder="Your picture">
    </label>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Caption</label>
    <input type="text" name="caption" class="form-control" placeholder="What's up with that picture?">
    <small id="emailHelp" class="form-text text-muted"></small>
  <button type="submit" class="form-control btn btn-dark" name="submit">Tell friends!</button>
</form>
</body>
</html>