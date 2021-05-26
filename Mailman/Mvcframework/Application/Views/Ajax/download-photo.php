<form enctype="multipart/form-data" action="/profile/download-photo" method="post" class="pl-3 pr-3 pb-3">
    <div class="form-row justify-content-center">
        <div class="col-auto mt-3">
            Изображение должно быть в формате .jpeg, .jpg и иметь разрешение 320x320
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLangHTML" name="download-photo" />
                <label class="custom-file-label" for="customFileLangHTML" data-browse="Выбрать">Фото</label>
            </div>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-auto mt-3" id="submit-download">
            <button type="submit" class="btn btn-primary" id="download-photo-submit" name="submit">Загрузить</button>
        </div>
    </div>
</form>
