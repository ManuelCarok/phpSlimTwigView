<?php

    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    require_once 'vendor/autoload.php';

    $app = new \Slim\App();
    $container = $app->getContainer();
    //$router = $app->router;

    $container['view'] = function ($container) {
        $view = new Slim\Views\Twig('app/views', [
            'cache' => false
        ]);
        return $view;
    };

    $app->get("/",function($request, $response) {
        return $response->withRedirect($this->router->pathFor("Dashboard"));
    })->setName("Index");

    $app->get("/dashboard",function($request, $response) {
        return $this->view->render($response, 'home/dashboard.html');
    })->setName("Dashboard");

    $app->get("/perfil",function($request, $response) {
        return $this->view->render($response, 'home/profile.html');
    })->setName("Perfil");

    $app->run();
?>