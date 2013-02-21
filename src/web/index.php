<?php
require_once __DIR__ . '/../../vendor/autoload.php';

define ("APPLICATION_ENV", 'development');

$app = new Application();
$app->setControllerPath(__DIR__ . '/../app/controllers');

$classLoader = new \Doctrine\Common\ClassLoader('Wdm', __DIR__ . '/../app/models');
$classLoader->register();

$app->bootstrap("config", function() {
    $config = new Config();
    $config->load(__DIR__ . '/../app/configs/application.ini');
    
    return $config;
});

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

$app->bootstrap("entityManager", function() use ($app) {
    
    $config = new \Doctrine\ORM\Configuration(); // (2)
    
    // Proxy Configuration
    $config->setProxyDir(__DIR__ . '/../app/models/Wdm/Proxies');
    $config->setProxyNamespace('Wdm\Proxies');
    $config->setAutoGenerateProxyClasses((APPLICATION_ENV == "development"));
    
    // Mapping Configuration
    $driverImpl = $config->newDefaultAnnotationDriver(__DIR__);
    $config->setMetadataDriverImpl($driverImpl);
    
    $entityManager = \Doctrine\ORM\EntityManager::create(
        $app->getBootstrap()->getResource("config")->database()->toArray(), 
        $config
    );
    return $entityManager;
});

$app->run();
