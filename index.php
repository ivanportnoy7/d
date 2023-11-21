<?php session_start();
if(!isset($_SESSION['utms'])) {
    $_SESSION['utms'] = array();
    $_SESSION['utms']['utm_source'] = '';
    $_SESSION['utms']['utm_medium'] = '';
    $_SESSION['utms']['utm_term'] = '';
    $_SESSION['utms']['utm_content'] = '';
    $_SESSION['utms']['utm_campaign'] = '';
}
$_SESSION['utms']['utm_source'] = $_GET['utm_source'];
$_SESSION['utms']['utm_medium'] = $_GET['utm_medium'];
$_SESSION['utms']['utm_term'] = $_GET['utm_term'];
$_SESSION['utms']['utm_content'] = $_GET['utm_content'];
$_SESSION['utms']['utm_campaign'] = $_GET['utm_campaign'];
$_SESSION['server']['referer'] = $_SERVER['HTTP_REFERER'];

$json = file_get_contents(__DIR__ . "/save/data.json");
$data = json_decode($json);
include (__DIR__ . '/admin/config.php');

$md_time = 0;

if (isset($timer)) {
    $md_time = strtotime($timer);
}

$date_min = new DateTime($start_work); // минимальное значение времени
$date_max = new DateTime($end_work); // максимальное значение времени	
$date_now = new DateTime(); // текущее значение времени

?>



<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo strip_tags(addslashes(trim(preg_replace('/\s+/', ' ', $data->title1_1)))); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=320, user-scalable=no">
        <link rel="stylesheet" href="assets/fonts/pf.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/normalize.min.css">
        <?php
			if ($skidka_button) {
				echo '<link rel="stylesheet" href="assets/css/main.css?v='.rand(100, 9999).'">';
			}
			else{
				echo '<link rel="stylesheet" href="assets/css/main2.css?v='.rand(100, 9999).'">';
			}
		?>
        <?php if (isset($theme) && (int) $theme !== 0) { ?>
            <link rel="stylesheet" href="assets/css/theme_<?php echo $theme; ?>.css?v=<?php echo rand(100, 9999); ?>">
        <?php } ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
        <link rel="icon" href="http://traffic-master.taraslevchik.com/fav/favicon-16x16.png" type="image/x-icon" id="css_before">
        <link rel="shortcut icon" href="http://traffic-master.taraslevchik.com/fav/favicon-16x16.png" type="image/x-icon">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
<?php foreach ($data as $key => $val) { ?>
                    $("[data-editable][data-name='<?php echo $key; ?>']").html("<?php echo addslashes(trim(preg_replace('/\s+/', ' ', $val))); ?>");
<?php } ?>
            });
        </script>
        <style>.bene_del, .add_bene, .add_slider{display: none} .video{min-height: initial;} .video > div{min-height: initial; height: auto;}.photo_single{background:none}</style>
        <style>
		
		</style>
	   <?= $head_index ?>

       <script type="text/javascript">
function clock(el) {
var d = new Date();
var month_num = d.getMonth()
var day = d.getDate();
var hours = d.getHours();
var minutes = d.getMinutes();
var seconds = d.getSeconds();

month=new Array("01", "02", "03", "04", "05", "06",
"07", "08", "09", "10", "11", "12");

if (day <= 9) day = day;
if (hours <= 9) hours = "0" + hours;
if (minutes <= 9) minutes = "0" + minutes;
if (seconds <= 9) seconds = "0" + seconds;

var date_time = new Date(d.getTime() + 86400000); // + 1 day in ms
date_time.toLocaleDateString();
date_time = date_time.getDate()+'.'+month[date_time.getMonth()] +'.'+date_time.getFullYear()  +' р.';

if (document.layers) {
 document.layers.doc_time.document.write(date_time);
 document.layers.doc_time.document.close();
}
else document.getElementById(el).innerHTML = date_time;
 setTimeout("clock()", 1000);
}
</script>

<style>.znishka {
      margin-bottom: 0px;
                        font-size: 18px;
    background: #fff56d;
    padding: 10px;
    text-align: center !important;
    color: #000;
                }
    .aar {
      padding-bottom: 40px;
        padding-top: 30px;
    }
