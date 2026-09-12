<?php

$availableTables = array();

$sql = "
SELECT t.name_of_table
FROM access a
INNER JOIN tables t
ON a.id_table = t.id_table
WHERE a.id_user = $userID
AND a.accesses = 1
";

$resultTables = $mysqli->query($sql);

while($row = $resultTables->fetch_assoc())
{
    $availableTables[] = $row["name_of_table"];
}

?>

<div class="admin-panel">

    <h2>Настройки администратора</h2>

    <form method="get">

        <input
            type="hidden"
            name="page"
            value="account">

        <select name="entity">

            <?php

            foreach($availableTables as $table)
            {
                echo "
                <option value='$table'
                ".(
                    isset($_GET["entity"])
                    &&
                    $_GET["entity"] == $table
                    ?
                    "selected"
                    :
                    ""
                ).">
                $table
                </option>
                ";
            }

            ?>

        </select>

        <button class="main-btn">
            Открыть
        </button>

    </form>

</div>