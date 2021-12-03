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


$context = $_GET['context'];
$status = 'open';
echo $context;
if($context === "all"){
    $stmt = $conn->query("SELECT * FROM issues");
    $st = mysqli_query($conn,"SELECT * FROM issues");
    $resulted = mysqli_fetch_assoc($st);
    $cnt=$st->num_rows;

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
            $id = $row['assigned_to'];
            $stst = $conn->query("SELECT firstname,lastname FROM user WHERE id = '$id'");
            $return_name = $stst->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<tr> \n";
            echo "<td>#" .$row['id'], $row['title']. "</td> \n";
            echo "<td>" .$row['type']. "</td> \n";
            echo "<td>" .$row['status']. "</td> \n";
            echo "<td>" .$return_name."</td> \n";
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

if($context === "open"){
    $stmt = $conn->query("SELECT * FROM issues WHERE status = '%$status%'");
    $st = mysqli_query($conn,"SELECT * FROM issues WHERE status = '%$status%'");
    $resulted = mysqli_fetch_assoc($st);
    $cnt=$st->num_rows;

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
            $id_open = $row['assigned_to'];
            $stst = $conn->query("SELECT firstname,lastname FROM user WHERE id = '$id_open'");
            $return_name = $stst->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<tr> \n";
            echo "<td>#" .$row['id'], $row['title']. "</td> \n";
            echo "<td>" .$row['type']. "</td> \n";
            echo "<td>" .$row['status']. "</td> \n";
            echo "<td>" .$return_name. "</td> \n";
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

if($context === "myticket"){
    $active = $_SESION['email'];
    $stnt = $conn->query("SELECT * FROM user WHERE  eamil = '$active'"); 
    $name = $stnt->fetchAll(PDO::FETCH_ASSOC);
    
    $id_tk = $name['id'];
    $stmt = $conn->query("SELECT * FROM issue WHERE  assigned_to = '$id_tk'"); 
    $st = mysqli_query($conn,"SELECT * FROM issue WHERE  assigned_to = '$id_tk'");
    $resulted = mysqli_fetch_assoc($st);
    $cnt=$st->num_rows;

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
            $id = $row['assigned_to'];
            $stst = $conn->query("SELECT firstname,lastname FROM user WHERE id = '$id'");
            $return_name = $stst->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<tr> \n";
            echo "<td>#" .$row['id'],$row['title']. "</td> \n";
            echo "<td>" .$row['type']. "</td> \n";
            echo "<td>" .$row['status']. "</td> \n";
            echo "<td>" .$return_name. "</td> \n";
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
