<?php

session_start();

include("../ConnectFunction.php");
ConnectFunctionAnswer();

$id = $_POST["id_booking"];

$mysqli->query("
UPDATE booking
SET status_booking = 'Оплачено'
WHERE id_booking = $id
");

header("Location: ../main.php?page=account");
exit;