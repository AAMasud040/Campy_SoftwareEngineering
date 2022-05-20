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
         $password = $row['user_pass'];

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

          else{
             $skills = $row3['skills'];
             $github = $row3['github'];
             $linkedIn = $row3['linkedIn'];
             $facebook = $row3['facebook'];
          }
          

          if(isset($_POST['edit_profile'])){
               echo "
               <div class = 'edit_form'>
               <form action='' method='POST'>
                    
                    <input name='name' type='text' class='input-box' value ='$name'>
                    <input name='email' type='text' class='input-box' value ='$email'>
                    <input name='skills' type='text' class='input-box' value ='$skills'>
                    <input name='github' type='text' class='input-box' value ='$github'>
                    <input name='linkedIn' type='text' class='input-box' value ='$linkedIn'>
                    <input name='facebook' type='text' class='input-box' value ='$facebook'>
                    <input name='new_pass' type='password' class='input-box' placeholder='new password' value =''>
                    <input name='old_pass' type='password' class='input-box' placeholder='Old password' value =''>
                    <button name='save' type='submit' class='submit-btn'>Save</button>

                    </form>
                     </div>";
          }

          if(isset($_POST['save'])){
               $new_name = $_POST['name'];
               $new_email = $_POST['email'];
               $new_skills = $_POST['skills'];
               $new_github = $_POST['github'];
               $new_linkedIn = $_POST['linkedIn'];
               $new_facebook = $_POST['facebook'];
               $old_pass = $_POST['old_pass'];
               $new_pass = $_POST['new_pass'];
               
               if($old_pass != $password){
                    echo "<script>alert('you have to enter the correct password to save changes')</script>";
               }

               else{
                    $insert = "UPDATE student
                              SET user_name = '$new_name', email= '$new_email'
                              WHERE user_id = $id";
                    $result_insert = mysqli_query($conn, $insert);

                    if($new_pass !=''){
                         $insert = "UPDATE student
                              SET user_pass = '$new_pass'
                              WHERE user_id = $id";
                    $result_insert = mysqli_query($conn, $insert);
                    }

                     echo "<script>alert('Profile successfully updated')</script>";
               }
               
          }

          
     }
     
?>