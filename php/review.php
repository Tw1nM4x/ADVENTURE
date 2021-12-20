<?php
  $stars = filter_var(trim($_POST['stars']), FILTER_SANITIZE_STRING);
  $review = filter_var(trim($_POST['review']), FILTER_SANITIZE_STRING);
  $email = $_COOKIE['email'];
  $name = $_COOKIE['first-name']. ' ' .$_COOKIE['last-name'];

  if(!$email){
    echo "Вы не вошли!";
    exit();
  }

  if(!$stars) {
    echo "Вы не поставили оценку!";
    exit();
  }

  if(!$review) {
    echo "Вы не написали отзыв!";
    exit();
  }

  require "connect2sql.php";

  $mysql->query("INSERT INTO `reviews`(`name`,`stars`,`text`,`email`) VALUES('$name', '$stars', '$review','$email')");

  $mysql->close();

  header('Location: ../index.php#reviews');
?>
