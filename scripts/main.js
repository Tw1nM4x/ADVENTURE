let scrollPosition = 0;
let bg_speed = 0.4;
let bg_before_speed = 0.2;
let bg_sky_speed = 1;

let parallax = 0;

//При каждой прокрутке вызываем функцию Scroll()
window.addEventListener("scroll", function (e) { Scroll(e); });

function Scroll(e)
{
   let bg = document.querySelector('.fon');
   let bg_sky = document.querySelector('.sky-fon');
   let bg_before = document.querySelector('.before-fon');
   let nav = document.querySelector('nav');

   if(window.pageYOffset > 180){
     nav.setAttribute("style", "background: rgba(255, 255, 255, 0.94);");
   }else{
     nav.setAttribute("style", "background: rgba(255, 255, 255, 0.6);");
   }

   if(window.pageYOffset > scrollPosition)
   {
       parallax += (window.pageYOffset - scrollPosition);
   }
   else
   {
       parallax += (window.pageYOffset - scrollPosition);
   }

   scrollPosition = window.pageYOffset;
   bg.setAttribute("style", "background-position: " + 0 + "px " + bg_speed * parallax + "px;");
   bg_before.setAttribute("style", "background-position: " + 0 + "px " + bg_before_speed * parallax + "px;");
   bg_sky.setAttribute("style", "background-position: " + 0 + "px " + bg_sky_speed * parallax + "px;");
}

function SendReview(){
  let ReviewSend = document.querySelector('.review-send');
  if(ReviewSend.style.display == 'flex')
  ReviewSend.style.display = 'none';
  else
  ReviewSend.style.display = 'flex';
}

function Phone(){
  alert("Позвоните по телефону 8(999)999-99-99");
}
