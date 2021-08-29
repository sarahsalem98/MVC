<?php
require_once __DIR__ .'/../src/support/helper.php';
require_once  base_path().'/vendor/autoload.php';
use Sarah\Http\Request;
use Sarah\Http\Response;
use Sarah\Http\Route;

require_once  base_path().'/routes/web.php';

 $route =new Route(new Request,new Response);

dump($route->resolve());

 ?>