<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="http://primary.marketing" />
    <meta name="copyright" content="Primary Marketing" />
	<title>Конфигуратор <?= $_SERVER['SERVER_NAME'] ?></title>
    
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/css/uikit.min.css" />
	<link rel="stylesheet" href="custom.css" />

	<!-- UIkit JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit-icons.min.js"></script>


  </head>
  <body>

<div class="uk-section ">
    <div class="uk-container uk-container-large">

		<div class="uk-flex uk-flex-center ">
		
			<div class="uk-card uk-card-primary uk-card-body login">
		
				<h2 class="uk-card-title bold center">Авторизация</h2>
				<form action="autoring.php" method="POST" class="form-width uk-grid-small" uk-grid>
					
					<div class="uk-width-1-1@s">
						<label class="uk-form-label" for="login">Логин: <em>*</em></label>
						<input class="uk-input uk-form-small" required id="login" type="text" placeholder="Например: admin" name="login">
					</div>
					
					<div class="uk-width-1-1@s">
						<label class="uk-form-label" for="password">Пароль: <em>*</em></label>
						
						<input class="uk-input uk-form-small" required id="password" type="password" placeholder="********" name="password">
					</div>
					
					<div class="uk-width-1-1@s">
						<label class="uk-form-label" for="product">Действие: <em>*</em></label>
						<select size="1" name="product" class="uk-select">
							<option selected value="config">Конфигурация</option>
							<option value="password">Сменить пароль</option>
						</select>
					</div>
					
					<div class="uk-width-1-1@s">
						<input type="submit" value="Авторизоваться" class="uk-button uk-button-danger uk-width-1-1">
					</div>
					
					<? if ($_GET['pass']==1) echo ('<div class="uk-width-1-1@s"><div class="uk-alert-danger center" uk-alert><a class="uk-alert-close" uk-close></a> <p>ЛОГИН ИЛИ ПАРОЛЬ НЕ ВЕРНЫЙ!<br>Попробуйте еще раз.</p></div></div>');
					   if ($_GET['pass']==2) echo ('<div class="uk-width-1-1@s"><div class="uk-alert-warning center" uk-alert><a class="uk-alert-close" uk-close></a> <p>Вы сменили пароль!<br>Авторизуйтесь снова.</p></div></div>');
					   if ($_GET['pass']==3) echo ('<div class="uk-width-1-1@s"><div class="uk-alert-danger center" uk-alert><a class="uk-alert-close" uk-close></a> </p>Смена пароля не возможна!<br>Вы ввели не правильный пароль!<br>Авторизуйтесь снова.</p></div></div>');
					?>	


				</form>
		
			</div>
		</div>
	</div>
</div>		
		
		
		

</body>
</html>