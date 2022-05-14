<?php
    include "db_connect.php";

    $qry = "SELECT * FROM tag";
    $result = mysqli_query($conn, $qry);
    $count = mysqli_num_rows($result);
    if($count==0){
        echo "<h2>No Tag in Database<h2>";
    }
    else{
        echo"<table>
        <tr>
          <th>Tag Name</th>
        </tr>";
        while($row = mysqli_fetch_assoc($result)){
            $tag_name = $row['tag_name'];
            echo" <div class='admin_form'>";
            echo "<t
                <td><input type='hidden' name='tag_name' value='$tag_name'/>$tag_name</input></td>
                </tr>";
           echo "</div>";
        }
    }

   

?>