<?php
session_start();

if(isset($_SESSION['email'])){
    session_destroy();
    require 'login.html';
}else{
    require 'login.html';
}
?>