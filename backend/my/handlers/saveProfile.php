<?php

if(isset($_POST["saveProfile"]))
{
    
    $fio = $_POST["fio"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $sql = "
    UPDATE clients
    SET
        FIO='$fio',
        Email='$email',
        Phone='$phone',
        Password='$password'
    WHERE ClientsID=$userID
    ";

    if(!$mysqli->query($sql))
    {
        die($mysqli->error."<br>".$sql);
    }

    header("Location: main.php?page=account");
    exit;
}