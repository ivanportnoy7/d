<?php

require_once __DIR__ . '/check.php';

$file = file_get_contents(__DIR__ . '/data.json');
if (strlen($file) < 5) {
    header("HTTP/1.1 500 Internal Server Error");
    exit();
}

$data = json_decode($file);
$data = checkData($data);
$new = $_POST;

foreach ($_POST as $key => $inp) {
    if (checkKey($key)) {
        $data->{$key} = $inp;
    }
}
file_put_contents(__DIR__ . "/data.json", json_encode($data, JSON_PRETTY_PRINT), LOCK_EX);

$now = new DateTime();
file_put_contents(__DIR__ . "/bak/data_" . $now->format("d.m.Y_H.i.s") . ".json", json_encode($data, JSON_PRETTY_PRINT), LOCK_EX);
?>