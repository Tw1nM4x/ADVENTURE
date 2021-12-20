<?php
  $image = $_POST['avatar'];

  function loadAvatar($avatar){
    $type = $avatar['type'];
    $name = md5(microtime()).'.'.substr($type, strlen("image/"));
    $dir = '../avatars/';
    $uploadfile = $dir.$name;
    $email = $_COOKIE['email'];

    if(move_uploaded_file($avatar['tmp_name'], $uploadfile)){
      require "../php/connect2sql.php";
      $result = $mysql->query("SELECT * FROM `user` WHERE `email` = '$email'");
      $oldAvatar = $result->fetch_assoc();
      if($oldAvatar['avatar'] != "default.jpg") unlink('../avatars/'.$oldAvatar['avatar']);
      $mysql->query("UPDATE `user` SET `avatar` = '$name' WHERE `email` = '$email'");
      $mysql->close();
      setcookie('avatar', $user['avatar'], time() - 3600, "/");
      setcookie('avatar', $name, time() + 3600 , "/");
    }else{
      return false;
    }
    return true;
  }
  $avatar = $_FILES['avatar'];
  loadAvatar($avatar);
  header('Location: ../profile.php');
?>
