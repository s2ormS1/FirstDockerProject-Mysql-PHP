<?php

if(isset($_POST["tour_id"]))
{
    $_SESSION["tour_id"] = $_POST["tour_id"];
}

$tourID = 0;

if(isset($_SESSION["tour_id"]))
{
    $tourID = $_SESSION["tour_id"];
}

$countryID = 0;

if($tourID > 0)
{
    $sql = "
    SELECT id_country
    FROM tours
    WHERE id_tour = $tourID
    ";

    $resultCountry = $mysqli->query($sql);

    if($resultCountry->num_rows > 0)
    {
        $tour = $resultCountry->fetch_assoc();

        $countryID = $tour["id_country"];
    }
}

$sql = "
SELECT
    h.*,
    c.name_country
FROM hotels h
INNER JOIN country c
ON h.id_country = c.id_country
";

if($countryID > 0)
{
    $sql .= "
    WHERE h.id_country = $countryID
    ";
}

$result = $mysqli->query($sql);

/* Загружаем картинки */

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

while($hotel = $result->fetch_assoc())
{
    $country = $hotel["id_country"];

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

    $startImage = $images[array_rand($images)];

    echo "
    <div class='tour-card'>

        <img
            src='".$startImage."'
            class='tour-image'
            data-images='".$imagesJson."'>

        <h3>".$hotel["hotel_name"]."</h3>

        <p>

            ".$hotel["name_country"]."<br>

            ".$hotel["city"]."

        </p>

        <div class='tour-price'>

            ".$hotel["stars"]." ★

        </div>

        <div class='tour-actions'>

            <button
                class='tour-more'
                data-id='".$hotel["id_hotel"]."'>

                Подробнее

            </button>

            <form
                method='post'
                action='handlers/createBooking.php'>

                <input
                    type='hidden'
                    name='hotel_id'
                    value='".$hotel["id_hotel"]."'>

                <button
                    class='tour-book'
                    type='submit'>

                    Выбрать

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