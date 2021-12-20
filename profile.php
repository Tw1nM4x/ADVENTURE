<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
  <script type="text/javascript" src="scripts/profile.js"></script>
  <?php if($_COOKIE['first-name'] == NULL){
    header('Location: /');
  }?>
  <div class="load-avatar" onclick="NewAvatar()">
    <div class="loadavatar">
      <form action="../php/avatar.php" method="post" enctype="multipart/form-data">
        <input
            type="file"
            name="avatar"
            id="upload-file__input_1"
            class="upload-file__input"
            accept=".jpg, .jpeg, .png"
            multiple
        >
        <label class="upload-file__label" for="upload-file__input_1">
            <svg class="upload-file__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M286 384h-80c-14.2 1-23-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c11.6 11.6 3.7 33.1-13.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-23-23V366c0-13.3 10.7-24 24-24h136v8c0 31 24.3 56 56 56h80c30.9 0 55-26.1 57-55v-8h135c13.3 0 24 10.6 24 24zm-124 88c0-11-9-20-19-20s-19 9-20 20 9 19 20 20 21-9 20-20zm64 0c0-12-9-20-20-20s-20 9-19 20 9 20 20 20 21-9 20-20z">
                </path>
            </svg>
            <span class="upload-file__text">Прикрепить файл</span>
        </label>
        <button type="sumbit" name = "set_avatar">Изменить</button>
      </form>
    </div>
  </div>
  <div class="navbar">
      <nav>
          <ul class="menu">
              <li><a href="index.php#amain" class="logo">ADVENTURE</a></li>
              <li><a href="index.php#amain">Главная</a></li>
              <li><a href="index.php#atour">Туры</a></li>
              <li><a href="index.php#reviews">Отзывы</a></li>
              <li><a href="index.php#aabout-us">О нас</a></li>
              <li><a href="php/exit.php" id="entrance">Выйти</a></li>
          </ul>
      </nav>
  </div>
    <div class="avatar" onclick="NewAvatar()">
      <img src="../avatars/<?php echo $_COOKIE['avatar'];?>" class="avatar">
      <img src="img/photo.png" class="load-photo">
    </div>
    <div class="info">
        <div class="name-surname">
            <div class="text-name">Имя</div>
            <div class="name"><?php echo $_COOKIE['first-name']; ?></div>
            <div class="text-surname">Фамилия</div>
            <div class="surname"><?php echo $_COOKIE['last-name']; ?></div>
        </div>
        <div class="mail-pass">
            <div class="text-mail">Почта</div>
            <div class="mail"><?php echo $_COOKIE['email']; ?></div>
            <div class="text-pass">Пароль</div>
            <div class="pass"><?php echo $_COOKIE['password']; ?></div>
        </div>
    </div>
    <div class="reviews">
            <form action="index.php#reviews">
            <button>Оставить отзыв</button>
            </form>
            <div class="reviews-with">Оставленно отзывов: <span class="with">0</span></div>
    </div>
</body>
</html>
