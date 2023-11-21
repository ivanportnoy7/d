<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === TRUE) {
    if (isset($_GET['redir']) && $_GET['redir'] == 'copy') {
        header("Location: copy/");
    } else {
        header("Location: edit.php");
    }
}

include_once './admin/config/logins.php';
if (isset($_POST['pass']) && md5($_POST['pass']) === $password) {
    $_SESSION['login'] = TRUE;
    if (isset($_GET['redir']) && $_GET['redir'] == 'copy') {
        header("Location: copy/");
    } else {
        header("Location: edit.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Enter</title>
        <style>
            body {
                font-family: "Arial";
                background: #f5f5f5;
            }

            body form {
                display: block;
                width: 400px;
                margin: 0 auto;
                padding: 50px 0px 0px;
            }

            body input {
                width: 100%;
                display: block;
                box-sizing: border-box;
                height: 45px;
                border: 1px solid #e0e0e0;
                background: #fff;
                padding: 0px 0px 0px 10px;
                font-size: 14px;
                margin: 0px 0px 10px;
            }

            body button {
                display: block;
                background: #f0f0f0;
                width: 100%;
                height: 45px;
                line-height: 45px;
                padding: 0px;
                text-transform: uppercase;
                border: none;
                cursor: pointer;
                border: 2px solid #e0e0e0;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <form action='' method="POST">
            <input type='password' placeholder="password" name="pass">
            <button type='submit'>ENTER</button>
        </form>
    </body>
</html>