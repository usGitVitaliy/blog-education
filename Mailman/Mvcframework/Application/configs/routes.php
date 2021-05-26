<?php

namespace Mailman\Mvcframework\Application\Configs;

//шаблон => путь
return [
    //ajax BEGIN
    "ajax/download-photo" => "ajax/downloadPhoto",
    "ajax/edit-surname" => "ajax/editSurname",
    "ajax/edit-name" => "ajax/editName",
    "ajax/edit-password" => "ajax/editPassword",
    //ajax END
    "site/about" => "site/about",
    "site/terms" => "site/terms",
    "account/login" => "account/login",
    "account/registration" => "account/registration",
    "account/loggedout" => "account/loggedOut",
    "registration/validate" => "account/validateRegistration",
    "login/validate" => "account/validateLogin",
    "input/lastname" => "profile/inputLastName",
    "input/firstname" => "profile/inputFirstName",
    "input/password" => "profile/inputPassword",
    "profile/view" => "profile/view",
    "profile/download-photo" => "profile/downloadPhoto",
    "" => "posts/list"
];