</style>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1098634144276409');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1098634144276409&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

    </head>
    <body>

    <style>.menulog {
    display: none
}
  .menu {
    text-align: center;padding: 8px 0;background: #ececec;
	
}

.menu__links-item img {
    vertical-align: middle;
}

.menu__icon {
   display: none;
   width: 45px;
   height: 35px;
   position: relative;
   cursor: pointer;
}

.menu__icon span {
  display: block;
  position: absolute;
  height: 5px;
  width: 100%;
  background: #333333;
  border-radius: 9px;
  opacity: 1;
  left: 0;
  transform: rotate(0deg);
  transition: .25s ease-in-out;
}

.menu__icon span:nth-child(1) {
  top: 0px;
}

.menu__icon span:nth-child(2), .menu__icon span:nth-child(3) {
  top: 13px;
}

.menu__icon span:nth-child(4) {
  top: 26px;
 }

.menu__links-item {
    display: inline-block;
    color: #333333;
    font-family: Arial;
    font-size: 14px;
    line-height: 30px;
    padding: 0 10px;
    text-transform: uppercase;
    text-decoration: none;
}

.menu__links-item:hover {
    text-decoration: underline;
}

.menu.menu_state_open .menu__icon span:nth-child(1) {
  top: 18px;
  width: 0%;
  left: 50%;
}

.menu.menu_state_open .menu__icon span:nth-child(2) {
  transform: rotate(45deg);    background: #fff;
}

.menu.menu_state_open  .menu__icon span:nth-child(3) {
  transform: rotate(-45deg);    background: #fff;
}

.menu.menu_state_open  .menu__icon span:nth-child(4) {
  top: 18px;
  width: 0%;
  left: 50%;
}

.menu.menu_state_open .menu__links {
  display: block;  
}

@media screen and (max-width: 999px) {
	  .menulog {
		  width: 100%; max-width: 55px; margin-left: 8px;margin-top: 0px;
    display: block
}
  .menu {
    text-align: right;
padding-top: 10px;
padding-right: 15px;
display: flex;
    justify-content: space-between;
    align-items: center;
}
  .menu__icon{
    display: inline-block; z-index: 900;
  }
  
  .menu__links {
    position: fixed;
    display: none;
    top: 0;
    right: 0;
    left: 0;
	    height: 100%;
        padding-top: 50px;
    background-color: rgba(0, 0, 0, 0.9);
    z-index: 100;
    overflow: auto;
  }
  
  .menu__links-item {
    display: block;
    padding: 10px 0;
    text-align: center;
    color: #ffffff;font-size: 24px;
    line-height: 45px;
  }  
  
  .menu__links-item-mob {
    display: none;
  }
  
}
  </style> 
  
