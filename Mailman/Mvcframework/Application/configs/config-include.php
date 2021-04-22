<?php

namespace Mailman\Mvcframework\Application\Configs;

use Mailman\Mvcframework\Application\Core\Router;

require_once("config-define.php");
require_once("Mailman/Mvcframework/Application/Core/Router.php");

$route = new Router();
$route->startRouting();
