<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADVENTURE</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <script type="text/javascript" src="scripts/main.js"></script>
    <div class="review-send">
      <div class="review-send-fon" onclick="SendReview()"></div>
        <form action="../php/review.php" method="post" class="review-send-front">
            <div class="reviews-text" style="margin-top: 0px; line-height: 30px;
            font-size: 40px; height: 60px;">Мой отзыв</div>
            <div class="rating">
              <input type="radio" required name="stars" value="5" id="rating-5">
              <label for="rating-5">★</label>
              <input type="radio" required name="stars" value="4" id="rating-4">
              <label for="rating-4">★</label>
              <input type="radio" required name="stars" value="3" id="rating-3">
              <label for="rating-3">★</label>
              <input type="radio" required name="stars" value="2" id="rating-2">
              <label for="rating-2">★</label>
              <input type="radio" required name="stars" value="1" id="rating-1">
              <label for="rating-1">★</label>
            </div>
            <textarea name="review" id="review" required cols="30" rows="4" placeholder="Введите отзыв" maxlength="200"></textarea>
            <button type="sumbit" id="button">Отправить</button>
        </form>
    </div>
    <section class="sky-fon"> </section>
    <section class="fon"> </section>
    <section class="before-fon"> </section>
    <div id="amain"></div>
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="#amain" class="logo">ADVENTURE</a></li>
                <div class="menu">
                  <li><a href="#amain">Главная</a></li>
                  <li><a href="#atour">Туры</a></li>
                  <li><a href="#reviews">Отзывы</a></li>
                  <li><a href="#aabout-us">О нас</a></li>
                  <?php if($_COOKIE['first-name'] == NULL): ?>
                    <li><a href="login.php" id="entrance">Войти</a></li>
                  <?php else: ?>
                    <li><a href="profile.php" id="entrance"><?php echo $_COOKIE['first-name']; ?></a></li>
                  <?php endif; ?>
                </div>
            </ul>
        </nav>
    </div>
    <div class="text" id="">
        <center>Турагенство<br>Отдых мечты</center>
    </div>
    <div class="tour-main">
      <?php
        require "php/connect2sql.php";
        $tour = 1;
        while($tour < 4){
        $result = $mysql->query("SELECT * FROM `tours` WHERE `id` = '$tour'");
        $tours = $result->fetch_assoc();
        echo '
        <div class="tour-main1">
            <img src="../img/tours/small/' .$tours['id']. '.png" class="tour-main-image1">
            <div class="tour-main-text1">
                <div class="tour-name1">' .$tours['name']. '
                    <div class="line1"></div>
                </div>
                <div class="tour-description1">' .$tours['review']. '</div>
                <div class="tour-more-detailed1"><div class="detailed1"><a href="../more-details.php?tour=' .$tours['id']. '" class="detailedcolor">Подробнее</a></div></div>
            </div>
        </div>
        ';
        $tour = $tour + 1;
       }
       ?>
    </div>
    <div class="button-main">
        <div class="button-l"></div>
        <div class="button-r"></div></div>
    </div>
    <div class="steps-text">Всего 3 шага до отдыха вашей мечты</div>
    <div class="steps">
        <div class="steps-1" id="steps">
            <div class="steps-number-1">1</div>
            <div class="steps-text-block-1">Выберите</div>
            <div class="steps-line"></div>
            <div class="steps-text-block-11">Выберите отдых <br> своей мечты в <br> разделе "Туры"</div>
        </div>
        <div class="steps-2" id="steps">
            <div class="steps-number-2">2</div>
            <div class="steps-text-block-2">Позвоните</div>
            <div class="steps-line"></div>
            <div class="steps-text-block-22">Свяжитесь с нашим <br> оператором по <br> телефону <br> 8(999)999-99-99</div>
        </div>
        <div class="steps-3" id="steps">
            <div class="steps-number-3">3</div>
            <div class="steps-text-block-3">Наслаждайтесь</div>
            <div class="steps-line"></div>
            <div class="steps-text-block-33">Закажите тур и через <br> несколько дней <br> наслаждайтесь <br> незабываемым <br> отпуском</div>
        </div>
    </div>
    <a class="steps-link"><div class="steps-to-contact" onclick="Phone()">Связаться</div></a>
    <div id="atour"></div>
    <div class="tours-text-main">Туры</div>
    <div class="tours">
        <div class="tour-main" id="tours">
            <div class="tour-main1">
                <div class="tour-main-image1"></div>
                <div class="tour-main-text1">
                    <div class="tour-name1">Мальдивы
                        <div class="line1"></div>
                    </div>
                    <div class="tour-description1">Не забываемый отдых <br> на краю океана.</div>
                    <div class="tour-more-detailed1"><div class="detailed1"><a href="add-tour.php" class="detailedcolor">Подробнее</a></div></div>
                </div>
            </div>
            <div class="tour-main2">
                <div class="tour-main-image2"></div>
                <div class="tour-main-text2">
                    <div class="tour-name2">Бали
                        <div class="line2"></div>
                    </div>
                    <div class="tour-description2">Наслаждайтесь каждой <br> секундой.</div>
                    <div class="tour-more-detailed2"><div class="detailed2"><a href="" class="detailedcolor">Подробнее</a></div></div>
                </div>
            </div>
            <div class="tour-main3">
                <div class="tour-main-image3"></div>
                <div class="tour-main-text3">
                    <div class="tour-name3">Венеция
                        <div class="line3"></div>
                    </div>
                    <div class="tour-description3">Страна которая поразит <br> вас своей красотой.</div>
                    <div class="tour-more-detailed3"><div class="detailed3"><a href="" class="detailedcolor">Подробнее</a></div></div>
                </div>
                </div>
            </div>
            <div class="tour-main" id="tours-line2">
                <div class="tour-main1">
                    <div class="tour-main-image1"></div>
                    <div class="tour-main-text1">
                        <div class="tour-name1">Мальдивы
                            <div class="line1"></div>
                        </div>
                        <div class="tour-description1">Не забываемый отдых <br> на краю океана.</div>
                        <div class="tour-more-detailed1"><div class="detailed1"><a href="" class="detailedcolor">Подробнее</a></div></div>
                    </div>
                </div>
                <div class="tour-main2">
                    <div class="tour-main-image2"></div>
                    <div class="tour-main-text2">
                        <div class="tour-name2">Бали
                            <div class="line2"></div>
                        </div>
                        <div class="tour-description2">Наслаждайтесь каждой <br> секундой.</div>
                        <div class="tour-more-detailed2"><div class="detailed2"><a href="" class="detailedcolor">Подробнее</a></div></div>
                    </div>
                </div>
                <div class="tour-main3">
                    <div class="tour-main-image3"></div>
                    <div class="tour-main-text3">
                        <div class="tour-name3">Венеция
                            <div class="line3"></div>
                        </div>
                        <div class="tour-description3">Страна которая поразит <br> вас своей красотой.</div>
                        <div class="tour-more-detailed3"><div class="detailed3"><a href="" class="detailedcolor">Подробнее</a></div></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="reviews">
      <div id="reviews"></div>
        <div class="reviews-text">Отзывы</div>
        <div class="reviews-content">
        <?php
          require "php/connect2sql.php";

          $query = mysqli_query($mysql, "SELECT * FROM `reviews` ORDER BY `id` DESC");

          if(!mysqli_num_rows($query)) exit('Пока пусто');

          while($row = mysqli_fetch_assoc($query)){
          $email = $row['email'];
          $result = $mysql->query("SELECT * FROM `user` WHERE `email` = '$email'");
          $users = $result->fetch_assoc();
          echo '
          <div class="review">
              <div class="review-content">
                  <img src="../avatars/' .$users['avatar']. '" class="review-avatar">
                  <div class="review-name-text">
                      <div class="review-name">' .$row['name']. '</div>
                      <div class="stars">'; if($row['stars'] == 1) echo '★';
                      if($row['stars'] == 2) echo '★★';
                      if($row['stars'] == 3) echo '★★★';
                      if($row['stars'] == 4) echo '★★★★';
                      if($row['stars'] == 5) echo '★★★★★';
                      echo '</div>
                      <div class="review-text">' .$row['text']. '</div>
                  </div>
              </div>
          </div>';
          }
          $mysql->close();
        ?>
        </div>
        <?php if($_COOKIE['first-name'] != NULL): ?>
        <div class="button-review-send" onclick="SendReview()">Написать отзыв</div>
        <?php endif; ?>
    </div>
    <div id="aabout-us"></div>
    <div class="about">
        <div class="about-us">О нас</div>
        <div class="about-us-text">Наше турагентсво признано лучшим за 2021 <br>
         год по версии журнала “Forbes”. <br>
         У нас работают только профессионалы и <br> слово клиента для нас закон.
        </div>
        <div class="about-us-image"></div>
    </div>
    <footer class="">
        <div class="footer-content">
            <div id="footer-contant">
                <div class="footer-name-number">
                    <div class="footer-name">ADVENTURE</div>
                    <div class="footer-number">
                        <div class="phone-image"></div>
                        <div class="phone-number-footer">+7(999)999-99-99</div>
                    </div>
                </div>
                <div class="footer-mail">
                    <div class="footer-icons">
                        <div class="footer-twit"></div>
                        <div class="footer-fb"></div>
                        <div class="footer-tg"></div>
                        <div class="footer-inst"></div>
                    </div>
                    <div id="mail">
                        <div class="mail-image"></div>
                        <div class="mail-text">adventure@gmail.com</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-text">
            <div id="fotter-text">© 2021 “ADVENTURE”</div>
        </div>
    </footer>
</body>
</html>
