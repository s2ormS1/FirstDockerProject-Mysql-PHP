<?php

session_start();

include("ConnectFunction.php");
ConnectFunctionAnswer();

$mode = "register";

if(isset($_GET["mode"]))
{
    $mode = $_GET["mode"];
}

$errorMessage = "";

include("mainPage/handlers/register.php");
include("mainPage/handlers/login.php");

?>

<!DOCTYPE html>
<html lang="ru">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Татар Тури</title>

<link rel="stylesheet"
href="mainPage/css/mainPage.css">

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&display=swap"
rel="stylesheet">

</head>

<body>

<!-- <div class="db-status"
style="background:<?= $ConnectAnswer ? '#c8ffd1' : '#ffd0d0' ?>;">

    <?= $ConnectAnswer
        ? "БД подключена"
        : "Ошибка подключения к БД" ?>

</div>  -->

<div class="overlay">

    <?php
    include("mainPage/includes/leftBlock.php");
    ?>

    <?php
    include("mainPage/includes/authBlock.php");
    ?>

    <div class="bottom-panel"></div>

</div>

</body>

</html>