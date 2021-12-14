<?php
  setcookie('email', $user['email'], time() - 3600, "/");
  setcookie('first-name', $user['first-name'], time() - 3600, "/");
  setcookie('second-name', $user['last-name'], time() - 3600, "/");
  setcookie('password', $user['avatar'], time() - 3600, "/");
  setcookie('avatar', "default", time() - 3600, "/");

  header('Location: /');
 ?>
