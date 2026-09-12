<?php

if(
    isset($_POST["login"]) &&
    isset($_POST["password"])
)
{
    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);

    $sql = "
        SELECT *
        FROM clients
        WHERE
        (
            Email='$login'
            OR Phone='$login'
        )
        AND Password='$password'
    ";

    $result = $mysqli->query($sql);

    if($result->num_rows == 0)
    {
        $errorMessage = "Неверный логин или пароль";
    }
    else
    {
        $user = $result->fetch_assoc();

        $_SESSION["user_id"] = $user["ClientsID"];
        $_SESSION["fio"] = $user["FIO"];

        header("Location: main.php");
        exit;
    }
}