<!-- partial:index.partial.html -->
<div class="menu"><img class="menulog" src="../logo11.png"  >
    <div class="menu__icon">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  
    <div class="menu__links">
        <a class="menu__links-item menu__links-item-mob" href="../index.html"><img  class="" src="../logo11.png" style=" width: 100%; max-width: 60px;"></a>
        <!--a class="menu__links-item" href="../">Главная</a-->
        <a class="menu__links-item" href="../household.php.html">Для Дома</a>
        <a class="menu__links-item" href="../auto.php.html">Авто</a>
        <a class="menu__links-item" href="../kids.php.html">Детские Товары</a>
        <a class="menu__links-item" href="../clothes.php.html">Одежда и Аксессуары</a>
        <a class="menu__links-item" href="../health.php.html">Красота и здоровье</a>
        <a class="menu__links-item" href="../gadget.php.html">Электроника и Гаджеты</a>
        <a class="menu__links-item" href="../sport.php.html">Спорт</a>
         
    </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script><script>(function($){
  $(function() {
    $('.menu__icon').on('click', function() {
      $(this).closest('.menu').toggleClass('menu_state_open');
    });
  });
})(jQuery);</script>


        <?= $body_index ?>
        <section class="title">
            <h1 class="pf" data-editable data-name="title1_1"><p></p></h1>
            <h2 data-editable data-name="title1_2"><p></p></h2>
        </section>
        <section class="photo_single" data-editable data-name="photo_single1"></section>
        <section class="prices">
            <ul>
				<?php 
					if ($skidka_button) {
						echo '
						<li><div><p>Звичайна ціна</p></div><strong class="pf"><p>'.$price_old.$valuta.'</p></strong></li>
						<li><div><p>Знижка</p></div><strong class="pf"><p>'.$skidka.'%</p></strong></li>
						<li><div><p>Ціна зараз</p></div><strong class="pf"><p>'.$price_new.$valuta.'</p></strong></li>
						';
					} else {
						echo '
						<li><div><p>Ціна зараз</p></div><strong class="pf"><p>'.$price_new.$valuta.'</p></strong></li>
						';
					}
				
				?>
            </ul>
            <div class="znishka">
                    <b>Знижка діє з 20.09.2022 по  <span id="doc_time">Дата и время</span><script type="text/javascript">clock('doc_time');</script></b>
                    </div>
        </section>
        <section class="benefits">
            <li id="bene_ref" style="display: none"><div data-editable data-name="" class="bene_img"><img src="assets/svg/001-check.svg"></div><div data-editable data-name="" class="bene_text"><p>Описание качества товара</p></div><span class="bene_del"></span></li>
            <div class="container">
                <?php
                $b = Array();
                foreach ($data as $key => $bene) {
                    $row = explode("-", $key);
                    if ($row[0] !== "bene") {
                        continue;
                    }
                    $b[(int) $row[1]][$row[2]] = $bene;
                }
                ?>
                <ul>
                    <?php foreach ($b as $key => $row) { ?>
                        <li><div data-editable data-name="bene-<?php echo $key; ?>-img" class="bene_img"></div><div data-editable data-name="bene-<?php echo $key; ?>-text" class="bene_text"></div><span class="bene_del"></span></li>
                    <?php } ?>
                </ul>
                <div class="add_bene"></div>
            </div>
        </section>
        <section class="timer">
            <div>

				<?php 
					if ($timer_button) {
						 echo '
							
						 ';
					 }
					 else{
						 echo '';
					 }
					 if ($date_now >= $date_min && $date_now <= $date_max && $phone_button) {
						 echo '<a href="tel:'.$manager_phone.'" class="pf">'.$call_button.'</a>';
					 }
					 else{
						 echo '<a href="javascript: go()" class="pf">'.$all_button.'</a>';
					 }
					 if ($skidka_button) {
						 echo ' ';
					 }
					 else{
						 echo '';
					 }
				 ?>
                 
            </div>
        </section>
        <section class="video">
            <div data-editable data-name="video"></div>
        </section>
        <section class="slider">
            <div id="slider_ref" data-editable data-name="" style="display: none" class="md_slide"><p></p></div>
            <div class="wrapper" id="slider">
                <?php
                $s = Array();
                foreach ($data as $key => $sl) {
                    $row = explode("-", $key);
                    if ($row[0] !== "slide") {
                        continue;
                    }
                    $s[(int) $row[1]] = $sl;
                }
                foreach ($s as $key => $row) {
                    ?>
                    <div data-editable data-name="" class="md_slide"><?php echo $row; ?></div>
                <?php } ?>
            </div>
            <div class="slider_mini" id="slider_nav">
                <?php foreach ($s as $key => $row) { ?>
                    <div data-editable data-name="" class="md_slide_mini"><?php echo $row; ?></div>
                <?php } ?>
            </div>
        </section>
        <section class="bullets">
            <div class="container">
                <h2 class="pf" data-editable data-name="bullets_h2"><p></p></h2>
                <p class="pf" data-editable data-name="bullets_p"><p></p></p>
                <ul>
                    <li>
                        <i data-editable data-name="bullets1_img"><img src="assets/svg/001-check.svg"></i>
                        <h3 class="pf" data-editable data-name="bullets1_h3"><p></p></h3>
                        <div data-editable data-name="bullets1_p"><p></p></div>
                    </li>
                    <li>
                        <i data-editable data-name="bullets2_img"><img src="assets/svg/001-check.svg"></i>
                        <h3 class="pf" data-editable data-name="bullets2_h3"><p></p></h3>
                        <div data-editable data-name="bullets2_p"><p></p></div>
                    </li>
                    <li>
                        <i data-editable data-name="bullets3_img"><img src="assets/svg/001-check.svg"></i>
                        <h3 class="pf" data-editable data-name="bullets3_h3"><p></p></h3>
                        <div data-editable data-name="bullets3_p"><p></p></div>
                    </li>
                    <li>
                        <i data-editable data-name="bullets4_img"><img src="assets/svg/001-check.svg"></i>
                        <h3 class="pf" data-editable data-name="bullets4_h3"><p></p></h3>
                        <div data-editable data-name="bullets4_p"><p></p></div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="timer">
            <div>
				<?php 
					if ($timer_button) {
						 echo '
							
						 ';
					 }
					 else{
						 echo '';
					 }
					 if ($date_now >= $date_min && $date_now <= $date_max && $phone_button) {
						 echo '<a href="tel:'.$manager_phone.'" class="pf">'.$call_button.'</a>';
					 }
					 else{
						 echo '<a href="javascript: go()" class="pf">'.$all_button.'</a>';
					 }
					 if ($skidka_button) {
						 echo '';
					 }
					 else{
						 echo '';
					 }
				 ?>
            </div>
        </section>
        <section class="steps">
            <div class="container">
                <h3 class="pf" data-editable data-name="steps_h3"><p></p></h3>
                <ul>
                    <li>
                        <i data-editable data-name="steps1_img"></i>
                        <div data-editable data-name="steps1_p"><p></p></div>
                    </li>
                    <li>
                        <i data-editable data-name="steps2_img"></i>
                        <div data-editable data-name="steps2_p"><p></p></div>
                    </li>
                    <li>
                        <i data-editable data-name="steps3_img"></i>
                        <div data-editable data-name="steps3_p"><p></p></div>
                    </li>
                    <li>
                        <i data-editable data-name="steps4_img"></i>
                        <div data-editable data-name="steps4_p"><p></p></div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="reviews">
            <div class="container">
                <h2 class="pf" data-editable data-name="reviews_h2"><p></p></h2>
                <div class='wrapper'>
                    <?php
                    $r = Array();
                    foreach ($data as $key => $rew) {
                        $row = explode("-", $key);
                        if ($row[0] !== "review") {
                            continue;
                        }
                        $r[(int) $row[1]][$row[2]] = $rew;
                    }
                    $count = 1;
                    foreach ($r as $key => $row) {
                        if ($count % 2 === 1) {
                            ?>
                            <div class="review_two">
                            <?php } ?>
                            <div class='review'>
                                <div data-editable data-name="" class="review_img"><?php echo $row['img']; ?></div>
                                <h3 data-editable data-name="" class="review_h3"><?php echo $row['h3']; ?></h3>
                                <div style="clear: both"></div>
                                <div data-editable data-name="" class="review_text"><?php echo $row['text']; ?></div>
                            </div>
                            <?php if ($count % 2 === 0) { ?>
                            </div>
                            <?php
                        }
                        $count++;
                    }
                    if ($count === 0) {
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="form">
		<div class="container">

			<form class="m1-form" action="" method="post" onsubmit="if (this.name.value == "") {
									alert(" Введите Ваше имя!"); return false } if (this.phone.value=="" ) { alert("Введите Ваш номер телефона!");
				return false } return true;">
				<input class="field" name="name" type="text" placeholder="Введіть відгук та кількість зірок" required>
				<button class="button-m" data-name="form_button" id="submit">
					<p class="pf">Залишити Відгук</p>
				</button>
				<script>
             document.querySelector("#submit").onclick = function () {
               alert("Ваш Отзыв Был отправлен")
             }
           </script>
			</form>


		</div>
	</section>

    <section class="title">
        <h1 class="pf" data-editable data-name="title2_1"><p></p></h1>
        <h2 data-editable data-name="title2_2"><p></p></h2>
    </section>
    <section class="photo_single" data-editable data-name="photo_single2"></section>
    <section class="prices">
        <ul>
            <?php 
					if ($skidka_button) {
						echo '
						<li><div><p>Звичайна ціна</p></div><strong class="pf"><p>'.$price_old.$valuta.'</p></strong></li>
						<li><div><p>Знижка</p></div><strong class="pf"><p>'.$skidka.'%</p></strong></li>
						<li><div><p>Ціна зараз</p></div><strong class="pf"><p>'.$price_new.$valuta.'</p></strong></li>
						';
					} else {
						echo '
						<li><div><p>Ціна зараз</p></div><strong class="pf"><p>'.$price_new.$valuta.'</p></strong></li>
						';
					}
				
				?>
        </ul>
        <div class="znishka">
                    <b>Знижка діє з 20.09.2022 по  <span id="doc_time2">Дата и время</span><script type="text/javascript">clock('doc_time2');</script></b>
                    </div>
    </section>
	<?php if ($timer_button) { 
		echo '
		
		';
		} else{
			echo '';
		}
		?>
    <section class="form" id="form">
        <div class="container">
				<?php 
					 if ($date_now >= $date_min && $date_now <= $date_max && $phone_button) {
						 echo '<a href="tel:'.$manager_phone.'" class="pf buttonss">'.$call_button.'</a>';
					 }
					 else{
						 echo '
						 <form class="m1-form" action="zakaz.php" method="post" onsubmit="if (this.name.value == "") {
									alert("Введіть Ваше ім`я!");
									return false
								}
								if (this.phone.value == "") {
									alert("Введіть Ваш номер телефону!");
									return false
								}
								return true;">
							<input class="field" name="name" type="text" placeholder="Введіть Ваше імʼя" required>
							<input class="field" name="phone" type="tel" placeholder="Введіть Ваш телефон" required>
							<button class="button-m" data-name="form_button"><p class="pf">'.$all_button.'</p></button>
						</form>
						 ';
					 }
				 ?>		
            
        </div>
    </section>
    <section class="copyright">
    <footer class="footer_section">
        <div style="text-align: center;margin: 10px auto;display: block;font-size: 14px;line-height: 26px;">
