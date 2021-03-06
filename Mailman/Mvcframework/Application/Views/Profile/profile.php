<div class="col col-lg-7 text-center profile-container">
    <h1>Профиль</h1>
    <div class="img-container-profile mx-auto">
        <img src="<?php

        if (isset($currentPageData["photo"])) {
            echo "data:image/jpeg;base64," . base64_encode($currentPageData["photo"]);
        } else {
            echo "";
        }

        ?>" alt="Фото профиля" class="img-profile" />
    </div>
    <div>
        Фамилия: <?php

        echo $currentPageData["surname"];
        ?> &nbsp;&nbsp;<button type="button" class="btn btn-link edit" id="edit-surname">изменить</button><br />
        Имя: <?php

        echo $currentPageData["name"];
        ?> &nbsp;&nbsp;<button type="button" class="btn btn-link edit" id="edit-name">изменить</button>
    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary my-3" id="edit-password">Сменить пароль</button>
            <button type="button" class="btn btn-primary my-3" id="download-image">Загрузить фото</button>
        </div>
    </div>
</div>
<div class="w-100"></div>
<div class="col col-lg-7 mt-3 text-center profile-container" id="edit"<?php

if (isset($layoutData["info-bar"])) {
    echo ">{$layoutData["info-bar"]}";
} else {
    echo " style=\"display: none;\">";
}

?>
</div>
<script type="text/javascript">
    let functionLoadContentInDivEdit = function (result) {
        $('#edit').css("display", "block");
        $('#edit').html(result);
    };

    function upDivIdEdit()
    {
        let offsetY = document.getElementById("edit").offsetTop;
        window.scrollTo(0, offsetY);
    }

    $(document).ready(function () {
        /*
        //оригинальная версия
        $('#edit-surname').click(function () {
            $.ajax({
                url: "/ajax/edit-surname",
                success: function (result) {
                    $('#edit').css("display", "block");
                    $('#edit').html(result);
                },
                complete: function (result) {
                    $('#edit').css("display", "block");
                    $('#edit').html(result);
                }
            });
        });
        //*/

        $('#edit-surname').click(function () {
            $.ajax({
                url: "/ajax/edit-surname",
                success: functionLoadContentInDivEdit,
                complete: upDivIdEdit
            });
        });

        $('#edit-name').click(function () {
            $.ajax({
                url: "/ajax/edit-name",
                success: functionLoadContentInDivEdit,
                complete: upDivIdEdit
            });
        });

        $('#edit-password').click(function () {
            $.ajax({
                url: "/ajax/edit-password",
                success: functionLoadContentInDivEdit,
                complete: upDivIdEdit
            });
        });

        $('#download-image').click(function () {
            $.ajax({
                url: "/ajax/download-photo",
                success: functionLoadContentInDivEdit,
                complete: upDivIdEdit
            });
        });
    });

    $('#edit').ready(upDivIdEdit);
</script>
