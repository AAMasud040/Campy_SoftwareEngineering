<?php 
  $username = "root";
  $servername = "localhost";
  $password = "";
  $db_name = "campy";

  $conn = new mysqli($servername, $username, $password, $db_name);

  if($conn -> connect_error){
    die("Connection failed: ".$conn-> connect_error);
  }

?>