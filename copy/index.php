<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== TRUE) {
    header("Location: ../login.php?redir=copy");
}
?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>COPY</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">
        <link rel="icon" href="http://traffic-master.taraslevchik.com/fav/favicon-16x16.png" type="image/x-icon" id="css_before">
        <link rel="shortcut icon" href="http://traffic-master.taraslevchik.com/fav/favicon-16x16.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                padding: 0px;
                font-family: "Roboto";
            }

            body section {
                position: fixed;
                top: 0px;
                left: 0px;
                right: 0px;
                bottom: 0px;
                display: flex;
                justify-content: center;
                align-content: center;
                align-items: center;
            }

            body section form {
                display: block;
                width: 320px;
            }

            body section form input {
                display: block;
                width: 100%;
                height: 40px;
                line-height: 40px;
                margin: 10px 0px;
                box-sizing: border-box;
                padding: 0px;
            }

            body section form input[type=text]{
                font-size: 16px;
                text-align: center;
            }

            body section form input[type=submit]{
                background: #f0506e;
                color: #fff;
                font-weight: 300;
                font-size: 16px;
                padding: 0px;
                border: 0px;
            }
        </style>
    </head>
    <body>
        <section>
            <form action="copy.php" method="POST">
                <input type="text" placeholder="http://вашсайт.com" name="url" required minlength="10">
                <input type="submit" name="submit" value="Скопировать">
            </form>
        </section>
    </body>
</html>