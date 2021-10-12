<?php

use App\Http\Controllers\EstadoPedidosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User1Controller;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\QuienesSomosController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EstadoagendaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\TarifaServicioController;
use App\Http\Controllers\TipoServicioController;

Route::group(['middleware' => 'auth'], function() {

Route::get('', [HomeController::class, 'index'])->name('admin.home');

// RUTA PARA USUARIO

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

// DEPARTAMENTOS - FALTA CAMBIAR DE ESTADO

Route::get('departamentos', [DepartamentosController::class, 'index'])->name('departamentos')->middleware('can:admin.departamentos.index');
Route::post('registrar-departamento', [DepartamentosController::class, 'store']);
Route::get('listar-departamentos', [DepartamentosController::class, 'listarDepartamento']);
Route::get('editar-departamentos/{id}', [DepartamentosController::class, 'edit']);
Route::put('actualizar-departamentos/{id}', [DepartamentosController::class, 'actualizar']);
Route::delete('eliminar-departamentos/{id}', [DepartamentosController::class, 'eliminar']);

// Tipo de servicios

Route::get('tipoServicios', [TipoServicioController::class, 'index'])->name('tipoServicios')->middleware('can:admin.tipoServicios.index');
Route::get('listar-tiposervicios', [TipoServicioController::class, 'listarTiposervicios']);
Route::post('registrar-tiposervicios', [TipoServicioController::class, 'store']);
Route::get('editar-tiposervicios/{id}', [TipoServicioController::class, 'edit']);
Route::put('actualizar-tiposervicios/{id}', [TipoServicioController::class, 'actualizar']);
Route::delete('eliminar-tiposervicios/{id}', [TipoServicioController::class, 'eliminar']);
Route::get('estadoTiposervicios', [TipoServicioController::class, 'actualizarestado']);

// Tarifa de servicios

Route::get('tarifaServicios', [TarifaServicioController::class, 'index'])->name('tarifaServicios')->middleware('can:admin.tarifaServicios.index');
Route::get('listar-tarifaservicios', [TarifaServicioController::class, 'listarTarifaservicios']);
Route::post('registrar-tarifaservicios', [TarifaServicioController::class, 'store']);
Route::get('editar-tarifaservicios/{id}', [TarifaServicioController::class, 'edit']);
Route::put('actualizar-tarifaservicios/{id}', [TarifaServicioController::class, 'actualizar']);
Route::delete('eliminar-tarifaservicios/{id}', [TarifaServicioController::class, 'eliminar']);

// configuracion formularios home

Route::get('quienes-somos', [QuienesSomosController::class, 'index'])->name('quienes-somos')->middleware('can:admin.quienes-somos.index');
Route::get('listar-quienes', [QuienesSomosController::class, 'listarQuienes']);
Route::get('editar-quienes/{id}', [QuienesSomosController::class, 'edit']);
Route::put('actualizar-quienes/{id}', [QuienesSomosController::class, 'actualizar']);

// configuración formularios links principales
Route::get('contacto', [ContactoController::class, 'index'])->name('contacto')->middleware('can:admin.contacto.index');
Route::get('listar-contactos', [ContactoController::class, 'listarContacto']);
Route::get('editar-contacto/{id}', [ContactoController::class, 'edit']);
Route::put('actualizar-contacto/{id}', [ContactoController::class, 'actualizar']);

Route::resource('/user', User1Controller::class);

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('/profesional', ProfesionalController::class);

Route::resource('permisos', PermissionController::class)->names('admin.permisos');

});

// Estado de Pedido

Route::get('estadoPedidos', [EstadoPedidosController::class, 'index'])->name('estadoPedidos')->middleware('can:admin.users.edit');
Route::get('listar-estados', [EstadoPedidosController::class, 'listarEstado']);
Route::post('estadoPedidos', [EstadoPedidosController::class, 'store']);
Route::get('editar-estado/{id}', [EstadoPedidosController::class, 'edit']);
Route::put('actualizar-estado/{id}', [EstadoPedidosController::class, 'actualizar']);
Route::delete('eliminar-estado/{id}', [EstadoPedidosController::class, 'eliminar']);
Route::get('estadoPedido', [EstadoPedidosController::class, 'actualizarestado']);

Route::get('estadoAgenda', [EstadoAgendaController::class, 'index'])->name('estadoAgenda');
Route::get('listar-estadoagenda', [EstadoAgendaController::class, 'listarEstadoAgenda']);
Route::post('estadoAgenda', [EstadoAgendaController::class, 'store']);
Route::get('editar-estadoagenda/{id}', [EstadoAgendaController::class, 'edit']);
Route::put('actualizar-estadoagenda/{id}', [EstadoAgendaController::class, 'actualizar']);
Route::delete('eliminar-estadoagenda/{id}', [EstadoAgendaController::class, 'eliminar']);
//Route::get('estadoAgendas', [EstadoAgendaController::class, 'actualizarEstadoAgenda']);

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::resource('municipios', MunicipioController::class)->names('admin.municipios');

Route::resource('sucursales', SucursalesController::class)->names('admin.sucursales');

Route::resource('proveedores', ProveedoresController::class)->names('admin.proveedores');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
