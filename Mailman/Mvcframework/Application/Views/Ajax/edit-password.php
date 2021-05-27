<form action="/input/password" method="post" class="pl-3 pr-3 pb-3">
    <div class="form-row justify-content-center">
        <div class="col-auto mt-3">
            <input type="password" class="form-control" maxlength="15" placeholder="Старый пароль" name="password" />
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-auto mt-3">
            <input type="password" class="form-control" maxlength="15" placeholder="Новый пароль" name="new-password" />
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-auto mt-3">
            <input type="password" class="form-control" maxlength="15" placeholder="Пароль подтверждение"
                   name="confirm-password" />
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-auto mt-3" id="submit-edit">
            <button type="submit" class="btn btn-primary" id="edit-surname-submit">Изменить</button>
        </div>
    </div>
</form>
