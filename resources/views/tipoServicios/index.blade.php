@extends('layouts.configuracion')

@section('title', 'Tipo De Servicios')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">      
@endsection

@section('content')

                <div class="modal fade" id="RegistrarTipoServicioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Formulario de registro Tipo de Servicios</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    <ul id="saveform_errList"></ul>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre del tipo de servicio:</label>
                                                <input type="text" class="nombre form-control" id="nombre"
                                                    name="nombre">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="estadoTipo" class="col-form-label">Estado:</label>
                                                <select name="estadoTipo" id="estadoTipo" class="estadoTipo form-control">
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
                                    <button type="button" id="create" class="btn btn-success add_tiposervicio">Guardar</button>
                                </div>
            
                        </div>
                    </div>
                </div>
            {{-- Fin modal Registrar estado de pedido --}}

            {{-- EditEstadomodal --}}

            <div class="modal fade" id="EditTiposervicioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar tipo de servicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formtiposervicio">

                                <div class="modal-body">

                                    <ul id="updateform_errList"></ul>
                                    <input type="hidden" id="edit_tiposervicio_id">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Nombre del tipo de servicio</label>
                                                <input type="text" id="edit_nombre" class="edit_nombre form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
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
                                    <button type="button" class="btn btn-success editar_tiposervicio_btn">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Delete-Estadomodal --}}
                <div class="modal fade" id="EliminarTiposervicioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Eliminar tipo servicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <input type="hidden" id="eliminar_tiposervicio_id">
                                    <h4>¿Estás seguro que deseas eliminar este registro?</h4>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger eliminar_tiposervicio_btn">Si, eliminar</button>
                                </div>
            
                        </div>
                    </div>
                </div>


            <div class="container">

            <div class="text-center">
                <h4>Tipo de servicios</h4>
            </div>

            <div class="container caja">
                <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tb-tiposervicio">
                                <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                                            data-target="#RegistrarTipoServicioModal">
                                            <i class="icon ion-md-add mr-2"></i>Registrar tipo servicio
                                </button>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE TIPO DE SERVICIO</th>
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

<script type="text/javascript" src="{{ asset('ajax/tipoServicio/script.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
    
@endsection