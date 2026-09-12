<div class="account-container">

    <!-- ПРОФИЛЬ -->

    <div class="account-card">

        <h2>Мой профиль</h2>

        <form method="post">

            <table>

                <tr>
                    <td>ФИО</td>
                    <td>
                        <input
                            type="text"
                            name="fio"
                            value="<?= $userData["FIO"] ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input
                            type="text"
                            name="email"
                            value="<?= $userData["Email"] ?>">
                    </td>
                </tr>

                <tr>
                    <td>Телефон</td>
                    <td>
                        <input
                            type="text"
                            name="phone"
                            value="<?= $userData["Phone"] ?>">
                    </td>
                </tr>

                <tr>
                    <td>Пароль</td>
                    <td>
                        <input
                            type="text"
                            name="password"
                            value="<?= $userData["Password"] ?>">
                    </td>
                </tr>

            </table>

            <button
                type="submit"
                name="saveProfile"
                class="main-btn">

                Сохранить

            </button>

        </form>

    </div>

    <!-- БРОНИРОВАНИЯ -->

    <div class="account-card">

        <h2>Мои бронирования</h2>

        <?php

        $sql = "
        SELECT *
        FROM booking
        WHERE id_client = $userID
        ";

        $bookings = $mysqli->query($sql);

        if($bookings->num_rows == 0)
        {
            echo "<p>Вы ещё ничего не бронировали.</p>";
        }
        else
        {
            while($booking = $bookings->fetch_assoc())
            {
                $status = $booking["status_booking"];

                $statusColor = "#555";

                if($status == "Оплачено")
                {
                    $statusColor = "green";
                }
                elseif($status == "Подтверждено")
                {
                    $statusColor = "#0077cc";
                }
                elseif($status == "Ожидает оплаты")
                {
                    $statusColor = "#d4af37";
                }
                elseif($status == "Отменено")
                {
                    $statusColor = "red";
                }

                echo '
                <div class="booking-item">

                    <div class="booking-left">

                        <div class="booking-title">
                            Бронь №'.$booking["id_booking"].'
                        </div>

                        <div class="booking-status">

                            Статус:

                            <span style="color:'.$statusColor.'; font-weight:bold;">
                                '.$status.'
                            </span>

                        </div>

                    </div>
                    <div class="booking-right">
                ';

                // ✔ кнопка ВНУТРИ карточки
                if($status == "Ожидает оплаты")
                {
                    echo '
                    <form method="post" action="handlers/payBooking.php">

                        <input type="hidden" name="id_booking" value="'.$booking["id_booking"].'">

                        <button class="pay-btn" type="submit">
                            Оплатить
                        </button>

                    </form>
                    ';
                }
                echo '
                <button
                    class="booking-more"
                    data-id="'.$booking["id_booking"].'">

                    Подробнее

                </button>
                ';
                echo '
                </div>

            </div>';
            }
        }

        ?>

    </div>

</div>

<?php

if($isAdmin)
{
    include("admin/adminPanel.php");

    if(isset($_GET["entity"]))
    {
        include("admin/adminTable.php");
        include("admin/adminAddForm.php");
    }
}

?>