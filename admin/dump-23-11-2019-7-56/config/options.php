<? 
session_start();
include ("logins.php");
if (($_SESSION['login']==$login) AND ($_SESSION['password'])==$password) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="http://primary.marketing" />
        <meta name="copyright" content="Meridian Promotion Group" />
        <title>Конфигуратор <?= $_SERVER['SERVER_NAME'] ?></title>
        <meta name="keywords" content="Ключевые слова">
        <meta name="description" content="Описание">

        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/css/uikit.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
        <link rel="stylesheet" href="custom.css" />

        <!-- UIkit JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit-icons.min.js"></script>
    </head>
    <body>
    <nav class="uk-margin menus uk-light" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo " href="#"><img src="logo.jpg" class="logo uk-border-pill" alt=""></a>
        </div>
        <div class="uk-navbar-right">
            <div class="uk-navbar-item">
                <button class="uk-button uk-button-danger uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-nav-primary"><span class="uk-margin-small-right" uk-icon="icon: menu"></span> Меню</button>

            </div>
        </div>
    </nav>
    <? $include=$_SESSION['product'].".php";
    $save=$_SESSION['product']."_save.php";
    if ($_POST['product']=="password") $th1="Настройки доступа для"; else $th1="Основные настройки для";
    ?>
    <form class="form" action="<?= $save ?>" method="POST">
        <? if ($_GET['save']=='1') echo ('<div class="uk-width-1-1@s"><div class="uk-alert-danger center" uk-alert><a class="uk-alert-close" uk-close></a><div class="ok">Данные успешно сохранены!</div></div></div>');
        include("{$include}") ?>
    </form>
    <div id="offcanvas-nav-primary" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column">
            <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
                <li><img src="logo.jpg" class="logo uk-border-pill" alt=""></li>
                <li><a href="options.php" ><span class="uk-margin-small-right" uk-icon="icon: cog"></span> Конфигуратор</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span> Выйти</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
<? }
else
header("Location: index.php?pass=1"); ?>