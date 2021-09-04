<?php
require_once __DIR__ .'/../src/support/helper.php';
require_once  base_path().'/vendor/autoload.php';

use Dotenv\Dotenv;
use Sarah\Http\Request;
use Sarah\Http\Response;
use Sarah\Http\Route;
use Sarah\support\Arr;

require_once  base_path().'/routes/web.php';

//  $route =new Route(new Request,new Response);

// dump($route->resolve());

$env=Dotenv::createImmutable(base_path());
$env->load();
 
App()->run();
var_dump(config(['database.default'=>'sqlite']));
var_dump(config());
 ?>