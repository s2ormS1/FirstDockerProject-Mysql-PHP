<?php

if(isset($_POST["addRow"]))
{
    $table = $_POST["table_name"];

    $primaryKeys = array(
        "clients" => "ClientsID",
        "booking" => "id_booking",
        "country" => "id_country",
        "hotels" => "id_hotel",
        "pictures" => "id_pict",
        "tables" => "id_table",
        "tours" => "id_tour"
    );

    $fields = array();
    $values = array();

    foreach($_POST["newdata"] as $field => $value)
    {
        if(
            isset($primaryKeys[$table])
            &&
            $field == $primaryKeys[$table]
        )
        {
            continue;
        }

        $fields[] = "`".$field."`";

        $values[] =
        "'".$mysqli->real_escape_string($value)."'";
    }

    $sql = "
    INSERT INTO `$table`
    (
        ".implode(",",$fields)."
    )
    VALUES
    (
        ".implode(",",$values)."
    )
    ";

    if(!$mysqli->query($sql))
    {
        die($mysqli->error."<br><br>".$sql);
    }

    header(
        "Location: main.php?page=account&entity=".$table
    );

    exit;
}