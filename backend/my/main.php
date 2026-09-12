<?php

session_start();

include("ConnectFunction.php");
ConnectFunctionAnswer();

include("includes/auth.php");

include("handlers/saveProfile.php");
include("handlers/saveTable.php");
include("handlers/deleteRow.php");
include("handlers/addRow.php");

$page = "home";

if(isset($_GET["page"]))
{
    $page = $_GET["page"];
}
if(
    isset($_SESSION["tour_id"])
    &&
    $page != "hotels"
)
{
    unset($_SESSION["tour_id"]);
}

$bodyOverflow = "hidden";

if($page == "account")
{
    $bodyOverflow = "auto";
}

include("includes/header.php");

include("includes/topbar.php");
?>

<?php

if($page == "tours")
{
    include("pages/tours.php");
}
else if ($page == "hotels")
    {
         include("pages/hotels.php");
    }
    else
    {
        echo "<div class='content'>";

        switch($page)
        {
            case "home":
                include("pages/home.php");
                break;

            case "account":
                include("pages/account.php");
                break;

            default:
                include("pages/home.php");
                break;
        }

        echo "</div>";
    }
?>

<?php

include("includes/footer.php");