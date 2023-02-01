<?php
include 'dbcredentials.php';
session_start();
$userDetails = $_SESSION['user_details'];
$user_id=$userDetails['user_id'];
if (isset($_POST['submit'])){
  $filename=$_FILES["picture"]["tmp_name"];
  $name = time().$_FILES["picture"]["name"];
  echo $filename;
  echo $name;
  print_r($_FILES);
  $uploaded=move_uploaded_file($filename, "PPs/".$name);
    $phoneoremaill=$_POST['phoneoremail'];
    $password=$_POST['password'];
    $usernamee=$_POST['username'];
    $bioo=$_POST['bio'];
    $hashedPassword= password_hash($password, PASSWORD_DEFAULT);    
    $query="UPDATE `users` SET `username`='$usernamee',`password`='$hashedPassword',`phoneoremail`='$phoneoremaill',`bio`='$bioo', `profile_pic`='$name' WHERE `user_id`='$user_id'";
    $updated=$connectDb->query($query); 
    if($updated){
      $phoneoremaill=$userDetails['phoneoremail'];
      $query = "SELECT * FROM `users` where `phoneoremail`='$phoneoremaill'";
      $inserted=$connectDb->query($query); 
      if ($inserted){
          $userDetails = $inserted->fetch_assoc();
          if ($userDetails) {
              echo "User found<br>";
              $hpass=$userDetails['password'];
              $_SESSION['user_details']=$userDetails;
            }
            header("Location: homepage.php");
        }
    }
    else{
      echo ($updated);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
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
<form class="mx-auto item-align-center bg-light border-radius-10 p-5" method="post" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address/Phone number</label>
    <input type="text" name="phoneoremail" class="form-control" id="exampleInputEmail1" placeholder="<?php print_r($userDetails['phoneoremail'])?>">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" placeholder="<?php print_r($userDetails['username'])?>">
    <small id="emailHelp" class="form-text text-muted">You can only change this once</small>
  </div>  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="New password">
    <small class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">BIO</label>
    <input type="text" name="bio" class="form-control" placeholder="<?php print_r($userDetails['bio'])?>">
  </div>
  <div class="form-group">
    <label for="fileInput" class="form-control custom-file-upload btn btn-light">Click to add picture
    <input type="file" id="fileInput" name="picture" placeholder="Your picture">
    </label>
  </div>
  <button type="submit" class="form-control btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>