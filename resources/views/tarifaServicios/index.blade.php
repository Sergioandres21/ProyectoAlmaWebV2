@extends('layouts.configuracion')

@section('title', 'Tarifa de servicios')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">      
@endsection

@section('content')

                <div class="modal fade" id="RegistrarTarifaServicioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Formulario de registro Tarifa de Servicios</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    <ul id="saveform_errList"></ul>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="Año tarifa" class="col-form-label">Año de la tarifa del servicio:</label>
                                                <input type="number" class="anotarifa form-control" id="anotarifa"
                                                    name="anotarifa">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="resolucion" class="col-form-label">Resolución:</label>
                                                <textarea class="form-control" id="resolucion" name="resolucion" rows="4">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" id="create" class="btn btn-success add_tarifaservicio">Guardar</button>
                                </div>
                        </div>
                    </div>
                </div>
            {{-- Fin modal Registrar estado de pedido --}}

            {{-- EditEstadomodal --}}

            <div class="modal fade" id="EditTarifaservicioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar tarifa de servicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formtarifaservicio" action="">
                                <div class="modal-body">

                                    <ul id="updateform_errList"></ul>
                                    <input type="hidden" id="edit_tarifaservicio_id">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="edit_anotarifa" class="col-form-label">Año de la tarifa del servicio:</label>
                                                <input type="number" class="edit_anotarifa form-control" id="edit_anotarifa"
                                                    name="edit_anotarifa">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="edit_descipcion" class="col-form-label">Resolución:</label>
                                                <textarea class="edit_resolucion form-control" id="edit_resolucion" name="edit_resolucion" rows="4">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success editar_tarifaservicio_btn">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Delete-Estadomodal --}}
                <div class="modal fade" id="EliminarTarifaservicioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Eliminar tarifa servicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <input type="hidden" id="eliminar_tarifaservicio_id">
                                    <h4>¿Estás seguro que deseas eliminar este registro?</h4>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger eliminar_tarifaservicio_btn">Si, eliminar</button>
                                </div>
            
                        </div>
                    </div>
                </div>


            <div class="container">

            <div class="text-center">
                <h4>Tarifa de servicios</h4>
            </div>

            <div class="container caja">
                <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tb-tarifaservicio">
                                <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                                            data-target="#RegistrarTarifaServicioModal">
                                            <i class="icon ion-md-add mr-2"></i>Registrar tarifa de servicio
                                </button>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>AÑO TARIFA DE SERVICIO</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>EDITAR</th>
                                        <th>ELIMINAR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                    </div>
            </div>


@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('ajax/tarifaServicio/script.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
    
@endsection