<?php
include "db_connect.php";

$content = [];

$qry = "SELECT * FROM tag";
$result = mysqli_query($conn, $qry);
$count = mysqli_num_rows($result);

$content[] = "<table>
         <tr>
           <th>Tag Name</th>
         </tr>";
while ($row = mysqli_fetch_assoc($result)) {
            $tag_name = $row['tag_name'];
            $content[] = "
                    <tr>
                    <td><input type='hidden' name='tag_name' value='$tag_name'/>$tag_name</input></td>
                    </tr>
                ";
        
    }
$content[]  ="</table>";

$data = ["status" => "ok", "content" => $content];
header('Content-type: application/json');
echo json_encode($data);

?>