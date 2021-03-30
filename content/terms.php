<?php

require_once "initialisationOfTheStartPage.php";

//ввод данных страницы
//---------BEGIN------>>
$currentPage_PagePath = basename(__FILE__);
$currentPage_titleContent = "Правила";
$currentPage_PageName = "Правила";

$current_MainContent = <<<CMC
<div class="col-sm-8">
    При использовании ресурса запрещается употребление ругательских жаргонизмов и ненормативной лексики.
    Нарушение данных правил повлечет за собой блокировку аккаунта.
</div>
CMC;
//----------END------->>

$pageDataObj->setPagePath($currentPage_PagePath);
$pageDataObj->setTitleContent($currentPage_titleContent);
$pageDataObj->setMainContent($current_MainContent);

//require_once "layout.php";
require_once "layout.php";
