<?php
   function func(){
    include "db_connect.php";
    //add university
   
    if(isset($_POST['Add_uni']))
    {
        echo" <div class='admin_form'>";
        echo "<form action='' method='POST'>
         <input name='admin_u_name' type='text' class='input-box' placeholder='User Name' required name='' id=''>

         <input name='university_name' type='text' class='input-box' placeholder='University Name' required name='' id=''>

         <input name='university_email' type='email' class='input-box' placeholder='University Email' required name='' id=''>

         <input name='pass' type='password' class='input-box' placeholder='password' required name='' id=''>

         <button name='add_uni' type='submit' class='submit-btn'>Add University</button>
               
         </form>";
         echo "</div>";
    }

    // university status
    if(isset($_POST['Uni_status']))
    {
        echo" <div class='admin_form'>";
         echo "<form action='' method='POST'>
         <input name='university_id' type='text' class='input-box' placeholder='university id' required name='' id=''>
         <button name='deactive_s' type='submit' class='submit-btn'>Deactive</button><br>
         </form>";
         echo "<form action='' method='POST'>
         <input name='university_id' type='text' class='input-box' placeholder='university id' required name='' id=''>
         <button name='active_s' type='submit' class='submit-btn'>Active</button>     
         </form>";
         echo "</div>";

     
    }

    // manage admin
    if(isset($_POST['mng_admin']))
    {
    echo" <div class='admin_form'>";
     echo "<form action='' method='POST'>
     <input name='admin_u_name' type='text' class='input-box' placeholder='User Name' required name='' id=''>

     <input name='university_id' type='text' class='input-box' placeholder='University Id' required name='' id=''>

     <input name='pass' type='password' class='input-box' placeholder='password' required name='' id=''>

     <button name='add_admin' type='submit' class='submit- '>Add admin</button>
           
     </form>";

     echo "<form action='' method='POST'>
     <input name='admin_u_name' type='text' class='input-box' placeholder='User Name' required name='' id=''>
     <button name='remove_admin' type='submit' class='submit- '>Remove admin</button>
           
     </form>";
     echo "</div>";
    }

    //add tag
    if(isset($_POST['add_tag']))
    {
        echo" <div class='admin_form'>";
     echo "<form action='' method='POST'>
     <input name='tag_name' type='text' class='input-box' placeholder='Tag' required name='' id=''>
     <button name='add_to_tag' type='submit' class='submit- '>Add</button>            
     </form>";
     echo "</div>";
    }

    //tag request
    if(isset($_POST['tag_requ']))
    {
     $qry = "SELECT *
             FROM tag
             WHERE status=0";
     $result = mysqli_query($conn, $qry);
     $count = mysqli_num_rows($result);
     if($count==0){
         echo "<h2>No Pending Tag<h2>";
     }
     else{
         echo"<table border=1>
         <tr>
           <th>Tag Name</th>
           <th>Status</th>
         </tr>";
         while($row = mysqli_fetch_assoc($result)){
             $tag_name = $row['tag_name'];
             $status = $row['status'];
             echo" <div class='admin_form'>";
             echo "<tr> <form action='' method='POST'>
                 <td><input type='hidden' name='tag_name' value='$tag_name'/>$tag_name</input></td>
                 // <td><input type='hidden' name='tag_status' value='$status'/>$status</input></td>
                 <td><button type='submit' name='tag_approve'>Approve</button></td>
                 <td><button type='submit' name='tag_reject'>Reject</button></td>
                 </form>
                 </tr>";
            echo "</div>";
         }
     }
    }

    //University list
    if(isset($_POST['uni_list']))
    {
        $qry =  "SELECT*
                FROM university";
        $result =mysqli_query($conn, $qry);
        $count = mysqli_num_rows($result);
        if($count>0){
            echo "<table border=1>
            <tr>
              <th>University Name</th>
              <th>Status</th>
              <th>Email</th>
            </tr>";
            while($row = mysqli_fetch_assoc($result)){
                $varsity_name = $row['university_name'];
                $status = $row['approval'];
                $email = $row['university_email'];
                if($status==1){
                    $avtivity = 'active';
                }
                else{
                    $avtivity = 'deactive';
                }
                echo "<tr>
                 <td >$varsity_name</td>
                 <td >$avtivity</td>
                 <td >$email</td>
                 </tr>";
            }
        }
    }

    //logout
    if(isset($_POST['logout']))
    {
     echo " Hello";
    }

    //add university
    if(isset($_POST['add_uni']))
    {
        $admin_u_name = $_POST['admin_u_name'];
        $university_name = $_POST['university_name'];
        $university_email = $_POST['university_email'];
        $pass = $_POST['pass'];

        $count = 0;

        $exsistCheck = "SELECT *
                        FROM university_authority
                        WHERE user_id = '$admin_u_name'";
         
        
         $result = $conn->query($exsistCheck);
         $count = $result->num_rows;
        
        if($count>0){
         echo '<script>alert("Username Exist, please enter a unique username")</script>';
        }
        else {
            $qry = "INSERT INTO university (university_name, university_email)
            VALUES ('$university_name', '$university_email')";
           if (mysqli_query($conn, $qry)) {
               $last_id = mysqli_insert_id($conn);
               $qry_admin = "INSERT INTO university_authority (user_id, Universityuniversity_id, user_pass)
                             VALUES ('$admin_u_name', $last_id, '$pass')";
               if(mysqli_query($conn, $qry_admin)){
                 echo '<script>alert("Successfully Added University")</script>';
               }
             }
       }
    }
    //end of add university

    //active university
    if(isset($_POST['active_s'])){
        $university_id = $_POST['university_id'];
        $qry = "SELECT *
                FROM university
                WHERE university_id = $university_id";
        $result =mysqli_query($conn, $qry);
        $count = mysqli_num_rows($result);
        if($count==0){
            echo '<script>alert("University Does not exist")</script>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
                $status = $row['approval'];
                $university_name = $row['university_name'];
                if($status==1){
                    echo '<script>alert("University is already active")</script>';
                }
                else{
                    $qry_active = "UPDATE university
                                   SET approval = 1
                                   WHERE university_id = $university_id";
                    mysqli_query($conn, $qry_active);
                    echo '<script>alert("successfully ative")</script>';
                }
            }
        }
    }
    //end of active university

    //deactive university
    if(isset($_POST['deactive_s'])){
        $university_id = $_POST['university_id'];
        $qry = "SELECT *
                FROM university
                WHERE university_id = $university_id";
        $result =mysqli_query($conn, $qry);
        $count = mysqli_num_rows($result);
        if($count==0){
            echo '<script>alert("University Does not exist")</script>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
                $status = $row['approval'];
                $university_name = $row['university_name'];
                if($status==0){
                    echo '<script>alert("University is already deactive")</script>';
                }
                else{
                    $qry_deactive = "UPDATE university
                                   SET approval = 0
                                   WHERE university_id = $university_id";
                    mysqli_query($conn, $qry_deactive);
                    echo '<script>alert("successfully deative")</script>';
                }
            }
        }
    }
    //end of deactive university

    //add a tag to tag table
    if(isset($_POST['add_to_tag'])){
        $tag_name = $_POST['tag_name'];
        $tag_check = "SELECT *
                      FROM tag
                      WHERE tag_name = '$tag_name'";
        $result = mysqli_query($conn, $tag_check);
        $count = mysqli_num_rows($result);
        if($count>0){
            echo '<script>alert("This tag  is already exist")</script>';
        }
        else {
            $qry = "INSERT INTO tag(tag_name, status)
                    VALUES('$tag_name', 1)";
            mysqli_query($conn, $qry);
            echo '<script>alert("successfully added")</script>';
        }
        
        }
        //end of add a tag to tag table

    //aprove tag
    if(isset($_POST['tag_approve'])){
        $tag_name = $_POST['tag_name'];
        $qry = "UPDATE tag
                SET status = 1
                WHERE tag_name = '$tag_name'";
        mysqli_query($conn, $qry);
        echo '<script>alert("Approved")</script>';
    }
    //end of approve tag

    //add admin
    if(isset($_POST['add_admin'])){
        $admin_u_name = $_POST['admin_u_name'];
        $university_id = $_POST['university_id'];
        $pass = $_POST['pass'];
        $qry_admin_check = "SELECT *
                            FROM university_authority
                            WHERE user_id = '$admin_u_name'";
         $admin_check_result = mysqli_query($conn, $qry_admin_check);
         $admin_count = mysqli_num_rows($admin_check_result);
         
        $qry_id_check = "SELECT *
                         FROM university
                         WHERE university_id=$university_id";
        $check_result = mysqli_query($conn, $qry_id_check);
        $count = mysqli_num_rows($check_result);
        if($admin_count==0){
            if($count>0){
                $qry = "INSERT INTO university_authority (user_id, Universityuniversity_id, user_pass)
                    VALUES ('$admin_u_name', $university_id, '$pass')";
                $result = mysqli_query($conn, $qry);
                echo '<script>alert("Added")</script>';
            }
            else{
                echo '<script>alert("This university does not exist")</script>';
            }
        }
        else  echo '<script>alert("This user id is exist")</script>';
    }
    //end of add admin

    //ban admin
    if(isset($_POST['remove_admin'])){
        $admin_u_name = $_POST['admin_u_name'];
        $qry_admin_check = "SELECT *
                            FROM university_authority
                            WHERE user_id = '$admin_u_name'";
         $admin_check_result = mysqli_query($conn, $qry_admin_check);
         $admin_count = mysqli_num_rows($admin_check_result);
         if($admin_count>0){
            $qry_uni_check = "SELECT *
            FROM university_authority
            WHERE Universityuniversity_id = (SELECT Universityuniversity_id
                                             FROM university_authority WHERE user_id='$admin_u_name')";
            $check_result = mysqli_query($conn, $qry_uni_check);
            $count = mysqli_num_rows($check_result);
            if($count>1){
                $qry_remove = "DELETE FROM university_authority WHERE user_id = '$admin_u_name'";
                $remove_result = mysqli_query($conn, $qry_remove);
                if($remove_result==true){
                    echo '<script>alert("Successfully Removed")</script>';
                }
                else echo '<script>alert("something wrong")</script>';
            }
            else{
                echo '<script>alert("Sorry! A university need atleast 1 admin")</script>';
            }
         }
         else{
            echo '<script>alert("This user id is not exist")</script>';  
         }
    }
    //end of remove admin

   
   }

?>