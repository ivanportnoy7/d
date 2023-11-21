<? 
session_start();
include ("logins.php");
if (($_SESSION['login']==$login) AND ($_SESSION['password'])==$password) { ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление Товара</title>
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/css/uikit.min.css" />
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
<div class="uk-section">
    <div class="uk-container uk-container-large">

		<div class="uk-flex uk-flex-center">
		
			<div class="uk-card uk-card-primary uk-card-body login">
			    <a href="upsells.php" class="uk-button uk-button-default uk-float-left"><span uk-icon="reply"></span> Назад</a> 
				<h2 class="uk-card-title bold center">Добавить Товар</h2>
				<form method="POST" class="form-width uk-grid-small" uk-grid>
					
					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="id">ID</label>
						<input class="uk-input uk-form-small" type="text" id="id" name="id" placeholder="Например: 1">
					</div>
					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="name">Навание Товара</label>
						<input class="uk-input uk-form-small" type="text" id="name" name="name" placeholder="Например: JBL Charge 3">
					</div>
					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="description">Описание</label>
						<input class="uk-input uk-form-small" type="text" id="description" name="description" placeholder="Например: Колонка">
					</div>
					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="sale">Скидка %</label>
						<input class="uk-input uk-form-small" type="text" id="sale" name="sale" placeholder="Например: 50">
					</div>
					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="old_price">Старая Цена</label>
						<input class="uk-input uk-form-small" type="text" id="old_price" name="old_price" placeholder="Например: 1500грн">
					</div>
					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="new_price">Новая Цена</label>
						<input class="uk-input uk-form-small" type="text" id="new_price" name="new_price" placeholder="Например: 750грн">
					</div>
					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="link">Ссылка на Сайт</label>
						<input class="uk-input uk-form-small" type="text" id="link" name="link" placeholder="Например: http://vashsait.ru/">
					</div>
					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="img_link">Ссылка на изображение</label>
						<input class="uk-input uk-form-small" type="text" id="img_link" name="img_link" placeholder="Например: http://vashsait.ru/image.jpg">
					</div>

					<div class="uk-width-1-1@s">
						<input type="submit" name="save" value="Добавить" class="uk-button uk-button-danger uk-width-1-1">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['save'])){
		//open the json file
		$data = file_get_contents('upsells.json');
		$data = json_decode($data);

		//data in out POST
		$input = array(
			'id' => $_POST['id'],
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'sale' => $_POST['sale'],
			'old_price' => $_POST['old_price'],
			'new_price' => $_POST['new_price'],
			'link' => $_POST['link'],
			'img_link' => $_POST['img_link']
		);

		//append the input to our array
		$data[] = $input;
		//encode back to json
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('upsells.json', $data);

		header('location: upsells.php');
	}
?>

<div id="offcanvas-nav-primary" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">

        <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
		<li><img src="logo.jpg" class="logo uk-border-pill" alt=""></li>
            <li class="uk-nav-header"><span class="uk-margin-small-right" uk-icon="icon: settings"></span> Управление</li>
			<li class="uk-nav-divider"></li>		
			<li><a href="options.php" ><span class="uk-margin-small-right" uk-icon="icon: cog"></span> Конфигуратор</a></li>
			<li class="uk-nav-divider"></li>
            <li><a href="upsells.php" ><span class="uk-margin-small-right" uk-icon="icon: cart"></span> Настройки Апселл</a></li>
			<li class="uk-nav-divider"></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Фейковые Клиенты</a></li>
			<li class="uk-nav-divider"></li>
			<li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: clock"></span> Заметки</a></li>
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