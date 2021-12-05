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

$title = $_GET['title'];
$desc = $_GET['description'];
$assignedTo = $_GET['assignedTo'];
$type = $_GET['type'];
$priority = $_GET['priority'];

$title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
$desc = filter_var($_GET['description'], FILTER_SANITIZE_STRING);
$assignedTo = trim(filter_var($_GET['assignedTo'], FILTER_SANITIZE_STRING));
$type = trim(filter_var($_GET['type'], FILTER_SANITIZE_STRING));
$priority = trim(filter_var($_GET['priority'], FILTER_SANITIZE_STRING));
 
$assignedTo= mysqli_real_escape_string($conn, $assignedTo);

if(empty($title)){
    echo '<span style= "color: red;"> Please add a title  for the Issue being experienced</span>';
    return;
}else{
    $title= mysqli_real_escape_string($conn, $title);
}

if(empty($desc)){
    echo '<span style= "color: red;"> Please add a description of the Issue being experienced</span>';
    return;
}else{
    $desc= mysqli_real_escape_string($conn, $desc);
}

if(empty($type)){
    echo '<span style= "color: red;"> Please select the type of issue</span>';
    return;
}else{
    $type= mysqli_real_escape_string($conn, $type);
}

if(empty($priority)){
    echo '<span style= "color: red;"> Please select a priority for your issue</span>';
    return;
}else{
    $priority= mysqli_real_escape_string($conn, $priority);
}

$active = $_SESSION['email'];
$active = mysqli_real_escape_string($conn,$active);
$stnt = mysqli_query($conn,"SELECT * FROM user WHERE  email = '$active'");
$name = mysqli_fetch_assoc($stnt);
$id_tk = $name['id'];

$sql = "INSERT INTO issues( title,description,type,priority,status,assigned_to,created_by,created) VALUES('$title','$desc','$type','$priority','open','$assignedTo','$id_tk', SYSDATE())";

if(mysqli_query($conn,$sql)){
    echo'added to the file';
}else{
    echo'didnt write to file';
}