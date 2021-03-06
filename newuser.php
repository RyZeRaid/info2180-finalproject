<?php
session_start();

if(isset($_SESSION['email'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>New User</title>
        <link rel='stylesheet' href='./styles/style.css'>
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
    
            <main>
                <h2>New User</h2>
    
                <form>
                    <label for='first_name'>First Name</label>
                    <input name='first_name' type='text' id='first_name' required>
                    <p class='first'></p>
    
                    <label for='last_name'>Last Name</label>
                    <input name='last_name' type='text' id='last_name' required>
                    <p class='last'></p>
    
                    <label for='password'>Password</label>
                    <input name='password' type='text' id='password' required>
                    <p class='pass'></p>
    
                    <label for='email'>Email</label>
                    <input name='email' type='text' id='email' required>
                    <p class='mail'></p>
    
                    <button name='submit' type='submit' id='btn'>Submit</button>
                </form>
                <div id = 'show'></div>
            </main>
        </div>
    </body>
    </html>";
}else{
    require 'login.html';
}
?>