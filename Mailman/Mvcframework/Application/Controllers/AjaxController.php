<?php

namespace Mailman\Mvcframework\Application\Controllers;

class AjaxController
{
    private string $ajaxFilePath = VIEW_PATH . 'Ajax/';

    public function editSurnameAction()
    {
        require_once $this->ajaxFilePath . 'edit-surname.php';
    }

    public function editNameAction()
    {
        require_once $this->ajaxFilePath . 'edit-name.php';
    }

    public function editPasswordAction()
    {
        require_once $this->ajaxFilePath . 'edit-password.php';
    }

    public function downloadPhotoAction()
    {
        require_once $this->ajaxFilePath . 'download-photo.php';
    }
}
