<div class="auth-block">

    <div class="tabs">

        <a href="?mode=register"
           class="<?= ($mode=='register') ? 'active' : '' ?>">
           Регистрация
        </a>

        <a href="?mode=login"
           class="<?= ($mode=='login') ? 'active' : '' ?>">
           Вход
        </a>

    </div>

    <?php if($errorMessage != "") { ?>

        <div class="popup-error">
            <?= $errorMessage ?>
        </div>

    <?php } ?>

    <?php if($mode=="register") { ?>

    <form method="post" action="">

        <input type="text" name="fio" placeholder="ФИО">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Телефон">
        <input type="password" name="pass1" placeholder="Пароль">
        <input type="password" name="pass2" placeholder="Повторите пароль">

        <button
        type="submit"
        class="main-btn">

        Зарегистрироваться

        </button>

    </form>

    <?php } else { ?>

    <form method="post" action="mainPage.php">

        <input
        type="text"
        name="login"
        placeholder="Email или телефон">

        <input
        type="password"
        name="password"
        placeholder="Пароль">

        <button
        type="submit"
        class="main-btn">

        Войти

        </button>

    </form>

    <?php } ?>

</div>