<?php
  include_once 'header.php';
?>
<h1>Sing Up Page</h1>
<form action="includes/signup.inc.php" method="POST">
  <?php
    if (isset($_GET['first'])) {
        $first = $_GET['first'];
        echo '<input type="text" name="first" placeholder="First name" value="'.$first.'">';
    } else {
        echo '<input type="text" name="first" placeholder="First tname">';
    }
    if (isset($_GET['last'])) {
        $last = $_GET['last'];
        echo '<input type="text" name="last" placeholder="Last name" value="'.$last.'">';
    } else {
        echo '<input type="text" name="last" placeholder="Last name">';
    }
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        echo '<input type="text" name="email" placeholder="E-mail" value="'.$email.'">';
    } else {
        echo '<input type="text" name="email" placeholder="E-mail">';
    }
    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        echo '<input type="text" name="uid" placeholder="Username" value="'.$uid.'">';
    } else {
        echo '<input type="text" name="uid" placeholder="Username">';
    }
  ?>
  <input type="password" name="pwd" placeholder="Password">
  <input type="password" name="re_pwd" placeholder="Confirm Password">
  <button type="submit" name="signup">Sign Up</button>
</form>
<?php
  include_once 'footer.php';
?>
