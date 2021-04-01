<?php

// Создание списка постов в виде массива
// и сохренение его в файл

$arrListPosts = array();

$arrListPosts[] = array(
    'headerPost' => 'Обогащение урана в домашних условиях',
    'authorPost_LastName' => 'Пупыкин',
    'authorPost_FirstName' => 'Вася'
);

$arrListPosts[] = array(
    'headerPost' => 'Как собрать нано-робота в гараже',
    'authorPost_LastName' => 'Иванов',
    'authorPost_FirstName' => 'Гриша'
);

$arrListPosts[] = array(
    'headerPost' => 'Теория квантовой телепартации на примерах',
    'authorPost_LastName' => 'Петров',
    'authorPost_FirstName' => 'Федя'
);

$arrListPosts[] = array(
    'headerPost' => 'Замена стартера на грузовике "Урал-4320"',
    'authorPost_LastName' => 'Маслова',
    'authorPost_FirstName' => 'Светлана'
);

$arrListPosts[] = array(
    'headerPost' => 'Как быстро ликвидировать утечку фреона в адронном колайдере при помощи подручных средств',
    'authorPost_LastName' => 'Бойко',
    'authorPost_FirstName' => 'Ирина'
);

$arrListPosts[] = array(
    'headerPost' => 'Как провести операцию собаке без наркоза. Молоток и доска - практическое применение',
    'authorPost_LastName' => 'Нестеренко',
    'authorPost_FirstName' => 'Богдан'
);

$arrListPosts[] = array(
    'headerPost' => 'Приемы фехтования на люменесцентных лампах',
    'authorPost_LastName' => 'Обиван',
    'authorPost_FirstName' => 'Кенобе'
);

$arrListPosts[] = array(
    'headerPost' => 'Правка тормозных дисков на горном велосипеде при помощи газового ключа',
    'authorPost_LastName' => 'Степаненко',
    'authorPost_FirstName' => 'Марина'
);

$listPosts = serialize($arrListPosts);

$pathServerRoot = $_SERVER['DOCUMENT_ROOT'] . '/';
file_put_contents($pathServerRoot . 'data-storage/main-list-posts', $listPosts);
