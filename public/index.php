<?php

require_once __DIR__ .'/../vendor/autoload.php';
use app\core\Application;
use app\controllers\ContactController;

$rootDir = dirname(__DIR__);
    
$application  = new Application($rootDir);

$application->router->get('/',function(){
    return "Hello world";
});

$application->router->post('/users',[ContactController::class,'handeSubmittedForm']);


$application->router->get('/users',[ContactController::class,'home']);


$application->run();

?>