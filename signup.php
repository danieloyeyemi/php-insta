<?php
include  'dbcredentials.php';
if (isset($_POST['submit'])){
    print_r($_POST);
    session_start();
    $full_name= $_POST['fullname'];
    $emailorphone= $_POST['emailorphone'];
    $username= $_POST['username'];
    $password=$_POST['password'];
    $hashedPassword= password_hash($password, PASSWORD_DEFAULT);
    $query= "INSERT INTO users (fullname,phoneoremail, username,password) VALUES ('$full_name','$emailorphone','$username','$hashedPassword')";
    $inserted=$connectDb->query($query);
    echo($inserted);  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body class="bg-black">
<div class="bg-white container w-25 border border-secondary p-5 m-auto mt-5 mb-1 border-radius-2">
    <div class="card-body text-center">
        <h5 class="card-title mb-4">Instagram</h5>
<form action="" method="post">
<input type="text" class="form-control mb-2" placeholder="Phone number or Email" name="emailorphone">
<input type="text" class="form-control mb-2" placeholder="Fullname" name="fullname">
<input type="text" class="form-control mb-2" placeholder="Username" name="username">
<input type="password" class="form-control mb-2" placeholder="Password" name="password">
<button type="submit" class="btn btn-primary form-control mb-2" name="submit">Signup</button>
</form>
</div>
</div>
<div class="bg-white container w-25 border border-secondary p-2 border-radius-2">

<div class="text-center">Or <a href="./login.php" class="text-decoration-none">Login</a></div>
</div>
</body>
</html>