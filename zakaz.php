<?php
$name = stripslashes(htmlspecialchars($_REQUEST['name']));
$phone = stripslashes(htmlspecialchars($_REQUEST['phone']));
$product_id = stripslashes(htmlspecialchars($_REQUEST['product_id']));
$subject = 'Заказ товара c сайта!'; // заголовок письмя
$addressat = "broad.peak.com24@gmail.com"; // Ваш Электронный адрес
$success_url = './form-ok.php?name='.$name.'&phone='.$phone.'&time='.date("Y-m-d H:i:s").'';
$message = "ФИО: {$name}\nКонтактный телефон: {$phone}\nТовар: {$product_id}";
$verify = mail($addressat,$subject,$message,"Content-type:text/plain;charset=utf-8\r\n");
if ($verify == 'true'){ //если письмо отправлено
    header('Location: '.$success_url); //редирект на страницу спасибо
    echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
    exit;
}
