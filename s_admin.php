<?php
  include "s_admin_back.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin</title>
    <link rel="stylesheet" href="s_admin.css">

</head>
<body>
    <div class="body">
    <!-- navigation bar -->
    <div class="navigation">
    <form action="" method="POST">
    <ul>
        <div class="options">
        <li><a><button name="Add_uni">Add University</button></a></li>

        <li><a><button name="Uni_status" type="submit">University Status</button></a></li>

        <li><a ><button name="mng_admin" type="submit">Manage Admin</button></a></li>

        <li><div class="tag"><a><button>Tag</button></a>
            <div class="dropdown-content">
                <a><button name="add_tag" type="submit">Add tag</button></a>
                <a><button name="tag_requ" type="submit">Tag Requests</button></a>
            </div></li>

        <li><a><button name="uni_list" type="submit">University List</button></a></li>
        </div>

        <div class="profile">
        <li><a><button name="logout" type="submit"> Logout</button> </a>     
        </li>
        </div>
    </ul>
    </form>
    </div>

    <!-- inner body -->
    <div class="container">
        <div class="admin_form">
          <?php func(); ?> 
        </div>
        </div>
    </div>
    </div>

</body>
</html>