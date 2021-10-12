@extends('layouts.configuracion')

@section('title', 'Estado de Pedidos')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')  

{{-- Registrar estado de pedido --}}

                <div class="modal fade" id="RegistrarEstadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Registrar estado de pedido</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    <ul id="saveform_errList"></ul>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="NombreEstado" class="col-form-label">Nombre del estado del pedido:</label>
                                                <input type="text" class="NombreEstado form-control" id="NombreEstado"
                                                    name="NombreEstado">
                                            </div>
                                        </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="estadoPedido" class="col-form-label">Estado:</label>
                                            <select name="estadoPedido" id="estadoPedido" class="estadoPedido form-control" disabled>
                                                <option value="1">Activo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success add_estado">Guardar</button>
                                </div>
            
                        </div>
                    </div>
                </div>

{{-- EditEstadomodal --}}

                <div class="modal fade" id="EditEstadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar estado de pedido</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">

                                    <ul id="updateform_errList"></ul>
                                    <input type="hidden" id="edit_esta_id">
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre del estado del pedido:</label>
                                                <input type="text" class="NombreEstado form-control" id="edit_nombre"
                                                    name="edit_nombre">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="estado" class="col-form-label">Estado:</label>
                                                <select name="edit_estadoPedido" id="edit_estadoPedido" class="edit_estadoPedido form-control">
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
                                    <button type="button" class="btn btn-success editar_estado">Actualizar</button>
                                </div>
            
                        </div>
                    </div>
                </div>

{{-- Delete-Estadomodal --}}

            <div class="modal fade" id="EliminarEstadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Eliminar estado de pedido</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">

                                    <input type="hidden" id="eliminar_esta_id">
                                    <h4>¿Estás seguro que deseas eliminar este registro?</h4>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger eliminar_estado_btn">Si, eliminar</button>
                                </div>
            
                        </div>
                    </div>
            </div>


    <div class="container">

        <div class="text-center">
            <h4>Estado de pedidos</h4>
        </div>

    <div class="container caja">
        <div class="table-responsive">
                    <table class="table table-striped table-hover" id="estadoP">
                        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                            data-target="#RegistrarEstadoModal">
                            <i class="icon ion-md-add mr-2"></i>Registrar estado
                        </button>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE ESTADO</th>
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

<script type="text/javascript" src="{{ asset('ajax/estado-pedidos/script.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

@endsection