<?php
$host="localhost";
$username="root";
$password="";
$dbName="insta_diduo";
$connectDb= new mysqli($host,$username,$password,$dbName);
if ($connectDb->connect_error) {
    die("Unable to connect".$connectDb->connect_error);
} else {
    // echo("Connected");
};
?>