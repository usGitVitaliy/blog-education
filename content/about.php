<?php

require_once "initialisationOfTheStartPage.php";

//ввод данных страницы
//---------BEGIN------>>
$currentPage_PagePath = basename(__FILE__);
$currentPage_titleContent = "О проекте";

$current_MainContent = <<<CMC
<div class="col-sm-8">
    Данный проект создан и развивается исключительно в учебных целях. Поэтому на сайте могут присутствовать
    ошибки как технологического характера, так и другие.
</div>
CMC;
//----------END------->>

$pageDataObj->setPagePath($currentPage_PagePath);
$pageDataObj->setTitleContent($currentPage_titleContent);
$pageDataObj->setMainContent($current_MainContent);

require_once "layout.php";
