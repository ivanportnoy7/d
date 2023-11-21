<? 
session_start();
include ("logins.php");
if (($_SESSION['login']==$login) AND ($_SESSION['password'])==$password) { ?>
<?php
	//get the index
	$index = $_GET['index'];

	//fetch data from json
	$data = file_get_contents('upsells.json');
	$data = json_decode($data, true);

	//delete the row with the index
	unset($data[$index]);

	//encode back to json
	$data = json_encode($data, JSON_PRETTY_PRINT);
	file_put_contents('upsells.json', $data);

	header('location: upsells.php');
?>

<? }
else
header("Location: index.php?pass=1"); ?>