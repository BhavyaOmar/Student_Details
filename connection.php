<?php

    $conn = new mysqli('localhost', 'root', '', 'studentdata');

    if($conn->connect_error){

        die("Connection Failed". $conn->connect_error);
    }


?>