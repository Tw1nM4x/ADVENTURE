<?php
  $first_name = filter_var(trim($_POST['first-name']), FILTER_SANITIZE_STRING);
  $last_name = filter_var(trim($_POST['last-name']), FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
  $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

  require "connect2sql.php";

  $result = $mysql->query("SELECT * FROM `user` WHERE `email` = '$email'");
  $user = $result->fetch_assoc();
  if($user){
    echo "Вы уже зарегистрированы!";
    exit();
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Неверно введен email";
    exit();
  }
  if(mb_strlen($first_name) < 1 || mb_strlen($first_name) > 20){
    echo "Имя должно быть от 1 до 20 символ";
    exit();
  }
  if(mb_strlen($last_name) < 1 || mb_strlen($last_name) > 30){
    echo "Фамилия должна быть от 1 до 30 символов";
    exit();
  }
  if(mb_strlen($email) < 5 || mb_strlen($email) > 500){
    echo "Некоректно введен e-mail";
    exit();
  }
  if(mb_strlen($password) < 6 || mb_strlen($password) > 20){
    echo "Пароль должен быть от 6 до 20 символов";
    exit();
  }

  function get_starred($str) {
    $len = strlen($str);

    return substr($str, 0, 0).str_repeat('*', $len - 0).substr($str, $len - 1, 0);
  }
  $hidden_password = get_starred($password);

  $password = md5($password.$email);
  $token = md5($email);

  //$message = 'Что бы подтвердить Email, перейдите по http://www.sitefrommax.com/confirm_email/?token=' . $token . '';
  //mail("$email", 'Подтвердите ваш email', $message, 'From: sitefrommax@gmail.com');

  $mysql->query("INSERT INTO `user`(`first-name`,`last-name`,`email`,`password`,`hidden-password`,`token`) VALUES('$first_name', '$last_name', '$email', '$password','$hidden_password', '$token')");

  $mysql->close();

  setcookie('first-name', $first_name, time() + 3600, "/");
  setcookie('last-name', $last_name, time() + 3600, "/");
  setcookie('email', $email, time() + 3600, "/");
  setcookie('password', $hidden_password, time() + 3600, "/");
  setcookie('avatar', "default.jpg", time() + 3600, "/");

  header('Location: ../profile.php');
 ?>
