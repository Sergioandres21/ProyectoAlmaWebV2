@extends('layouts.configuracion')

@section('title', 'Departamentos')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">      
@endsection

@section('content')

        <header>
            <h3 class='text-center'></h3>
        </header>  

                <div class="modal fade" id="RegistrarDepartamentoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Formulario de registro departamento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    <ul id="saveform_errList"></ul>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre del departamento:</label>
                                                <input type="text" class="nombre form-control" id="nombre"
                                                    name="nombre">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" id="create" class="btn btn-success add_departamento">Guardar</button>
                                </div>
            
                        </div>
                    </div>
                </div>
            {{-- Fin modal Registrar estado de pedido --}}

            {{-- EditEstadomodal --}}

            <div class="modal fade" id="EditDepartamentoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar departamento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formdepartamento" action="">
                                <div class="modal-body">

                                    <ul id="updateform_errList"></ul>
                                    <input type="hidden" id="edit_departamento_id">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Nombre del estado del pedido</label>
                                                <input type="text" id="edit_nombre" class="edit_nombre form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success editar_departamento">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Delete-Estadomodal --}}
                <div class="modal fade" id="EliminarDepartamentoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="Registrar" id="exampleModalLabel">Eliminar departamento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <input type="hidden" id="eliminar_departamento_id">
                                    <h4>¿Estás seguro que deseas eliminar este registro?</h4>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger eliminar_departamento_btn">Si, eliminar</button>
                                </div>
            
                        </div>
                    </div>
                </div>


            <div class="container">

            <div class="text-center">
                <h4>Departamentos</h4>
            </div>

            <div class="container caja">
                <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tb-departamento">
                                <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                                            data-target="#RegistrarDepartamentoModal">
                                            <i class="icon ion-md-add mr-2"></i>Registrar Departamento
                                </button>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE DEPARTAMENTO</th>
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

<script type="text/javascript" src="{{ asset('ajax/departamentos/script.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
    
@endsection