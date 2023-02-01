<?php
include 'dbcredentials.php';
session_start();
$allPosts=[];
$userDetails = $_SESSION['user_details'];
$user_id=$userDetails['user_id'];
$query = "SELECT `pictureURL`,`caption` FROM `posts` where user_id='$user_id'";
$allphotos=$connectDb->query($query); 
$userPosts = $allphotos->fetch_all();
foreach ($userPosts as $key => $value) {
    // print_r($userPosts[$key][0]);
    // print_r($value);
    array_push($allPosts,$userPosts[$key][0]);
}
// print_r($allPosts[0]);
// for ($i=0; $i<count($userPosts);$i++){
//     // print_r($userPosts);    
// }
// print_r(array_map(null,$userPosts));
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<style>
    .profile-head {
    transform: translateY(5rem)
}

.cover {
    background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
    background-size: cover;
    background-repeat: no-repeat
}
#resize{
    width: 90px;
    height: 90px;
    border-radius: 10%;
    background-size: cover;
    
}
body {
    background: #654ea3;
    background: linear-gradient(to right, #e96443, #904e95);
    min-height: 100vh;
    overflow-x:hidden;
}
</style>
<body>
<div class="row py-5 px-4"> <div class="col-md-5 mx-auto"> 
<div class="bg-white shadow rounded overflow-hidden"> 
<div class="px-4 pt-0 pb-4 cover"> 
<div class="media align-items-end profile-head">
<?php ?>
<div class="profile mr-3" ><img src="./PPs/<?php print_r($userDetails['profile_pic'])?>" id="resize">
<a href="./edit.php" class="btn btn-outline-dark btn-sm btn-block mt-2">Edit profile</a></div> <div class="media-body mb-5 text-white"> 
        <h4 class="mt-0 mb-0"><?php print_r($userDetails['username'])?></h4>
<p class="small mb-4"> 

        <i class="fas fa-map-marker-alt mr-2"></i><?php print_r($userDetails['phoneoremail'])?></p> </div> </div> </div> <div class="bg-light p-4 d-flex justify-content-end text-center"> <ul class="list-inline mb-0"> 
            <li class="list-inline-item"> 
            <h5 class="font-weight-bold mb-0 d-block"><?php echo count($allPosts)?></h5>
                    <small class="text-muted"> <i class="fas fa-image mr-1"></i>Posts</small> </li> <li class="list-inline-item">
                    <h5 class="font-weight-bold mb-0 d-block">0</h5>
                    <small class="text-muted">
                    <i class="fas fa-user mr-1"></i>Followers</small></li> 
            <li class="list-inline-item"> <h5 class="font-weight-bold mb-0 d-block">0</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Following</small> </li> </ul> </div> 
 
        <div class="px-4 py-3"> <h5 class="mb-0">About</h5> <div class="p-4 rounded shadow-sm bg-light">

<p class="font-italic mb-0">Full name: <?php print_r($userDetails['fullname'])?></p>
    <p class="font-italic mb-0">Bio: <?php print_r($userDetails['bio'])?></p></div> </div> 
        <div class="py-4 px-4"> 
            <div class="d-flex align-items-center justify-content-center mb-3"><h5 class="mb-0">Recent posts</h5>
            </div> 
            <div class="d-flex align-items-center justify-content-center mb-3 flex-column">
           <?php
           foreach ($userPosts as $key => $value) {
                echo "<img src='./Uploads/$value[0]' class='w-75'>";
                echo"<div class='m-auto w-75 d-flex justify-content-center'>
                <span>$value[1]</span>
                </div>";
            }
           ?> 
   

    </div>
    
    <a href="./post.php" class="btn btn-outline-dark btn-sm btn-block">Add a post</a></div>
     <div class="media-body mb-5 text-white"> </div> 
    </div> 
    </div>
</div>

</body>
</html>