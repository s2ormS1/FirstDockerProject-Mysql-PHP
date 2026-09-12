<div class="topbar">
    <div class='logo-block'>
        <img src="images/logo2.png" class="logo">
        <div class="logo-text">
            <div class="logo-main">ТАТАР ТУРИ</div>
            <div class="logo-sub">Открой мир с нами</div>
        </div>
    </div>
    <div class="menu">

        <a href="?page=home"
           class="<?= ($page=="home") ? "active" : "" ?>">
           Главная
        </a>

        <a href="?page=tours"
           class="<?= ($page=="tours") ? "active" : "" ?>">
           Туры
        </a>

        <a href="?page=hotels"
           class="<?= ($page=="hotels") ? "active" : "" ?>">
           Отели
        </a>

        <a href="?page=account"
           class="<?= ($page=="account") ? "active" : "" ?>">
           Аккаунт
        </a>

        <?php if(isset($_SESSION["user_id"])) { ?>

            <a href="handlers/logout.php" class="logout-btn">
                Выход
            </a>

        <?php } ?>

    </div>

</div>