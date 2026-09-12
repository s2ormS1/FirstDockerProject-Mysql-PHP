<?php

if(isset($_POST["deleteRow"]))
{
    $table = $_POST["table_name"];
    $rowID = $_POST["row_id"];

    if($table == "access")
    {
        $parts = explode("_", $rowID);

        $id_user = (int)$parts[0];
        $id_table = (int)$parts[1];

        $sql = "
        DELETE FROM access
        WHERE id_user = $id_user
        AND id_table = $id_table
        ";

        $mysqli->query($sql);

        header(
            "Location: main.php?page=account&entity=access"
        );

        exit;
    }

    $primaryKeys = array(
        "clients" => "ClientsID",
        "booking" => "id_booking",
        "country" => "id_country",
        "hotels" => "id_hotel",
        "pictures" => "id_pict",
        "tables" => "id_table",
        "tours" => "id_tour"
    );

    if(isset($primaryKeys[$table]))
    {
        $pk = $primaryKeys[$table];

        $sql = "
        DELETE FROM `$table`
        WHERE `$pk` = '".$mysqli->real_escape_string($rowID)."'
        ";

        $mysqli->query($sql);
    }

    header(
        "Location: main.php?page=account&entity=".$table
    );

    exit;
}