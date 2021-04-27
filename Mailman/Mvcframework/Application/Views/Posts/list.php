<div class="col col-lg-7 text-center">
    <h1>Список постов</h1>
    <div class="list-group"><?php

    if (is_array($currentPageData)) {
        foreach ($currentPageData as $listItem) {
            echo "\n<a href=\"\" class=\"list-group-item list-group-item-action\">
                <div>
                    <h2 class=\"h5\">";

            if (isset($listItem["headerPost"])) {
                echo $listItem["headerPost"];
            } else {
                echo "";
            }

            echo '</h2>
                    <small>Автор: ';

            if (isset($listItem["authorPost_LastName"])) {
                echo "{$listItem["authorPost_LastName"]} ";
            } else {
                echo "";
            }

            if (isset($listItem["authorPost_FirstName"])) {
                echo $listItem["authorPost_FirstName"];
            } else {
                echo "";
            }

            echo "</small>
                </div>
            </a>";
        }
    } else {
        echo "ОШИБКА! Отсутствует список постов";
    }

    ?>
    </div>
</div>