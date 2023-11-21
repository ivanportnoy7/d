<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== TRUE) {
    header("Location: login.php");
}

$json = file_get_contents(__DIR__ . "/save/data.json");
$data = json_decode($json);
include (__DIR__ . '/admin/config.php');

$md_time = 0;

if (isset($timer)) {
    $md_time = strtotime($timer);
}
?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Визуальный редактор</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=320, user-scalable=no">
        <link rel="stylesheet" href="assets/fonts/pf.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/normalize.min.css">
        <link rel="stylesheet" href="assets/css/main_edit.css?v=<?php echo rand(100, 9999); ?>">
        <?php if (isset($theme) && (int) $theme !== 0) { ?>
            <link rel="stylesheet" href="assets/css/theme_<?php echo $theme; ?>.css?v=<?php echo rand(100, 9999); ?>">
        <?php } ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ContentTools/1.6.10/content-tools.min.css">
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
        <style>
            .md_slide, .review {
                margin-bottom: 20px;
                position: relative;
            }
            .md_slide:not(.nodelete) img, .review:not(.nodelete) * {
                position: relative;
            }
            .md_slide:not(.nodelete):hover i, .review:not(.nodelete):hover i {
                display: block;
            }
            .slider .wrapper {
                display: block;
                height: auto;
            }
        </style>
    </head>
    <body>
        <section class="title">
            <h1 class="pf" data-editable data-name="title1_1"><p></p></h1>
            <h2 data-editable data-name="title1_2"><p></p></h2>
        </section>
        <section class="photo_single" data-editable data-name="photo_single1"></section>
        <section class="prices">
            <ul>
                <li><div><p>Обычная цена</p></div><strong class="pf"><p><?= $price_old ?><?= $valuta ?></p></strong></li>
                <li><div><p>Скидка</p></div><strong class="pf"><p><?= $skidka ?>%</p></strong></li>
                <li><div><p>Цена сейчас</p></div><strong class="pf"><p><?= $price_new ?><?= $valuta ?></p></strong></li>
            </ul>
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
//                sort($b);
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
                <div data-editable data-name="timer1_p"><p></p></div>
                <br/>
                <div class="counter pf">
                    <div class="days-wrapper timer__wrapper">
                        <span class="days count">5</span>
                        <p>дней</p>
                    </div>
                    <div class="hours-wrapper timer__wrapper">
                        <span class="hours count">12</span>
                        <p>часов</p>
                    </div>
                    <div class="minutes-wrapper timer__wrapper">
                        <span class="minutes count">10</span>
                        <p>минут</p>
                    </div>
                    <div class="seconds-wrapper timer__wrapper">
                        <span class="seconds count">08</span>
                        <p>секунд</p>
                    </div>
                </div>
                <a href="javascript: go()" class="pf"><?=$all_button?></a>
                <span>* осталось <i data-editable data-name="timer1_i"><p></p></i> штук по акции</span>
            </div>
        </section>
        <section class="video">
            <div data-editable data-name="video"></div>
        </section>
        <section class="slider">
            <div id="slider_ref" data-editable data-name="" style="display: none" class="md_slide"><p></p><i></i></div>
            <div class="wrapper">
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
            <a href="javascript: void(0);" class="add_slider"></a>
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
                <a href="javascript: go()" class="pf"><p><?=$all_button?></p></a>
                <br/><br/>
                <div data-editable data-name="timer2_p"><p></p></div>
                <br/>
                <div class="counter pf">
                    <div class="days-wrapper timer__wrapper">
                        <span class="days count">5</span>
                        <p>дней</p>
                    </div>
                    <div class="hours-wrapper timer__wrapper">
                        <span class="hours count">12</span>
                        <p>часов</p>
                    </div>
                    <div class="minutes-wrapper timer__wrapper">
                        <span class="minutes count">10</span>
                        <p>минут</p>
                    </div>
                    <div class="seconds-wrapper timer__wrapper">
                        <span class="seconds count">08</span>
                        <p>секунд</p>
                    </div>
                </div>
                <span>* осталось <i data-editable data-name="timer2_i"><p></p></i> штук по акции</span>
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
            <div class='review' id="review_ref" style="display: none">
                <div data-editable data-name="" class="review_img"><p></p></div>
                <h3 data-editable data-name="" class="review_h3"><p>Имя, возраст, (Город)</p></h3>
                <div style="clear: both"></div>
                <div data-editable data-name="" class="review_text"><p>Текст отзыва будет закрывать возражения человека. Желательно указывать реальный отзыв от реальных людей. Но для теста можно заказать отзывы на фриласне или у копирайтера.</p></div>
                <i></i>
            </div>
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
                    foreach ($r as $key => $row) {
                        ?>
                        <div class='review'>
                            <div data-editable data-name="" class="review_img"><?php echo $row['img']; ?></div>
                            <h3 data-editable data-name="" class="review_h3"><?php echo $row['h3']; ?></h3>
                            <div style="clear: both"></div>
                            <div data-editable data-name="" class="review_text"><?php echo $row['text']; ?></div>
                        </div>
                    <?php } ?>
                </div>
                <a href="javascript: void(0);" class="add_review"></a>
                <br/>
            </div>
        </section>
        <section class="title">
            <h1 class="pf" data-editable data-name="title2_1"><p></p></h1>
            <h2 data-editable data-name="title2_2"><p></p></h2>
        </section>
        <section class="photo_single" data-editable data-name="photo_single2"></section>
        <section class="prices">
            <ul>
                <li><div><p>Обычная цена</p></div><strong class="pf"><p><?= $price_old ?><?= $valuta ?></p></strong></li>
                <li><div><p>Скидка</p></div><strong class="pf"><p><?= $skidka ?>%</p></strong></li>
                <li><div><p>Цена сейчас</p></div><strong class="pf"><p><?= $price_new ?><?= $valuta ?></p></strong></li>
            </ul>
        </section>
        <section class="timer">
            <div>
                <div data-editable data-name="timer3_p"><p></p></div>
                <br/>
                <div class="counter pf">
                    <div class="days-wrapper timer__wrapper">
                        <span class="days count">5</span>
                        <p>дней</p>
                    </div>
                    <div class="hours-wrapper timer__wrapper">
                        <span class="hours count">12</span>
                        <p>часов</p>
                    </div>
                    <div class="minutes-wrapper timer__wrapper">
                        <span class="minutes count">10</span>
                        <p>минут</p>
                    </div>
                    <div class="seconds-wrapper timer__wrapper">
                        <span class="seconds count">08</span>
                        <p>секунд</p>
                    </div>
                </div>
                <span>* осталось <i data-editable data-name="timer3_i"></i> штук по акции</span>
            </div>
        </section>
        <section class="form" id="form">
            <div class="container">
                <form class="m1-form" action="admin/zakaz.php" method="post" onsubmit="if (this.name.value == '') {
                            alert('Введите Ваше имя!');
                            return false
                        }
                        if (this.phone.value == '') {
                            alert('Введите Ваш номер телефона!');
                            return false
                        }
                        return true;">
                    <input class="field" name="name" type="text" placeholder="Введите ваше имя" required>
                    <input class="field" name="phone" type="tel" placeholder="Введите ваш телефон" required>
                    <button disabled class="button-m" data-name="form_button"><p class="pf"><?=$all_button?></p></button>
                </form>
            </div>
        </section>
        <section class="copyright">
            <div class="container" data-editable data-name="copyright"><p></p></div>
            <div class="container links">
                <a href="<?php echo $link1; ?>" target="_blank" data-editable data-name="link1"><p></p></a>
                <a href="<?php echo $link2; ?>" target="_blank" data-editable data-name="link2"><p></p></a>
            </div>
        </section>
        <script src="count.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ContentTools/1.6.10/content-tools.min.js"></script>
        <script src="edit/ctools/build/editor.js?v=<?php echo rand(100, 999); ?>"></script>
        <script>
        function go(){
        $('html,body').animate({scrollTop:$('#form').offset().top}, 500);
    }
                    $(document).ready(function () {
                        function zero(input) {
                            if (parseInt(input) < 10 && parseInt(input) >= 0) {
                                input = "0" + input;
                            }
                            return input;
                        }

                        var timeRemaining = <?php echo (int) ($md_time - mktime()) * 1000; ?>;
                        var endTime = new Date(new Date().getTime() + timeRemaining);
                        var date = [endTime.getFullYear(),
                            zero(endTime.getMonth() + 1),
                            zero(endTime.getDate())].join('-') + ' ' +
                                [zero(endTime.getHours()),
                                    zero(endTime.getMinutes()),
                                    zero(endTime.getSeconds())].join(':');

                        $(".counter").countdown(date).on("update.countdown", function (e) {
                            $(".days").text(e.strftime("%D")), $(".hours").text(e.strftime("%H")), $(".minutes").text(e.strftime("%M")), $(".seconds").text(e.strftime("%S"))
                        });
                        $(document).on("click", ".ct-ignition__button--edit", function () {
                            $(".add_bene, .bene_del, .add_slider, .add_review, .review_del").hide();
                            $(".md_slide, .review").addClass('nodelete');
                        });
                        $(document).on("click", ".ct-ignition__button--confirm, .ct-ignition__button--cancel", function () {
                            $(".add_bene, .bene_del, .add_slider, .slider_del, .add_review, .review_del").show();
                            $(".md_slide, .review").removeClass('nodelete');
                        });

                        /* -- */

                        function bene_reload(init) {
                            if(init === undefined){
                                var init = false;
                            }
                            var count = 1;
                            var str = "";
                            $(".benefits ul li").each(function () {
                                var img = $(this).children(".bene_img");
                                var text = $(this).children(".bene_text");
                                img.attr('data-name', 'bene-' + count + '-img');
                                text.attr('data-name', 'bene-' + count + '-text');

                                str += "bene-" + count + "-img=" + img.html() + "&bene-" + count + "-text=" + text.html() + "&";
                                count++;
                            });
                            if (init === true) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'save/save_bene.php',
                                    data: str
                                });
                                console.log('bene upd');
                            }
                            console.log('reloaded - ' + (count - 1));
                        }

                        bene_reload();

                        $(".add_bene").on("click", function () {
                            var cloned = $("#bene_ref").clone().removeAttr("id").show();
                            $(".benefits ul").append(cloned);

                            bene_reload(true);
                        });

                        $(document).on("click", ".bene_del", function () {
                            $(this).closest("li").remove();
                            bene_reload(true);
                        });

                        /* --- */

                        function slider_reload(init) {
                            if(init === undefined){
                                var init = false;
                            }
                            var count = 1;
                            var str = "";
                            $(".slider .wrapper .md_slide").each(function () {
                                if($(this).find("i").length < 1){
                                    $(this).append("<i></i>");
                                }
                                $(this).attr('data-name', 'slide-' + count);

                                str += "slide-" + count + "=" + $(this).html() + "&";
                                count++;
                            });
                            if (init === true) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'save/save_slider.php',
                                    data: str
                                });
                                console.log('slider upd');
                            }
                            console.log('reloaded slides - ' + (count - 1));
                        }

                        slider_reload();

                        $(".add_slider").on("click", function () {

                            var id = parseInt($(".slider .md_slide").length) + 1;
                            var cloned = $("#slider_ref").clone().removeAttr("id").show();
                            $(".slider .wrapper").append(cloned);

                            slider_reload(true);
                        });

                        $(document).on("click", ".md_slide i", function () {
                            var slide = $(this).closest('.md_slide');
                            if (!slide.hasClass('nodelete')) {
                                slide.remove();

                                slider_reload(true);
                            }
                        });

                        /* --- */

                        function reviews_reload(init) {
                            if(init === undefined){
                                var init = false;
                            }
                            var count = 1;
                            var str = "";
                            $(".reviews .wrapper .review").each(function () {
                                if($(this).find("i").length < 1){
                                    $(this).append("<i></i>");
                                }
                                    
                                var img = $(this).find(".review_img");
                                var h3 = $(this).find(".review_h3");
                                var text = $(this).find(".review_text");
                                img.attr('data-name', 'review-' + count + '-img');
                                h3.attr('data-name', 'review-' + count + '-h3');
                                text.attr('data-name', 'review-' + count + '-text');

                                str += "review-" + count + "-img=" + img.html() + "&";
                                str += "review-" + count + "-h3=" + h3.html() + "&";
                                str += "review-" + count + "-text=" + text.html() + "&";
                                count++;
                            });
                            if (init === true) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'save/save_review.php',
                                    data: str
                                });
                                console.log('reviews upd');
                            }
                            console.log('reloaded reviews - ' + (count - 1));
                        }

                        reviews_reload();

                        $(".add_review").on("click", function () {
                            var id = parseInt($(".reviews .review").length) + 1;
                            var cloned = $("#review_ref").clone().removeAttr("id").show();
                            $(".reviews .wrapper").append(cloned);

                            reviews_reload(true);
                        });

                        $(document).on("click", ".review i", function () {
                            var review = $(this).closest(".review");
                            if (!review.hasClass('nodelete')) {
                                review.remove();

                                reviews_reload(true);
                            }
                        });
                    });
        </script>
    </body>
</html>