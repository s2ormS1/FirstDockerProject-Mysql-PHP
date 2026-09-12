<?php

$sql = "
SELECT
    t.*,
    c.name_country
FROM tours t
INNER JOIN country c
ON t.id_country = c.id_country
";

$result = $mysqli->query($sql);

/* Загружаем картинки один раз */

$pictures = array();

$sqlPictures = "
SELECT *
FROM pictures
";

$resultPictures = $mysqli->query($sqlPictures);

while($picture = $resultPictures->fetch_assoc())
{
    $country = $picture["id_country"];

    if(!isset($pictures[$country]))
    {
        $pictures[$country] = array();
    }

    $pictures[$country][] = $picture["image_link"];
}

echo "
<div class='tours-page'>

    <button class='tour-arrow left'>❮</button>

    <div class='tour-window'>
        <div class='tour-track'>
";

while($tour = $result->fetch_assoc())
{
    $country = $tour["id_country"];

    /* проверка на существование картинок */
    if(isset($pictures[$country]))
    {
        $images = $pictures[$country];
    }
    else
    {
        $images = array();
    }

    if(count($images) == 0)
    {
        continue;
    }

    $imagesJson = htmlspecialchars(json_encode($images), ENT_QUOTES);

    $randIndex = array_rand($images);
    $startImage = $images[$randIndex];

    echo "
    <div class='tour-card'>

        <img
            src='".$startImage."'
            class='tour-image'
            data-images='".$imagesJson."'>

        <h3>".$tour["name_country"]."</h3>

        <p>
            ".$tour["date_start"]." — ".$tour["date_end"]."
        </p>

        <div class='tour-price'>
            ".$tour["price"]." ₽
        </div>

        <div class='tour-actions'>

            <button class='tour-more' data-id='".$tour["id_tour"]."'>
                Подробнее
            </button>

            <form method='post' action='main.php?page=hotels'>

                <input
                    type='hidden'
                    name='tour_id'
                    value='".$tour["id_tour"]."'>

                <button
                    class='tour-book'
                    type='submit'>

                    Забронировать

                </button>

            </form>

        </div>

    </div>
    ";
}

echo "
        </div>
    </div>

    <button class='tour-arrow right'>❯</button>

</div>
";

?>