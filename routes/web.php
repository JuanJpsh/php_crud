<?php

use App\Http\Controllers\CrudController;
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

Route::get('/', [CrudController::class, "index"])->name("crud.index");
Route::get("/actor-{id}",[CrudController::class, "actor"])->name("crud.actor");
Route::get("eliminar-actor-{id}",[CrudController::class, "delete"])->name("crud.delete");
Route::post("/registrar-actor", [CrudController::class, "create"])->name("crud.create");
Route::post("/modificar-actor", [CrudController::class, "update"])->name("crud.update");
Route::get("/obtener-pais",[CrudController::class, "getCountry"])->name("crud.getCountry");