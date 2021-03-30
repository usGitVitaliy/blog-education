<?php

require_once "initialisationOfTheStartPage.php";

//ввод данных страницы
//---------BEGIN------>>
$currentPage_PagePath = basename(__FILE__);
$currentPage_titleContent = "";

$current_MainContent = <<<CMC
CMC;
//----------END------->>

$pageDataObj->setPagePath($currentPage_PagePath);
$pageDataObj->setTitleContent($currentPage_titleContent);
$pageDataObj->setMainContent($current_MainContent);

require_once "layout.php";
