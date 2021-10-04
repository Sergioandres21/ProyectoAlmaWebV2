@extends('layouts.configuracion')

@section('title', 'Configuración Quienes Somos')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')  

        {{-- EditEstadomodal --}}

        <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar Página principal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                    <div class="modal-body">
                        <ul id="updateform_errList"></ul>

                        <input type="hidden" id="registro_id">

                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nombre" class="edit_nombre col-form-label">Quienes somos:</label>
                                <textarea class="form-control" id="quienes" name="quienes" rows="4">
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="descripcion" class="edit_descripcion col-form-label">Misión:</label>
                                <textarea class="form-control" id="mision" name="mision" rows="4">
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="estado" class="col-form-label">Visión:</label>
                                <textarea class="form-control" id="vision" name="vision" rows="4">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success editar_quienes">Actualizar</button>
                    </div>

            </div>
        </div>
    </div>

    <div class="container caja">   

        <div class="text-center">
            <h2>Registro página principal</h2>
        </div>


                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>MISIÓN</th>
                                <th>VISIÓN</th>
                                <th>QUIENES SOMOS</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
        </div>


@endsection

@section('scripts')
        
<script type="text/javascript" src="{{ asset('ajax/quienes/script.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
        
@endsection
