<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Campy: Log In</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">

  <!-- <link rel="preload" as="image" href="img.img/green.png"> -->
  <link rel="stylesheet" href="Campy_Amit\css\login.css">
</head>

<body>
  <div id="outer_layer">
    <div id="main">
      <div class="logo">
        <h1>Campy</h1>

      </div>
      <div class="info">
        <form class="" action="" method="post">
          <input type="text" name="username" placeholder="username" required>
          <input type="password" name="password" placeholder="password">

          <button type="submit" name="logIn">Log In</button>

        </form>
      </div>
    </div>
  </div>

  <?php if (isset($_POST['logIn']) and strcmp(trim($_POST['username']), 'teacher') == 0) {
    $_SESSION["ID"] = 1;
    header("Location: Campy_Amit\user_view.php");
  } 
  if (isset($_POST['logIn']) and strcmp(trim($_POST['username']), 'superadmin') == 0) {
    header("Location: Campy_Anamul\s_admin.php");
  }
  if (isset($_POST['logIn']) and strcmp(trim($_POST['username']), 'student') == 0) {
    header("Location: Campy_Anamul\Student\student.php");
  }
  if (isset($_POST['logIn']) and strcmp(trim($_POST['username']), 'admin') == 0) {
    header("Location: Campy_Rafi\base_design.php");
  }

  ?>

</body>

</html>