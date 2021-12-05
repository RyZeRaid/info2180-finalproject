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

$show = $_GET['show'];
$issue = $_GET['issue'];



if(isset($_SESSION['email'])){

    $stmt = mysqli_query($conn,"SELECT * FROM issues WHERE id = '$issue'");
    
    foreach ($stmt as $row){
        $id = $row['assigned_to'];
        $stst = mysqli_query($conn,"SELECT firstname,lastname FROM user WHERE id = '$id'");
        $return_name = mysqli_fetch_assoc($stst);
        

        echo "<!DOCTYPE html>
        <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Issue Details</title>
    <link rel='stylesheet' href='./styles/issuedetails.css'>
    <script src='./scripts/dashboard.js'></script>

</head>
    <html lang='en'>
                <main>
    
                    <section class='page-top'>";
                      echo"<h2 id='title'>".$row['title']."</h2>";
                        
                       echo"<div id='issue-number'>Issue,#".$row['id']."</div>
                    </section>
    
                    <div class='issues-info'>";
    
                    echo"<section class='left-side'>
                            <div id='description'>
                                ".$row['description']."
                            </div>";
    
                           echo" <div class='dates'>
                                <ul>
                                    <li id='created-on'>".$row['created']."</li>
                                    <li id='last-updated'>".$row['updated']."</li>
                                </ul>
                            </div>
                        </section>
    
    
                        <section class='right-side'>
    
                            <div class='grey-box'>
    
                                <div class='grey-contents'>
    
                                    <div class='grey-section'>
                                        <p class='grey-title'>Assigned To:</p>
                                        <div id='assigned-to'>".implode(" ",$return_name)."</div>
                                    </div>
        
                                    <div class='grey-section'>
                                        <p class='grey-title'>Type:</p>
                                        <div id='type'>".$row['type']."</div>
                                    </div>
        
                                    <div class='grey-section'>
                                        <p class='grey-title'>Priority:</p>
                                        <div id='priority'>".$row['priority']."</div>
                                    </div>
        
                                    <div class='grey-section'>
                                        <p class='grey-title'>Status:</p>
                                        <div id='status'>".$row['status']."</div>
                                    </div>
    
                                </div>
    
                            </div>
    
                            <div class='buttons'>
                                <button type = 'submit' id='closedBtn' value = '".$row['id']."' class = 'BUTTON'>Mark as Closed</button>
                                <button type = 'submit' id='inProgressBtn' value = '".$row['id']."' calss = 'BUTTON'>Mark In Progress</button>
                            </div>
                            <div id='show'></div>
                        </section>
                    </div>
    
                </main>
            </div>
        </body>
    </html>";
    }


}else{
    require 'login.html';
}
?>