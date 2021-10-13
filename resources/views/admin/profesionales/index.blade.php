@extends('layouts.configuracion')

@section('title', 'Listado de profesionales')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

            <header>
                <h3 class='text-center'></h3>
            </header>

            <div class="text-center">
                <h2>Lista de profesionales</h2>
            </div>

            <div class="container caja"> 

            @if (session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
            @endif
    
            <div class="table-responsive">
                <table id="profesionales" class="table table-striped">
                    <a class="btn btn-secondary btn-sm mb-3" href="{{route('admin.profesionales.create')}}">Nuevo profesional</a>
                    <thead>
                        <tr>
                            <th>Identificación</th>
                            <th>Tipo de documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th>Municipio</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody>
                      @foreach ($profesionales as $profesional)
                      @if($profesional->estado === 1)
                           <tr>
                               <td>{{$profesional->numeroIdentificacion}}</td>
                               <td>{{$profesional->tipoDocumento}}</td>
                               <td>{{$profesional->nombres}}</td>
                               <td>{{$profesional->apellidos}}</td>
                               <td>{{$profesional->email}}</td>
                               <td>{{$profesional->celular}}</td>
                               <td>{{$profesional->municipios->nombreMunicipio}}</td>
                               <td>{{$profesional->direccionResidencia}}</td>

                            <td width="10px">
                                <button type="button" class="btn btn-outline-success btn-sm" disabled>Activo <i class="icon ion-md-checkbox"></i></button>
                            </td>

                            <td width="10px">
                                <a href="{{route('admin.profesionales.edit', $profesional)}}" class="btn btn-sm btn-primary">Editar</a>
                            </td>

                            <td width="10px">
                                <form action="{{route('admin.profesionales.destroy', $profesional)}}" method="POST" class="d-inline formulario-eliminar">
                                 @csrf
                                 @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                           </tr>
 
                        @elseif($profesional->estado === 0)

                        <tr>
                            <td>{{$profesional->numeroIdentificacion}}</td>
                            <td>{{$profesional->tipoDocumento}}</td>
                            <td>{{$profesional->nombres}}</td>
                            <td>{{$profesional->apellidos}}</td>
                            <td>{{$profesional->email}}</td>
                            <td>{{$profesional->celular}}</td>
                            <td>{{$profesional->municipios->nombreMunicipio}}</td>
                            <td>{{$profesional->direccionResidencia}}</td>

                         <td width="10px">
                            <button type="button" class="btn btn-outline-danger btn-sm" disabled>Inactivo <i class="icon ion-md-alert"></i></button>
                         </td>

                         <td width="10px">
                             <a href="{{route('admin.profesionales.edit', $profesional)}}" class="btn btn-sm btn-primary">Editar</a>
                         </td>

                         <td width="10px">
                             <form action="{{route('admin.profesionales.destroy', $profesional)}}" method="POST" class="d-inline formulario-eliminar">
                              @csrf
                              @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                             </form>
                         </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>

        </body>
                
@endsection

@section('scripts')
                    
            
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
            
        <script>
            $(document).ready(function(){
                $('#profesionales').DataTable({
                    "lengthMenu": [[5,10,50, -1], [5, 10, 50, "Todos"]],
                    "language": {
                    "url": '/libs/datatables/spanish.json',
                    }
                });
            });
        </script>


@if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El profesional se eliminó con éxito.',
                'success'
            )
        </script>
        @endif

        <script>
            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Este profesional se eliminará definitivamente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, ¡Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
                })
            });

        </script>

</html>
@endsection