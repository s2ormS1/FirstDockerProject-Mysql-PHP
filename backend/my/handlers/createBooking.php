<?php

session_start();

include("../ConnectFunction.php");
ConnectFunctionAnswer();

if(!isset($_SESSION["user_id"]))
{
    header("Location: ../main.php");
    exit;
}

if(!isset($_SESSION["tour_id"]))
{
    echo "
    <script>

        alert('Сначала выберите тур.');

        window.location='../main.php?page=tours';

    </script>
    ";

    exit;
}

if(!isset($_POST["hotel_id"]))
{
    header("Location: ../main.php?page=hotels");
    exit;
}

$userID = $_SESSION["user_id"];
$tourID = $_SESSION["tour_id"];
$hotelID = intval($_POST["hotel_id"]);

$sql = "
INSERT INTO booking
(
    id_client,
    id_tour,
    id_hotel,
    status_booking
)
VALUES
(
    $userID,
    $tourID,
    $hotelID,
    'Ожидает оплаты'
)
";

$mysqli->query($sql);

/* тур больше не нужен */

unset($_SESSION["tour_id"]);

header("Location: ../main.php?page=account");
exit;

?>