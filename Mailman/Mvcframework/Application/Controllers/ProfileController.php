<?php

namespace Mailman\Mvcframework\Application\Controllers;

use Mailman\Mvcframework\Application\Core\Controller;
use Mailman\Mvcframework\Application\Core\View;
use Mailman\Mvcframework\Application\Models\AuthorsModel;
use Mailman\Mvcframework\library\Convert;
use Mailman\Mvcframework\Application\Logic\ValidateFormInput;

class ProfileController extends Controller
{
    private string $layoutPath;
    private array $layoutData;
    private array $currentPageData;
    private string $view_FilePath;

    public function __construct()
    {
        $this->layoutPath = LAYOUTS_PATH . "default/layout.php";
        $this->layoutData = ["title" => "Профиль", "currentPage--nav-a" => "Профиль"];

        $authorsModelOject = new AuthorsModel();
        session_start();

        if (isset($_SESSION["login"])) {
            $this->currentPageData = Convert::convertToArrayAuthorFields(
                $authorsModelOject->getAuthorByLogin($_SESSION["login"])
            );
        } else {
            echo "404";
            return;
        }

        session_write_close();

        $this->view_FilePath = VIEW_PATH . "Profile/profile.php";
    }

    public function viewAction()
    {
        View::renderPage($this->layoutPath, $this->view_FilePath, $this->layoutData, $this->currentPageData);
    }

    public function inputLastNameAction()
    {
        $this->layoutData["info-bar"] = "";

        if (ValidateFormInput::lastName($_POST["lastname-user"], $this->layoutData["info-bar"])) {
            $this->layoutData["info-bar"] = "Фамилия изменена";

            $authorsModel = new AuthorsModel();

            session_start();
            $author = $authorsModel->getAuthorByLogin($_SESSION["login"]);
            session_write_close();

            $author->surname = $_POST["lastname-user"];
            $authorsModel->modificationAuthor($author);

            $this->currentPageData["surname"] = $_POST["lastname-user"];
        }

        View::renderPage($this->layoutPath, $this->view_FilePath, $this->layoutData, $this->currentPageData);
    }

    public function inputFirstNameAction()
    {
        $this->layoutData["info-bar"] = "";

        if (ValidateFormInput::firstName($_POST["firstname-user"], $this->layoutData["info-bar"])) {
            $this->layoutData["info-bar"] = "Имя изменено";

            $authorsModel = new AuthorsModel();

            session_start();
            $author = $authorsModel->getAuthorByLogin($_SESSION["login"]);
            $_SESSION["username"] = $_POST["firstname-user"];
            session_write_close();

            $author->name = $_POST["firstname-user"];
            $authorsModel->modificationAuthor($author);

            $this->currentPageData["name"] = $_POST["firstname-user"];
        }

        View::renderPage($this->layoutPath, $this->view_FilePath, $this->layoutData, $this->currentPageData);
    }

    public function inputPasswordAction()
    {
        $this->layoutData["info-bar"] = "";

        if (ValidateFormInput::password($_POST["password"], $this->layoutData["info-bar"])) {
            $this->layoutData["info-bar"] = "Пароль изменен";

            $authorsModel = new AuthorsModel();

            session_start();
            $author = $authorsModel->getAuthorByLogin($_SESSION["login"]);
            session_write_close();

            $author->password = $_POST["password"];
            $authorsModel->modificationAuthor($author);
        }

        View::renderPage($this->layoutPath, $this->view_FilePath, $this->layoutData, $this->currentPageData);
    }

    public function downloadPhotoAction()
    {
        $this->layoutPath = LAYOUTS_PATH . "default/layout.php";
        $this->layoutData = ["title" => "Профиль", "currentPage--nav-a" => "Профиль"];

        if (isset($_FILES["download-photo"])) {
            $originFileName = $_FILES["download-photo"]["name"];
            $filename = $_FILES["download-photo"]["tmp_name"];
        } else {
            $filename = "";
        }

        if (!empty($filename)) {
            //echo "Файл есть";

            if (preg_match("#.+\.(jpeg|jpg)$#", $originFileName)) {
                if (file_exists($filename)) {
                    //файл записан в директорию

                    $finfo = finfo_open(FILEINFO_MIME_TYPE); // возвращает mime-тип

                    //image/jpeg
                    $fileType = finfo_file($finfo, $filename);

                    if ($fileType === "image/jpeg") {
                        $photoInfo = getimagesize($filename);

                        if ($photoInfo[0] < 321 && $photoInfo[1] < 321) {
                            //echo "Фото подходит";

                            $authorModel = new AuthorsModel();
                            session_start();
                            $author = $authorModel->getAuthorByLogin($_SESSION["login"]);
                            session_write_close();
                            $author->photo = file_get_contents($filename);
                            $authorModel->modificationAuthor($author);

                            $this->currentPageData["photo"] = $author->photo;
                        } else {
                            //echo "ОШИБКА! Разрешение фото превышает размеры 320x320";
                            $this->layoutData["info-bar"] = "ОШИБКА! Разрешение фото превышает размеры 320x320";
                        }
                    } else {
                        //echo "ОШИБКА! Неверный mime-тип файла";
                        $this->layoutData["info-bar"] = "ОШИБКА! Неверный mime-тип файла";
                    }
                } else {
                    //echo "ОШИБКА! Файл не записан в диеркторию";
                    $this->layoutData["info-bar"] = "ОШИБКА! Файл не записан в диеркторию";
                }
            } else {
                //echo "ОШИБКА! Неверное разширение файла";
                $this->layoutData["info-bar"] = "ОШИБКА! Неверное разширение файла";
            }
        } else {
            //echo "ОШИБКА! Файл не введенн";
            $this->layoutData["info-bar"] = "ОШИБКА! Файл не введенн";
        }

        View::renderPage($this->layoutPath, $this->view_FilePath, $this->layoutData, $this->currentPageData);
    }
}
