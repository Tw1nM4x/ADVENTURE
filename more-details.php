<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/more-details.css">
    <title>Document</title>
</head>
<body>
  <div class="navbar">
      <nav>
          <ul>
              <li><a href="index.php#amain" class="logo">ADVENTURE</a></li>
              <div class="menu">
                <li><a href="index.php#amain">Главная</a></li>
                <li><a href="index.php#atour">Туры</a></li>
                <li><a href="index.php#reviews">Отзывы</a></li>
                <li><a href="index.php#aabout-us">О нас</a></li>
                <?php if($_COOKIE['first-name'] == NULL): ?>
                  <li><a href="login.php" id="entrance">Войти</a></li>
                <?php else: ?>
                  <li><a href="profile.php" id="entrance"><?php echo $_COOKIE['first-name']; ?></a></li>
                <?php endif; ?>
              </div>
          </ul>
      </nav>
  </div>
    <?php
      require "php/connect2sql.php";
      $tour = $_GET['tour'];
      $result = $mysql->query("SELECT * FROM `tours` WHERE `id` = '$tour'");
      $tours = $result->fetch_assoc();
      echo '
      <div class="name-md">' .$tours['name']. '</div>
      <div class="main-md">
        <img src="../img/tours/big/' .$tours['id']. '.png" class="foto-md">
        <div class="description-md">
          <div class="description-text"> ' .$tours['text']. ' </div>
          <div class="price-md"> ' .$tours['price']. ' </div>
        </div>
      </div>
      '
     ?>
</body>
</html>
