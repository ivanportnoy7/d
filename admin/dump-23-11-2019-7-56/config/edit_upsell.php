<? 
session_start();
include ("logins.php");
if (($_SESSION['login']==$login) AND ($_SESSION['password'])==$password) { ?>
<?php
	//get the index from URL
	$index = $_GET['index'];

	//get json data
	$data = file_get_contents('upsells.json');
	$data_array = json_decode($data, true);

	//assign the data to selected index
	$row = $data_array[$index];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Редактирование Товара</title>
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
		
			<div class="uk-card uk-card-primary uk-card-body">
			    <a href="upsells.php" class="uk-button uk-button-default uk-float-left"><span uk-icon="reply"></span> Назад</a> 
				<h2 class="uk-card-title bold center">Редактировать Товар</h2>
				<form method="POST" class="form-width uk-grid-small" uk-grid>				
				<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="id">ID</label>
					<input class="uk-input uk-form-small" type="text" id="id" name="id" value="<?php echo $row->id; ?>">
				</div>
				<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="name">Навание Товара</label>
					<input class="uk-input uk-form-small" type="text" id="name" name="name" value="<?php echo $row->name; ?>">
				</div>
				<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="description">Описание</label>
					<input class="uk-input uk-form-small" type="text" id="description" name="description" value="<?php echo $row->description; ?>">
				</div>
				<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="sale">Скидка %</label>
					<input class="uk-input uk-form-small" type="text" id="sale" name="sale" value="<?php echo $row->sale; ?>">
				</div>
				<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="old_price">Старая Цена</label>
					<input class="uk-input uk-form-small" type="text" id="old_price" name="old_price" value="<?php echo $row->old_price; ?>">
				</div>
				<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="new_price">Новая Цена</label>
					<input class="uk-input uk-form-small" type="text" id="new_price" name="new_price" value="<?php echo $row->new_price; ?>">
				</div>
				<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="link">Ссылка на Сайт</label>
					<input class="uk-input uk-form-small" type="text" id="link" name="link" value="<?php echo $row->link; ?>">
				</div>
				<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="img_link">Ссылка на изображение</label>
					<input class="uk-input uk-form-small" type="text" id="img_link" name="img_link" value="<?php echo $row->img_link; ?>">
				</div>
				<input type="submit" name="save" class="uk-button uk-button-danger uk-width-1-1" value="Редактировать">
			</form>
			</div>
		</div>
	</div>
</div>

	

<?php
	if(isset($_POST['save'])){
		//set the updated values
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

		//update the selected index
		$data_array[$index] = $input;

		//encode back to json
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('upsells.json', $data);

		header('location: upsells.php');
	}
?>
</body>
</html>

<? }
else
header("Location: index.php?pass=1"); ?>