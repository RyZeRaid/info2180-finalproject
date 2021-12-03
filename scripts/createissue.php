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

$issues = explode("&$&",$_GET['issue']);

$title = trim(filter_var($issues[0], FILTER_SANITIZE_STRING));
$desc = trim(filter_var($issues[1], FILTER_SANITIZE_STRING));
$assignedTo = trim(filter_var($issues[2], FILTER_SANITIZE_STRING));
$type = trim(filter_var($issues[3], FILTER_SANITIZE_STRING));
$priority = trim(filter_var($issues[4], FILTER_SANITIZE_STRING));

foreach($issues as $issue){
    echo $issue."\n";
}


