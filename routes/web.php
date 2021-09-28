<?php

use App\Http\Controllers\EstadoPedidosController;
//use App\Http\Controllers\RolesController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\HomeController;
use App\Models\EstadoPedidos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User1Controller;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\QuienesSomosController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PermissionController;


Route::group( attributes: ['middleware' => 'auth'], routes: function() {
    Route::get('', [HomeController::class, 'index'])->name('admin.home');

// RUTA PARA USUARIO
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

// Estado de Pedido

Route::get('estadoPedidos', [EstadoPedidosController::class, 'index'])->middleware('can:admin.users.edit');
Route::get('listar-estados', [EstadoPedidosController::class, 'listarEstado']);
Route::post('estadoPedidos', [EstadoPedidosController::class, 'store']);
Route::get('editar-estado/{id}', [EstadoPedidosController::class, 'edit']);
Route::put('actualizar-estado/{id}', [EstadoPedidosController::class, 'actualizar']);
Route::delete('eliminar-estado/{id}', [EstadoPedidosController::class, 'eliminar']);
Route::get('estadoPedido', [EstadoPedidosController::class, 'actualizarestado']);

// DEPARTAMENTOS

Route::get('departamentos', [DepartamentosController::class, 'index']);;
Route::post('registrar-departamento', [DepartamentosController::class, 'store']);
Route::get('listar-departamentos', [DepartamentosController::class, 'listarDepartamento']);
Route::get('editar-departamentos/{id}', [DepartamentosController::class, 'edit']);
Route::put('actualizar-departamentos/{id}', [DepartamentosController::class, 'actualizar']);
Route::delete('eliminar-departamentos/{id}', [DepartamentosController::class, 'eliminar']);

// configuracion formularios home

Route::get('quienes-somos', [QuienesSomosController::class, 'index']);
Route::get('listar-quienes', [QuienesSomosController::class, 'listarQuienes']);
Route::get('editar-quienes/{id}', [QuienesSomosController::class, 'edit']);
Route::put('actualizar-quienes/{id}', [QuienesSomosController::class, 'actualizar']);

// configuración formularios links principales
Route::get('contacto', [ContactoController::class, 'index']);
Route::get('listar-contactos', [ContactoController::class, 'listarContacto']);
Route::get('editar-contacto/{id}', [ContactoController::class, 'edit']);
Route::put('actualizar-contacto/{id}', [ContactoController::class, 'actualizar']);

Route::resource('/user', User1Controller::class);

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('/profesional', ProfesionalController::class);

Route::resource('permisos', PermissionController::class);

// ROLES

/* Route::get('roles', [RolesController::class, 'index']);
Route::post('registrar-rol', [RolesController::class, 'store']);
Route::get('listar-roles', [RolesController::class, 'listarRoles']);
Route::get('editar-roles/{id}', [RolesController::class, 'edit']);
Route::put('actualizar-roles/{id}', [RolesController::class, 'actualizar']);
Route::delete('eliminar-roles/{id}', [RolesController::class, 'eliminar']);
Route::get('estadoRol', [RolesController::class, 'actualizarestado']); */

// Forma de pago

/* Route::get('formaPago', [FormaPagoController::class, 'index']);
Route::get('listar-formapago', [FormaPagoController::class, 'listarFormapago']);
Route::post('formaPago', [FormaPagoController::class, 'store']);
Route::get('editar-formapago/{id}', [FormaPagoController::class, 'edit']);
Route::put('actualizar-formapago/{id}', [FormaPagoController::class, 'actualizar']);
Route::delete('eliminar-formapago/{id}', [FormaPagoController::class, 'eliminar']);
Route::delete('', [FormaPagoController::class, 'eliminar']); */

});

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
