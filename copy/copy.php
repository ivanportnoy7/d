<?php
require_once __DIR__ . '/dom.php';

//$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$actual_link = explode("copy/", $actual_link);
//$actual_link = $actual_link[0] . 'save/img_copy/';
$actual_link = 'save/img_copy/';
$actual_path = __DIR__ . '/../save/img_copy/';

function parse($val, $u, $p, $url) {
    if (strpos($val, "cloudinary") !== FALSE) {
        $html = str_get_html($val);
        $img = $html->find("img")[0];
        $old_url = $img->attr["src"];

        $first_part = "http://res.cloudinary.com/dreamer-academy/image/upload/fl_sanitize/";

        $img_name = explode("/", $old_url);
        $img_name = $img_name[count($img_name) - 1];

        file_put_contents($p . $img_name, file_get_contents($first_part . $img_name));
        $new_url = $u . $img_name;

        $img->attr['src'] = $new_url;
        return (string) $html;
    } else if (strpos($val, ".png") !== FALSE || strpos($val, ".jpg") !== FALSE || strpos($val, ".jpeg") !== FALSE || strpos($val, ".svg") !== FALSE || strpos($val, ".gif") !== FALSE || strpos($val, ".bmp") !== FALSE) {
        $html = str_get_html($val);
        $img = $html->find("img")[0];
        $old_url = $img->attr["src"];
        
        if(strpos($old_url, "https://") === FALSE && strpos($old_url, "http://") === FALSE) {
            $old_url = $url . $old_url;
        }

        $img_name = explode("/", $old_url);
        $img_name = $img_name[count($img_name) - 1];

        file_put_contents($p . $img_name, file_get_contents($old_url));
        $new_url = $u . $img_name;

        $img->attr['src'] = $new_url;
        return (string) $html;
    } else {
        return $val;
    }
}

$url = trim(htmlspecialchars($_POST['url']));
if ($url[strlen($url) - 1] !== '/') {
    $url .= '/';
}

$success = false;

$json = file_get_contents($url . '/save/data.json');

if ($json) {

    $data = json_decode($json, true);

    foreach ($data as $key => $val) {
        $new_val = parse($val, $actual_link, $actual_path, $url);
        $data[$key] = $new_val;
    }
    $result = json_encode($data, JSON_PRETTY_PRINT);

    $old = __DIR__ . '/../save/data.json';
    if (file_exists($old)) {
        rename($old, __DIR__ . '/../save/data_backup.json');
    }
    if (file_put_contents($old, $result)) {
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>COPY</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">
        <link rel="icon" href="http://traffic-master.taraslevchik.com/fav/favicon-16x16.png" type="image/x-icon" id="css_before">
        <link rel="shortcut icon" href="http://traffic-master.taraslevchik.com/fav/favicon-16x16.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                padding: 0px;
                font-family: "Roboto";
            }

            body section {
                position: fixed;
                top: 0px;
                left: 0px;
                right: 0px;
                bottom: 0px;
                display: flex;
                justify-content: center;
                align-content: center;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <section>
            <?php if ($success) { ?>
                <h3>Все получилось! <a href="../">На главную</a></h3>
            <?php } else { ?>
                <h3>Произошла ошибка :( Проверьте правильность введенного адреса либо настройки прав на хостинге / сервере. <a href="javascript: history.back();">Назад</a></h3>
            <?php } ?>
        </section>
    </body>
</html>