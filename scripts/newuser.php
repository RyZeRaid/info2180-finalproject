<?php
$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'bugme_demo';

$info =explode(" ",$_GET['user']);
$fname = $info[0];
$lname = $info[1];
$userpassword = $info[2];
$email = $info[3];

$fname = trim(filter_var($fname, FILTER_SANITIZE_STRING));
$lname = trim(filter_var($lname, FILTER_SANITIZE_STRING));
$userpassword = trim(filter_var($userpassword, FILTER_SANITIZE_STRING));
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

if( !ctype_alnum($userpassword) && !strlen($userpassword)>9 && !strlen($userpassword)<50 && !preg_match('`[A-Z]`',$userpassword) 
        && !preg_match('`[a-z]`',$userpassword)  && !preg_match('`[0-9]`',$userpassword) ){
            echo '<span style= "color: red;"> Please Enter a Password with at least one number, one letter, one capital letter and atleast 8 characters long .</span>';
    }else{
        $userpassword = mysqli_real_escape_string($conn, $info[2]);
    }

if(empty($fname)){
    echo '<span style= "color: red;"> Please enter a value for First Name.</span>';
}else if(!preg_match('/^[a-zA-Z\s]+$/',$fname)){
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
}else{
    $fname= mysqli_real_escape_string($conn, $info[0]);
}

if(empty($lname)){
    echo '<span style= "color: red;"> Please enter a value for First Name.</span>';
}else if(!preg_match('/^[a-zA-Z\s]+$/',$lname)){
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
}else{
    $lname= mysqli_real_escape_string($conn, $info[1]);
}

if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
    echo '<span style= "color: red;"> Email must be a valid email address.</span>';
}else{
    $email = mysqli_real_escape_string($conn, $info[3]);
}

$sql = "INSERT INTO user( firstname, lasttname, password,email,date_joined) VALUES('$fname', '$lname', '$userpassword', '$email', SYSDATE())";

if(mysqli_query($conn,$sql)){
    echo'';
}else{
    echo'';
}

?>



