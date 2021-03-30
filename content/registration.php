<?php

require_once "initialisationOfTheStartPage.php";

//ввод данных страницы
//---------BEGIN------>>
$currentPage_PagePath = basename(__FILE__);
$currentPage_titleContent = "Регистрация";
$currentPage_PageName = "Регистрация";

$current_MainContent = <<<CMC
<div class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
    <form action="" class="autorization p-3">
        <fieldset class="form-group">
            <legend>Регистрация</legend>
            <div class="form-group">
                <!-- Фамилия -->
                <label for="lastname-user">Фамилия</label>
                <input type="text" class="form-control" id="lastname-user" />
            </div>
            <div class="form-group">
                <!-- Имя -->
                <label for="firstname-user">Имя</label>
                <input type="text" class="form-control" id="firstname-user" />
            </div>
            <div class="form-group">
                <label for="login-user">Логин</label>
                <input type="text" class="form-control" id="login-user" />
            </div>
            <div class="form-group">
                <label for="password-user">Пароль</label>
                <input type="password" class="form-control" id="password-user" />
            </div>
            <div class="form-group">
                <label for="password-user-confirm">Подтверждение пароля</label>
                <input type="password" class="form-control" id="password-user-confirm" />
            </div>
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </fieldset>
    </form>
</div>
CMC;
//----------END------->>

$pageDataObj->setPagePath($currentPage_PagePath);
$pageDataObj->setTitleContent($currentPage_titleContent);
$pageDataObj->setMainContent($current_MainContent);

require_once "layout.php";
