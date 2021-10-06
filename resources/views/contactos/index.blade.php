@extends('layouts.configuracion')

@section('title', 'Contactos')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'></h3>
        </header> 

        {{-- EditEstadomodal --}}

        <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="Registrar" id="exampleModalLabel">Editar y actualizar Redes sociales</h5>
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
                                <label for="edit_whatsapp" class="edit_whatsapp col-form-label">Link Whatsapp:</label>
                                <input type="text" id="edit_whatsapp" class="edit_whatsapp form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_email" class="edit_email col-form-label">Email:</label>
                                <input type="text" id="edit_email" class="edit_email form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_instagram" class="col-form-label">Link instagram:</label>
                                <input type="text" id="edit_instagram" class="edit_instagram form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_descripcion" class="col-form-label">Descripción:</label>
                                <textarea class="form-control" id="edit_descripcion" name="edit_descripcion" rows="4">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success editar_contacto">Actualizar</button>
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
                                <th>WHATSAPP</th>
                                <th>EMAIL</th>
                                <th>INSTAGRAM</th>
                                <th>DESCRIPCION</th>
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
                
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="{{ asset('ajax/contacto/script.js') }}"></script>
  
  </body>
  
  </html>

@endsection