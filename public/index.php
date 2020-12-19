<?php
define('ROOT', dirname(__DIR__) . '\\');

use Router\Router;
use App\Autoloader;

include ROOT . 'app/Autoloader.php';
Autoloader::register();

$router = new Router($_GET['url']);

/**
 * Router :
 * function get($path, Controlleurs@function_name)
 * function run()
 */

// Welcome
$router->get('/', 'App\Controlleurs\WebControlleur@index');

$router->get('games/', 'App\Controlleurs\WebControlleur@games');

$router->get('community/', 'App\Controlleurs\WebControlleur@community');

$router->run();