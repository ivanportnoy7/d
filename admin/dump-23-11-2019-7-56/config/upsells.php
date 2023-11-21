<?php
session_start();
include ("logins.php");
if (($_SESSION['login']==$login) AND ($_SESSION['password'])==$password) { ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Управление Доп. Товарами</title>
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/css/uikit.min.css" />

	<!-- UIkit JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit-icons.min.js"></script>
	<link rel="stylesheet" href="custom.css" />

	<script language="JavaScript" type="text/javascript">
	function checkDelete(){
		return confirm('Вы уверены что хотите удалить данный Товар?');
	}
	</script>
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

<table class="uk-table uk-table-hover uk-table-divider uk-card uk-card-default uk-card-body">
	<thead>
		<th>ID</th>
		<th>Назание Товара</th>
		<th>Описание</th>
		<th>Скидка %</th>
		<th>Старая Цена</th>
		<th>Новая Цена</th>
		<th>Ссылка</th>
		<th>Ссылка на Изображение</th>
		<th>Управление</th>
	</thead>
	<tbody >
		<?php
			//fetch data from json
			$data = file_get_contents('upsells.json');
			//decode into php array
			$data = json_decode($data);

			$index = 0;
			$sum = 0;
			foreach($data as $row){
			$sum += $row->id;
				echo "
					<tr>
						<td>".$row->id."</td>
						<td>".$row->name."</td>
						<td>".$row->description."</td>
						<td>".$row->sale."</td>
						<td>".$row->old_price."</td>
						<td>".$row->new_price."</td>
						<td><a class='uk-link-muted' href='".$row->link."' />".$row->link."</a></td>
						<td uk-lightbox><a href='".$row->img_link."'/><img src='".$row->img_link."' style='height: 75px;' /></a></td>
						<td>
						<button class='uk-button uk-button-primary' type='button'><span uk-icon='cog'></span></button>
						<div uk-dropdown>
							<ul class='uk-nav uk-dropdown-nav'>
								<li><a href='edit_upsell.php?index=".$index."'><span uk-icon='pencil'></span> Редактировать</a></li>
								<li><a href='delete_upsell.php?index=".$index."' onclick='return checkDelete()'><span uk-icon='trash'></span> Удалить</a></li>
							</ul>
						</div>
						</td>

						
					</tr>
					
				";

				
				$index++;
				
			}
			
			echo '<div class="uk-card uk-card-secondary uk-card-small uk-card-body"><h4 class="uk-heading-bullet pdr10 uk-float-left"> Товаров: <span class="uk-badge">'.$index.'</span></h4>   <a href="add_upsell.php" class="uk-button uk-button-danger uk-float-right"><span uk-icon="plus-circle"></span> Добавить Товар или Услугу</a>    <div>Данные товары отображаются на странице благодарности. Если товары в таблице отсутствуют, то страница благодарности будет без товаров. Если у Вас возникли вопросы, обратитесь в поддержку!</div></div>';
			// echo '<br><h4 class="uk-heading-bullet"> Проверка суммирования столбца ID из таблицы: <span class="uk-badge">'.$sum.'</span></h4>';
			
		?>
	</tbody>
</table>

</div>
</div>


<div id="offcanvas-nav-primary" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">

        <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
		<li><img src="logo.jpg" class="logo uk-border-pill" alt=""></li>
            <li class="uk-nav-header">Добро Пожаловать</li>
			<li class="uk-nav-divider"></li>
			<li><a href="options.php" ><span class="uk-margin-small-right" uk-icon="icon: cog"></span> Конфигуратор</a></li>
			<li class="uk-nav-divider"></li>
            <li><a href="upsells.php" ><span class="uk-margin-small-right" uk-icon="icon: cart"></span> Настройки Апселл</a></li>
			<li class="uk-nav-divider"></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Фейковые Клиенты</a></li>

        </ul>

    </div>
</div>


</body>
</html>


<? }
else
header("Location: index.php?pass=1"); ?>