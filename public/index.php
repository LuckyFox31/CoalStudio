<?php
define('ROOT', dirname(__DIR__) . '\\');

include ROOT . 'public/config.php';

use Router\Router;
use App\Autoloader;

include ROOT . 'view/layout/layout.php';

include ROOT . 'vendor/autoload.php';

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
$router->get('community/:pseudo', 'App\Controlleurs\WebControlleur@user');

$router->run();