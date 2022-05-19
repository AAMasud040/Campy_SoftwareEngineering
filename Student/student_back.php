<?php
    include "db_connect.php";

    $id = 011183040;
    $qry = "SELECT * FROM student WHERE user_id = $id";
    $result = mysqli_query($conn, $qry);
    $row = mysqli_fetch_assoc($result);

    $name = $row['user_name'];
    $email = $row['email'];
    $University_id = $row['Universityuniversity_id'];
    $approval = $row['approval'];
    $status = $row['status'];

    $qry2 = "SELECT * FROM university WHERE university_id = $University_id";
    $result2 = mysqli_query($conn, $qry2);
    $row2 = mysqli_fetch_assoc($result2);

    $university_name = $row2['university_name'];

    $conntent = "<div id='profileView'>
                 <h1>Name: $name</h1>
                 <h3>Student Id: $id<h3>
                 <h3>Your Email: $email<h3>
                 <h3>Student of $university_name<h3>
                 </div>";
?>