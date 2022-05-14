<?php
    include "db_connect.php";

    $qry = "SELECT * FROM tag";
    $result = mysqli_query($conn, $qry);
    $count = mysqli_num_rows($result);

?>