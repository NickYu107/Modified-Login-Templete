<?php
  session_start();

  if (isset($_POST['login'])) {
    include 'dbh.inc.php';

    $identifier = mysqli_real_escape_string($conn, $_POST['identifier']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($identifier) || empty($pwd)) {
      header("Location: ../index.php?login=empty");
      exit();
    } else {
      $user_check_sql = "SELECT * FROM users WHERE user_id='$identifier' OR user_email='$identifier';";
      $user_check_result = mysqli_query($conn, $user_check_sql);
      $user_check_number = mysqli_num_rows($user_check_result);

      if ($user_check_number < 1) {
        header("Location: ../index.php?login=userdoesnotexist");
        exit();
      } else {
        if ($row = mysqli_fetch_assoc($user_check_result)) {
          $hashed_pwd_check = password_verify($pwd, $row['user_password']);

          if ($hashed_pwd_check == false) {
            header("Location: ../index.php?login=incorrectpassword");
            exit();
          } elseif ($hashed_pwd_check == true) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['user_firstname'] = $row['user_firstname'];
            $_SESSION['user_lastname'] = $row['user_lastname'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['user_id'] = $row['user_id'];
            // TODO: Admin access and user access status


            header("Location: ../index.php?login=success");
            exit();
          }
        }
      }
    }
  } else {
    header("Location: ../index.php?login=error1");
    exit();
  }
?>
