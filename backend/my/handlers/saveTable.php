<?php

if(isset($_POST["saveTable"]))
{
    $table = $_POST["table_name"];

    $allowedTables = array();

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
        $allowedTables[] = $row["name_of_table"];
    }

    if(in_array($table,$allowedTables))
    {
        if($table == "access")
        {
            foreach($_POST["data"] as $key => $row)
            {
                $id_user = (int)$row["id_user"];
                $id_table = (int)$row["id_table"];
                $accesses = (int)$row["accesses"];

                $sql = "
                UPDATE access
                SET accesses = $accesses
                WHERE id_user = $id_user
                AND id_table = $id_table
                ";

                $mysqli->query($sql);
            }
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

            $pk = $primaryKeys[$table];

            foreach($_POST["data"] as $id => $row)
            {
                $fields = array();

                foreach($row as $column => $value)
                {
                    if($column == $pk)
                    {
                        continue;
                    }

                    $fields[] =
                    "`".$column."`='".
                    $mysqli->real_escape_string($value).
                    "'";
                }

                $sql = "
                UPDATE `$table`
                SET ".implode(",",$fields)."
                WHERE `$pk`='".$mysqli->real_escape_string($id)."'
                ";

                $mysqli->query($sql);
            }
        }
    }

    header(
        "Location: main.php?page=account&entity=".$table
    );

    exit;
}