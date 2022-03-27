<?php
   function func(){
    include "db_connect.php";
    //add university
    if(isset($_POST['Add_uni']))
    {
        echo "<form action='' method='POST'>
         <input name='admin_u_name' type='text' class='input-box' placeholder='User Name' required name='' id=''>

         <input name='university_name' type='text' class='input-box' placeholder='University Name' required name='' id=''>

         <input name='university_email' type='email' class='input-box' placeholder='University Email' required name='' id=''>

         <input name='pass' type='password' class='input-box' placeholder='password' required name='' id=''>

         <button name='add_uni' type='submit' class='submit-btn'>Add University</button>
               
         </form>";
    }

    // university status
    if(isset($_POST['Uni_status']))
    {
         echo "<form action='' method='POST'>
         <input name='university_id' type='text' class='input-box' placeholder='university id' required name='' id=''>
         <button name='deactive_s' type='submit' class='submit-btn'>Deactive</button><br>
         </form>";
         echo "<form action='' method='POST'>
         <input name='university_id' type='text' class='input-box' placeholder='university id' required name='' id=''>
         <button name='active_s' type='submit' class='submit-btn'>Active</button>     
         </form>";

     
    }

    // manage admin
    if(isset($_POST['mng_admin']))
    {
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
    }

    //add tag
    if(isset($_POST['add_tag']))
    {
     echo "<form action='' method='POST'>
     <input name='tag_name' type='text' class='input-box' placeholder='Tag' required name='' id=''>
     <button name='add_to_tag' type='submit' class='submit- '>Add</button>            
     </form>";
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
             echo "<tr> <form action='' method='POST'>
                 <td><input type='hidden' name='tag_name' value='$tag_name'/>$tag_name</input></td>
                 // <td><input type='hidden' name='tag_status' value='$status'/>$status</input></td>
                 <td><button type='submit' name='tag_approve'>Approve</button></td>
                 <td><button type='submit' name='tag_reject'>Reject</button></td>
                 </form>
                 </tr>";
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
   }
?>