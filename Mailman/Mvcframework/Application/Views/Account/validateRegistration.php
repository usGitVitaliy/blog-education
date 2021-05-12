<?php

require_once VIEW_PATH . "/Account/registration-layout.php";

echo <<<SPECIFICATION
<div class="row">
    <script>
        window.onload = function(){
            let offsetY = document.getElementById('registration-specification').offsetTop;
            window.scrollTo(0, offsetY);
        }
    </script>

<div id="registration-specification" class="col m-3">
SPECIFICATION;


if (isset($layoutData["registration-specification"])) {
    echo $layoutData["registration-specification"];
}

echo "</div>\n</div>\n</div>";
