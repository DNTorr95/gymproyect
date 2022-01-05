<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ControlDePesoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\NotaDeVentaController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('menu');
})->name('menu');


Route::get('/login', [AdministradorController::class, 'loginView'])->name('login.view')->middleware('guest:admin');
Route::post('/login', [AdministradorController::class, 'login'])->name('login')->middleware('guest:admin');

Route::middleware('auth:admin')->group(function () {

    Route::post('/logout',[AdministradorController::class,'logout'])->name('logout');

    Route::get('/menu', [AdministradorController::class, 'menu'])->name("menu");

    //Persona 
    Route::get('/personas/create', [PersonaController::class, 'create'])
        ->name('personas.create');
    Route::post('/personas', [PersonaController::class, 'store'])
        ->name('personas.store');
    Route::delete('/personas/{id}', [PersonaController::class, 'destroy'])
        ->name('personas.destroy');

    /*Route::get('/personas/edit/{id}', [PersonaController::class, 'edit'])
        ->name('personas.edit');
    Route::put('/personas/edit/{id}', [PersonaController::class, 'update'])
        ->name('personas.update');
    */

    //Administrador
    Route::get('/personas/administradores', [AdministradorController::class, 'index'])
        ->name('personas.administradores.index');
    Route::get('/personas/administradores/edit/{persona_id}', [AdministradorController::class, 'edit'])->name('personas.administradores.edit');
    Route::put('/personas/administradores/edit/{persona_id}', [AdministradorController::class, 'update'])->name('personas.administradores.update');

    //Cliente
    Route::get('/personas/clientes', [ClienteController::class, 'index'])
        ->name('personas.clientes.index');
    Route::get('/personas/clientes/edit/{persona_id}', [ClienteController::class, 'edit'])
        ->name('personas.clientes.edit');
    Route::put('/personas/clientes/edit/{persona_id}', [ClienteController::class, 'update'])
        ->name('personas.clientes.update');
    Route::get('personas/clientes/show/{persona_id}', [ClienteController::class, 'show'])
        ->name('personas.clientes.show');   //para el peso    

    //Instructor
    Route::get('/personas/instructores', [InstructorController::class, 'index'])
        ->name('personas.instructores.index');
    Route::get('/personas/instructores/edit/{persona_id}', [InstructorController::class, 'edit'])
        ->name('personas.instructores.edit');
    Route::put('/personas/instructores/edit/{persona_id}', [InstructorController::class, 'update'])
        ->name('personas.instructores.update');

    //Asistencia
    Route::get('/asistencias', [AsistenciaController::class, 'index'])
        ->name('asistencias.index');
    Route::post('/asistencias', [AsistenciaController::class, 'store'])
        ->name('asistencias.store');
    Route::get('/asistencias/edit/{id}', [AsistenciaController::class, 'edit'])
        ->name('asistencias.edit');
    Route::put('/asistencias/edit/{id}', [AsistenciaController::class, 'update'])
        ->name('asistencias.update');
    Route::delete('/asistencias/{id}', [AsistenciaController::class, 'destroy'])
        ->name('asistencias.destroy');

    //Peso
    Route::get('/personas/clientes/{cliente_id}/pesos', [ControlDePesoController::class, 'create'])
        ->name('personas.clientes.pesos.create');
    Route::post('/personas/clientes/{cliente_id}/pesos', [ControlDePesoController::class, 'store'])
        ->name('personas.clientes.pesos.store');
    Route::get('/personas/clientes/peso/edit/{id}/{persona_id}', [ControlDePesoController::class, 'edit'])->name('personas.clientes.pesos.edit');
    Route::put('/personas/clientes/pesos/edit/{id}/{persona_id}', [ControlDePesoController::class, 'update'])->name('personas.clientes.pesos.update');
    Route::delete('/personas/clientes/pesos/{id}/{persona_id}', [ControlDePesoController::class, 'destroy'])->name('personas.clientes.pesos.destroy');

    //Area
    Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
    Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
    Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
    Route::get('/areaas/edit/{id}', [AreaController::class, 'edit'])->name('areas.edit');
    Route::put('/areas/edit/{id}', [AreaController::class, 'update'])->name('areas.update');
    Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');
    //Route::resource('areas', [AreaController::class]);

    //Paquete
    Route::get('/paquetes', [PaqueteController::class, 'index'])->name('paquetes.index');
    Route::get('/paquetes/create', [PaqueteController::class, 'create'])->name('paquetes.create');
    Route::post('/paquetes', [PaqueteController::class, 'store'])->name('paquetes.store');
    Route::get('/paquetes/edit/{id}', [PaqueteController::class, 'edit'])->name('paquetes.edit');
    Route::put('/paquetes/edit/{id}', [PaqueteController::class, 'update'])
    ->name('paquetes.update');
    Route::delete('/paquetes/{id}', [PaqueteController::class, 'destroy'])
    ->name('paquetes.destroy');

    //Disciplina
    Route::get('/disciplinas', [DisciplinaController::class, 'index'])->name('disciplinas.index');
    Route::get('/disciplinas/create', [DisciplinaController::class, 'create'])
    ->name('disciplinas.create');
    Route::post('/disciplinas', [DisciplinaController::class, 'store'])->name('disciplinas.store');
    Route::get('/disciplinas/edit/{id}', [DisciplinaController::class, 'edit'])
    ->name('disciplinas.edit');
    Route::put('/disciplinas/edit/{id}', [DisciplinaController::class, 'update'])
    ->name('disciplinas.update');
    Route::delete('/disciplinas/{id}', [DisciplinaController::class, 'destroy'])
    ->name('disciplinas.destroy');    

    //Grupos
    Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');
    Route::get('/grupos/create', [GrupoController::class, 'create'])
    ->name('grupos.create');
    Route::post('/grupos', [GrupoController::class, 'store'])->name('grupos.store');
    Route::get('/grupos/edit/{id}', [GrupoController::class, 'edit'])
    ->name('grupos.edit');
    Route::put('/grupos/edit/{id}', [GrupoController::class, 'update'])
    ->name('grupos.update');
    Route::delete('/grupos/{id}', [GrupoController::class, 'destroy'])
    ->name('grupos.destroy');
    
    //Inscripciones
    Route::get('/inscripciones', [InscripcionController::class, 'index'])
    ->name('inscripciones.index');
    Route::get('/inscripciones/create', [InscripcionController::class, 'create'])
    ->name('inscripciones.create');
    Route::post('/inscripciones', [InscripcionController::class, 'store'])
    ->name('inscripciones.store');
    Route::get('/inscripciones/edit/{id}', [InscripcionController::class, 'edit'])
    ->name('inscripciones.edit');
    Route::put('/inscripciones/edit/{id}', [InscripcionController::class, 'update'])
    ->name('inscripciones.update');
    Route::delete('/inscripciones/{id}', [InscripcionController::class, 'destroy'])
    ->name('inscripciones.destroy');

    //Categorias
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])
    ->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/edit/{id}', [CategoriaController::class, 'edit'])
    ->name('categorias.edit');
    Route::put('/categorias/edit/{id}', [CategoriaController::class, 'update'])
    ->name('categorias.update');
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])
    ->name('categorias.destroy'); 

    //Productos
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])
    ->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])
    ->name('productos.edit');
    Route::put('/productos/edit/{id}', [ProductoController::class, 'update'])
    ->name('productos.update');
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])
    ->name('productos.destroy');     

    //Nota de venta
    Route::get('/notaDeVentas', [NotaDeVentaController::class, 'index'])
    ->name('notaDeVentas.index');
    Route::get('/notaDeVentas/create', [NotaDeVentaController::class, 'create'])
    ->name('notaDeVentas.create');
    Route::post('/notaDeVentas', [NotaDeVentaController::class, 'store'])
    ->name('notaDeVentas.store');
    Route::get('/notaDeVentas/edit/{id}', [NotaDeVentaController::class, 'edit'])
    ->name('notaDeVentas.edit');
    Route::put('/notaDeVentas/edit/{id}', [NotaDeVentaController::class, 'update'])
    ->name('notaDeVentas.update');
    Route::delete('/notaDeVentas/{id}', [NotaDeVentaController::class, 'destroy'])
    ->name('notaDeVentas.destroy');      
    
});
