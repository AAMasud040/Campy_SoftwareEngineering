<?php
     
     function func(){
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
         $count = mysqli_num_rows($result3);
         $row3 = mysqli_fetch_assoc($result3);
         if($count == 0){
             $skills = '';
             $github = '';
             $linkedIn = '';
             $facebook = '';

         }
          

          if(isset($_POST['edit_profile'])){
               echo "<form action='' method='POST'>
                    <input name='user_name' type='text' class='input-box' required name='' value ='$name'>
     
                    <input name='gmail' type='text' class='input-box' required name='' value ='$email'>
                    <input name='gmail' type='text' class='input-box' required name='' value ='$skills'>
                    <input name='gmail' type='text' class='input-box' required name='' value ='$github'>
                    <input name='gmail' type='text' class='input-box' required name='' value ='$linkedIn'>
                    <input name='gmail' type='text' class='input-box' required name='' value ='$facebook'>

                    <input name='old_pass' type='password' class='input-box' placeholder='Old password' required name=''>
                    <input name='pass' type='password' class='input-box' placeholder='new password' required name=''>
                    <button name='add_uni' type='submit' class='submit-btn'>Save</button>
     
                    </form>";
          }

          
     }
     
?>