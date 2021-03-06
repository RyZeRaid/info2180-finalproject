<?php
session_start();

if(isset($_SESSION['email'])){

    $host = 'localhost';
    $username = 'new_user';
    $password = 'password123';
    $dbname = 'bugme_demo';
    
    $conn = mysqli_connect($host , $username, $password, $dbname);
    if(!$conn){
        echo'Connection Error:' . mysqli_connect_error();
    }
    
    $stmt = mysqli_query($conn,"SELECT * FROM user");

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Issue</title>
        <link rel="stylesheet" href="./styles/createissue.css">
    
    </head>
    <body>
        <div class="container">
            <header>
                <img src="./img/bug-512.png" alt="Image of lady bug logo">
                <h1>BugMe Issue Tracker</h1>
            </header>
    
            <aside>
                    <section class="link">
                        <img src="./img/icons8-home-24.png" alt="">
                        <button id="home">Home</button>
                    </section>
    
                    <section class="link">
                        <img src="./img/icons8-add-user-male-30.png" alt="">
                        <button id="adduser">Add User</button>
                    </section> 
    
                    <section class="link">
                        <img src="./img/icons8-add-30.png" alt="">
                        <button id="newissue">New Issue</button>
                    </section> 
    
                    <section class="link">
                        <img src="./img/icons8-shutdown-24.png" alt="">
                        <button id="logout">Logout</button>
                    </section> 
                </aside>
    
            <main>
                <h1>Create Issue</h1>
    
                <form>
                    <label for="title">Title</label>
                    <input name="title" type="text" id="title" required>
                    <p class="title"></p>
    
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    <p class="description"></p>';
    
                    echo '<label for="assign">Assigned To</label>

                    <select name="assign" type="text" id="assign" required>';
                    
                    
                    foreach($stmt as $row){
                        echo "<option value = " .$row['id']. ">" .$row['firstname']." ".$row['lastname'] . "</option>";
                    }

                    echo '</select>

                    <p class="assign"></p>
    
                    <label for="type">Type</label>
                    <select name="type" type="text" id="type" required>
                        <option value="Bug">Bug</option>
                        <option value="Proposal">Proposal</option>
                        <option value="Task">Task</option>
                    </select>
                    <p class="type"></p>
    
                    <label for="priority">Priority</label>
                    <select name="priority" type="text" id="priority" required>
                        <option value="Minor">Minor</option>
                        <option value="Major">Major</option>
                        <option value="Critical">Critical</option>
                    </select>
                    <p class="priority"></p>
                    
                    <button name="submit" type="submit" id="btn">Submit</button>
                </form>
                <div id = "show"></div>
            </main>
        </div>
    </body>
    </html>';
    }else{
        require 'login.html';
    }
    ?>
