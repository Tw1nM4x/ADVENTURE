<?php
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
  $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

  $password = md5($password.$email);

  require "connect2sql.php";

  $result = $mysql->query("SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");

  $user = $result->fetch_assoc();
  if(!$user){
    echo "Неверно введен email или пароль";
    exit();
  }

  setcookie('email', $user['email'], time() + 3600, "/");
  setcookie('first-name', $user['first-name'], time() + 3600, "/");
  setcookie('last-name', $user['last-name'], time() + 3600, "/");
  setcookie('password', $user['hidden-password'], time() + 3600, "/");
  setcookie('avatar', 'default.jpg', time() + 3600, "/");

  $mysql->close();

  header('Location: ../profile.php');
?>
