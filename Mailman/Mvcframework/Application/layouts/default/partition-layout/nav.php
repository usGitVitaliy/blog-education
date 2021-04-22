<nav class="navbar navbar-expand-lg navbar-light">
    <span id="nav-panel-text" class="navbar-brand">Панель навигации</span>
    <button id="nav-expand-button" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!--
            <li class="nav-item">
                <a href="#" class="nav-link disabled">Главная<span class="sr-only">(текущая)</span></a>
            </li>
            -->
            <?php

//вставка навигации
//--BEGIN-->>
            $navigationContent = <<<NAV
            <li class="nav-item">
                <a href="/" class="nav-link">Главная</a>
            </li>
            <li class="nav-item">
                <a href="/site/terms" class="nav-link">Правила</a>
            </li>
            <li class="nav-item">
                <a href="/site/about" class="nav-link">О проекте</a>
            </li>
            <li class="nav-item">
                <a href="/account/login" class="nav-link">Логин</a>
            </li>
            <li class="nav-items">
                <a href="/account/registration" class="nav-link">Регистрация</a>
            </li>
NAV;
//--END-->>
            //добавляем disabled к ссылке активной страницы
            //<a href="../content/main.php" class="nav-link">Главная</a>
            //==>
            //<a href="../content/main.php" class="nav-link disabled">Главная</a>


            //$layoutData = ["title" => "Правила", "currentPage--nav-a" => "Правила"]

            $searchPattern = "#class=\"nav-link\">{$layoutData["currentPage--nav-a"]}#";
            $navigationContent = preg_replace(
                $searchPattern,
                "class=\"nav-link disabled\">{$layoutData["currentPage--nav-a"]}",
                $navigationContent
            );

            //*
            //добавляем <span class="sr-only">(текущая)</span> в ссылку
            //<a href="../content/main.php" class="nav-link disabled">Главная</a>
            //==>
         //<a href="../content/main.php" class="nav-link disabled">Главная<span class=\"sr-only\">(текущая)</span></a>
            $navigationContent = preg_replace(
                "#(?<=disabled\")(.+)(?=</a>)#",
                "$1<span class=\"sr-only\">(текущая)</span>",
                $navigationContent
            );
            //*/

            echo $navigationContent;
            ?>
        </ul>
    </div>
</nav>
