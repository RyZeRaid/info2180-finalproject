<?php

session_start();
 
$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'bugme_demo';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}


$status = $_GET['status'];
$id = $_GET['id'];

if($status === "close"){
    $status= mysqli_real_escape_string($conn, $status);
    $sql = "UPDATE issues SET status='$status'WHERE id=$id";
    if(mysqli_query($conn,$sql)){
        echo'updated status to be closed';
    }else{
        echo'';
    }
    
}

if($status === "inprogress"){
    $status= mysqli_real_escape_string($conn, $status);
    $sql = "UPDATE issues SET status='$status'WHERE id=$id";
    if(mysqli_query($conn,$sql)){
        echo'updated status to be in progress';
    }else{
        echo'';
    }
    
}