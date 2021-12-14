<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADVENTURE</title>
    <link rel="stylesheet" href="css/styleLogin.css">
  </head>
  <body>
    <div class="navbar">
        <nav>
            <ul class="menu">
                <li><a href="index.php#amain" class="logo">ADVENTURE</a></li>
                <li><a href="index.php#amain">Главная</a></li>
                <li><a href="index.php#atour">Туры</a></li>
                <li><a href="index.php#aabout-us">О нас</a></li>
                <li><a href="index.php#reviews">Отзывы</a></li>
                <?php if($_COOKIE['login'] == NULL): ?>
                  <li><a href="login.php" id="entrance">Войти</a></li>
                <?php else: ?>
                  <li><a href="profile.php" id="entrance"><?php echo $_COOKIE['first-name']; ?></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <div class="container">
    <div class="main">
      <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
          <form action="php/registration.php" method="post">
            <label for="chk" aria-hidden="true">Регистрация</label>
            <input type="text" name="first-name" placeholder="Имя" required="">
            <input type="text" name="last-name" placeholder="Фамилия" required="">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="password" placeholder="Пароль" required="">
            <button>Зарегистрироваться</button>
          </form>
        </div>

        <div class="login">
          <form action="php/signin.php" method="post">
            <label for="chk" aria-hidden="true">Войти</label>
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="password" placeholder="Пароль" required="">
            <button>Войти</button>
          </form>
        </div>
    </div>
    </div>
  </body>
</html>
