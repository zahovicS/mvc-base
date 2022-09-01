<?php
//Libs
require_once dirname(__DIR__) . "/App/Configs/Configs.php";
require_once dirname(__DIR__) . "/App/Libs/Base.php";
require_once dirname(__DIR__) . "/App/Libs/Controller.php";
require_once dirname(__DIR__) . "/App/Libs/Model.php";
require_once dirname(__DIR__) . "/App/Libs/Router.php";
// require_once dirname(__DIR__) . "/App/Libs/Core.php"; - not use Core
//Autload
spl_autoload_register(function ($clase) {
    require_once dirname(__DIR__) . "/App/Controllers/" . $clase . ".php";
    // require_once dirname(__DIR__) . "/App/Libs/" . $clase . ".php";
});
//other
require '../vendor/autoload.php';
$router = new Router();
$web = new Web();
#LOGIN
$router->get('/', Login::class . "::index");
$router->post('/Login', Login::class . "::loger");
$router->post('/Login/logout', Login::class . "::logout");
#END LOGIN
#TESTING
$router->post('/post', function (array $params = []) {
    dd($params);
});
$router->get('/test', Web::class . "::request");
#END TESTING
$router->addNotFoundHandler(function () use ($web) {
    $web->_404();
});
$router->run();