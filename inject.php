<?php
// include 'dbcredentials.php';
// if (isset($_POST['submit'])) {
//     $phoneoremail= $_POST['id'];
//     $password= $_POST['password'];
    
//     if(empty($phoneoremail)||empty($password)){
//         echo "Fill all fields";
//     }
//     else{
//         echo $phoneoremail;
//         $query = "SELECT * FROM `users` where phoneoremail= ?";
//         $queryDB=$connectDb->prepare($query); 
//         $binder = $queryDB->bind_param('s', $phoneoremail);
//         $inserted=$queryDB->execute();
//         if ($inserted){
//             $userDetails = $queryDB->get_result()->fetch_assoc();
//             if ($userDetails) {
//                 echo "User found<br>";
//                 $hpass=$userDetails['password'];
//                 $_SESSION['user_details']=$userDetails;                    
//                 echo $password;
//                 $verify=password_verify($password,$hpass);
//                 if ($verify) {
//                     $_SESSION['user_id']=$userDetails['user_id'];
//                     header("Location: homepage.php");
//                     echo "Success";
//                 } else {
//                     header("Location: login.php");
//                     $_SESSION['details_error']="Invalid password";
//                     echo "Invalid password";
//                 }
//             } else {
//                 echo "User not found";
//                 $_SESSION['details_error']="User not found";                    
//             }
            
//         }
//     };
// };
?>