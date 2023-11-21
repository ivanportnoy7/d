<?php
session_start(); 

$products_list = array(
   0 => array( 
            'product_id' => '162',      //код товара 2
            'price'      => '299',  //цена товара 2
            'count'      => '1'      //количество товара 2
    ),
	
);
$products = urlencode(serialize($products_list));
$sender = urlencode(serialize($_SERVER));
// параметры запроса
$data = array(
    'key'             => 'f1dc3725cae6ec3b54893adfd2baabfc', //Ваш секретный токен
    'order_id'        => number_format(round(microtime(true)*10),0,'.',''), //идентификатор (код) заказа (*автоматически*)
    'country'         => 'UA',                         // Географическое направление заказа
    'office'          => '1',                          // Офис (id в CRM)
    'products'        => $products,                    // массив с товарами в заказе
    'bayer_name'      => $_REQUEST['name'],            // покупатель (Ф.И.О)
    'phone'           => $_REQUEST['phone'],           // телефон
    'email'           => $_REQUEST['email'],           // электронка
    'comment'         => $_REQUEST['product_name'],    // комментарий
    'delivery'        => $_REQUEST['delivery'],        // способ доставки (id в CRM)
    'delivery_adress' => $_REQUEST['delivery_adress'], // адрес доставки
    'payment'         => '',                           // вариант оплаты (id в CRM)
    'sender'          => $sender,                        
    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source
    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium
    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term
    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content
    'utm_campaign'    => $_SESSION['utms']['utm_campaign'],// utm_campaign
    'additional_1'    => '',                               // Дополнительное поле 1
    'additional_2'    => '',                               // Дополнительное поле 2
    'additional_3'    => '',                               // Дополнительное поле 3
    'additional_4'    => ''                                // Дополнительное поле 4
);
 
// запрос
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://vitaliity.lp-crm.biz/api/addNewOrder.html');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$out = curl_exec($curl);
curl_close($curl);
//$out – ответ сервера в формате JSON
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Дякуємо за замовлення</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&amp;subset=cyrillic" rel="stylesheet">
	<style>
		a{color:#fff;text-decoration:none}.container{width:100%;height:100%;font-family:'Open Sans',sans-serif}.wrap{width:700px;margin:165px auto 0;text-align:center}.zag{font-size:29px;font-weight:400;margin-bottom:0;margin-top:23px;color:#38382F}.podzag{font-size:20px;color:#7F7F7F;font-weight:300;margin-top:12}.button{background:#38382F;padding:12px 25px;margin:0 auto}.bor{margin-top:45px}.img{width:100px;height:100px;background:url(http://i82.fastpic.ru/big/2016/1110/91/900e8526e8b44b8993f6e4ca19ce7891.png) center center no-repeat;margin:0 auto}
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
	<div class="container">
		<div class="wrap">
			<p class="zag">Дякуємо. Ваше замовлення успішно відправлене.</p>
			<p class="podzag">Наш менеджер зателефонує Вам в найближчий час.</p>
			<div class="bor">
				<a href="index.php" class="button">Повернутись на сайт</a>
			</div> 
		</div>
	</div>


	<style>
		.produkt {
  padding: 75px 0px;
}.container {
  max-width: 1360px;
  padding: 0px 15px;
  margin: 0 auto;
  width: 100%;
}
.produkt__items {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}
.produkt__item {
  color: #1c1e1e;
  margin: 0px -10px 30px;
  padding: 0px 5px;
  width: 25%;
}

.produkt__wrapp {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  height: 100%;
  padding: 0 7px;
}

.produkt__img {
  -webkit-box-shadow: 0 5px 50px 8px rgba(0, 0, 0, 0.18);
  box-shadow: 0 5px 50px 8px rgba(0, 0, 0, 0.18);
  margin: 0px 0px 30px 0px;
  padding-top: 63%;
  position: relative;
  overflow: hidden;
}

.produkt__price {
  color: #747d7c;
  font-size: 24px;
  font-weight: bold;
}

.produkt__text {
  color: #1c1e1e;
  font-size: 24px;
  margin: 0px 0px 20px 0px;
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
}

.produkt__img img {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  -o-object-fit: contain;
  object-fit: contain;
  -o-object-position: center;
  object-position: center;
  margin: 0 auto;
  display: block;
}



@media (max-width: 1372px) {
  .produkt__item {
    width: 33%;
  }
}

@media (max-width: 991.98px) {
  .produkt__item {
    width: 49%;
  }
}

.prod-title{font-size: 29px;
  font-weight: 400;
  margin-bottom: 10px;
  margin-top: 23px;
  color: #38382F; text-align: center;}
		
	</style>
	
	<div class="produkt">
			<div class="container">
					
      <div class="prod-title">Товари які зараз зі знижкою</div>

			<div class="produkt__items">
    <?php
    $products = [
     
        ["/sercha/index.php", "/cms/offer/pic27.jpg", "Браслет Eternal", "299 грн"],
        ["/miсhael/index.php", "/cms/offer/pic30.jpg", "Амулет Михайла", "299 грн"],
        ["/wolf/index.php", "/cms/offer/pic35.jpg", "Амулет Fenrir", "499 грн"],
        ["/dragon/index.php", "/cms/offer/pic36.jpg", 'Браслет Dragon XXI', "399 грн"],
        ["/chain/index.php", "/cms/offer/pic37.jpg", 'Цепочка плетена', "299 грн"],
        ["/titanium/index.php", "/cms/offer/pic38.jpg", 'Титановий Браслет', "299 грн"],
        ["/eternal/index.php", "/cms/offer/pic40.jpg", 'Браслет "Вічніть"', "299 грн"],
        ["/light/index.php", "/cms/offer/pic41.jpg", 'Браслет "Світило"', "299 грн"],
        ["/dream/index.php", "/cms/offer/pic42.jpeg", 'Браслет "Ловець снів"', "299 грн"],
        ["/tiger/index.php", "/cms/offer/pic43.jpg", 'Браслет з магнітною застібкою "LAVA"', "299 грн"],
        ["/sun/index.php", "/cms/offer/pic44.jpg", 'Браслет з натурального каміння "Сонячна система"', "299 грн"],
        ["/stone/index.php", "/cms/offer/pic45.jpg", 'Браслети з натурального каміння', "299 грн"],
        ["/pidvis/index.php", "/cms/offer/pic46.jpg", 'Браслет Відкритого Серця', "299 грн"],
        ["/gifts/index.php", "/cms/offer/pic48.jpg", 'Ланцюжок Gifts', "299 грн"],
    ];
foreach ($products as $product) {
    echo '<div class="produkt__item">';
    echo '<a href="' . $product[0] . '" class="produkt__wrapp">';
    echo '<div class="produkt__img">';
    echo '<img src="' . $product[1] . '" alt="" />';
    echo '</div>';
    echo '<p class="produkt__text">' . $product[2] . '</p>';
    echo '<div class="produkt__price">' . $product[3] . '</div>';
    echo '</a>';
    echo '</div>';
} ?>
	</div>
	</div>
	</div>
	 

</body>
</html>
