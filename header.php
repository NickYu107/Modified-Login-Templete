<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Carpool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<header>
  <div class="container">
    <div class="row nav-bar">
      <div class="col-4 menu-section text-left">
        <p>Menu</p>
      </div>
      <div class="col-8 login-section text-right">
        <?php
          if (isset($_SESSION['id'])) {
              echo '<form action="includes/logout.inc.php" method="POST">
                      <button type="submit" name="logout">Logout</button>
                    </form>';
          } else {
              echo '<form action="includes/login.inc.php" method="POST">
                      <input type="text" name="identifier" placeholder="Username/E-mail">
                      <input type="password" name="pwd" placeholder="Password">
                      <button type="submit" name="login">Login</button>
                      <a href="signup.php">Sign Up</a>
                    </form>';
          }
        ?>
      </div>
    </div>
  </div>
</header>
<body>
