<?php

if(isset($_GET["entity"]))
{
    $entity = $_GET["entity"];

    if(in_array($entity,$availableTables))
    {
        $result =
        $mysqli->query(
            "SELECT * FROM `$entity`"
        );

        echo "
        <form method='post'>

        <input
        type='hidden'
        name='table_name'
        value='$entity'>

        <input
        type='hidden'
        id='row_id'
        name='row_id'
        value=''>
        ";

        echo "
        <table class='admin-table'>
        <tr>";

        $fields = array();

        while($field = $result->fetch_field())
        {
            $fields[] = $field->name;

            echo "
            <th>
            ".$field->name."
            </th>
            ";
        }

        echo "<th>Удалить</th>";

        echo "</tr>";

        while($row = $result->fetch_assoc())
        {
            echo "<tr>";

            if($entity == "access")
            {
                $rowKey =
                $row["id_user"].
                "_".
                $row["id_table"];
            }
            else
            {
                $primaryKeys = array(
                    "clients" => "ClientsID",
                    "booking" => "id_booking",
                    "country" => "id_country",
                    "hotels" => "id_hotel",
                    "pictures" => "id_pict",
                    "tables" => "id_table",
                    "tours" => "id_tour"
                );

                $rowKey = $row[$primaryKeys[$entity]];
            }

            foreach($fields as $field)
            {
                echo "
                <td>

                <input
                type='text'
                name='data[$rowKey][$field]'
                value='".htmlspecialchars(
                    $row[$field]
                )."'>

                </td>
                ";
            }

            echo "
            <td>

            <button
            type='submit'
            name='deleteRow'
            value='1'
            onclick='
            document.getElementById(\"row_id\").value=\"$rowKey\";
            '>

            Удалить

            </button>

            </td>
            ";

            echo "</tr>";
        }

        echo "
        </table>

        <button
        type='submit'
        name='saveTable'
        class='main-btn'>

        Сохранить изменения

        </button>

        </form>";
        }
}
?>