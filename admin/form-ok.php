<? include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
	<title>Спасибо за заказ</title>
	<meta name="keywords" content="Распродажа">
	<meta name="description" content="Распродажа">
	<link rel="shortcut icon" href="upsell/favicon.ico"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" href="upsell\css\settings.css">
	<link rel="stylesheet" href="upsell\css\slick.css">
    <link rel="stylesheet" href="upsell\css\style.css">


	
<?= $head_thanks ?>		
    </head>
    <body>
<?= $body_thanks ?>





<section class="block2 w1">
    <div class="wrap">
        <h2 class="title">Спасибо за Ваш заказ!</h2>
		        <h3 class="stock-size">Оператор свяжется с Вами в ближайшее время.</h3> 
    </div>
</section>
        <section class="check">
            <div class="wrap" style="text-align: center;">
                <h3>Убедитесь в правильности введенных данных:</h3>
                <p>Имя - <strong><?php echo $_GET['name']; ?></strong></p>
                <p>Телефон - <strong><?php echo $_GET['phone']; ?></strong></p>
                <a href="javascript: history.back();">Вернуться</a>
            </div>
        </section>

    <div class="wrap">
        
		<ul class="catalog">
		
				<?php
			//fetch data from json
			$data = file_get_contents('config/upsells.json');
			//decode into php array
			$data = json_decode($data);

			$index = 0;
			foreach($data as $row){
				echo "
				
			

            <li><div class='cat-sale'>-".$row->sale."%</div>
                <div class='cat-gall'>
                    <div><img src='".$row->img_link."'  alt='".$row->name."' class='one'></div>				
                </div>
                <h4 class='cat-title'></h4>
                <p class='stock'>".$row->description."<br><span>".$row->name."</span></p>
                <ul class='cat-price'>
                    <li class='old-price'>".$row->old_price."</li>
                    <li class='new-price'>".$row->new_price."</li>
					<li><a style='color: #000; font-size: 10px' href='".$row->link."' title='".$row->name."'>Перейти в Магазин</a></li>
                </ul>
				<form action='zakaz.php' method='post'>				
				<input type='hidden' name='name' value='".$_GET['name']."'>
				<input type='hidden' name='phone' value='".$_GET['phone']."'>
				<input type='hidden' name='commentss' value='Дозаказ с Апселла'>
				<input type='hidden' name='tovar' value='".$row->name."'>
				<p><button class='cat-buy' type='submit' title='".$row->name."'>Добавить в Заказ</button></p>
				</form>
            </li>
				";

				$index++;
			}
		?>
          
		  	
			
		
			
			
        </ul>
        <a href="javascript: history.back(-1);" class="toup">Вернуться Назад</a>
    </div>
</section>


<script src="upsell/js/jquery.js"  type="text/javascript"></script>
<script src="upsell/js/slick.min.js" ></script>
<script src="upsell/js/lazyload.min_.js" ></script>
<script src="upsell/js/main.js" ></script>


</body>
</html>
