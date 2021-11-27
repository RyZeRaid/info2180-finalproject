<?php
$host = 'localhost';
$username = 'sudhish_user';
$password = 'password123';
$dbname = 'user';
$fname = $_GET['first_name'];
$lname = $_GET['last_name'];
$password = $_GET['password'];
$email = $_GET['email'];
$check = 0;
$city = "";

trim(filter_var($country, FILTER_SANITIZE_STRING));
$fname = trim(filter_var($fname, FILTER_SANITIZE_STRING));;
$lname = trim(filter_var($lname, FILTER_SANITIZE_STRING));;
$password = trim(filter_var($password, FILTER_SANITIZE_STRING));;
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if( ctype_alnum($password) && strlen($password)>9 && strlen($password)<21 && preg_match('`[A-Z]`',$password) 
        && preg_match('`[a-z]`',$password)  && preg_match('`[0-9]`',$password) ){

            $password = mysqli_real_escape_string($conn, $_GET['password']);
    }else{
        echo '<span style= "color: red;"> Please Enter a Password with at least one number, one letter, one capital letter and atleast 8 characters long .</span>';
    }

if(empty($fname)){
    echo '<span style= "color: red;"> Please enter a value for First Name.</span>';
}else if(!preg_match('/^[a-zA-Z\s]+$/',$fname)){
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
}else{
    $fname= mysqli_real_escape_string($conn, $_GET['first_name']);
}

if(empty($lname)){
    echo '<span style= "color: red;"> Please enter a value for First Name.</span>';
}else if(!preg_match('/^[a-zA-Z\s]+$/',$lname)){
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
}else{
    $lname= mysqli_real_escape_string($conn, $_GET['last_name']);
}

if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
    echo '<span style= "color: red;"> Email must be a valid email address.</span>';
}else{
    $email = mysqli_real_escape_string($conn, $_GET['email']);
}
?>



