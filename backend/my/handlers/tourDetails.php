<?php

include("../ConnectFunction.php");
ConnectFunctionAnswer();

$id = $_GET["id"];

$sql = "
SELECT t.*, c.name_country
FROM tours t
INNER JOIN country c ON t.id_country = c.id_country
WHERE t.id_tour = $id
";

$result = $mysqli->query($sql);
$tour = $result->fetch_assoc();

echo "
<h2>{$tour['name_country']}</h2>

<p>
Дата: {$tour['date_start']} — {$tour['date_end']}
</p>

<p>
Цена: {$tour['price']} ₽
</p>
";