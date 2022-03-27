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
   }
?>