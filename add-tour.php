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
  <script type="text/javascript" src="scripts/profile.js"></script>
  <div class="addnavbar">
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
  <form action="../php/addtour2db.php" method="post" enctype="multipart/form-data" class="button">
    <textarea name="name" class="addname-md" placeholder="Напишите имя тура" required></textarea>
    <div class="main-md">
      <div class="description-md">
        <input type="file" name="photo" id="upload-file__input_1" class="upload-file__input" accept=".jpg, .jpeg, .png">
        <label class="upload-file__label" for="upload-file__input_1">
            <svg class="upload-file__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M286 384h-80c-14.2 1-23-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c11.6 11.6 3.7 33.1-13.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-23-23V366c0-13.3 10.7-24 24-24h136v8c0 31 24.3 56 56 56h80c30.9 0 55-26.1 57-55v-8h135c13.3 0 24 10.6 24 24zm-124 88c0-11-9-20-19-20s-19 9-20 20 9 19 20 20 21-9 20-20zm64 0c0-12-9-20-20-20s-20 9-19 20 9 20 20 20 21-9 20-20z">
                </path>
            </svg>
            <span class="upload-file__text">Прикрепить фото</span>
        </label>
      </div>
      <div class="description-md">
        <textarea name="description" class="description-text" placeholder="Напишите описание тура" required></textarea>
        <textarea name="price" class="price-md" placeholder="Напишите стоимость тура" required></textarea>
      </div>
    </div>
    <button>Добавить тур</button>
  </form>
</body>
</html>
