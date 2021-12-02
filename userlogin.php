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

$email = $_POST['email'];
$userpassword = $_POST['password'];


$userpassword = filter_var($userpassword, FILTER_SANITIZE_STRING);

if(isset($email) && isset($userpassword))
{
    
    if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
        echo '<span style= "color: red;"> Email must be a valid email address.</span>';
        return;
    }else{
        $email = mysqli_real_escape_string($conn, $email);
    }
    $userpassword = mysqli_real_escape_string($conn, $_POST['password']);

    if(empty($userpassword)){
        echo '<span style= "color: red;"> Please enter a Password.</span>';
        return;
    }else if( !ctype_alnum($userpassword) && !strlen($userpassword)>9 && !strlen($userpassword)<50 && !preg_match('`[A-Z]`',$userpassword) 
        && !preg_match('`[a-z]`',$userpassword)  && !preg_match('`[0-9]`',$userpassword) ){
            echo '<span style= "color: red;"> Please Enter a Password with at least one number, one letter, one capital letter and atleast 8 characters long .</span>';
    }else{
        $userpassword = mysqli_real_escape_string($conn, $userpassword);
    }


    $result1 = mysqli_query($conn, "SELECT email, password FROM user WHERE email = '".$email."' AND  password = '".$userpassword."'");

   
    if(mysqli_num_rows($result1) > 0 )
        {
            $_SESSION['email'] = $email;
            header('Location: dashboard.php');
            echo'correct login';
        }
        else
        {
            include 'login.html';
            echo "<div class='error'><p>The username or password is incorrect!</p></div>";
        }
}

    mysqli_close($conn);
 
?>