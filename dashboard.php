<?php
session_start();

if(isset($_SESSION['email'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Home</title>
        <link rel='stylesheet' href='./styles/dashboard.css'>
        <script type='module' src='scripts/main.js'></script>
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
}else{
    require 'login.html';
}
?>