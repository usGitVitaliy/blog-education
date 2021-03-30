<?php

require_once "initialisationOfTheStartPage.php";

//ввод данных страницы
//---------BEGIN------>>
$currentPage_PagePath = basename(__FILE__);
$currentPage_titleContent = "Главная";

$current_MainContent = <<<CMC
<div class="col col-lg-7 text-center">
            <h1>Список постов</h1>
            <div class="list-group">
                <a href="" class="list-group-item list-group-item-action">
                    <div>
                        <h2 class="h5">Обогащение урана в домашних условиях</h2>
                        <small>Автор: Пупыкин Вася</small>
                    </div>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                    <div>
                        <h2 class="h5">Как собрать нано-робота в гараже</h2>
                        <small>Автор: Иванов Гриша</small>
                    </div>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                    <div>
                        <h2 class="h5">Теория квантовой телепартации на примерах</h2>
                        <small>Автор: Петров Федя</small>
                    </div>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                    <div>
                        <h2 class="h5">Замена стартера на грузовике "Урал-4320"</h2>
                        <small>Автор: Маслова Сетлана</small>
                    </div>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                    <div>
                        <h2 class="h5">Как быстро ликвидировать утечку фреона в адронном колайдере при помощи подручных
средств</h2>
                        <small>Автор: Бойко Ирина</small>
                    </div>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                    <div>
                        <h2 class="h5">Как провести операцию собаке без наркоза. Молоток и доска - практическое
применение</h2>
                        <small>Автор: Нестеренко Богдан</small>
                    </div>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                    <div>
                        <h2 class="h5">Приемы фехтования на люменесцентных лампах</h2>
                        <small>Автор: Обиван Кенобе</small>
                    </div>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                    <div>
                        <h2 class="h5">Правка тормозных дисков на горном велосипеде при помощи газового ключа</h2>
                        <small>Автор: Степаненко Марина</small>
                    </div>
                </a>
            </div>
        </div>
CMC;
//----------END------->>

$pageDataObj->setPagePath($currentPage_PagePath);
$pageDataObj->setTitleContent($currentPage_titleContent);
$pageDataObj->setMainContent($current_MainContent);

require_once "layout.php";
