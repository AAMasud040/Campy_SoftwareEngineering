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
   }
?>