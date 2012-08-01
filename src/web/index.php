<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$app = new Application();
$app->setControllerPath(__DIR__ . '/../app/controllers');

$app->bootstrap("view", function(){
    $view = new View();
    $view->setViewPath(__DIR__ . '/../app/views');

    return $view;
});

$app->bootstrap("layout", function(){
    $layout = new Layout();
    $layout->setViewPath(__DIR__ . '/../app/layouts');

    return $layout;
});

$app->run();
