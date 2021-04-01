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

            require_once $pathServerRoot . "content/initialisationOfTheStartPage.php";
            //echo $pathServerRoot . "content/initialisationOfTheStartPage.php";

//вставка навигации
//--BEGIN-->>
            $navigationContent = <<<NAV
            <li class="nav-item">
                <a href="../content/main.php" class="nav-link">Главная</a>
            </li>
            <li class="nav-item">
                <a href="../content/terms.php" class="nav-link">Правила</a>
            </li>
            <li class="nav-item">
                <a href="../content/about.php" class="nav-link">О проекте</a>
            </li>
            <li class="nav-item">
                <a href="../content/login.php" class="nav-link">Логин</a>
            </li>
            <li class="nav-items">
                <a href="../content/registration.php" class="nav-link">Регистрация</a>
            </li>
NAV;
//--END-->>
            //добавляем disabled к ссылке активной страницы
            //<a href="../content/main.php" class="nav-link">Главная</a>
            //==>
            //<a href="../content/main.php" class="nav-link disabled">Главная</a>
            $searchFileName = $pageDataObj->getPagePath();
            $LengthFileName = strcspn($searchFileName, '.php');
            $searchFileName = substr($searchFileName, 0, $LengthFileName);
            $searchPattern = "#<a href=\"\.\./content/$searchFileName\.php\" class=\"nav-link\">#";

            $navigationContent = preg_replace(
                $searchPattern,
                "<a href=\"#\" class=\"nav-link disabled\">",
                $navigationContent
            );

            //добавляем <span class="sr-only">(текущая)</span> в ссылку
            //<a href="../content/main.php" class="nav-link disabled">Главная</a>
            //==>
         //<a href="../content/main.php" class="nav-link disabled">Главная<span class=\"sr-only\">(текущая)</span></a>
            $navigationContent = preg_replace(
                "#(?<=disabled\")(.+)(?=</a>)#",
                "$1<span class=\"sr-only\">(текущая)</span>",
                $navigationContent
            );

            echo $navigationContent;
            ?>
        </ul>
    </div>
</nav>
