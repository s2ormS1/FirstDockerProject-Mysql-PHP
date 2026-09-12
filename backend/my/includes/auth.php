<?php

if(!isset($_SESSION["user_id"]))
{
    header("Location: mainPage.php");
    exit;
}

$userID = $_SESSION["user_id"];

$sql = "
SELECT *
FROM clients
WHERE ClientsID = $userID
";

$resultUser = $mysqli->query($sql);

$userData = $resultUser->fetch_assoc();

$isAdmin = false;

$sql = "
SELECT *
FROM access
WHERE id_user = $userID
AND accesses = 1
";

$resultAccess = $mysqli->query($sql);

if($resultAccess->num_rows > 0)
{
    $isAdmin = true;
}