<strong> Broad Peak</strong> <div <p>ФОП - Пасичник Виталий Андрейович</p>
	 <p>ИНП - 36042004141</p>
<p>Телефон: + 38 (067) 255-63-45</p>
<p>Адрес компании: 46969, Україна, м.Тернопіль, вул. Коновальця 11</p>	   
<p>Емейл: broad.peak.com24@gmail.com</p>    
		    
			<a target="_blank" href="politics.html">Пoлітикa кoнфідeнційності</a>
			<a target="_blank" href="politics(1).html">Умови гарантії та повернення</a><br>
			<a target="_blank" href="oferta.html">Користувацька Угода</a><br>
    </section>
</div>
		</footer>
    </section>
    <script src="count.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
                function go() {
                    $('html,body').animate({scrollTop: $('#form').offset().top}, 500);
                }

                function zero(input) {
                    if (parseInt(input) < 10 && parseInt(input) >= 0) {
                        input = "0" + input;
                    }
                    return input;
                }
                $(document).ready(function () {

                   
                    setTimeout(function () {
                        $("#slider, #slider_nav, #reviews").slideDown();
                        $('#slider').slick({
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            adaptiveHeight: true,
                            asNavFor: '#slider_nav'
                        });
                        $('#slider_nav').slick({
                            infinite: true,
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            asNavFor: '#slider',
                            centerMode: true,
                            focusOnSelect: true
                        });

                        $(".slider_mini iframe").closest(".md_slide_mini").addClass('vid');
                        $('.reviews .wrapper').slick({
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            variableWidth: true,
                            dots: true,
                            adaptiveHeight: true
                        });
                    }, 1000);
                });
    </script>
</body>
</html>