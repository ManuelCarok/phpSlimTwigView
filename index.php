<?php

    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    require_once 'vendor/autoload.php';

    $app = new \Slim\App();
    $container = $app->getContainer();

    $container['view'] = function ($container) {
        $view = new Slim\Views\Twig('app/views', [
            'cache' => false
        ]);
        return $view;
    };

    $app->get("/",function($request, $response) {
        return $this->view->render($response, 'home/dashboard.html');
    });

    $app->get("/perfil",function($request, $response) {
        return $this->view->render($response, 'home/profile.html');
    });

    $app->run();
?>