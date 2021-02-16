<?php
error_reporting(E_ALL);

session_start();

require_once '../system/core/functions.php';

use system\core\Router;

$qStr = $_SERVER['QUERY_STRING'];


define("ROOT", dirname(__DIR__));
define('LAYOUT', 'default');

spl_autoload_register(function ($className){
    $className = ROOT .'/'. str_replace('\\', '/', $className) . '.php';

    if(file_exists($className)) include $className;
});


/**
 * rules
 */
Router::add(['^news/detail/(?P<id>[0-9]+)/?$' => ['controller' => 'News', 'action' => 'detail']]);


/**
 * admin rules
 */
Router::add(['^admin$' => ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin\\']]);
Router::add(['^admin/(?P<controller>[a-z0-9-]+)/?(?P<action>[a-z0-9-]+)?$' => ['prefix' => 'admin\\']]);


/**
 * default rules
 */
Router::add(['^$' => ['controller' => 'Main', 'action' => 'index']]);
Router::add(['^(?P<controller>[a-z0-9-]+)/?(?P<action>[a-z0-9-]+)?$' => []]);


Router::dispatch($qStr);

