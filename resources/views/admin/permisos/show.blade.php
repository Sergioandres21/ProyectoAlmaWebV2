@extends('layouts.configuracion')

@section('title', 'Mostrar permisos')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

            <header>
                <h3 class='text-center'></h3>
            </header>


            <div class="text-center">
                <h2>Lista de Permisos</h2>
            </div>

            @if (session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
            @endif
    
            <div class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header card-header-primary">
                          <div class="card-title"><h3>Permisos</h2></div>
                          <p class="card-category"><h3>Vista detallada del permiso {{$permission->description}}</h2></p>
                        </div>
                        <!--body-->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="card card-user">
                                <div class="card-body">
                                  <p class="card-text">
                                    <div class="author">
                                      <a href="#">
                                        <i class="fas fa-user-shield fa-5x" style="color:grey; width:10; height:10;"></i>
                                        <h3 class="title mt-3">{{ $permission->description }}</h3>
                                      </a>
                                      <p class="description">
                                      Creado: {{ $permission->created_at }}
                                      </p>
                                    </div>
                                  </p>
                                </div>
                                <div class="card-footer">
                                  <div class="button-container">
                                    <button class="btn btn-sm btn-primary btn-sm">Editar</button>
                                    <a href="{{ route('admin.permisos.index') }}" class="btn btn-secondary btn-sm">Volver al inicio</a>
                                  </div>
                                </div>
                              </div>
                            </div><!--end card user-->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

@endsection

@section('scripts')
                           
<script>
    $(document).ready(function(){
        $('#usuarios').DataTable({
            "language": {
                    "url": '/libs/datatables/spanish.json',
            }
        });
    });
</script>
              
@endsection