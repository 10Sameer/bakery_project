<?php
  //  session_start(); 
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    
    $conn = new mysqli($host, $username, $password, $database);
    
    if ($conn) {
        echo'';
    }else{
        echo'Error';
    }
    ?>