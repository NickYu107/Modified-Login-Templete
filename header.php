<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simple Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<p>This is header</p>
<header>
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
            </form>
            <a href="signup.php">Sign Up</a>';
    }
  ?>
</header>
<body>
