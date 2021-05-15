<div id="registration" class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
    <form action="/registration/validate" method="post" class="autorization p-3">
        <fieldset class="form-group">
            <legend>Регистрация</legend>
            <div class="form-group">
                <!-- Фамилия -->
                <label for="lastname-user">Фамилия</label>
                <input type="text" class="form-control" id="lastname-user" name="lastname-user" />
            </div>
            <div class="form-group">
                <!-- Имя -->
                <label for="firstname-user">Имя</label>
                <input type="text" class="form-control" id="firstname-user" name="firstname-user" />
            </div>
            <div class="form-group">
                <label id="login" for="login-user">Логин
                    <?php

                    if (isset($layoutData["login-is-present"])) {
                        echo $layoutData["login-is-present"];
                    }

                    ?>
                </label>
                <input type="text" class="form-control" id="login-user" name="login-user" />
            </div>
            <div class="form-group">
                <label for="password-user">Пароль</label>
                <input type="password" class="form-control" id="password-user" name="password-user" />
            </div>
            <div class="form-group">
                <label for="password-user-confirm">Подтверждение пароля</label>
                <input type="password" class="form-control" id="password-user-confirm" name="password-user-confirm" />
            </div>
            <button type="submit" class="btn btn-primary" id="submit-registration">Регистрация</button>
        </fieldset>
    </form>
