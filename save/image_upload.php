<?php

function exists($name) {
    $files = scandir(__DIR__ . '/img/');
    $exists = false;
    foreach ($files as $file) {
        if ($file == '.' || $file == '..' || strlen($file) < 5) {
            continue;
        }
        $raw = explode('.', $file);
        unset($raw[count($raw) - 1]);
        $raw = implode('.', $raw);

        if ($name == $raw) {
            $exists = true;
        }
    }
    return $exists;
}

function getName($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    if (exists($randomString)) {
        $randomString = getName();
    }

    return $randomString;
}

$file = $_FILES['image'];
$type = explode('.', $file['name']);
$type = $type[count($type) - 1];
$image_name = getName() . '.' . $type;
$uploaddir = __DIR__ . '/img/';
$uploadfile = $uploaddir . $image_name;

//$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$actual_link = explode("image_upload.php", $actual_link);
//$actual_link = $actual_link[0] . 'img/' . $image_name;
$actual_link = 'save/img/' . $image_name;

if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
    list($width, $height, $type, $attr) = getimagesize($uploadfile);

    header("HTTP/1.1 200 OK");
    header('Content-Type: application/json');
    echo json_encode(Array(
        "size" => Array($width, $height),
        "url" => $actual_link
    ));
    exit();
} else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    exit();
}
?>