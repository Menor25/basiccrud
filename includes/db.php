<?php
    $conn = new mysqli('localhost', 'root', '', 'basiccrud');

    if($conn->connect_error){
        exit("Error connecting to database");
    }
?>