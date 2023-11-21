<?php

function checkKey($key) {
    if (strpos($key, "title") === FALSE && strpos($key, "photo") === FALSE && strpos($key, "prices") === FALSE && strpos($key, "bene") === FALSE && strpos($key, "timer") === FALSE && strpos($key, "bullets") === FALSE && strpos($key, "steps") === FALSE && strpos($key, "review") === FALSE && strpos($key, "video") === FALSE && strpos($key, "slide") === FALSE && strpos($key, "link") === FALSE && strpos($key, "copyright") === FALSE && strpos($key, "link1") === FALSE && strpos($key, "link2") === FALSE) {
        return false;
    } else {
        return true;
    }
}

function checkData($data) {
    foreach ($data as $key => $val) {
        if (strpos($key, "title") === FALSE && strpos($key, "photo") === FALSE && strpos($key, "prices") === FALSE && strpos($key, "bene") === FALSE && strpos($key, "timer") === FALSE && strpos($key, "bullets") === FALSE && strpos($key, "steps") === FALSE && strpos($key, "review") === FALSE && strpos($key, "video") === FALSE && strpos($key, "slide") === FALSE && strpos($key, "link") === FALSE && strpos($key, "copyright") === FALSE && strpos($key, "link1") === FALSE && strpos($key, "link2") === FALSE) {
            unset($data->{$key});
        }
    }
    return $data;
}
