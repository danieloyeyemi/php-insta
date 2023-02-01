<?php
include 'dbcredentials.php';
session_start();
if (isset($_POST['submit'])) {
    $phoneoremail= $_POST['id'];
    $password= $_POST['password'];

    if(empty($phoneoremail)||empty($password)){
        echo "Fill all fields";
    }
    else{
        $query = "SELECT * FROM `users` where phoneoremail='$phoneoremail'";
        $inserted=$connectDb->query($query); 
        if ($inserted){
            $userDetails = $inserted->fetch_assoc();
            if ($userDetails) {
                echo "User found<br>";
                $hpass=$userDetails['password'];
                $_SESSION['user_details']=$userDetails;                    
                echo $password;
                $verify=password_verify($password,$hpass);
                if ($verify) {
                    // $_SESSION['user_id']=$userDetails['user_id'];
                    header("Location: homepage.php");
                    echo "Success";
                } else {
                    header("Location: login.php");
                    // $_SESSION['details_error']="Invalid password";
                    echo "Invalid password";
                }
            } else {
                echo "User not found";
                // $_SESSION['details_error']="User not found";                    
            }
            
        }
    };
};
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Instagram</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body class="bg-black">
<div class="bg-white container w-25 border border-secondary p-5 m-auto my-5 border-radius-2">
    <div class="card-body text-center">
        <h5 class="card-title mb-4">Instagram</h5>
<form action="login.php" method="POST">
<input type="text" class="form-control mb-2" placeholder="Phone number or Email" name="id">
<input type="password" class="form-control mb-2" placeholder="Password" name="password">
<button type="submit" class="btn btn-primary form-control mb-2" name="submit">Login</button>
<div><a href="" class="text-decoration-none">Forgot password?</a></div>
</form>
    </div>
</div>
<div class="border border-secondary bg-white container w-25 p-3 m-auto  border-radius-2 text-center" style="width: 300px;">

<div>Or you don't have an account? <a href="./signup.php" class="text-decoration-none">Signup</a></div>
</div>

</body>
</html>