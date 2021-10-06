@extends('layouts.configuracion')

@section('title', 'Roles')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

{{-- Registrar estado de pedido --}}

                <div class="modal fade" id="RegistrarRoles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Registrar roles</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    <ul id="saveform_errList"></ul>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre:</label>
                                                <input type="text" class="nombre form-control" id="nombre" name="nombre">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="descripcion" class="col-form-label">Descripción:</label>
                                                <input type="text" class="descripcion form-control" id="descripcion"
                                                    name="descripcion">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="estado" class="col-form-label">Estado:</label>
                                                <select name="estado" id="estado" class="estado form-control" disabled>
                                                    <option value="1">Activo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success add_rol">Guardar</button>
                                </div>
            
                        </div>
                    </div>
                </div>

{{-- EditEstadomodal --}}

                <div class="modal fade" id="EditRolModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar rol</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    <ul id="updateform_errList"></ul>

                                    <input type="hidden" id="edit_rol_id">

                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nombre" class="edit_nombre col-form-label">Nombre:</label>
                                            <input type="text" class="form-control" id="edit_nombre" name="edit_nombre">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="descripcion" class="edit_descripcion col-form-label">Descripción:</label>
                                            <input type="text" class="form-control" id="edit_descripcion"
                                                name="edit_descripcion">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="estado" class="col-form-label">Estado:</label>
                                            <select name="edit_estado" id="edit_estado" class="edit_estado form-control">
                                                <option value="">Seleccionar...</option>
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success editar_rol">Actualizar</button>
                                </div>
            
                        </div>
                    </div>
                </div>

{{-- Delete-Estadomodal --}}

            <div class="modal fade" id="EliminarRolModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Eliminar rol</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">

                                    <input type="hidden" id="eliminar_rol_id">
                                    <h4>¿Estás seguro que deseas eliminar este registro?</h4>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger eliminar_rol_btn">Si, eliminar</button>
                                </div>
            
                        </div>
                    </div>
            </div>


    <div class="container caja">   

        <div class="text-center">
            <h2>Roles del aplicativo</h2>
        </div>


                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="roles">
                        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                                    data-target="#RegistrarRoles">
                                    <i class="icon ion-md-add mr-2"></i>Registrar Rol
                                </button>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE ROL</th>
                                <th>DESCRIPCION</th>
                                <th>ESTADO</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
        </div>


@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('ajax/roles/script.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
    
@endsection