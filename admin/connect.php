<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "web2";
//  $port = 3307;
 $conn = new mysqli($servername, $username, $password, $dbname);

 if ($conn->connect_error){
     die("Connection failed: " . $conn->connect_error);
 }

?>