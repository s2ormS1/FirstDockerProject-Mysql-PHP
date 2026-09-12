<?php

if(
    isset($_POST["fio"]) &&
    isset($_POST["email"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["pass1"]) &&
    isset($_POST["pass2"])
)
{
    $fio = trim($_POST["fio"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $pass1 = trim($_POST["pass1"]);
    $pass2 = trim($_POST["pass2"]);

    if(
        empty($fio) ||
        empty($email) ||
        empty($phone) ||
        empty($pass1) ||
        empty($pass2)
    )
    {
        $errorMessage = "Заполните все поля!";
    }
    elseif($pass1 != $pass2)
    {
        $errorMessage = "Пароли не совпадают";
    }
    else
    {
        $sql = "
        SELECT *
        FROM clients
        WHERE Email='$email'
        ";

        $result = $mysqli->query($sql);

        if($result->num_rows > 0)
        {
            $errorMessage = "Пользователь с таким email уже зарегистрирован";
        }
        else
        {
            $sql = "
            SELECT *
            FROM clients
            WHERE Phone='$phone'
            ";

            $result = $mysqli->query($sql);

            if($result->num_rows > 0)
            {
                $errorMessage = "Пользователь с таким телефоном уже зарегистрирован";
            }
            else
            {
            $sql = "
            INSERT INTO clients
            (
                FIO,
                Phone,
                Email,
                Password
            )
            VALUES
            (
                '$fio',
                '$phone',
                '$email',
                '$pass1'
            )
            ";

            $mysqli->query($sql);

            $newUserID = $mysqli->insert_id;

            $sql = "
            INSERT INTO access
            (id_user,id_table,accesses)
            VALUES
            ($newUserID,1,0),
            ($newUserID,2,0),
            ($newUserID,3,0),
            ($newUserID,4,0),
            ($newUserID,5,0),
            ($newUserID,6,0),
            ($newUserID,7,0),
            ($newUserID,8,0)
            ";

            $mysqli->query($sql);

            $_SESSION["user_id"] = $newUserID;
            $_SESSION["fio"] = $fio;

            header("Location: main.php");
            exit;
            }
        }
    }
}