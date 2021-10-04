@extends('layouts.configuracion')

@section('title', 'Estado Agenda')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

            <header>
                <h3 class='text-center'></h3>
            </header>    

{{-- Registrar estado de pedido --}}

                <div class="modal fade" id="RegistrarEstadoAgendaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Registrar estado de agenda</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    <ul id="saveform_errList"></ul>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre del estado de la agenda:</label>
                                                <input type="text" class="nombre form-control" id="nombre"
                                                    name="nombre">
                                            </div>
                                        </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="estadoAgenda" class="col-form-label">Estado:</label>
                                            <select name="estadoAgenda" id="estadoAgenda" class="estadoAgenda form-control">
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
                                    <button type="button" class="btn btn-success add_estadoagenda">Guardar</button>
                                </div>
            
                        </div>
                    </div>
                </div>

{{-- EditEstadomodal --}}

                <div class="modal fade" id="EditEstadoAgendaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar estado de agenda</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">

                                    <ul id="updateform_errList"></ul>
                                    <input type="hidden" id="edit_estado_id">
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre del estado de la agenda:</label>
                                                <input type="text" class="edit_nombre form-control" id="edit_nombre"
                                                    name="edit_nombre">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="estado" class="col-form-label">Estado:</label>
                                                <select name="edit_estadoAgenda" id="edit_estadoAgenda" class="edit_estadoAgenda form-control">
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
                                    <button type="button" class="btn btn-success editar_estadoAgenda">Actualizar</button>
                                </div>
            
                        </div>
                    </div>
                </div>

{{-- Delete-Estadomodal --}}

            <div class="modal fade" id="EliminarEstadoAgendaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Eliminar estado de agenda</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">

                                    <input type="hidden" id="eliminar_estado_id">
                                    <h4>¿Estás seguro que deseas eliminar este registro?</h4>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger eliminar_estadoagenda_btn">Si, eliminar</button>
                                </div>
            
                        </div>
                    </div>
            </div>


    <div class="container">

        <div class="text-center">
            <h4>Estado de agendas</h4>
        </div>

    <div class="container caja">
        <div class="table-responsive">
                    <table class="table table-striped table-hover" id="estadoA">
                        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                            data-target="#RegistrarEstadoAgendaModal">
                            <i class="icon ion-md-add mr-2"></i>Registrar estado agenda
                        </button>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE ESTADO AGENDA</th>
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

<script type="text/javascript" src="{{ asset('ajax/estado-agenda/script.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

<script>

</script>
    
@endsection