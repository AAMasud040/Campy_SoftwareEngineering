<?php
     
     function func(){
          include "db_connect.php";

          $id = '011183040';
          

          if(isset($_POST['edit_profile'])){
               echo "<form action='' method='POST'>
                    <input name='user_name' type='text' class='input-box' placeholder='User Name' required name='' id=''>
     
                    <input name='gmail' type='text' class='input-box' placeholder='gmail' required name='' id=''>

                    <input name='old_pass' type='password' class='input-box' placeholder='Old password' required name='' id=''>
                    <input name='pass' type='password' class='input-box' placeholder='new password' required name='' id=''>
                    <button name='add_uni' type='submit' class='submit-btn'>Save</button>
     
                    </form>";
          }

          
     }
     
?>