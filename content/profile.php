<?php

require_once "initialisationOfTheStartPage.php";

//ввод данных страницы
//---------BEGIN------>>
$currentPage_PagePath = basename(__FILE__);
$currentPage_titleContent = "Профиль";

$current_MainContent = <<<CMC
<div class="col col-lg-7 text-center profile-container">
    <h1>Профиль</h1>
    <div class="img-container-profile mx-auto">
        <img src="" alt="Фото профиля" class="img-profile" />
    </div>
    <div>
        <p>Фамилия: asdasd</p>
        <p>Имя: asdaSD</p>
    </div>
</div>
CMC;
//----------END------->>

$pageDataObj->setPagePath($currentPage_PagePath);
$pageDataObj->setTitleContent($currentPage_titleContent);
$pageDataObj->setMainContent($current_MainContent);

require_once "layout.php";
