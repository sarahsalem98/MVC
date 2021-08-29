<?php

use app\controllers\HomeController;
use Sarah\Http\Route;
Route::get('/',[HomeController::class,'index']);
?>