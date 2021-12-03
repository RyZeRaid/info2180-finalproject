<?php

session_start();
 
$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'bugme_demo';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}


$context = $_GET['context'];
$status = 'open';

if($context === "all"){
    $stmt = $conn->query("SELECT * FROM issues");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table id = 'info' border =\"1\" style='border-collapse: collapse'>";
    echo "<tr>";
    echo "<th>Title</th>";
    echo "<th>Type</th>";
    echo "<th>Status</th>";
    echo "<th>Assigned To</th>";
    echo "<th>Created</th>";
    echo "</tr>";

    foreach ($results as $row){
        $stst = $conn->query("SELECT firstname,lastname FROM user WHERE id = '$row['assigned_to']'");
        $return_name = $stst->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<tr> \n";
        echo "<td>#" .$row['id']..$row['title']. "</td> \n";
        echo "<td>" .$row['type']. "</td> \n";
        echo "<td>" .$row['status']. "</td> \n";
        echo "<td>" $return_name "</td> \n";
        echo "<td>" .$row['created']. "</td> \n";
        echo "</tr>";
    }
    echo "</table>";

}

if($context === "open"){
    $stmt = $conn->query("SELECT * FROM issues WHERE status = '%$status%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table id = 'info' border =\"1\" style='border-collapse: collapse'>";
    echo "<tr>";
    echo "<th>Title</th>";
    echo "<th>Type</th>";
    echo "<th>Status</th>";
    echo "<th>Assigned To</th>";
    echo "<th>Created</th>";
    echo "</tr>";

    foreach ($results as $row){
        $stst = $conn->query("SELECT firstname,lastname FROM user WHERE id = '$row['assigned_to']'");
        $return_name = $stst->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<tr> \n";
        echo "<td>#" .$row['id']..$row['title']. "</td> \n";
        echo "<td>" .$row['type']. "</td> \n";
        echo "<td>" .$row['status']. "</td> \n";
        echo "<td>" $return_name "</td> \n";
        echo "<td>" .$row['created']. "</td> \n";
        echo "</tr>";
    }
    echo "</table>";
}

if($context === "myticket"){
    $stnt = $conn->query("SELECT * FROM user WHERE  eamil = '$_SESION['email']'"); 
    $name = $stnt->fetchAll(PDO::FETCH_ASSOC);
    

    $stmt = $conn->query("SELECT * FROM issue WHERE  assigned_to = '$name['id']'"); 
    $resulted = mysqli_fetch_assoc($stmt);
    $cnt=$stmt->num_rows;

    if($cnt!=0){
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table id = 'info' border =\"1\" style='border-collapse: collapse'>";
        echo "<tr>";
        echo "<th>Title</th>";
        echo "<th>Type</th>";
        echo "<th>Status</th>";
        echo "<th>Assigned To</th>";
        echo "<th>Created</th>";
        echo "</tr>";

        foreach ($results as $row){
            $stst = $conn->query("SELECT firstname,lastname FROM user WHERE id = '$row['assigned_to']'");
            $return_name = $stst->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<tr> \n";
            echo "<td>#" .$row['id']..$row['title']. "</td> \n";
            echo "<td>" .$row['type']. "</td> \n";
            echo "<td>" .$row['status']. "</td> \n";
            echo "<td>" $return_name "</td> \n";
            echo "<td>" .$row['created']. "</td> \n";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "<table id = 'info' border =\"1\" style='border-collapse: collapse'>";
        echo "<tr>";
        echo "<th>Title</th>";
        echo "<th>Type</th>";
        echo "<th>Status</th>";
        echo "<th>Assigned To</th>";
        echo "<th>Created</th>";
        echo "</tr>";
        echo "</table>";

    }

    
}
