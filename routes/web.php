<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, "show"]);

Route::get('/contact', function() {
   return view('contact');
});

Route::get('/proyectos/{id}', function($id) {
    $segment = request()->segment(1); // trae la routa /proyectos
    return $id;
});

Route::prefix('/company')->group(function(){
    Route::get('/nosotros', function(){
        return "Nosotros";
    });
    Route::get('/contacto', function() {
        return "Contacto";
    });
});

Route::controller(ProjectController::class)->group(function () {
    Route::get('/projects/create', "create");
    Route::get('/projects/{project}', "show");
    Route::post('/projects', "store");
    Route::get('/projects/{project}/edit', "edit");
    Route::patch('/projects/{project}', "update");
    Route::delete('/projects/{project}', "destroy");
});
