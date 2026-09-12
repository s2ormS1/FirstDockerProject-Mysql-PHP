<?php

if(
    $entity != "access"
    &&
    $entity != "tables"
)
{
    echo "<br><br>";

    echo "
    <div class='admin-add-form'>

    <h3>Добавить запись</h3>

    <form method='post'>

    <input
    type='hidden'
    name='table_name'
    value='$entity'>
    ";

    $primaryKeys = array(
        "clients" => "ClientsID",
        "booking" => "id_booking",
        "country" => "id_country",
        "hotels" => "id_hotel",
        "pictures" => "id_pict",
        "tables" => "id_table",
        "tours" => "id_tour"
    );

    foreach($fields as $field)
    {
        if(
            isset($primaryKeys[$entity])
            &&
            $field == $primaryKeys[$entity]
        )
        {
            continue;
        }

        echo "
        <div class='form-row'>

        <label>$field</label>

        <input
        type='text'
        name='newdata[$field]'>

        </div>
        ";
    }

    echo "
    <button
    type='submit'
    name='addRow'
    class='main-btn'>

    Добавить запись

    </button>

    </form>

    </div>
    ";
}

?>