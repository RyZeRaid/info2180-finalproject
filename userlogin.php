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

$email = $_GET['email'];
$userpassword = $_GET['password'];

$userpassword = filter_var($userpassword, FILTER_SANITIZE_STRING);

if(isset($email) && isset($userpassword))
{
    
    if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
        include 'login.html';
        echo '<span style= "color: red;"> Email must be a valid email address.</span>';
        return;
    }else{
        $email = mysqli_real_escape_string($conn, $email);
    }
    $userpassword = mysqli_real_escape_string($conn, $_GET['password']);

    if(empty($userpassword)){
        include 'login.html';
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
            echo "<!DOCTYPE html>
            <html lang='en'>
            
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Home</title>
                <link rel='stylesheet' href='./styles/dashboard.css'>
                <script type='module' src='scripts/dashboard.js'></script>
            </head>
            
                <body>
                    <div class='container'>
                        <header>
                            <img src='./img/bug-512.png' alt='Image of lady bug logo'>
                            <h1>BugMe Issue Tracker</h1>
                        </header>
            
                        <aside>
                        <section class='link'>
                            <img src='./img/icons8-home-24.png' alt=''>
                            <button id='home'>Home</button>
                        </section>
        
                        <section class='link'>
                            <img src='./img/icons8-add-user-male-30.png' alt=''>
                            <button id='adduser'>Add User</button>
                        </section> 
        
                        <section class='link'>
                            <img src='./img/icons8-add-30.png' alt=''>
                            <button id='newissue'>New Issue</button>
                        </section> 
        
                        <section class='link'>
                            <img src='./img/icons8-shutdown-24.png' alt=''>
                            <button id='logout'>Logout</button>
                        </section> 
                    </aside>
            
                        
            
                            <div id = 'show'>
                            <main>
            
                            <div class='page-top'>
                                <h2>Issues</h2>
            
                                <div>
                                    <button id='createBtn'>Create New Issue</button>
                                </div>
                            </div>
            
                            <div class='selectors'>
                                <p>Filter By: </p>
            
                                <div class='selector-buttons'>
                                    <button id='all' class='filterBtn'>ALL</button>
                                    <button id='open' class='filterBtn'>OPEN</button>
                                    <button id='myticket' class='filterBtn'>My Ticket</button>
                                </div>
                            </div>

                            <div id = 'table'></div>
                            </div>
                        </main>
                    </div>
                </body>
            </html>";
        }
        else
        {
            include 'login.html';
            echo "<div class='error'><p>The username or password is incorrect!</p></div>";
        }
}

    mysqli_close($conn);
 
?>