<?php

namespace app\core;

class Application {

    public Router $router;
    public Request $request;
    public Response $response;

    public static string $ROOT_DIRECTOR;
    public static Application $app;

    public function __construct($rootPath) {

        //Delcare the root path of our directories
        self::$ROOT_DIRECTOR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
    }

    public function run() {
        echo $this->router->resolve();
    }
}