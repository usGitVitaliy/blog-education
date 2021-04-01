<?php

function mainFillingPage(): string
{
    $pathServerRoot = $_SERVER['DOCUMENT_ROOT'] . '/';

    if (!file_exists($pathServerRoot . 'data-storage/main-list-posts')) {
        return 'Ошибка!<br />Отсутствует файл с данными';
    }

    $beginString = <<<BEG
<div class="col col-lg-7 text-center">
    <h1>Список постов</h1>
    <div class="list-group">\n
BEG;
    $endString = '</div></div>';

    $beginListItemString = <<<BEGINITEM
<a href="" class="list-group-item list-group-item-action">
    <div>
        <h2 class="h5">
BEGINITEM;

    $endListItemString = <<<ENDITEM
        </small>
    </div>
</a>\n
ENDITEM;

    $listPosts = file_get_contents($pathServerRoot . 'data-storage/main-list-posts');
    $arrListPosts_ReadFile = unserialize($listPosts);

    if (!is_array($arrListPosts_ReadFile)) {
        return 'Ошибка!<br />Данные постов отсутсвуют';
    }

    /*
    //элемент списка постов
    <a href="" class="list-group-item list-group-item-action">
        <div>
            <h2 class="h5">Обогащение урана в домашних условиях</h2>
            <small>Автор: Пупыкин Вася</small>
        </div>
    </a>\n
    */

    $stringResult = $beginString;

    foreach ($arrListPosts_ReadFile as $key => $listItem) {
        $stringResult .= $beginListItemString;

        $stringResult .= ($listItem['headerPost'] . "</h2>\n<small>Автор: ");
        $stringResult .= ($listItem['authorPost_LastName'] . " ");
        $stringResult .= $listItem['authorPost_FirstName'];

        $stringResult .= $endListItemString;
    }

    $stringResult .= $endString;
    return $stringResult;
}
