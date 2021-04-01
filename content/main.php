<?php

require_once "initialisationOfTheStartPage.php";
require_once $pathServerRoot . "content-functional/main-filling.php";

//ввод данных страницы
//---------BEGIN------>>
$currentPage_PagePath = basename(__FILE__);
$currentPage_titleContent = "Главная";

$current_MainContent = mainFillingPage();
//----------END------->>

$pageDataObj->setPagePath($currentPage_PagePath);
$pageDataObj->setTitleContent($currentPage_titleContent);
$pageDataObj->setMainContent($current_MainContent);

require_once "layout.php";
