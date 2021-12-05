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

$issueId = $_GET['issue'];



if(isset($_SESSION['email'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Issue Details</title>
        <link rel='stylesheet' href='./styles/issuedetails.css'>
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
                        <a href=''>Home</a>
                    </section>
    
                    <section class='link'>
                        <img src='./img/icons8-add-user-male-30.png' alt=''>
                        <a href=''>Add User</a>
                    </section> 
    
                    <section class='link'>
                        <img src='./img/icons8-add-30.png' alt=''>
                        <a href=''>New Issue</a>
                    </section> 
    
                    <section class='link'>
                        <img src='./img/icons8-shutdown-24.png' alt=''>
                        <a href=''>Logout</a>
                    </section> 
                </aside>
    
                <main>
    
                    <section class='page-top'>
                        <h2 id='title'>Lorem ipsum dolor sit.</h2>
                        
                        <div id='issue-number'>Lorem, ipsum.</div>
                    </section>
    
                    <div class='issues-info'>
    
                        <section class='left-side'>
                            <div id='description'>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis, iure! Vitae blanditiis, 
                                dolor accusamus ratione, commodi eligendi aliquam nihil inventore officia sequi beatae veritatis. 
                                Animi beatae quisquam, cupiditate, natus libero ipsam asperiores sint provident unde quas amet rem 
                                doloremque at id illum consequatur neque nemo veniam deserunt dolor. Ut, veritatis.
                            </div>
    
                            <div class='dates'>
                                <ul>
                                    <li id='created-on'>Lorem ipsum dolor sit amet.</li>
                                    <li id='last-updated'>Lorem ipsum dolor sit amet.</li>
                                </ul>
                            </div>
                        </section>
    
    
                        <section class='right-side'>
    
                            <div class='grey-box'>
    
                                <div class='grey-contents'>
    
                                    <div class='grey-section'>
                                        <p class='grey-title'>Assigned To:</p>
                                        <div id='assigned-to'>Lorem Ipsum</div>
                                    </div>
        
                                    <div class='grey-section'>
                                        <p class='grey-title'>Type:</p>
                                        <div id='type'>Lorem</div>
                                    </div>
        
                                    <div class='grey-section'>
                                        <p class='grey-title'>Priority:</p>
                                        <div id='priority'>Lorem</div>
                                    </div>
        
                                    <div class='grey-section'>
                                        <p class='grey-title'>Status:</p>
                                        <div id='status'>Lorem</div>
                                    </div>
    
                                </div>
    
                            </div>
    
                            <div class='buttons'>
                                <button id='closedBtn'>Mark as Closed</button>
                                <button id='inProgressBtn'>Mark In Progress</button>
                            </div>
                            
                        </section>
                    </div>
    
                </main>
            </div>
        </body>
    </html>";
}else{
    require 'login.html';
}
?>