@extends('layouts.configuracion')

@section('title', 'Listado de permisos')
    
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

            <div class="container caja"> 

            @if (session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
            @endif
    
            <div class="table-responsive">
                <table id="permisos" class="table table-striped">
                    <a class="btn btn-secondary btn-sm mb-3" href="{{route('admin.permisos.create')}}">Nuevo Permiso</a>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del permiso</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                       @forelse ($permissions as $permission)
                           <tr>
                               <td>{{$permission->id}}</td>
                               <td>{{$permission->name}}</td>
                               <td>{{$permission->description}}</td>
                            
                               <td width="td-actions text-right">
                                <a href="{{route('admin.permisos.show', $permission->id)}}" class="btn btn-info">Ver</a>

                                   <a href="{{route('admin.permisos.edit', $permission->id)}}" class="btn btn-sm btn-primary">Editar</a>

                                   <form action="{{route('admin.permisos.destroy', $permission->id)}}" method="POST" class="d-inline formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                       <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                   </form>
                               </td>
                           </tr>
                           @empty 
                           <h1>No existen permisos registrados</h1>
                       @endforelse
                    </tbody>
                </table>
            </div>
            </div>
                
@endsection

@section('scripts')
                    
            
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
            
        <script>
            $(document).ready(function(){
                $('#permisos').DataTable({
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
                'El permiso se eliminó con éxito.',
                'success'
            )
        </script>
        @endif

        <script>
            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Este permiso se eliminará definitivamente!",
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

</body>

</html>
@endsection