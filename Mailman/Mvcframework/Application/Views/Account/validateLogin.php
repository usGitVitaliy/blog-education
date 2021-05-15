<?php

require_once VIEW_PATH . "/Account/login-layout.php";

echo <<<INFOBAR
<div class="row">\n
<div class="col m-3 info-bar">\n
INFOBAR;

if (isset($layoutData["info-bar"])) {
    echo $layoutData["info-bar"];
}

echo "</div>\n</div>\n</div>";
