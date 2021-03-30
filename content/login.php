<?php

require_once "initialisationOfTheStartPage.php";

//ввод данных страницы
//---------BEGIN------>>
$currentPage_PagePath = basename(__FILE__);
$currentPage_titleContent = "Авторизация";

$current_MainContent = <<<CMC
<div class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
    <form action="" class="autorization p-3">
        <fieldset class="form-group">
            <legend>Вход</legend>
            <div class="form-group">
                <label for="login-user">Логин</label>
                <input type="text" class="form-control" id="login-user" />
            </div>
            <div class="form-group">
                <label for="password-user">Пароль</label>
                <input type="password" class="form-control" id="password-user" />
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </fieldset>
    </form>
</div>
CMC;
//----------END------->>

$pageDataObj->setPagePath($currentPage_PagePath);
$pageDataObj->setTitleContent($currentPage_titleContent);
$pageDataObj->setMainContent($current_MainContent);

require_once "layout.php";
