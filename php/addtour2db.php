<?php
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
$review = filter_var(trim($_POST['review']), FILTER_SANITIZE_STRING);
$smallimage = $_POST['smallphoto'];
$bigimage = $_POST['bigphoto'];

require "connect2sql.php";

$mysql->query("INSERT INTO `tours`(`name`,`text`,`review`,`price`) VALUES('$name', '$description', 'review', '$price')");

$mysql->close();

function loadSmallPhoto($avatar){
  require "connect2sql.php";
  $result = $mysql->query("SELECT * FROM `tours` ORDER BY `id` DESC LIMIT 1");
  $row = $result->fetch_assoc();

  $dir = '../img/tours/small/';
  $uploadfile = $dir.$row['id'].".png";
  move_uploaded_file($avatar['tmp_name'], $uploadfile);
  $mysql->close();
  return true;
}
$avatar = $_FILES['smallphoto'];
loadSmallPhoto($avatar);

function loadBigPhoto($avatar){
  require "connect2sql.php";
  $result = $mysql->query("SELECT * FROM `tours` ORDER BY `id` DESC LIMIT 1");
  $row = $result->fetch_assoc();

  $dir = '../img/tours/big/';
  $uploadfile = $dir.$row['id'].".png";
  move_uploaded_file($avatar['tmp_name'], $uploadfile);
  $mysql->close();
  return true;
}
$avatar = $_FILES['bigphoto'];
loadBigPhoto($avatar);

header('Location: ../index.php#atour');
?>
