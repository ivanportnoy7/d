<?php

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = str_replace("/save/image_save.php", "", $actual_link);

$items = list($width, $height) = getimagesize($actual_link . '/' . $_POST['url']);

$arr = array('url' => $_POST['url'], 'width' => $_POST['width'], 'crop' => $_POST['crop'],
    'alt' => "Image", 'size' => array('width' => $items[0], 'height' => $items[1]));

echo json_encode($arr);
exit();