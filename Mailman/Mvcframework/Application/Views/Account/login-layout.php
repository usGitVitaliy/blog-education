<div class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
    <form action="/login/validate" method="post" class="autorization p-3">
        <fieldset class="form-group">
            <legend>Вход</legend>
            <div class="form-group">
                <label for="login-user">Логин</label>
                <input type="text" class="form-control" id="login-user" name="login-user" />
            </div>
            <div class="form-group">
                <label for="password-user">Пароль</label>
                <input type="password" class="form-control" id="password-user" name="password-user" />
            </div>
            <button type="submit" class="btn btn-primary" id="submit-login">Войти</button>
        </fieldset>
    </form>
