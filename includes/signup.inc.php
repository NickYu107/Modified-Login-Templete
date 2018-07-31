<?php

if (isset($_POST['signup'])) {
  include_once 'dbh.inc.php';

  $first = mysqli_real_escape_string($conn, $_POST['first']);
  $last = mysqli_real_escape_string($conn, $_POST['last']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  $re_pwd = mysqli_real_escape_string($conn, $_POST['re_pwd']);

  if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($re_pwd)) {
    header("Location: ../signup.php?signup=empty&first=$first&last=$last&email=$email&uid=$uid");
    exit();
  } elseif (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
    header("Location: ../signup.php?signup=invalid&email=$email&uid=$uid");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?signup=invalidemail&first=$first&last=$last&uid=$uid");
    exit();
  } elseif ($re_pwd != $pwd) {
    // TODO: Password security check, length and special characters


    header("Location: ../signup.php?signup=passwodnotmatch&first=$first&last=$last&uid=$uid&email=$email");
    exit();
  } else {
    //Check unique user_id
    $userid_check_sql = "SELECT * FROM users WHERE user_id='$uid';";
    $userid_check_result = mysqli_query($conn, $userid_check_sql);
    $userid_check_number = mysqli_num_rows($userid_check_result);

    if ($userid_check_number > 0) {
        header("Location: ../signup.php?signup=usernametaken&first=$first&last=$last&email=$email");
        exit();
    } else {
      //Check unique email
      $email_check_sql = "SELECT * FROM users WHERE user_email='$email';";
      $email_check_result = mysqli_query($conn, $email_check_sql);
      $email_check_number = mysqli_num_rows($email_check_result);

      if ($email_check_number > 0) {
        header("Location: ../signup.php?signup=emailexist&first=$first&last=$last&uid=$uid");
        exit();
      } else {
          $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

          $signup_sql = "INSERT INTO users (user_firstname, user_lastname, user_email, user_id, user_password)
          VALUES ('$first', '$last', '$email', '$uid', '$hashed_pwd');";
          mysqli_query($conn, $signup_sql);
          header("Location: ../signup.php?signup=success");
          exit();
      }
    }
  }
} else {
    header("Location: ../signup.php?signup=error");
    exit();
}
