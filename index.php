<?php
    include_once 'header.php';
?>

<h1>Home Page</h1>
<?php
  if (isset($_SESSION['id'])) {
    echo '<h1>Hi '.$_SESSION['user_firstname'].' '.$_SESSION['user_lastname'].'</h1>';
  };
?>
<?php
    include_once 'footer.php';
?>
