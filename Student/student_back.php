<?php
    include "db_connect.php";

    $id = '011183040';
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

    $qry3 = "SELECT * FROM student_work_profile WHERE student_id = $id";
    $result3 = mysqli_query($conn, $qry3);
    $row3 = mysqli_fetch_assoc($result3);

    $skills = $row3['skills'];
    $github = $row3['github'];
    $linkedIn = $row3['linkedIn'];
    $facebook = $row3['facebook'];


    $content = "<form action='' method='POST'>
                <div id='profileView'>
                 <h1>Name: $name</h1>
                 <h3>Student Id: $id</h3>
                 <h3>Your Email: $email</h3>
                 <h3>Student of $university_name</h3>
                 <label>skills</label>
                 <h3>$skills</h3>
                 <a href='$github'>github</a>
                 <a href='$linkedIn'>linkedIn</a>
                 <a href='$facebook'>facebook</a>


                 <button name = 'edit_profile' id='edit'>Edit</button>
                 </div>
                 </form>";

    $data = ["status" => "ok", "content" => $content];
    header('Content-type: application/json');
    echo json_encode($data);
?>